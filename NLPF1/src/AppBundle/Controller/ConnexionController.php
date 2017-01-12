<?php
/**
 * Created by PhpStorm.
 * User: supercanard
 * Date: 08/01/17
 * Time: 09:23
 */

namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConnexionController extends Controller
{
    /**
     * @Route("/connexion")
     */
    public function home()
    {
        return $this->render('connexion.html.twig');
    }

    /**
     * @Route("/connexion/{email}/{password}")
     */

    public function connexion($email, $password) {
        $em = $this->getDoctrine()->getEntityManager();

        $qb1 = $em->createQueryBuilder();

        $qb1->select('u')
            ->from('AppBundle:User', 'u')
            ->where('u.email = \'' . $email . '\' AND u.password = \'' . $password . '\'');


        $query1 = $qb1->getQuery();

        $user = $query1->getArrayResult();

        if (count($user) > 0) {
            $_SESSION["user"] = $user[0];

            $repository = $this->getDoctrine()->getRepository('AppBundle:Project');

            $projects = $repository->findAll();

            return $this->render('index.html.twig', array("projects" => $projects));
        }

        return $this->render('connexion.html.twig');
    }
}