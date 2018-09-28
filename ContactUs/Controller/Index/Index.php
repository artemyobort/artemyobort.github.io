<?php

namespace Brander\ContactUs\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;
use Brander\ContactUs\Api\Data\ConfigInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\NotFoundException;

/**
 * Class Index
 * @package Brander\ContactUs\Controller\Index
 */
class Index extends Action
{
    /**
     * @var ConfigInterface
     */
    protected $_contactUsConfig;

    /**
     * Index constructor.
     *
     * @access  public
     * @param   Context             $context
     * @param   ConfigInterface     $contactsConfig
     */
    public function __construct(
        Context $context,
        ConfigInterface $contactsConfig
    ) {
        parent::__construct($context);
        $this->_contactUsConfig = $contactsConfig;
    }

    /**
     * Show Contact Us page
     *
     * @access  public
     * @return  \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }

    /**
     * Dispatch request
     *
     * @access  public
     * @param   RequestInterface    $request
     * @return  ResponseInterface
     * @throws  NotFoundException
     */
    public function dispatch( RequestInterface $request )
    {
        if (!$this->_contactUsConfig->isEnabled()) {
            throw new NotFoundException(__('Page not found.'));
        }

        return parent::dispatch($request);
    }
}