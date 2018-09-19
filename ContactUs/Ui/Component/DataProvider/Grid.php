<?php

namespace Brander\ContactUs\Ui\Component\DataProvider;

use \Magento\Framework\UrlInterface;
use \Magento\Framework\Api\FilterBuilder;
use \Magento\Framework\App\RequestInterface;
use \Magento\Framework\Api\Search\ReportingInterface;
use \Magento\Framework\Api\Search\SearchCriteriaBuilder;
use \Magento\Framework\View\Element\UiComponent\DataProvider\DataProvider;

/**
 * Class Grid
 *
 * @package Brander\ContactUs\Ui\Component\DataProvider
 */
class Grid extends DataProvider
{
    /**
     * Grid constructor.
     * 
     * @access public
     * @param string                    $name
     * @param ReportingInterface        $reporting
     * @param SearchCriteriaBuilder     $searchCriteriaBuilder
     * @param RequestInterface          $request
     * @param FilterBuilder             $filterBuilder
     * @param UrlInterface              $url
     */
    public function __construct(
        $name,
        ReportingInterface $reporting,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        RequestInterface $request,
        FilterBuilder $filterBuilder,
        UrlInterface $url
    ) {
        $primaryFieldName = 'id';
        $requestFieldName = 'id';
        $meta = [];
        $updateUrl = $url->getUrl('mui/index/render');
        $data = [
            'config' => [
                'component' => 'Magento_Ui/js/grid/provider',
                'update_url' => $updateUrl
            ]
        ];
        
        parent::__construct($name, $primaryFieldName, $requestFieldName, $reporting, $searchCriteriaBuilder, $request,
        $filterBuilder, $meta, $data);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        $result = [
            'items' => [
                ['code2' => 'AU', 'code3' => 'AUS', 'code_num' => '036'],
                ['code2' => 'AT', 'code3' => 'AUT', 'code_num' => '040'],
                ['code2' => 'AZ', 'code3' => 'AZE', 'code_num' => '031']
            ],
            'totalRecords' => 3
        ];
        
        return $result;
    }

}