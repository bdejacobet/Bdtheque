<?php


namespace Beni\BdthequeBundle\Document;

/**
 * Class ComicStrip
 *
 * @package Beni\BdthequeBundle\Document
 * @author Benoit de Jacobet <benijaco@gmail.com>
 */
class ComicStrip
{
    protected $id;

    protected $title;

    protected $author;

    protected $resume;

    protected $date;

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
     * Get series
     *
     * @return Series $series
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Set series
     *
     * @param Series $series
     * @return self
     */
    public function setSeries($series)
    {
        $this->series = $series;
        return $this;
    }

}
