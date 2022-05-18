<?php

namespace Greenwing\Technology\Controller\Custom;

class Index extends \Magento\Framework\App\Action\Action
{
     /**
      *
      * @var _resultPageFactory
      */
    protected $_resultPageFactory;

     /**
      *
      * @var _customerSession
      */
    protected $_customerSession;

     /**
      *
      * @var storeManager
      */
    protected $storeManager;

     /**
      * Variable for url rewrite factory.
      * @var urlReWriteFactory
      */
    protected $urlRWFactory;

    /**
     * Variable for url rewrite.
     *
     * @var urlReWrite
     */
    protected $urlRW;
 
    /**
     * Constructor function
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param Session $customerSession
     * @param StoreManagerInterface $storeManager
     * @param UrlRewriteFactory $urlRewriteFactory
     * @param UrlRewrite $urlRewrite
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\UrlRewrite\Model\UrlRewriteFactory $urlRewriteFactory,
        \Magento\UrlRewrite\Model\UrlRewrite $urlRewrite
    ) {
        $this->_resultPageFactory = $resultPageFactory;
        $this->_customerSession = $customerSession;
        $this->storeManager = $storeManager;
        $this->urlRWFactory = $urlRewriteFactory;
        $this->urlRW = $urlRewrite;
        parent::__construct($context);
    }
 
    /**
     * Default function
     */
    public function execute()
    {
        return $this->_resultPageFactory->create();
    }
}
