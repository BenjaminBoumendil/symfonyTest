<?php
// src/Blogger/BlogBundle/Repository/BlogRepository.php

namespace Blogger\BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;


class BlogRepository extends EntityRepository
{
    public function getLatestBlogs($limit = null)
    {
        $qb = $this->createQueryBuilder('b')
                   ->select('b')
                   ->addOrderBy('b.created', 'DESC');

        if (false === is_null($limit))
            $qb->setMaxResults($limit);

        return $qb->getQuery()
                  ->getResult();
    }
}
