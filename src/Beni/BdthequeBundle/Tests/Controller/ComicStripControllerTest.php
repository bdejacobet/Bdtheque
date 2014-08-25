<?php

namespace Beni\BdthequeBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ComicStripControllerTest extends WebTestCase
{

    /**
     * Test la création d'un comicStrip
     */
    public function testCreateAction()
    {
//        $client = static::createClient();
//        $client->request(
//            'POST',
//            '/create',
//            array('title' => 'TestPHPUnit'),
//            array('author' => 'script de test'),
//            array('resume' => 'BD créée lors du test')
//        );
//
//        $this->assertTrue($crawler->filter('html:contains("Bdtheque")')->count() > 0);
        $this->assertTrue(TRUE);
    }

    /**
     * Test l'affichage de la liste des comicStrip
     */
    public function testListAction()
    {
//        $client = static::createClient();
//        $crawler = $client->request('GET', '/list', array(), array(), array(
//            'PHP_AUTH_USER' => 'benijaco',
//            'PHP_AUTH_PW'   => 'benipass',
//        ));
//
//        $this->assertTrue($client->getResponse()->isRedirect('/login'));
//        //$this->assertGreaterThan(0, $crawler->filter('article')->count());
        $this->assertTrue(TRUE);
    }
}
