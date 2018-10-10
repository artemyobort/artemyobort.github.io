<?php

namespace Brander\ContactUs\Block\Adminhtml\Design\Config\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class BackButton
 *
 * @package Brander\ContactUs\Block\Adminhtml\Design\Config\Edit
 */
class BackButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * Back button
     *
     * @access  public
     * @return  array
     */
    public function getButtonData()
    {
        return [
            'label'      => __('Back'),
            'on_click'   => sprintf("location.href = '%s';", $this->getBackUrl()),
            'class'      => 'back',
            'sort_order' => 10
        ];
    }

    /**
     * Get URL for back button
     *
     * @access  public
     * @return  string
     */
    public function getBackUrl()
    {
        return $this->getUrl('*/*/');
    }
}
