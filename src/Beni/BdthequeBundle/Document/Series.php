<?php


namespace Beni\BdthequeBundle\Document;

use Beni\BdthequeBundle\Document\ComicStrip;

/**
 * Class Series
 *
 * @package Beni\BdthequeBundle\Document
 * @author Benoit de Jacobet <benijaco@gmail.com>
 */
class Series
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
    protected $slug;

    /**
     * @var ComicStrip
     */
    protected $comicStrip = array();

    public function __construct()
    {
        $this->comicStrip = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @internal param string $title
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
     * @return self
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * Add comicStrip
     *
     * @param ComicStrip $comicStrip
     */
    public function addComicStrip(ComicStrip $comicStrip)
    {
        $this->comicStrip[] = $comicStrip;
    }

    /**
     * Remove comicStrip
     *
     * @param ComicStrip $comicStrip
     */
    public function removeComicStrip(ComicStrip $comicStrip)
    {
        $this->comicStrip->removeElement($comicStrip);
    }

    /**
     * Get comicStrip
     *
     * @return Doctrine\Common\Collections\Collection $comicStrip
     */
    public function getComicStrip()
    {
        return $this->comicStrip;
    }
}
