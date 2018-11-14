<?php

namespace Brander\ContactUs\Api;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface GridSearchResultInterface
 *
 * @category    Brander
 * @package     Brander\ContactUs
 * @api
 */
interface GridSearchResultInterface extends SearchResultsInterface
{
    /**
     * @access  public
     * @return  GridInterface[]
     */
    public function getItems();

    /**
     * @access  public
     * @param   GridInterface[]   $items
     * @return  $this
     */
    public function setItems( array $items );
}