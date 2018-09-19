<?php

namespace Brander\ContactUs\Controller\Adminhtml\Grid;

use \Magento\Backend\App\Action;
use \Magento\Framework\Controller\ResultFactory;

/**
 * Class Index
 *
 * @package Brander\ContactUs\Controller\Adminhtml\Grid
 */
class Index extends Action
{
    const MENU_ITEM = 'Brander_ContactUs::contactus_grid';
    const TITLE = 'Contact Us Grid';

    protected function _isAllowed()
    {
        $result = parent::_isAllowed();
        $result = $result && $this->_authorization->isAllowed(self::MENU_ITEM);

        return $result;
    }

    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu(self::MENU_ITEM);
        $resultPage->getConfig()->getTitle()->prepend(__(self::TITLE));

        return $resultPage;
    }
}