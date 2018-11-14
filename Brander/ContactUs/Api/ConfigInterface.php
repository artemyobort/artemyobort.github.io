<?php

namespace Brander\ContactUs\Api;

/**
 * Interface ConfigInterface module configuration
 *
 * @category    Brander
 * @package     Brander\ContactUs
 * @api
 */
interface ConfigInterface
{
    /**#@+
     * Constants of contact us form's store config.
     * @var string
     */
    const XML_PATH_TO_FORM_CONTACT_US_FORM_ENABLED = 'contactus_settings/general/enable';

    const XML_PATH_TO_CONTACT_US_FORM_TYPE = 'contactus_settings/general/type';
    /**#@-*/

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
