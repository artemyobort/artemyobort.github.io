<?php

namespace Brander\ContactUs\Model;

use Magento\Framework\Escaper;
use Brander\ContactUs\Helper\Data;
use Magento\Framework\UrlInterface;
use Magento\Framework\Data\Form\FormKey;
use Brander\ContactUs\Api\ConfigProviderInterface;

/**
 * DefaultConfigProvider contact us form configuration provider.
 *
 * @package Brander\ContactUs\Model
 * @see ConfigProviderInterface
 */
class DefaultConfigProvider implements ConfigProviderInterface
{
    /**
    * Send form url constant.
    *
    * @var string
    */
    const CONTACT_US_SEND_FORM_URL = 'contactus/index/add';

    /**
     * @var Escaper
     */
    protected $_escaper;

    /**
     * @var FormKey
     */
    protected $_formKey;

    /**
     * @var UrlInterface
     */
    protected $_urlBuilder;

    /**
     * @var Data
     */
    protected $_helperData;

    /**
     * DefaultConfigProvider constructor.
     *
     * @param   Data            $helper
     * @param   FormKey         $formKey
     * @param   Escaper         $escaper
     * @param   UrlInterface    $urlBuilder
     */
    public function __construct(
        Data $helper,
        FormKey $formKey,
        Escaper $escaper,
        UrlInterface $urlBuilder
    ) {
        $this->_helperData = $helper;
        $this->_formKey = $formKey;
        $this->_escaper = $escaper;
        $this->_urlBuilder = $urlBuilder;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        $output['formKey'] = $this->_formKey->getFormKey();
        $output['customerData'] = $this->getCustomerData();

        return $output;
    }

    /**
     * Retrieve customer data
     *
     * @return array
     */
    private function getCustomerData()
    {
        return [
            'name'      => $this->_escaper->escapeHtmlAttr($this->_helperData->getPostValue('name') ?: $this->_helperData->getUserName()),
            'email'     => $this->_escaper->escapeHtmlAttr($this->_helperData->getPostValue('email') ?: $this->_helperData->getUserEmail()),
            'telephone' => $this->_escaper->escapeHtmlAttr($this->_helperData->getPostValue('telephone')),
            'question'  => $this->_escaper->escapeHtmlAttr($this->_helperData->getPostValue('question')),
        ];
    }
}
