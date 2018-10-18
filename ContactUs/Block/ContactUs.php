<?php

namespace Brander\ContactUs\Block;

use Brander\ContactUs\Helper\Data;

use Magento\Framework\View\Element\Template;
use Brander\ContactUs\Api\Data\ConfigInterface;
use Magento\Framework\View\Element\Template\Context;

/**
 * Class ContactUs
 *
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
     * @var array|\Magento\Checkout\Block\Checkout\LayoutProcessorInterface[]
     */
    protected $_layoutProcessors;

    /**
     * @var Data
     */
    private $helper;

    /**
     * ContactUs construct method.
     *
     * @access  public
     * @param   Context             $context
     * @param   ConfigInterface     $contactsConfig
     * @param   Data                $helper
     * @param   array               $layoutProcessors
     * @param   array               $data
     */
    public function __construct(
        Context $context,
        ConfigInterface $contactsConfig,
        Data $helper,
        array $layoutProcessors = [],
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_contactUsConfig = $contactsConfig;
        $this->_layoutProcessors = $layoutProcessors;
        $this->helper = $helper;
    }

    /**
     * Get form action URL for POST add callback request.
     *
     * @access public
     * @return string
     */
    public function getFormAction()
    {
        return $this->getUrl($this->getAddUrlAction());
    }

    /**
     * {@inheritdoc}
     */
    public function getJsLayout()
    {
        foreach ($this->_layoutProcessors as $processor) {
            $this->jsLayout = $processor->process($this->jsLayout);
        }

        return \Zend_Json::encode($this->jsLayout);
    }

    /**
     * Method to get return url for ajax request.
     *
     * @access  public
     * @return  string
     */
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

    /**
     * Method to get return formData
     *
     * @access public
     * @return string
     */
    public function getFormData()
    {
        $formData = [
            'name'      => $this->escapeHtmlAttr($this->helper->getPostValue('name') ?: $this->helper->getUserName()),
            'email'     => $this->escapeHtmlAttr($this->helper->getPostValue('email') ?: $this->helper->getUserEmail()),
            'telephone' => $this->escapeHtmlAttr($this->helper->getPostValue('telephone')),
            'question'  => $this->escapeHtmlAttr($this->helper->getPostValue('question')),
            'ajaxUrl'   => $this->getAddUrlAction()
        ];

        return \Zend_Json::encode($formData);
    }
}