<?php


namespace Beni\BdthequeBundle\Document;

use Beni\BdthequeBundle\Document\Series;
use Beni\UserBundle\Document\User;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class ComicStrip
 *
 * @package Beni\BdthequeBundle\Document
 * @author Benoit de Jacobet <benijaco@gmail.com>
 */
class ComicStrip
{

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $ISBN;

    /**
     * @var string
     */
    protected $author;

    /**
     * @var string
     */
    protected $editor;

    /**
     * @var string
     */
    protected $category;

    /**
     * @var string
     */
    protected $resume;

    /**
     * @var date
     */
    protected $legalDeposit;

    /**
     * @var string
     */
    protected $slug;

    /**
     * @var Series
     */
    protected $series;

    /**
     * @var integer
     */
    protected $tome;

    /**
     * @var arrayCollection
     */
    protected $users = array();

    /**
     * Construct
     */
    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set title
     *
     * @param $title
     *
     * @internal param string $title
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get ISBN
     *
     * @return string $ISBN
     */
    public function getISBN()
    {
        return $this->ISBN;
    }

    /**
     * Set ISBN
     *
     * @param $ISBN
     *
     * @internal param string $ISBN
     * @return self
     */
    public function setISBN($ISBN)
    {
        $this->ISBN = $ISBN;

        return $this;
    }

    /**
     * Get resume
     *
     * @return string $resume
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Set resume
     *
     * @param $resume
     *
     * @internal param string $resume
     * @return self
     */
    public function setResume($resume)
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get author
     *
     * @return string $author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set author
     *
     * @param string $author
     *
     * @return self
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get editor
     *
     * @return string $editor
     */
    public function getEditor()
    {
        return $this->editor;
    }

    /**
     * Set editor
     *
     * @param string $editor
     *
     * @return self
     */
    public function setEditor($editor)
    {
        $this->editor = $editor;

        return $this;
    }

    /**
     * Get category
     *
     * @return string $category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return self
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get legalDeposit
     *
     * @return date $legalDeposit
     */
    public function getLegalDeposit()
    {
        return $this->legalDeposit;
    }

    /**
     * Set date
     *
     * @param date $legalDeposit
     *
     * @return self
     */
    public function setLegalDeposit($legalDeposit)
    {
        $this->legalDeposit = $legalDeposit;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string $slug
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return self
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Set series
     *
     * @param Series $series
     *
     * @return self
     */
    public function setSeries(Series $series)
    {
        $this->series = $series;

        return $this;
    }

    /**
     * Get series
     *
     * @return Series $series
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Set tome
     *
     * @param integer $tome
     *
     * @return self
     */
    public function setTome($tome)
    {
        $this->tome = $tome;

        return $this;
    }

    /**
     * Get tome
     *
     * @return integer $tome
     */
    public function getTome()
    {
        return $this->tome;
    }

    /**
     * Add user
     *
     * @param User $user
     */
    public function addUser(User $user)
    {
        $this->users[] = $user;
    }

    /**
     * Remove user
     *
     * @param User $user
     */
    public function removeUser(User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return Doctrine\Common\Collections\Collection $users
     */
    public function getUsers()
    {
        return $this->users;
    }
}
