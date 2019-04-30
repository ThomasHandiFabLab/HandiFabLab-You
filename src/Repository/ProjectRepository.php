<?php
namespace App\Repository;
use App\Entity\Project;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ProjectRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Project::class);
    }
    public function search( $query ){
        $stmt = $this->createQueryBuilder( 'e' );
        $stmt->where( 'e.name LIKE :query' );
        $stmt->setParameter( ':query', '%' . $query . '%' );
        return $stmt->getQuery()->getResult();
    }
    public function countIncoming(){
        $stmt = $this->createQueryBuilder( 'e' );
        $stmt->select( 'COUNT( e )' );
        return $stmt->getQuery()->getSingleScalarResult();
    }
}