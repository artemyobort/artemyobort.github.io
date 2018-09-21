<?php

namespace Brander\ContactUs\Controller\Adminhtml\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;

/**
 * Class Index
 * @package Test\UiGrid\Controller\Adminhtml\Index
 */
class Index extends Action
{
    /**
     * Contact us grid page.
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}

