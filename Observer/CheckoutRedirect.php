<?php

namespace Greenwing\Technology\Observer;

class CheckoutRedirect implements \Magento\Framework\Event\ObserverInterface
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
     * Variable for redirect object.
     *
     * @var redirect
     */
    protected $redirect;

    /**
     * Function for constructure
     *
     * @param Firstname $resultPageFactory
     * @param Lastname $customerSession
     * @param Email $storeManager
     * @param CustomerGroup $redirect
     */
    public function __construct(
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\App\Response\RedirectInterface $redirect
    ) {
        $this->_resultPageFactory = $resultPageFactory;
        $this->_customerSession = $customerSession;
        $this->storeManager = $storeManager;
        $this->redirect = $redirect;
    }

    /**
     * Function for constructure
     *
     * @param observer $observer
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $returnUrl = $this->_customerSession->getReturnURL();
        if ($returnUrl == null) {
            $controller = $observer->getControllerAction();
            return $this->_resultPageFactory->create();
        } else {
            $controller = $observer->getControllerAction();
            $this->redirect->redirect($controller->getResponse(), 'sso_signin/custom/');
            return $this;
        }
    }
}
