<?php

namespace Brander\ContactUs\Api\Data;

/**
 * Interface ConfigInterface module configuration
 * @package Brander\ContactUs\Api\Data
 * @api
 */
interface ConfigInterface
{
    /**
     * Enabled contacus form config path.
     */
    const XML_PATH_ENABLED = 'settings/general/enable';

    /**
     * Check if contacts module is enabled.
     *
     * @access  public
     * @return  bool
     */
    public function isEnabled();
}
