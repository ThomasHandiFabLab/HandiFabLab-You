<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FabLabController extends AbstractController
{
    /**
     * @Route("/fablab", name="fab_lab")
     */
    public function index()
    {
        return $this->render('fab_lab/index.html.twig', [
            'controller_name' => 'FabLabController',
        ]);
    }
}
