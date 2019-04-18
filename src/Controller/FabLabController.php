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

class FabLabController extends AbstractController
{
    /**
     * @Route("/fablabs", name="fablab_list")
     */
    public function list( Request $request){
        $query = $request->query->get( 'query' );
        $sort = $request->query->get( 'sort', 'id' );
        return $this->render( 'fablab/list.html.twig', array(
            'fablabs' => $fablabService->getAll(),
        ));
    }
    /**
     * @Route("/fablab/add", name="fablab_add")
     */
    public function add( Request $request ){
        $fablab = new Fablab();
        $form = $this->createForm( FablabType::class, $fablab );
        return $this->render( 'fablabs/add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
