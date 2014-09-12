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
        $oUser_1 = new User();
        $oUser_1->setEmail('benijaco@gmail.com');
        $oUser_1->setUsername('benijaco');
        $oUser_1->setPlainPassword('benipass');
        $oUser_1->setEnabled(1);
        $manager->persist($oUser_1);
        $this->addReference('user_1', $oUser_1);

        $oUser_2 = new User();
        $oUser_2->setEmail('benijaco2@gmail.com');
        $oUser_2->setUsername('benijaco2');
        $oUser_2->setPlainPassword('benipass');
        $oUser_2->setEnabled(1);
        $manager->persist($oUser_2);
        $this->addReference('user_2', $oUser_2);

        $manager->flush();

    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // l'ordre dans lequel les fichiers sont chargés
    }
}
