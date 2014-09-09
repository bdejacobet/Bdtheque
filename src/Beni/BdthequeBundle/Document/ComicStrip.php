<?php


namespace Beni\BdthequeBundle\Document;

use Beni\BdthequeBundle\Document\Series;

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
    protected $author;

    /**
     * @var string
     */
    protected $resume;

    /**
     * @var date
     */
    protected $date;

    /**
     * @var string
     */
    protected $slug;

    /**
     * @var Series
     */
    protected $series;

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
     * @return self
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * Get date
     *
     * @return date $date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set date
     *
     * @param date $date
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;
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
     * Set series
     *
     * @param Series $series
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
}
