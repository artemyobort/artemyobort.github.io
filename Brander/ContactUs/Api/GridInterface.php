<?php

namespace Brander\ContactUs\Api;

/**
 * GridInterface
 *
 * @category    Brander
 * @package     Brander\ContactUs
 * @api
 */
interface GridInterface
{
    /**#@+
     * Constants defined for brander_contact_us table columns
     * @var string
     */
    const ID         = 'id';

    const NAME       = 'name';

    const EMAIL      = 'email';

    const TELEPHONE  = 'telephone';

    const QUESTION   = 'question';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';
    /**#@-*/

    /**
     * Method to get contactus post id.
     *
     * @access  public
     * @return  int
     */
    public function getId();

    /**
     * Method to set contactus post id.
     *
     * @access  public
     * @param   int     $id
     * @return  $this
     */
    public function setId( $id );

    /**
     * Method to get contactus post name.
     *
     * @access public
     * @return string
     */
    public function getName();

    /**
     * Method to set contactus post name.
     *
     * @access  public
     * @param   string  $name
     * @return  $this
     */
    public function setName( string $name );

    /**
     * Method to get contactus post email.
     *
     * @access public
     * @return string
     */
    public function getEmail();

    /**
     * Method to set contactus post email.
     *
     * @access  public
     * @param   string  $email
     * @return  $this
     */
    public function setEmail( string $email );

    /**
     * Method to get contactus post telephone.
     *
     * @access public
     * @return string
     */
    public function getTelephone();

    /**
     * Method to set contactus post telephone.
     *
     * @access  public
     * @param   string  $telephone
     * @return  $this
     */
    public function setTelephone( string $telephone );

    /**
     * Method to get contactus post question.
     *
     * @access public
     * @return string
     */
    public function getQuestion();

    /**
     * Method to set contactus post question.
     *
     * @access  public
     * @param   string  $question
     * @return  $this
     */
    public function setQuestion( string $question );

    /**
     * Method to get contactus post created_at.
     *
     * @access public
     * @return string
     */
    public function getCreatedAt();

    /**
     * Method to set contactus post created_at.
     *
     * @access  public
     * @param   string  $createdAt
     * @return  $this
     */
    public function setCreatedAt( string $createdAt );

    /**
     * Method to get contactus post updated_at.
     *
     * @access public
     * @return string
     */
    public function getUpdatedAt();

    /**
     * Method to set contactus post updated_at.
     *
     * @access  public
     * @param   string  $updatedAt
     * @return  $this
     */
    public function setUpdatedAt( string $updatedAt );
}
