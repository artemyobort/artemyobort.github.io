<?php

namespace Brander\ContactUs\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Brander\ContactUs\Api\GridInterface;
use Magento\Framework\Controller\ResultFactory;
use Brander\ContactUs\Api\ConfigInterface;
use Magento\Framework\Data\Form\FormKey\Validator;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\App\Request\DataPersistorInterface;

/**
 * Class Add
 *
 * @package Brander\ContactUs\Controller\Index
 */
class Add extends Action
{
    /**
     * @access  protected
     * @var     GridInterface
     */
    protected $_gridContactUsModel;

    /**
     * @access  protected
     * @var     DataPersistorInterface
     */
    protected $_dataPersistor;

    /**
     * @var Validator
     */
    protected $_formKeyValidator;

    /**
     * @access  private
     * @var     ConfigInterface
     */
    private $_contactUsConfig;

    /**
     * Add constructor.
     *
     * @access  public
     * @param   Context                 $context
     * @param   GridInterface           $model
     * @param   ConfigInterface         $contactsConfig
     * @param   Validator               $validator
     * @param   DataPersistorInterface  $dataPersistor
     */
    public function __construct(
        Context $context,
        GridInterface $model,
        ConfigInterface $contactsConfig,
        Validator $validator,
        DataPersistorInterface $dataPersistor
    ) {
        parent::__construct($context);
        $this->_formKeyValidator = $validator;
        $this->_gridContactUsModel = $model;
        $this->_dataPersistor = $dataPersistor;
        $this->_contactUsConfig = $contactsConfig;

    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $redirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/');
        if (!$this->_contactUsConfig->isEnabled()) {

            return $redirect;
        }

        if (!$this->getRequest()->isPost()) {

            return $redirect;
        }

        $post = $this->getRequest()->getPostValue();
        if (!$post) {
            parse_str($this->getRequest()->getContent(), $post);
            if (isset($post['form_key'])) {
                $this->getRequest()->setParams(['form_key' => $post['form_key']]);
            }
        }

        if (!$this->_formKeyValidator->validate($this->getRequest())) {
            return $redirect;
        }

        try {
            if($this->validatedParams($post)) {
                $this->_gridContactUsModel->setData($post);
                $this->_gridContactUsModel->save();
                $this->messageManager->addSuccess(__('Form successfully submitted'));
            }
        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
            $this->_dataPersistor->set('contact_us', $this->getRequest()->getParams());
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
            $this->_dataPersistor->set('contact_us', $this->getRequest()->getParams());
        }

        if (isset($post['isAjax'])) {
            $result = $this->resultFactory->create(ResultFactory::TYPE_JSON);
            $result->setData('success', 1);
        } else {
            $result = $redirect;
        }

        return $result;
    }

    /**
     * Method to validate post form params.
     *
     * @access  private
     * @param   array       $post
     * @return  array
     * @throws  \Exception
     */
    private function validatedParams( array $post = [] )
    {
        if ($post) {
            if (trim($post['name']) === '') {
                throw new LocalizedException(__('Name is missing'));
            }

            if (trim($post['email']) === '') {
                throw new LocalizedException(__('Email is missing'));
            } elseif(false === strpos($post['email'], '@')) {
                throw new LocalizedException(__('Invalid email address'));
            }

            if (trim($post['telephone']) === '') {
                throw new LocalizedException(__('Telephone is missing'));
            }

            if (trim($post['question']) === '') {
                throw new LocalizedException(__('Question is missing'));
            }

            if (trim($post['hideit']) !== '') {
                throw new \Exception(__('Hideit error'));
            }
        }

        return $post;
    }
}