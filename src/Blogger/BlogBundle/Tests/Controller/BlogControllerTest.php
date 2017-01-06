<?php
// src/Blogger/BlogBundle/Tests/Controller/BlogControllerTest.php

namespace Blogger\BlogBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BlogControllerTest extends WebTestCase
{
    public function testAddBlogComment()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/11');

        $this->assertEquals(1, $crawler->filter('h2:contains("A day with Symfony")')->count());

        $form = $crawler->selectButton('Submit')->form();

        $form['user'] = 'name';
        $form['comment[comment]'] = 'comment';

        $crawler = $client->submit($form);

        $crawler = $client->followRedirect();

        $articleCrawler = $crawler->filter('section .previous-comments article')->last();

        $this->assertEquals('name', $articleCrawler->filter('header span.highlight')->text());
        $this->assertEquals('comment', $articleCrawler->filter('p')->last()->text());
    }
}
