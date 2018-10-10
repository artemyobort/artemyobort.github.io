<?php

namespace Brander\ContactUs\Block\Adminhtml\Design\Config\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Cms\Api\BlockRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class GenericButton
 *
 * @package Brander\ContactUs\Block\Adminhtml\Design\Config\Edit
 */
class GenericButton
{
    /**
     * @access  protected
     * @var     Context
     */
    protected $context;

    /**
     * @access  protected
     * @var     BlockRepositoryInterface
     */
    protected $blockRepository;

    /**
     * GenericButton constructor.
     *
     * @access  public
     * @param   Context                     $context
     * @param   BlockRepositoryInterface    $blockRepository
     */
    public function __construct( Context $context, BlockRepositoryInterface $blockRepository ) {
        $this->context = $context;
        $this->blockRepository = $blockRepository;
    }

    /**
     * Return CMS block ID
     *
     * @access  public
     * @return  int|null
     */
    public function getBlockId()
    {
        try {
            return $this->blockRepository->getById($this->context->getRequest()->getParam('block_id'))->getId();
        } catch (NoSuchEntityException $e) {

        }

        return null;
    }

    /**
     * Generate url by route and parameters
     *
     * @access  public
     * @param   string  $route
     * @param   array   $params
     * @return  string
     */
    public function getUrl( $route = '', $params = [] )
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
