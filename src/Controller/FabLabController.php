<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Service\FabLabService;
use App\Entity\FabLab;
use App\Entity\User;
use App\Form\FablabType;
use App\Repository\FabLabRepository;

class FabLabController extends AbstractController
{
    /**
     * @Route("/fablabs", name="fablab_list")
     */
    public function list( Request $request, FabLabRepository $fablabRepository){
        return $this->render( 'fablab/list.html.twig', array(
            'fablabs' => $fablabRepository->findAll(),
        ));
    }
    /**
     * @Route("/fablab/add", name="fablab_add")
     */
    public function add( Request $request ){
        $fablab = new Fablab();
        $form = $this->createForm( FablabType::class, $fablab );
        $form->handleRequest($request);
        if( $form->isSubmitted() && $form->isValid() ){
            $em = $this->getDoctrine()->getManager();
            $em->persist( $fablab );
            $em->flush();
            return $this->redirectToRoute( 'project_list', array(
                'id' => $fablab->getId(),
        ));
        }        
        return $this->render( 'fablab/add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}