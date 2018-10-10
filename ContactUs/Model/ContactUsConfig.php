<?php

namespace Brander\ContactUs\Model;

use Magento\Store\Model\ScopeInterface;
use Brander\ContactUs\Api\Data\ConfigInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Contact module configuration
 */
class ContactUsConfig implements ConfigInterface
{
    /**
     * @access  private
     * @var     ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * Config constructor.
     *
     * @access  public
     * @param   ScopeConfigInterface $scopeConfig
     */
    public function __construct( ScopeConfigInterface $scopeConfig )
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * {@inheritdoc}
     */
    public function isEnabled()
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_ENABLED,
            ScopeInterface::SCOPE_STORE
        );
    }
}
