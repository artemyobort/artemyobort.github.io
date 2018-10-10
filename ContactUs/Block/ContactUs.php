<?php

namespace Brander\ContactUs\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

/**
 * Class ContactUs
 * @package Brander\ContactUs\Block
 */
class ContactUs extends Template
{
    /**
     * ContactUs construct method.
     *
     * @access  public
     * @param   Context    $context
     * @param   array      $data
     */
    public function __construct( Context $context, array $data = [] )
    {
        parent::__construct($context, $data);
    }

    /**
     * Get form action URL for POST addcallback request.
     *
     * @access public
     * @return string
     */
    public function getFormAction()
    {
        return $this->getUrl('contactus/index/add');
    }
}