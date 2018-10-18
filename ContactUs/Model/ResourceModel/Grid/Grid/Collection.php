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
 *
 * @package Brander\ContactUs\Model\ResourceModel\Grid\Grid
 */
class Collection extends GridCollection implements SearchResultInterface
{
    /**
     * @access  protected
     * @var     AggregationInterface
     */
    protected $aggregations;

    /**
     * {@inheritdoc}
     */
    protected function _construct()
    {
        $this->_init(Document::class, Grid::class );
    }

    /**
     * {@inheritdoc}
     */
    public function getAggregations()
    {
        return $this->aggregations;
    }

    /**
     * {@inheritdoc}
     */
    public function setAggregations( $aggregations )
    {
        $this->aggregations = $aggregations;
    }

    /**
     * {@inheritdoc}
     */
    public function getAllIds( $limit = null, $offset = null )
    {
        return $this->getConnection()->fetchCol($this->_getAllIdsSelect($limit, $offset), $this->_bindParams);
    }

    /**
     * {@inheritdoc}
     */
    public function getSearchCriteria()
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function setSearchCriteria( SearchCriteriaInterface $searchCriteria = null )
    {
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTotalCount()
    {
        return $this->getSize();
    }

    /**
     * {@inheritdoc}
     */
    public function setTotalCount( $totalCount )
    {
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setItems( array $items = null )
    {
        return $this;
    }
}