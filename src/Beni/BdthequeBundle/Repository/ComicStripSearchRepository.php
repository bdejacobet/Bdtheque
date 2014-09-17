<?php

namespace Beni\BdthequeBundle\Repository;

use FOS\ElasticaBundle\Repository;
use Beni\BdthequeBundle\Document\ComicStripSearch;

/**
 * Class ComicStripSearchRepository
 *
 * @package Beni\BdthequeBundle\Repository
 * @author Benoit de Jacobet <benijaco@gmail.com>
 */

class ComicStripSearchRepository extends Repository
{

    /**
     * Search comic strip with elasticSearch
     *
     * @param ComicStripSearch $oComicStripSearch
     *
     * @internal param \FOS\UserBundle\Model\UserInterface $user
     *
     * @return mixed|object
     */
    public function search(ComicStripSearch $oComicStripSearch)
    {
        // we create a query to return all the ComicStrip
        // but if the criteria title is specified, we use it
        if ($oComicStripSearch->getTitle() != null && $oComicStripSearch != '') {
            $query = new \Elastica\Query\Match();
            $query->setFieldQuery('title', $oComicStripSearch->getTitle());
            $query->setFieldFuzziness('title', 0.7);
            $query->setFieldMinimumShouldMatch('title', '80%');

            // TODO : ajouter recherche par auteur et serie
        } else {
            $query = new \Elastica\Query\MatchAll();
        }

        return $this->find($query);
    }
}
