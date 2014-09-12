<?php

namespace Beni\UserBundle\DataFixtures\MongoDB;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Beni\UserBundle\Document\User;

/**
 * Class LoadUserData
 *
 * @package Beni\UserBundle\DataFixtures\ODM
 * @author Benoit de Jacobet <benijaco@gmail.com>
 */
class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $oUser = new User();
        $oUser->setEmail('benijaco@gmail.com');
        $oUser->setUsername('benijaco');
        $oUser->setPlainPassword('benipass');
        $oUser->setEnabled(1);

        $manager->persist($oUser);
        $manager->flush();

        $this->addReference('user', $oUser);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // l'ordre dans lequel les fichiers sont chargés
    }
}
