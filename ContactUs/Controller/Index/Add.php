<?php

namespace Brander\ContactUs\Controller\Index;

use Brander\ContactUs\Model\Grid;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\HTTP\PhpEnvironment\Request;
use Magento\Framework\Exception\LocalizedException;


/**
 * Class Add
 * @package Brander\ContactUs\Controller\Index
 */
class Add extends Action
{

    /**
     * Add constructor.
     *
     * @access  public
     * @param   Context     $context
     * @param   Grid        $model
     */
    public function __construct( Context $context, Grid $model ) {

        parent::__construct($context);
    }

    /**
     * Method to get handle contact us form post request.
     */
    public function execute()
    {
        if (!$this->getRequest()->isPost()) {
            return $this->resultRedirectFactory->create()->setPath('*/');
        }
        $post = $this->getRequest()->getPostValue();

        try {
            if($this->validatedParams($post)) {
                $contactUsModel = $this->_objectManager->create(Grid::class);
                $contactUsModel->setData($post);
                $contactUsModel->save();
                $this->messageManager->addSuccess(__('Form successfully submitted'));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
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