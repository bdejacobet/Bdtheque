<?php

namespace Beni\BdthequeBundle\DataFixtures\MongoDB;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Beni\BdthequeBundle\Document\Series;

/**
 * Class LoadSeriesData
 *
 * @package Beni\BdthequeBundle\DataFixtures\ODM
 * @author Benoit de Jacobet <benijaco@gmail.com>
 */
class LoadSeriesData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $oSeries_1 = new Series();
        $oSeries_1->setTitle('Spirou et Fantasio');
        $manager->persist($oSeries_1);
        $this->addReference('series_1', $oSeries_1);

        $oSeries_2 = new Series();
        $oSeries_2->setTitle('Gaston Lagaffe');
        $manager->persist($oSeries_2);
        $this->addReference('series_2', $oSeries_2);

        $manager->flush();

    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2; // l'ordre dans lequel les fichiers sont chargés
    }
}
