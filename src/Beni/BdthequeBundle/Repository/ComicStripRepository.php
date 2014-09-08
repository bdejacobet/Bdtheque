<?php

namespace Beni\BdthequeBundle\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;

/**
 * Class ComicStripRepository
 *
 * @package Beni\BdthequeBundle\Repository
 * @author Benoit de Jacobet <benijaco@gmail.com>
 */

class ComicStripRepository extends DocumentRepository
{
    public function findAllOrderedByTitle()
    {
        return $this->createQueryBuilder()
            ->sort('title', 'ASC')
            ->getQuery()
            ->execute();
    }
}
