<?php
namespace App\Controller;

use App\Entity\User;
use App\Entity\Project;
use App\Form\ProjectType;
use App\Service\ProjectService;
use App\Service\FileUploaderService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class ProjectController extends AbstractController
{
    /**
     * @Route("/project", name="project_list")
     */
    public function list( Request $request, ProjectService $projectService ){
        $query = $request->query->get( 'query' );
        $sort = $request->query->get( 'sort', 'id' );
        return $this->render( 'project/list.html.twig', array(
            'projects' => $projectService->getAll(),
        ));
    }
    /**
     * @Route("/project/add", name="project_add")
     */
    public function add( Request $request, FileUploaderService $fileUploaderService)
    {
        $project = new Project();
        $form = $this->createForm( ProjectType::class, $project);
        $form->handleRequest($request);
        dump($project);
        
        return $this->render( 'project/add.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    /**
     * @return string
     */
    private function generateUniqueFileName(){
        // md5() rend un nom fichier unique et uniqid() est basé sur la date.
        return md5(uniqid());
    }
    
    public function new(Request $request, FileUploaderService $fileUploaderService) {
        
    }

    /**
     * @Route("/project/{id}", name="project_show", requirements={"id"="\d+"})
     */
    public function show( ProjectService $projectService, $id ){
        $project = $projectService->get( $id );
        if( empty( $project ) ){
            return new Response( 'Project Not Found', 404 );
        }
        return $this->render( 'project/show.html.twig', array(
            'project' => $project,
        ));
    }
    


}