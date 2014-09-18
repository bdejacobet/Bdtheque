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

        $query = new \Elastica\Query\Match();

        if ($oComicStripSearch->getTitle() != null && $oComicStripSearch != '') {
            $query->setFieldQuery('title', $oComicStripSearch->getTitle());
            $query->setFieldFuzziness('title', 0.7);
            $query->setFieldMinimumShouldMatch('title', '80%');
        }

        if ($oComicStripSearch->getDesigner() != null && $oComicStripSearch != '') {
            $query->setFieldQuery('designer', $oComicStripSearch->getDesigner());
            $query->setFieldFuzziness('designer', 0.7);
            $query->setFieldMinimumShouldMatch('designer', '80%');
        }

        if ($oComicStripSearch->getScenarist() != null && $oComicStripSearch != '') {
            $query->setFieldQuery('scenarist', $oComicStripSearch->getScenarist());
            $query->setFieldFuzziness('scenarist', 0.7);
            $query->setFieldMinimumShouldMatch('scenarist', '80%');
        }

        return $this->find($query);
    }
}
