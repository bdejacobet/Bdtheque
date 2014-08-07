<?php

namespace Beni\BdthequeBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testHome()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/home');

        $this->assertTrue($crawler->filter('html:contains("Bdtheque")')->count() > 0);
    }
}
