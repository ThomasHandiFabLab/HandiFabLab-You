<?php

namespace App\Repository;

use App\Entity\FabLab;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FabLab|null find($id, $lockMode = null, $lockVersion = null)
 * @method FabLab|null findOneBy(array $criteria, array $orderBy = null)
 * @method FabLab[]    findAll()
 * @method FabLab[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FabLabRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FabLab::class);
    }

    // /**
    //  * @return FabLab[] Returns an array of FabLab objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FabLab
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
