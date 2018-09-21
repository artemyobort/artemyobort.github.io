<?php

namespace Brander\ContactUs\Model\ResourceModel\Grid\Grid;

use Brander\ContactUs\Model\ResourceModel\Grid;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\Search\AggregationInterface;
use Magento\Framework\Api\Search\SearchResultInterface;
use Magento\Framework\View\Element\UiComponent\DataProvider\Document;
use Brander\ContactUs\Model\ResourceModel\Grid\Collection as GridCollection;

/**
 * Class Collection
 * @package Brander\ContactUs\Model\ResourceModel\Grid\Grid
 */
class Collection extends GridCollection implements SearchResultInterface
{

    /**
     * @var AggregationInterface
     */
    protected $aggregations;

    /**
     * Initialization here
     *
     * @access protected
     * @return void
     */
    protected function _construct()
    {
        $this->_init(Document::class, Grid::class );
    }

    /**
     * Method to get return aggregations.
     *
     * @access public
     * @return AggregationInterface
     */
    public function getAggregations()
    {
        return $this->aggregations;
    }

    /**
     * Method to get set aggregations.
     *
     * @access  public
     * @param   AggregationInterface $aggregations
     * @return  void
     */
    public function setAggregations( $aggregations )
    {
        $this->aggregations = $aggregations;
    }

    /**
     * Retrieve all ids for collection
     *
     * @access  public
     * @param   int|string $limit
     * @param   int|string $offset
     * @return  array
     */
    public function getAllIds( $limit = null, $offset = null )
    {
        return $this->getConnection()->fetchCol($this->_getAllIdsSelect($limit, $offset), $this->_bindParams);
    }

    /**
     * Get search criteria.
     *
     * @return \Magento\Framework\Api\SearchCriteriaInterface|null
     */
    public function getSearchCriteria()
    {
        return null;
    }

    /**
     * Set search criteria.
     *
     * @access  public
     * @param   \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return  $this
     */
    public function setSearchCriteria( SearchCriteriaInterface $searchCriteria = null )
    {
        return $this;
    }

    /**
     * Get total count.
     *
     * @return int
     */
    public function getTotalCount()
    {
        return $this->getSize();
    }

    /**
     * Set total count.
     *
     * @access  public
     * @param   int $totalCount
     * @return  $this
     */
    public function setTotalCount( $totalCount )
    {
        return $this;
    }

    /**
     * Set items list.
     *
     * @access  public
     * @param   \Magento\Framework\Api\ExtensibleDataInterface[] $items
     * @return  $this
     */
    public function setItems( array $items = null )
    {
        return $this;
    }
}