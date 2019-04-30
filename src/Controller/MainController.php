<?php

namespace App\Controller;

use App\Service\ProjectService;
use App\Service\FileUploaderService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class MainController extends AbstractController
{
    /**
     * @Route("/", name="main_index")
     */
    public function index( Request $request, ProjectService $projectService )
    {
            $query = $request->query->get( 'query' );
            $sort = $request->query->get( 'sort', 'id' );
        return $this->render('main/index.html.twig', array(
            'projects' => $projectService->getAll(),
        ));
    }

}
