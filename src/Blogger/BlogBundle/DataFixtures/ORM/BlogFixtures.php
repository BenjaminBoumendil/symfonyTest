<?php
// src/Blogger/BlogBundle/DataFixtures/ORM/BlogFixtures.php

namespace Blogger\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Blogger\BlogBundle\Entity\Blog;

class BlogFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $blog = new Blog();
        $blog->setTitle('A day with Symfony');
        $blog->setBlog('Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.');
        $blog->setImage('beach.jpg');
        $blog->setAuthor('dsyph3r');
        $blog->setTags('symfony, php, paradise');
        $blog->setCreated(new \DateTime());
        $blog->setUpdated($blog->getCreated());

        $manager->persist($blog);
        $manager->flush();
    }
}
