<?php

namespace Brander\ContactUs\Model;

use Magento\Framework\Model\AbstractModel;
use Brander\ContactUs\Api\Data\GridInterface;
use Brander\ContactUs\Model\ResourceModel\Grid as GridResource;

/**
 * Class Grid
 *
 * @package Brander\ContactUs\Model
 */
class Grid extends AbstractModel implements GridInterface
{
    /**
     * Grid construct method.
     *
     * @access protected
     * @return void
     */
    protected function _construct()
    {
        $this->_init(GridResource::class);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->_getData(self::ID);
    }

    /**
     * {@inheritdoc}
     */
    public function setId( $id )
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->_getData(self::NAME);
    }

    /**
     * {@inheritdoc}
     */
    public function setName( string $name )
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * {@inheritdoc}
     */
    public function getEmail()
    {
        return $this->_getData(self::EMAIL);
    }

    /**
     * {@inheritdoc}
     */
    public function setEmail( string $email )
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * {@inheritdoc}
     */
    public function getQuestion()
    {
        return $this->_getData(self::QUESTION);
    }

    /**
     * {@inheritdoc}
     */
    public function setQuestion( string $question )
    {
        return $this->setData(self::QUESTION, $question);
    }

    /**
     * {@inheritdoc}
     */
    public function getCreatedAt()
    {
        return $this->_getData(self::CREATED_AT);
    }

    /**
     * {@inheritdoc}
     */
    public function setCreatedAt( string $createdAt )
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * {@inheritdoc}
     */
    public function getUpdatedAt()
    {
        return $this->_getData(self::UPDATED_AT);
    }

    /**
     * {@inheritdoc}
     */
    public function setUpdatedAt( string $updatedAt )
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }
}