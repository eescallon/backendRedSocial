<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TypepersonController extends Controller
{
    /**
     * @Route("/typeperson", name="typeperson")
     */
    public function index()
    {
        return $this->render('typeperson/index.html.twig', [
            'controller_name' => 'TypepersonController',
        ]);
    }
}
