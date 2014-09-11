<?php

namespace Beni\UserBundle\Document;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as FosUser;
use Beni\BdthequeBundle\Document\Series;

/**
 * Class User
 *
 * @package Beni\UserBundle\Document
 * @author Benoit de Jacobet <benijaco@gmail.com>
 */
class User extends FosUser
{

    /**
     * string id
     */
    protected $id;

    /**
     * @var Series
     */
    protected $series = array();

    public function __construct()
    {
        parent::__construct();
        $this->series = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return string $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add series
     *
     * @param Series $series
     */
    public function addSeries(Series $series)
    {
        $this->series[] = $series;
    }

    /**
     * Remove series
     *
     * @param Series $series
     */
    public function removeSeries(Series $series)
    {
        $this->series->removeElement($series);
    }

    /**
     * Get series
     *
     * @return Doctrine\Common\Collections\Collection $series
     */
    public function getSeries()
    {
        return $this->series;
    }
}
