<?php

namespace Beni\BdthequeBundle\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;

/**
 * Class SeriesRepository
 *
 * @package Beni\BdthequeBundle\Repository
 * @author Benoit de Jacobet <benijaco@gmail.com>
 */
class SeriesRepository extends DocumentRepository
{

    /**
     * Find all series
     *
     * @return mixed
     */
    public function findAllOrderedByTitle()
    {
        return $this->createQueryBuilder()
            ->sort('title', 'ASC')
            ->getQuery()
            ->execute();
    }
}
