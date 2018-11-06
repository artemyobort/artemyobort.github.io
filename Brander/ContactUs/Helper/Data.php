<?php

namespace Brander\ContactUs\Helper;

use Magento\Customer\Model\Session;
use Magento\Framework\App\Helper\Context;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Customer\Helper\View as CustomerViewHelper;
use Magento\Framework\App\Request\DataPersistorInterface;

/**
 * Class Data
 *
 * @package Brander\ContactUs\Helper
 */
class Data extends AbstractHelper
{
    /**
     * @access  protected
     * @var     Session
     */
    protected $_customerSession;

    /**
     * @access  protected
     * @var     CustomerViewHelper
     */
    protected $_customerViewHelper;

    /**
     * @access  protected
     * @var     DataPersistorInterface
     */
    protected $_dataPersistor;

    /**
     * @access  private
     * @var     array
     */
    protected $_postData;

    /**
     * Data constructor.
     *
     * @access  public
     * @param   Context                 $context
     * @param   Session                 $customerSession
     * @param   CustomerViewHelper      $customerViewHelper
     * @param   DataPersistorInterface  $dataPersistor
     */
    public function __construct(
        Context $context,
        Session $customerSession,
        CustomerViewHelper $customerViewHelper,
        DataPersistorInterface $dataPersistor
    ) {
        $this->_customerSession = $customerSession;
        $this->_customerViewHelper = $customerViewHelper;
        $this->_dataPersistor = $dataPersistor;
        parent::__construct($context);
    }

    /**
     * Get user name.
     *
     * @access  public
     * @return  string
     */
    public function getUserName()
    {
        if (!$this->_customerSession->isLoggedIn()) {
            return '';
        }

        /** @var CustomerInterface $customer */
        $customer = $this->_customerSession->getCustomerDataObject();

        return trim($this->_customerViewHelper->getCustomerName($customer));
    }

    /**
     * Get user email.
     *
     * @access  public
     * @return  string
     */
    public function getUserEmail()
    {
        if (!$this->_customerSession->isLoggedIn()) {
            return '';
        }

        /** @var CustomerInterface $customer */
        $customer = $this->_customerSession->getCustomerDataObject();

        return $customer->getEmail();
    }

    /**
     * Get value from POST by key
     *
     * @access  public
     * @param   string  $key
     * @return  string
     */
    public function getPostValue( $key )
    {
        if (!$this->_postData) {
            $this->_postData = (array) $this->_dataPersistor->get('contact_us');
            $this->_dataPersistor->clear('contact_us');
        }

        if (isset($this->_postData[$key])) {
            return (string) $this->_postData[$key];
        }

        return '';
    }
}
