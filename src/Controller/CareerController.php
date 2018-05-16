<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CareerController extends Controller
{
    /**
     * @Route("/career", name="career")
     */
    public function index()
    {
        return $this->render('career/index.html.twig', [
            'controller_name' => 'CareerController',
        ]);
    }
}
