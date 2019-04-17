<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Service\ProjectService;
use App\Entity\Project;
use App\Entity\User;
use App\Form\ProjectType;
class ProjectController extends AbstractController
{
    /**
     * @Route("/projects", name="project_list")
     */
    public function list( Request $request, ProjectService $projectService ){
        $query = $request->query->get( 'query' );
        $sort = $request->query->get( 'sort', 'id' );
        if( !empty( $query ) ){
            $projects = $projectService->search( $query, $sort );
        }else{
            $projects = $projectService->getAll( $sort );
        }
        return $this->render( 'project/list.html.twig', array(
            'projects' => $projects,
            'incomingCounter' => $projectService->countIncoming(),
        ));
    }
    /**
     * @Route("/projects/add", name="project_add")
     */
    public function add( Request $request ){
        $project = new Project();
        $form = $this->createForm( ProjectType::class, $project );
        $form->handleRequest( $request );
        if( $form->isSubmitted() && $form->isValid() ){
            $project->setOwner( $this->getUser() );
            $em = $this->getDoctrine()->getManager();
            $em->persist( $project );
            $em->flush();
            return $this->redirectToRoute( 'project_show', array(
                'id' => $project->getId(),
            ));
        }
        return $this->render( 'project/add.html.twig', array(
            'form' => $form->createView(),
        ));
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
    /**
     * @Route("/project/{id}/join", name="project_join", requirements={"id"="\d+"})
     */
    public function join( $id ){
        return new Response( 'Project join' );
    }
}