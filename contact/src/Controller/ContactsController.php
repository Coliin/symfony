<?php

namespace App\Controller;


use App\Models\Contact;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
        //$contactSessionManager->updateSession(null);
        return $this->render('contacts/index.html.twig', ["contacts"=>$contactSessionManager]);
    }

    /**
     * @Route("/contacts/new", name="contact_new")
     */
    public function new(){
        $contact = new Contact();

        $form = $this->createFormBuilder($contact)
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('mail', TextType::class)
            ->add('tel', TextType::class)
            ->add('mobile', TextType::class)
            ->add('valider', SubmitType::class, ['label' => 'Valider'])
            ->getForm();

        return $this->render('contacts/contact-frm.html.twig',['form' => $form->createView()]);
}

    /**
     * @Route("/contacts/edit/{index}", name="contact_edit")
     */
    public function edit($index, ContactSessionManager $cManager){
        $contact = new Contact();

        $form = $this->createFormBuilder($contact)
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('mail', TextType::class)
            ->add('tel', TextType::class)
            ->add('mobile', TextType::class)
            ->add('valider', SubmitType::class, ['label' => 'Valider'])
            ->getForm();

        return $this->render('contacts/edit.html.twig',[
            "form" => $form->createView(),
            "contacts" =>$cManager->get($index),
            "title"=>"Modification de contact"
        ]);
    }

    /**
     * @Route("/contacts/update", name="contact_update", methods={"POST"})
     */
    public function update(){
        return new Response("Update");
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
