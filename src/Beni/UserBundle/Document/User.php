<?php

namespace Beni\UserBundle\Document;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as FosUser;
use Beni\BdthequeBundle\Document\ComicStrip;

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
     * @var array
     */
    protected $comicStrips = array();


    public function __construct()
    {
        parent::__construct();
        $this->comicStrips = new ArrayCollection();
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
     * Add comicStrip
     *
     * @param ComicStrip $comicStrip
     */
    public function addComicStrip(ComicStrip $comicStrip)
    {
        $this->comicStrips[] = $comicStrip;
    }

    /**
     * Remove comicStrip
     *
     * @param ComicStrip $comicStrip
     */
    public function removeComicStrip(ComicStrip $comicStrip)
    {
        $this->comicStrips->removeElement($comicStrip);
    }

    /**
     * Get comicStrips
     *
     * @return Doctrine\Common\Collections\Collection $comicStrips
     */
    public function getComicStrips()
    {
        return $this->comicStrips;
    }
}
