<?php

namespace App\Repository;

use App\Entity\MainPage;
use App\Entity\Page;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MainPage|null find($id, $lockMode = null, $lockVersion = null)
 * @method MainPage|null findOneBy(array $criteria, array $orderBy = null)
 * @method MainPage[]    findAll()
 * @method MainPage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MainPageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MainPage::class);
    }

    // /**
    //  * @return Navigation[] Returns an array of Navigation objects
    //  */

//    public function getAllPublishedPages($value)
//    {
//        return $this->createQueryBuilder('mp')
//            ->leftJoin('c.pages', 'p')
//            ->addSelect('p')
//            ->andWhere('c.slug = :slug')
//            ->setParameter('slug', $value)
//            ->getQuery()
//            ->getResult()
//        ;
//    }


    /*
    public function findOneBySomeField($value): ?Navigation
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
