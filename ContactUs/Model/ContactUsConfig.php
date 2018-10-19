<?php

namespace Brander\ContactUs\Model;

use Magento\Store\Model\ScopeInterface;
use Brander\ContactUs\Api\Data\ConfigInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Brander\ContactUs\Api\Data\ConfigProviderInterface;

/**
 * Contact module configuration
 */
class ContactUsConfig implements ConfigInterface, ConfigProviderInterface
{
    /**
     * @access  private
     * @var     ConfigProviderInterface[]
     */
    private $configProviders;

    /**
     * @access  private
     * @var     ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * Config constructor.
     *
     * @access  public
     * @param   array                $configProviders
     * @param   ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        array $configProviders,
        ScopeConfigInterface $scopeConfig
    ) {
        $this->configProviders = $configProviders;
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * {@inheritdoc}
     */
    public function isEnabled()
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_TO_FORM_CONTACT_US_FORM_ENABLED,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * {@inheritdoc}
     */
    public function isKnockoutForm()
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_TO_CONTACT_US_FORM_TYPE,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        $config = [];
        foreach ($this->configProviders as $configProvider) {
            $config = array_merge_recursive($config, $configProvider->getConfig());
        }
        return $config;
    }
}
