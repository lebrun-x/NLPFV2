<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    /**
     * index.html
     * @Route("/")
     */
    public function indexhtml()
    {
        // replace this example code with whatever you need
        return $this->render('index.html');
    }

    /**
     * connexion.html
     * @Route("/connexion")
     */
    public function connexionhtml()
    {
        // replace this example code with whatever you need
        return $this->render('connexion.html');
    }

    /**
     * best.html
     * @Route("/best")
     */
    public function besthtml()
    {
        // replace this example code with whatever you need
        return $this->render('best.html');
    }

    /**
     * participate.html
     * @Route("/participate")
     */
    public function participatehtml()
    {
        // replace this example code with whatever you need
        return $this->render('participate.html');
    }

    /**
     * project_details.html
     * @Route("/project_details")
     */
    public function project_detailshtml()
    {
        // replace this example code with whatever you need
        return $this->render('project_details.html');
    }

    /**
     * contreparties.html
     * @Route("/projet")
     */
    public function projethtml()
    {
        // replace this example code with whatever you need
        return $this->render('contreparties.html');
    }

}
