<?php

namespace Brander\ContactUs\Api\Data;

/**
 * Interface ConfigProviderInterface
 *
 * @package Brander\ContactUs\Model
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
