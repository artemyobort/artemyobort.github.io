<?php

namespace Brander\ContactUs\Model;

use Magento\Framework\App\RequestInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Brander\ContactUs\Model\ResourceModel\Grid\CollectionFactory;

/**
 * Class DataProvider
 *
 * @package Brander\ContactUs\Model
 */
class DataProvider extends AbstractDataProvider
{
    /**
     * @access  private
     * @var     RequestInterface
     */
    private $_request;

    /**
     * @access  private
     * @var     Grid
     */
    private $_model;

    /**
     * @access  public
     * @var     CollectionFactory
     */
    public $collection;

    /**
     * DataProvider constructor.
     *
     * @access  public
     * @param   string              $name
     * @param   string              $primaryFieldName
     * @param   string              $requestFieldName
     * @param   CollectionFactory   $collection
     * @param   Grid                $grid
     * @param   RequestInterface    $request
     * @param   array               $meta
     * @param   array               $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collection,
        Grid $grid,
        RequestInterface $request,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collection->create();
        $this->_model = $grid;
        $this->_request = $request;
    }

    /**
     * Get data
     *
     * @access public
     * @return array
     */
    public function getData()
    {
        $item = $this->getCollection()->load()->getFirstItem();
        return [$item->getId() => $item->getData()];
    }
}