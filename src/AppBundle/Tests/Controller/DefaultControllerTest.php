<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $this->assertEquals(201, $client->getResponse()->getStatusCode());
        $this->assertContains('Star Wars: Episode VII - The Force Awakens', $client->getResponse()->getContent());
    }
}
