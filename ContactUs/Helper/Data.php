<?php

namespace Brander\ContactUs\Helper;

use Magento\Framework\App\Helper\Context;
use Magento\Customer\Model\Session;
use Brander\ContactUs\Api\Data\ContactUsConfig;
use Magento\Store\Model\ScopeInterface;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Customer\Helper\View as CustomerViewHelper;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\App\Request\DataPersistorInterface;

/**
 * Class Data
 * @package Brander\ContactUs\Helper
 */
class Data extends AbstractHelper
{
    /**
     * XML path to store config contact us is enabled.
     */
    const XML_PATH_ENABLED = ContactUsConfig::XML_PATH_ENABLED;

    /**
     * Customer session
     *
     * @var Session
     */
    protected $_customerSession;

    /**
     * @var CustomerViewHelper
     */
    protected $_customerViewHelper;

    /**
     * @var DataPersistorInterface
     */
    protected $_dataPersistor;

    /**
     * @var array
     */
    private $postData = null;

    /**
     * @param Context                   $context
     * @param Session                   $customerSession
     * @param CustomerViewHelper        $customerViewHelper
     * @param DataPersistorInterface    $dataPersistor
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
     * Check if enabled
     *
     * @return string|null
     * @deprecated 100.2.0 use ScopeInterface::isEnabled() instead
     */
    public function isEnabled()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_ENABLED,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Get user name
     *
     * @return string
     */
    public function getUserName()
    {
        if (!$this->_customerSession->isLoggedIn()) {
            return '';
        }
        /**
         * @var CustomerInterface $customer
         */
        $customer = $this->_customerSession->getCustomerDataObject();

        return trim($this->_customerViewHelper->getCustomerName($customer));
    }

    /**
     * Get user email
     *
     * @return string
     */
    public function getUserEmail()
    {
        if (!$this->_customerSession->isLoggedIn()) {
            return '';
        }
        /**
         * @var CustomerInterface $customer
         */
        $customer = $this->_customerSession->getCustomerDataObject();

        return $customer->getEmail();
    }

    /**
     * Get value from POST by key
     *
     * @param string $key
     * @return string
     */
    public function getPostValue( $key )
    {
        if (null === $this->postData) {
            $this->postData = (array) $this->getDataPersistor()->get('contact_us');
            $this->getDataPersistor()->clear('contact_us');
        }

        if (isset($this->postData[$key])) {
            return (string) $this->postData[$key];
        }

        return '';
    }

    /**
     * Get Data Persistor
     *
     * @return DataPersistorInterface
     */
    private function getDataPersistor()
    {
        if (!$this->_dataPersistor) {
            $this->_dataPersistor = ObjectManager::getInstance()->get(DataPersistorInterface::class);
        }

        return $this->_dataPersistor;
    }
}
