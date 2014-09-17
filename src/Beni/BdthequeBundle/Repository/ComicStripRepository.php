<?php

namespace Beni\BdthequeBundle\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;
use FOS\UserBundle\Model\UserInterface;

/**
 * Class ComicStripRepository
 *
 * @package Beni\BdthequeBundle\Repository
 * @author Benoit de Jacobet <benijaco@gmail.com>
 */

class ComicStripRepository extends DocumentRepository
{
    /**
     * Find all comic strip
     *
     * @return mixed|object
     */
    public function findAllOrderedByTitle()
    {
        return $this->createQueryBuilder()
            ->sort('title', 'ASC')
            ->getQuery()
            ->execute();
    }

    /**
     * Find all comic strip of user
     *
     * @param UserInterface $user
     *
     * @return mixed|object
     */
    public function findAllByUserOrderedByTitle(UserInterface $user)
    {
        return $this->createQueryBuilder()
            ->field('users')->references($user)
            ->sort('title', 'ASC')
            ->getQuery()
            ->execute();
    }
}
