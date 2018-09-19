<?php

namespace Brander\ContactUs\Model;

use \Magento\Framework\Model\AbstractModel;
use \Magento\Framework\DataObject\IdentityInterface;

/**
 * Class Post
 *
 * @package Brander\ContactUs\Model
 */
class Post extends AbstractModel implements IdentityInterface
{
    /**
     * Model cache tag for clear cache in after save and after delete.
     *
     * @access  protected
     * @var     string      $_cacheTag
     */
    protected $_cacheTag = 'brander_contactus_post';

    /**
     * Prefix of model events names.
     *
     * @access  protected
     * @var     string      $_eventPrefix
     */
    protected $_eventPrefix = 'brander_contactus_post';

    /**
     * Post construct method.
     * 
     * @access protected
     */
    protected function _construct()
    {
        $this->_init('Brander\ContactUs\Model\ResourceModel\Post');
    }

    /**
     * Return unique ID for each object in system.
     *
     * @access public
     * @return string
     */
    public function getIdentities()
    {
        return ["{$this->_cacheTag}_{$this->getId()}"];
    }

    /**
     * Method to return default values.
     *
     * @access public
     * @return array
     */
    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}