<?php

namespace Brander\ContactUs\Block;

use Brander\ContactUs\Helper\Data;
use Magento\Framework\Data\Form\FormKey;
use Magento\Framework\View\Element\Template;
use Brander\ContactUs\Api\Data\ConfigInterface;
use Brander\ContactUs\Model\DefaultConfigProvider;
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
     * @var FormKey
     */
    protected $_formKey;

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
     * @param   FormKey             $formKey
     * @param   Data                $helper
     * @param   array               $layoutProcessors
     * @param   array               $data
     */
    public function __construct(
        Context $context,
        ConfigInterface $contactsConfig,
        FormKey $formKey,
        Data $helper,
        array $layoutProcessors = [],
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_formKey = $formKey;
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
        return $this->getUrl(DefaultConfigProvider::CONTACT_US_SEND_FORM_URL);
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
     * Method to get return form key.
     *
     * @access  public
     * @return  string
     */
    public function getFormKey()
    {
        return $this->_formKey->getFormKey();
    }

    /**
     * Retrieve checkout configuration
     *
     * @return array
     * @codeCoverageIgnore
     */
    public function getContactUsFormConfig()
    {
        return $this->_contactUsConfig->getConfig();
    }

    /**
     * @return bool|string
     * @since 100.2.0
     */
    public function getSerializedFormConfig()
    {
        return json_encode($this->getContactUsFormConfig(), JSON_HEX_TAG);
    }
}