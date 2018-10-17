<?php

namespace Brander\ContactUs\Block;

use Brander\ContactUs\Helper\Data;
use Magento\Framework\View\Element\Template;
use Brander\ContactUs\Api\Data\ConfigInterface;
use Magento\Framework\View\Element\Template\Context;

/**
 * Class ContactUs
 * @package Brander\ContactUs\Block
 */
class ContactUs extends Template
{
    /**
     * @access  protected
     * @var     ConfigInterface
     */
    protected $_contactUsConfig;

    /**
     * @var Data
     */
    private $_helper;

    /**
     * ContactUs construct method.
     *
     * @access  public
     * @param   Context             $context
     * @param   ConfigInterface     $contactsConfig
     * @param   Data                $helper
     * @param   array               $data
     */
    public function __construct(
        Context $context,
        ConfigInterface $contactsConfig,
        Data $helper,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_helper = $helper;
        $this->_contactUsConfig = $contactsConfig;
    }

    /**
     * Get form action URL for POST addcallback request.
     *
     * @access public
     * @return string
     */
    public function getFormAction()
    {
        return $this->getUrl($this->getAddUrlAction());
    }

    public function getAddUrlAction()
    {
        return 'contactus/index/add';
    }
    /**
     * Method to get return contactus's form type store config flag.
     *
     * @access  public
     * @return  bool
     */
    public function isKnockoutForm()
    {
        return $this->_contactUsConfig->isKnockoutForm();
    }

    public function getUserData( $key )
    {
        switch ($key) {
            case 'name':
                $result = $this->escapeHtmlAttr($this->_helper->getPostValue('name')
                          ?: $this->_helper->getUserName());
                break;
            case 'email':
                $result = $this->escapeHtmlAttr($this->_helper->getPostValue('email')
                          ?: $this->_helper->getUserEmail());
                break;
            default:
                $result = $this->escapeHtmlAttr($this->_helper->getPostValue($key));
        }

        return $result;
    }
}