<?php
/**
 * Created by PhpStorm.
 * User: supercanard
 * Date: 08/01/17
 * Time: 08:45
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
 /**
     * @Route("/home")
     */
    public function home()
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Project');

        $projects = $repository->findAll();

        return $this->render('index.html.twig', array("projects" => $projects));
    }
}