<?php

namespace Brander\ContactUs\Model;

use Magento\Framework\Model\AbstractModel;
use Brander\ContactUs\Model\ResourceModel\Grid as GridResource;

/**
 * Class Grid
 *
 * @package Brander\ContactUs\Model
 */
class Grid extends AbstractModel
{
    /**
     * Grid construct method.
     * 
     * @access protected
     * @return void
     */
    protected function _construct()
    {
        $this->_init(GridResource::class);
    }
}