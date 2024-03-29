<?php

namespace App\Repository;

use App\Entity\Navigation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Navigation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Navigation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Navigation[]    findAll()
 * @method Navigation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NavigationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Navigation::class);
    }

    // /**
    //  * @return Navigation[] Returns an array of Navigation objects
    //  */

    public function findMainNavigation()
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.parent is NULL')
            ->getQuery()
            ->getResult()
        ;
    }


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
