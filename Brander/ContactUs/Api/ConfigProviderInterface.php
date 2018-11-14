<?php

namespace Brander\ContactUs\Api;

/**
 * Interface ConfigProviderInterface
 *
 * @category    Brander
 * @package     Brander\ContactUs
 * @api
 */
interface ConfigProviderInterface
{
    /**
     * Retrieve assoc array of contact us form configuration
     *
     * @access  public
     * @return  array
     */
    public function getConfig();
}
