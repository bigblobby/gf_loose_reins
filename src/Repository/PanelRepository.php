<?php

namespace App\Repository;

use App\Entity\Panel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Panel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Panel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Panel[]    findAll()
 * @method Panel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PanelRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Panel::class);
    }

    // /**
    //  * @return Panel[] Returns an array of Panel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Panel
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
