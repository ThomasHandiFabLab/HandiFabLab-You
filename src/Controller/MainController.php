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
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;


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
