<?php


namespace Beni\BdthequeBundle\Document;

/**
 * Class Series
 *
 * @package Beni\BdthequeBundle\Document
 * @author Benoit de Jacobet <benijaco@gmail.com>
 */
class Series
{
    protected $id;

    protected $title;

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

}
