<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TalentControllerTest extends WebTestCase
{
    public function testGettalents()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/talent');
    }

    public function testGettalentusers()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/talent/{talentId}/users');
    }

}
