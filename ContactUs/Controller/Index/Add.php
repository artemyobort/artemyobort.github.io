<?php

namespace Brander\ContactUs\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Brander\ContactUs\Api\Data\GridInterface;
use Magento\Framework\Controller\ResultFactory;
use Brander\ContactUs\Api\Data\ConfigInterface;
use Magento\Framework\HTTP\PhpEnvironment\Request;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\App\Request\DataPersistorInterface;

/**
 * Class Add
 * @package Brander\ContactUs\Controller\Index
 */
class Add extends Action
{
    /**
     * @access  private
     * @var     ConfigInterface
     */
    private $_contactUsConfig;

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
     * Add constructor.
     *
     * @access  public
     * @param   Context                 $context
     * @param   GridInterface           $model
     * @param   ConfigInterface         $contactsConfig
     * @param   DataPersistorInterface  $dataPersistor
     */
    public function __construct(
        Context $context,
        GridInterface $model,
        ConfigInterface $contactsConfig,
        DataPersistorInterface $dataPersistor
    ) {
        parent::__construct($context);
        $this->_gridContactUsModel = $model;
        $this->_dataPersistor = $dataPersistor;
        $this->_contactUsConfig = $contactsConfig;

    }

    /**
     * Method to get handle contact us form post request.
     *
     * @access  public
     * @return  \Magento\Framework\Controller\Result\Redirect | \Magento\Framework\Controller\Result\Json
     */
    public function execute()
    {
        if (!$this->getRequest()->isPost() || !$this->_contactUsConfig->isEnabled()) {
            return $this->resultRedirectFactory->create()->setPath('*/');
        }

        $post = $this->getRequest()->getPostValue();
        if (!$post) {
            parse_str($this->getRequest()->getContent(), $post);
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
            $result = $this->resultRedirectFactory->create()->setPath('*/');
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