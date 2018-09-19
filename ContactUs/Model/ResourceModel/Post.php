<?php

namespace Brander\ContactUs\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\Context;
use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Post
 *
 * @package Brander\ContactUs\Model\ResourceModel
 */
class Post extends AbstractDb
{

    /**
     * Post constructor.
     *
     * @access  public
     * @param   Context     $context
     */
    public function __construct( Context $context )
    {
        parent::__construct($context);
    }

    /**
     * Post construct method.
     */
    protected function _construct()
    {
        $this->_init('brander_contactus_post', 'id');
    }

}