<?php

namespace Brander\ContactUs\Helper;

use Magento\Framework\Data\Form\FormKey;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\Exception\LocalizedException;

/**
 * Class CallBack
 *
 * @category    Brander
 * @package     Brander\ContactUs
 */
class CallBack extends AbstractHelper
{
    /**
     * @var FormKey
     */
    private $formKey;

    /**
     * CallBack constructor.
     * @param Context $context
     * @param FormKey $formKey
     */
    public function __construct( Context $context, FormKey $formKey )
    {
        $this->formKey = $formKey;
        parent::__construct($context);
    }

    /**
     * Method to validate post form params.
     *
     * @access  private
     * @param   array       $data
     * @return  array
     * @throws  LocalizedException
     * @throws  \Exception
     */
    public function validateParams( array $data )
    {
        if (trim($data['name']) === '') {
            throw new LocalizedException(__('Name is missing'));
        }

        if (trim($data['email']) === '') {
            throw new LocalizedException(__('Email is missing'));

        } elseif(false === strpos($data['email'], '@')) {
            throw new LocalizedException(__('Invalid email address'));
        }

        if (trim($data['telephone']) === '') {
            throw new LocalizedException(__('Telephone is missing'));
        }

        if (trim($data['question']) === '') {
            throw new LocalizedException(__('Question is missing'));
        }

        if (trim($data['hideit']) !== '') {
            throw new \Exception(__('Hideit error'));
        }

        return $data;
    }

    /**
     * Method to validate form key.
     *
     * @access  public
     * @param   string  $formKey
     * @return  bool
     */
    public function validateFormKey( string $formKey )
    {
        return $this->formKey->getFormKey() === $formKey;
    }
}