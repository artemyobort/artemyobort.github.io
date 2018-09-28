<?php

namespace Brander\ContactUs\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Brander\ContactUs\Api\Data\GridInterface;
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
     * @var ConfigInterface
     */
    private $_contactUsConfig;

    /**
     * @var GridInterface
     */
    protected $_gridContactUsModel;

    /**
     * @var DataPersistorInterface
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
     */
    public function execute()
    {
        if (!$this->getRequest()->isPost() || !$this->_contactUsConfig->isEnabled()) {
            return $this->resultRedirectFactory->create()->setPath('*/');
        }
        $post = $this->getRequest()->getPostValue();

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

        return $this->resultRedirectFactory->create()->setPath('*/');
    }

    /**
     * Method to validate post form params.
     *
     * @access private
     * @return array
     * @throws \Exception
     */
    private function validatedParams()
    {
        /** @var Request $request */
        $request = $this->getRequest();
        if (trim($request->getParam('name')) === '') {
            throw new LocalizedException(__('Name is missing'));
        }
        if (false === strpos($request->getParam('email'), '@')) {
            throw new LocalizedException(__('Invalid email address'));
        }
        if (trim($request->getParam('hideit')) !== '') {
            throw new \Exception();
        }

        return $request->getParams();
    }
}