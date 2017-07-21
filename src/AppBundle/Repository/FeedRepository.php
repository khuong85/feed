<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class FeedRepository extends EntityRepository{
	public function getAllFeeds($category, $limit, $page){
		$query = $this->createQueryBuilder('f')
		->orderBy('f.id', 'DESC');

		if($limit){
			$query->setMaxResults($limit);
		}
		if($page){
			$query->setFirstResult(($page - 1) * $limit);
		}
		if($category){
			$query->andWhere('f.category = :category')
			->setParameter('category', $category);
		}

		return $query->getQuery()->getResult();
	}

	public function getTotalFeeds(){
		$query = $this->createQueryBuilder('f')
		->select('COUNT(f)')
		->getQuery()->getSingleScalarResult();

		return $query;
	}

	public function paginate($dql, $page = 1, $limit = 5){
		$paginator = new Paginator($dql);
		$paginator->getQuery()
		->setFirstResult($limit * ($page - 1))
		->setMaxResults($limit);

		return $paginator;
	}
}
