<?php

namespace Brander\ContactUs\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Interface GridRepositoryInterface
 *
 * @category    Brander
 * @package     Brander\ContactUs
 * @api
 */
interface GridRepositoryInterface
{
    /**
     * Method to get create callback post via web api.
     *
     * @api
     * @access  public
     * @param   string      $data
     * @return  string
     * @throws  NoSuchEntityException
     * @throws  LocalizedException
     * @throws  \Exception
     */
    public function create( $data );

    /**
     * Create callback
     *
     * @access  public
     * @param   GridInterface $callback
     * @return  GridInterface
     * @throws  \Magento\Framework\Exception\InputException
     * @throws  \Magento\Framework\Exception\StateException
     * @throws  \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save( GridInterface $callback );

    /**
     * @param   SearchCriteriaInterface $searchCriteria
     * @return  \Brander\ContactUs\Api\GridSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Get info about callback by callback's id
     *
     * @access  public
     * @param   string          $id
     * @return  GridInterface
     * @throws  \Magento\Framework\Exception\NoSuchEntityException
     */
    public function get( $id );

    /**
     * Delete product
     *
     * @access  public
     * @param   GridInterface $callback
     * @return  bool    Will returned True if deleted
     * @throws  \Magento\Framework\Exception\StateException
     */
    public function delete( GridInterface $callback );

    /**
     * @access  public
     * @param   string  $id
     * @return  bool    Will returned True if deleted
     * @throws  \Magento\Framework\Exception\NoSuchEntityException
     * @throws  \Magento\Framework\Exception\StateException
     */
    public function deleteById( $id );
}
