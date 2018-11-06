<?php

namespace Brander\ContactUs\Ui\Component\Listing\Grid\Column;

use Magento\Framework\UrlInterface;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;

/**
 * Class Action
 *
 * @package Brander\ContactUs\Ui\Component\Listing\Grid\Column
 */
class Action extends Column
{
    /** Url path */
    const ROW_EDIT_URL = 'contactus/index/edit';

    /**
     * @access  protected
     * @var     UrlInterface
     */
    protected $_urlBuilder;

    /**
     * @access  private
     * @var     string
     */
    private $_editUrl;

    /**
     * Action constructor.
     *
     * @access  public
     * @param   ContextInterface    $context
     * @param   UiComponentFactory  $uiComponentFactory
     * @param   UrlInterface        $urlBuilder
     * @param   array               $components
     * @param   array               $data
     * @param   string              $editUrl
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = [],
        $editUrl = self::ROW_EDIT_URL
    ) {
        $this->_urlBuilder = $urlBuilder;
        $this->_editUrl = $editUrl;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function prepareDataSource( array $dataSource )
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $name = $this->getData('name');
                if (isset($item['id'])) {
                    $item[$name]['edit'] = [
                        'href' => $this->_urlBuilder->getUrl($this->_editUrl, ['id' => $item['id']]),
                        'label' => __('Edit'),
                    ];
                }
            }
        }

        return $dataSource;
    }
}