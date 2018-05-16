<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FriendsController extends Controller
{
    /**
     * @Route("/friends", name="friends")
     */
    public function index()
    {
        return $this->render('friends/index.html.twig', [
            'controller_name' => 'FriendsController',
        ]);
    }
}
