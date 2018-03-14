<?php

namespace App\Controller;

use App\Entity\Developer;
use App\Repository\DevelopersRepository;
use App\Services\semantic\DevelopersGui;
use App\Services\semantic\ProjectsGui;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DevelopersController extends AbstractController
{
    /**
     * @Route("/developers", name="developers")
     */
    public function index(DevelopersGui $gui,DevelopersRepository $devRepo){
        $devs=$devRepo->findAll();
        $gui->dataTable($devs);
        return $gui->renderView("Developers/index.html.twig");
    }

    /**
     * @Route("developers/update/{id}", name="developers_update")
     */
    public function update(Developer $dev,DevelopersGui $devsGui){
        $devsGui->frm($dev);
        return $devsGui->renderView('Developers/frm.html.twig');
    }

    /**
     * @Route("developers/submit", name="developers_submit")
     */
    public function submit(Request $request,DevelopersRepository $devRepo){
        $dev=$devRepo->find($request->get("id"));
        if(isset($dev)){
            $dev->setIdentity($request->get("identity"));
            $devRepo->update($dev);
        }
        return $this->forward("App\Controller\DevelopersController::index");
    }

    /**
     * @Route("developers/delete/{id}", name="developers_delete")
     */
    public function delete(Developer $dev,DevelopersRepository $devRepo){
        $devRepo->delete($dev);
        return $this->forward("App\Controller\DevelopersController::index");
    }
}
