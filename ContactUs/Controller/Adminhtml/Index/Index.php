<?php

namespace Brander\ContactUs\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Index
 * @package Test\UiGrid\Controller\Adminhtml\Index
 */
class Index extends Action
{
    /**
     * @access  protected
     * @var     \Magento\Framework\View\Result\PageFactory
     */
    protected $_resultPageFactory;

    /**
     * Index constructor.
     *
     * @access  public
     * @param   Context     $context
     * @param   PageFactory $resultPageFactory
     */
    public function __construct( Context $context, PageFactory $resultPageFactory )
    {
        parent::__construct($context);
        $this->_resultPageFactory = $resultPageFactory;
    }

    /**
     * Contact us grid page.
     *
     * @access public
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Brander_ContactUs::contactus_grid');
        $resultPage->getConfig()->getTitle()->prepend(__('Grid List'));

        return $resultPage;
    }

    /**
     * Check Grid List Permission.
     *
     * @access  protected
     * @return  bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Brander_ContactUs::contactus_grid');
    }
}

