<?php

namespace Beni\UserBundle\Document;

use FOS\UserBundle\Entity\User as FosUser;

/**
 * Class User
 *
 * @package Beni\UserBundle\Document
 * @author Benoit de Jacobet <benijaco@gmail.com>
 */
class User extends FosUser
{

    /**
     * integer id
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}
