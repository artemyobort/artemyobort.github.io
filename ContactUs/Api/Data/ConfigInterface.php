<?php

namespace Brander\ContactUs\Api\Data;

/**
 * Interface ConfigInterface module configuration
 *
 * @package Brander\ContactUs\Api\Data
 * @api
 */
interface ConfigInterface
{
    /**
     * Enabled contacus form config path.
     */
    const XML_PATH_ENABLED = 'contactus_settings/general/enable';

    /**
     * Contactus's form type config path.
     */
    const XML_PATH_TYPE = 'contactus_settings/general/type';

    /**
     * Check if contacts module is enabled.
     *
     * @access  public
     * @return  bool
     */
    public function isEnabled();

    /**
     * Method to get check if knockout js form need to render.
     *
     * @access  public
     * @return  bool
     */
    public function isKnockoutForm();
}
