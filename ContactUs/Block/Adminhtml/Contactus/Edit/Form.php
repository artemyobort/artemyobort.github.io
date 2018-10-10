<?php

namespace Brander\ContactUs\Block\Adminhtml\Contactus\Edit;

use Magento\Framework\Registry;
use Magento\Cms\Model\Wysiwyg\Config;
use Magento\Framework\Data\FormFactory;
use Magento\Backend\Block\Template\Context;
use Magento\Backend\Block\Widget\Form\Generic;

/**
 * Class Form
 * @package Brander\ContactUs\Block\Adminhtml\Grid\Edit
 */
class Form extends Generic
{
    /**
     * @access  protected
     * @var     Config
     */
    protected $_wysiwygConfig;

    /**
     * Form constructor.
     *
     * @access  public
     * @param   Context         $context
     * @param   Registry        $registry
     * @param   FormFactory     $formFactory
     * @param   Config          $wysiwygConfig
     * @param   array           $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        FormFactory $formFactory,
        Config $wysiwygConfig,
        array $data = []
    ) {
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form.
     *
     * @access  protected
     * @return  $this
     */
    protected function _prepareForm()
    {
        $dateFormat = $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT);
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create(
            ['data' =>
                [
                    'id' => 'edit_form',
                    'enctype' => 'multipart/form-data',
                    'action' => $this->getData('action'),
                    'method' => 'post'
                ]
            ]
        );

        if ($model->getEntityId()) {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Edit Row Data'), 'class' => 'fieldset-wide']
            );
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        } else {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Add Row Data'), 'class' => 'fieldset-wide']
            );
        }

        $fieldset->addField(
            'name',
            'text',
            [
                'name'      => 'name',
                'label'     => __('Name'),
                'id'        => 'name',
                'title'     => __('Name'),
                'class'     => 'required-entry',
                'required'  => true,
            ]
        );

        $fieldset->addField(
            'email',
            'text',
            [
                'name'      => 'email',
                'label'     => __('Email'),
                'id'        => 'email',
                'title'     => __('Email'),
                'class'     => 'required-entry',
                'required'  => true,
            ]
        );

        $fieldset->addField(
            'telephone',
            'text',
            [
                'name'      => 'telephone',
                'label'     => __('Telephone'),
                'id'        => 'telephone',
                'title'     => __('Telephone'),
                'class'     => 'required-entry',
                'required'  => true,
            ]
        );

        $wysiwygConfig = $this->_wysiwygConfig->getConfig(['tab_id' => $this->getTabId()]);

        $fieldset->addField(
            'question',
            'editor',
            [
                'name' => 'question',
                'label' => __('Question'),
                'style' => 'height:36em;',
                'required' => true,
                'config' => $wysiwygConfig
            ]
        );

        $fieldset->addField(
            'created_at',
            'date',
            [
                'name' => 'created_at',
                'label' => __('Created At'),
                'date_format' => $dateFormat,
                'time_format' => 'HH:mm:ss',
                'class' => 'validate-date validate-date-range date-range-custom_theme-from required-entry',
                'style' => 'width:200px',
            ]
        );
        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}