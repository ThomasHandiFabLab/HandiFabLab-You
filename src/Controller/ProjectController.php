<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    /**
     * @Route("/project", name="project_list")
     */
    public function list()
    {
        return $this->render('project/list.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }
    /**
     * @Route("/project", name="project_show", requirements={"id"="/d+"})
     */
    public function show( $id )
    {
        return $this->render('project/show.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }
    /**
     * @Route("/project", name="project_add")
     */
    public function add(){
        $project = new Project();
        return $this->render( 'event/add.html.twig', array(
        'form' => '$form->createView()',
        ));
    }
    /*/** 
     * @Route(/project", name="project_join") 

    public function join( $id ){
        return new Response ( 'Vous avez rejoint l\'évènement' );
    }*/
}
