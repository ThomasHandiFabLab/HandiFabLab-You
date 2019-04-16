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

}