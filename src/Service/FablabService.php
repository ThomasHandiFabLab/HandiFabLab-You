<?php
namespace App\Service;

use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Fablab;

class FablabService{
    private $om;
    private $repository;

    public function __construct( ObjectManager $om ){
        $this->om = $om;
        $this->repository = $om->getRepository( Fablab::class );
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