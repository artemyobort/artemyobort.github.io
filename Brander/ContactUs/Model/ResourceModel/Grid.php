<?php

namespace Brander\ContactUs\Model\ResourceModel;

use Brander\ContactUs\Api\GridInterface;
use Magento\Framework\Stdlib\DateTime\DateTime;
use Magento\Framework\Model\ResourceModel\Db\Context;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Grid
 *
 * @package Brander\ContactUs\Model\ResourceModel
 */
class Grid extends AbstractDb
{
    /**
     * @var string
     */
    const TABLE_NAME = 'brander_contact_us';

    /**
     * {@inheritdoc}
     */
    protected $_idFieldName = 'id';

    /**
     * @access  protected
     * @var     DateTime
     */
    protected $_date;

    /**
     * Construct.
     *
     * @access  public
     * @param   Context       $context
     * @param   DateTime      $date
     * @param   string|null   $resourcePrefix
     */
    public function __construct( Context $context, DateTime $date, $resourcePrefix = null )
    {
        parent::__construct($context, $resourcePrefix);
        $this->_date = $date;
    }

    /**
     * {@inheritdoc}
     */
    protected function _construct()
    {
        $this->_init(self::TABLE_NAME, GridInterface::ID);
    }
}