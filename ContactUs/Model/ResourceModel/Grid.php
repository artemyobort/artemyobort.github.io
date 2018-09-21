<?php

namespace Brander\ContactUs\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Grid
 *
 * @package Brander\ContactUs\Model\ResourceModel
 */
class Grid extends AbstractDb
{
    /**
     * Post construct method.
     *
     * @access protected
     * @return void
     */
    protected function _construct()
    {
        $this->_init('brander_contact_us', 'id');
    }

}