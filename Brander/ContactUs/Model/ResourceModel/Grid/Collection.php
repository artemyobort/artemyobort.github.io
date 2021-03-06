<?php

namespace Brander\ContactUs\Model\ResourceModel\Grid;

use Brander\ContactUs\Model\Grid;
use Brander\ContactUs\Model\ResourceModel\Grid as GridResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 *
 * @package Brander\ContactUs\Model\ResourceModel\Post
 */
class Collection extends AbstractCollection
{
    /**
     * {@inheritdoc}
     */
    protected $_idFieldName = 'id';

    /**
     * {@inheritdoc}
     */
    protected function _construct()
    {
        $this->_init(Grid::class, GridResource::class);
    }
}