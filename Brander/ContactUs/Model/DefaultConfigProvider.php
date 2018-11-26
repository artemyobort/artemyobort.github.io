<?php

namespace Brander\ContactUs\Model;

use Magento\Framework\Data\Form\FormKey;
use Brander\ContactUs\Api\ConfigProviderInterface;

/**
 * DefaultConfigProvider contact us form configuration provider.
 *
 * @package Brander\ContactUs\Model
 * @see     ConfigProviderInterface
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
     * @access  protected
     * @var     FormKey
     */
    protected $_formKey;

    /**
     * DefaultConfigProvider constructor.
     *
     * @access  public
     * @param   FormKey     $formKey
     */
    public function __construct( FormKey $formKey )
    {
        $this->_formKey = $formKey;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        $output['formKey'] = $this->_formKey->getFormKey();

        return $output;
    }
}
