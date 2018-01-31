<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class UsersController extends Controller
{
    /**
     * @Route("/users", name="users")
     */
    public function index(SessionInterface $session)//le passage de $session en paramètre est ce que l'on appelle une injection de dépendance
    {
        //return new Response('Welcome to your new controller!'); //Code généré automatiquement à la création du controller
        
        $user = new User("Paco");
        $user->addCompetence("Programmation Web");
        $user->addCompetence("Apéro");
        $user->addCompetence("Ember");
        $user->addCompetence("Symfony");
        $session->set("user", $user);
        
        return $this->render("users/users.html.twig", ["user"=>$user]);
    }
    
    /**
     * @Route("/hello/{who}")
     */
    public function test(SessionInterface $session, $who=null){
        if($who==null){
            $who = $session->get("user");
        }
        return new Response('Hello '.$who);
    }
}
