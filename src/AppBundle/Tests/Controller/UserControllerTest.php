<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testGetallusers()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getAllUsers');
    }

    public function testGetuserbyid()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getUserById');
    }

}
