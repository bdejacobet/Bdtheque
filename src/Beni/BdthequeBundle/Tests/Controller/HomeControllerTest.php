<?php


namespace Beni\BdthequeBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class HomeControllerTest
 *
 * @package Beni\BdthequeBundle\Tests\Controller
 * @author Benoit de Jacobet <benijaco@gmail.com>
 */
class HomeControllerTest extends WebTestCase
{

    public function testHomeAction()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertTrue($crawler->filter('html:contains("Ma Bdtheque!!")')->count() > 0);
    }
}
