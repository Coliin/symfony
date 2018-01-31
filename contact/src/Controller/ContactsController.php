<?php

namespace App\Controller;


use App\Models\Contact;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Service\ContactSessionManager;

class ContactsController extends Controller
{
    /**
     * @Route("/contacts", name="contacts")
     */
    public function index(ContactSessionManager $contactSessionManager)
    {
        $contactSessionManager->insert(new Contact());
        return $this->render('contacts/index.html.twig', ["contacts"=>$contactSessionManager]);
    }

    /**
     * @Route("/contacts/new", name="new")
     */
    public function new(){
        return new Response("Salut");
    }

    /**
     * @Route("/contacts/edit/{index}", name="edit")
     */
    public function edit($index){
        return new Response("Salut c moi".$index);
    }

    /**
     * @Route("/contacts/update", name="update")
     */
    public function update(){
        return new Response("Salut c Michel");
    }

    /**
     * @Route("/contacts/display/{index}", name="display")
     */
    public function display($index){
        return new Response("Salut c Mi ".$index);
    }

    /**
     * @Route("/contacts/search", name="search")
     */
    public function search(){
        return new Response("Salut c Mic");
    }

    /**
     * @Route("/contacts/select", name="select")
     */
    public function select(){
        return new Response("Salut c Mich");
    }

    /**
     * @Route("/contacts/delete", name="delete")
     */
    public function delete(){
        return new Response("Salut c Miche");
    }
}
