<?php

namespace Beni\BdthequeBundle\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;
use FOS\UserBundle\Model\UserInterface;

/**
 * Class SeriesRepository
 *
 * @package Beni\BdthequeBundle\Repository
 * @author Benoit de Jacobet <benijaco@gmail.com>
 */

class SeriesRepository extends DocumentRepository
{
    /**
     * Find a series of user by id
     *
     * @param object|string $idSeries
     * @param UserInterface $user
     *
     * @return mixed|object
     */
    public function findByIdAndUser($idSeries, UserInterface $user)
    {

        return $this->createQueryBuilder()
            ->field('_id')->equals(new \MongoId($idSeries))
            ->field('user')->references($user)
            ->sort('title', 'ASC')
            ->getQuery()
            ->getSingleResult();
    }

    /**
     * Find all series of user
     *
     * @param UserInterface $user
     *
     * @return mixed
     */
    public function findAllByUserOrderedByTitle(UserInterface $user)
    {
        return $this->createQueryBuilder()
            ->field('user')->references($user)
            ->sort('title', 'ASC')
            ->getQuery()
            ->execute();
    }
}
