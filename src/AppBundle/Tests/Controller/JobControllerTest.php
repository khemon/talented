<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class JobControllerTest extends WebTestCase
{
    public function testGetactivejobs()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/jobs/active');
    }

    public function testAddjob()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/job/add');
    }

}
