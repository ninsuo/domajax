<?php

namespace Fuz\DomAjaxBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '');

        $contents = $client->getResponse()->getContent();
        $this->assertTrue(stripos('domajax.fuz.org', $contents) !== false);
    }
}
