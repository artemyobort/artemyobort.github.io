<?php

namespace Brander\ContactUs\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Brander\ContactUs\Model\Grid;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\App\Request\DataPersistorInterface;

/**
 * Class Save
 *
 * @package Brander\ContactUs\Controller\Adminhtml\Index
 */
class Save extends Action
{
    /**
     * @access  protected
     * @var     DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @access  protected
     * @var     Grid
     */
    protected $_grid;

    /**
     * Save constructor.
     *
     * @access  public
     * @param   Context                 $context
     * @param   DataPersistorInterface  $dataPersistor
     * @param   Grid                    $grid
     */
    public function __construct(
        Context $context,
        DataPersistorInterface $dataPersistor,
        Grid $grid
    ) {
        $this->_grid = $grid;
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @access  public
     * @return  \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $post = $this->getRequest()->getPostValue();
        if ($post) {
            $id = $this->getRequest()->getParam('id');
            /** @var Grid $model */
            $model = $this->_grid->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addError(__('This block no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }

            $model->setData($post);
            try {
                $model->save();
                $this->messageManager->addSuccess(__('You saved the block.'));
                $this->dataPersistor->clear('contactus_form');
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId()]);
                }

                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the block.'));
            }

            $this->dataPersistor->set('contactus_form', $post);

            return $resultRedirect->setPath('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);
        }

        return $resultRedirect->setPath('*/*/');
    }
}
