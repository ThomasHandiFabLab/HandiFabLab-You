<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Services\ProjectService;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main_index")
     */
    public function index()
    {
        return $this->render('main/index.html.twig');
    }
}
