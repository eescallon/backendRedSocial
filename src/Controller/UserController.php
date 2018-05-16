<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;

class UserController extends Controller
{
    /**
     * @Route("/user", name="user")
     */
    public function index()
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction()
    {
        $request = Request::createFromGlobals();
        $content = $request->getContent();
        $data = json_decode($content, true);

        $repository = $this->getDoctrine()->getRepository(User::class);
        $user = $repository->FindOneBy(["email" => $data["user"] , "password" => $data["password"]]);
        if($user)
        {
            $jsonUser = array();
            $jsonUser["id"] = $user->getId();
            $jsonUser["email"] = $user->getEmail();
            $person = $user->getIdPerson();
            if($person)
            {
                $jsonPerson = array();
                $jsonPerosn["id"] = $person->getId();
                $jsonPerson["name"] = $person->getName();
                $jsonPerson["lastName"] = $person->getLastname();
                $jsonUser["person"] = $jsonPerson;
            }
            return $this->json(array("success" => true, "data" => $jsonUser));
        }
        else
        {
            return $this->json(array("success" => false, "message" => "No se encontro el usuario"));
        }
    }
}
