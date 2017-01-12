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
        $repository = $this->getDoctrine()->getRepository('AppBundle:Project');

        $projects = $repository->findAll();

        return $this->render('index.html.twig', array("projects" => $projects));
    }

    /**
     * projet.html
     * @Route("/projet")
     */
    public function projethtml()
    {
        // replace this example code with whatever you need
        return $this->render('projet.html.twig');
    }

    /**
     * user.html
     * @Route("/user")
     */
    public function userhtml()
    {
        // replace this example code with whatever you need
        return $this->render('user.html.twig');
    }


}
