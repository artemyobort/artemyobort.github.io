<?php

namespace Brander\ContactUs\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;

/**
 * Class Index
 *
 * @package Test\UiGrid\Controller\Adminhtml\Index
 */
class Index extends Action
{
    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('Brander_ContactUs::contactus_grid');
        $resultPage->getConfig()->getTitle()->prepend(__('Grid List'));

        return $resultPage;
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Brander_ContactUs::contactus_grid');
    }
}

