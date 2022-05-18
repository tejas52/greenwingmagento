<?php

namespace Greenwing\Technology\Block;

class Custom extends \Magento\Framework\View\Element\Template
{

    /**
     * Request variable
     *
     * @var requestjson
     */
    private $requestjson;

    /**
     * Request variable
     *
     * @var supplierpartid
     */
    private $supplierpartid;

    /**
     * Request variable
     *
     * @var _checkoutSession
     */
    protected $_checkoutSession;

    /**
     * Request variable
     *
     * @var _cart
     */
    protected $_cart;

    /**
     * Request variable
     *
     * @var session
     */
    protected $session;

    /**
     * Request variable
     *
     * @var prRepository
     */
    protected $prRepository;
    
    /**
     * Request variable
     *
     * @var _scopeConfig
     */
    protected $_scopeConfig;

    /**
     * Request variable
     *
     * @var _customerSession
     */
    protected $_customerSession;

    /**
     * Constructor method
     * @param Context $context
     * @param Cart $cart
     * @param Session $checkoutSession
     * @param SessionManagerInterface $session
     * @param ProductRepository $productRepository
     * @param ScopeConfigInterface $scopeConfig
     * @param Session $customerSession
     * @param array $data = []
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Checkout\Model\Cart $cart,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Framework\Session\SessionManagerInterface $session,
        \Magento\Catalog\Model\ProductRepository $productRepository,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Customer\Model\Session $customerSession,
        array $data = []
    ) {
        $this->requestjson = 'request';
        $this->supplierpartid = 'SupplierPartID';
        $this->_cart = $cart;
        $this->_checkoutSession = $checkoutSession;
        $this->session = $session;
        $this->prRepository = $productRepository;
        $this->_scopeConfig = $scopeConfig;
        $this->_customerSession = $customerSession;
        parent::__construct($context, $data);
    }

    /**
     * Get cart data
     */
    public function getCartData()
    {
        $getCurrentQuote = $this->_checkoutSession->getQuote();
        $getAllitems = $getCurrentQuote->getAllItems();
        $buyerCookie = $this->_customerSession->getBuyerCookie();
        $customerId = $this->_customerSession->setCustomID();
        $returnUrl = $this->_customerSession->getReturnURL();
        $supplierPartAuxId = $getCurrentQuote->getId();
        $requestArray = [];
        $requestArray[$this->requestjson]['type'] = "ReturnCart";
        $requestArray[$this->requestjson]['buyercookie'] = $buyerCookie;
        $requestArray[$this->requestjson]['CustomerID'] = $customerId;
        $itemCount = 0;
        $debugEnable = $this->_scopeConfig->getValue("technology/general/enable");

        foreach ($getAllitems as $_item) {
            if (isset($cartitem[$this->supplierpartid]) && $_item['sku'] == $cartitem[$this->supplierpartid]) {
                continue;
            }
            $product = $this->prRepository->getById($_item['product_id']);
            $itemCategory = $product->getCategoryIds()[0];
            $cartitem[$this->supplierpartid] = $_item['sku'];
            $cartitem['Description'] = $_item['name'];
            $cartitem['Quantity'] = (int)$_item['qty'];
            $cartitem['Supplierpartauxid'] = $supplierPartAuxId;
            $cartitem['UnitPrice'] = $_item['price'];
            $cartitem['UOM'] = 'EA';
            $cartitem['Currency'] = $this->_storeManager->getStore()->getCurrentCurrency()->getCode();

            $cartitem['UNSPSC'] = $itemCategory[0];
            $itemCount++;
            $requestArray[$this->requestjson]['body']['items'][] = $cartitem;
        }
        
        $responseArray = [];
        $responseArray['ReturnURL'] = $returnUrl;
        $responseArray[$this->requestjson] = $requestArray;
        $responseArray['debugEnable'] = $debugEnable;
 
        return json_encode($responseArray);
    }
}
