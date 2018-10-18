<?php

namespace Brander\ContactUs\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;

/**
 * Class Edit
 *
 * @package Brander\ContactUs\Controller\Adminhtml\Index
 */
class Edit extends Action
{
    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        return $resultPage;
    }
}