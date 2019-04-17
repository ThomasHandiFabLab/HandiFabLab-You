<?php
namespace App\Service;

use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Project;

class ProjectService{
    private $om;
    private $repository;

    public function __construct( ObjectManager $om ){
        $this->om = $om;
        $this->repository = $om->getRepository( Project::class );
    }
    public function getAll( $criteria ){
        if ($criteria=='date') {
            return $this->repository -> triDate();
        } elseif ($criteria=='price') {
            return $this->repository -> triPrice();
        } elseif ($criteria=='name') {
            return $this->repository -> triName();
        } else {
        return $this->repository->findAll();
        }
    }
    public function get( $id ){
        return $this->repository->find( $id );
    }
    public function countIncoming(){
        return $this->repository->countIncoming();
    }
    public function search( $term ){
        return $this->repository->search( $term );
    }
}