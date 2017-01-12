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

class BestController extends Controller
{
    /**
     * @Route("/best")
     */
    public function home()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $qb = $em->createQueryBuilder();

        $qb->select('p')
            ->from('AppBundle:Project', 'p')
            ->orderBy('p.total_amount', 'DESC');

        $query = $qb->getQuery();

        $projects = $query->getArrayResult();

        return $this->render('best.html.twig', array("projects" => $projects));
    }
}