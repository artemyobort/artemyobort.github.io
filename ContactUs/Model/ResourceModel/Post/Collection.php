<?php

namespace Brander\ContactUs\Model\ResourceModel\Post;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 *
 * @package Brander\ContactUs\Model\ResourceModel\Post
 */
class Collection extends AbstractCollection
{
    /**
     * Identifier field name for collection items.
     * Can be used by collections with items without defined.
     *
     * @access  protected
     * @var     string      $_idFieldName
     */
    protected $_idFieldName = 'id';

    /**
     * Name prefix of events that are dispatched by model.
     *
     * @access  protected
     * @var     string      $_eventPrefix
     */
    protected $_eventPrefix = 'brander_contactus_post_collection';

    /**
     * Name of event parameter.
     *
     * @access  protected
     * @var     string      $_eventObject
     */
    protected $_eventObject = 'post_collection';

    /**
     * Collection construct method.
     * Define resource model.
     *
     * @access protected
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Brander\ContactUs\Model\Post', 'Brander\ContactUs\Model\ResourceModel\Post');
    }
}