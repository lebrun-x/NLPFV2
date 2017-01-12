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

class ProjectDetailsController extends Controller
{
    /**
     * @Route("/project/{id}")
     */
    public function home($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $qb1 = $em->createQueryBuilder();

        $qb1->select('p')
            ->from('AppBundle:Project', 'p')
            ->where('p.project_id = ' . $id);

        $query1 = $qb1->getQuery();

        $project = $query1->getArrayResult();

        $qb2 = $em->createQueryBuilder();

        $qb2->select('c')
            ->from('AppBundle:Compensation', 'c')
            ->from('AppBundle:Project', 'p')
            ->where('c.ref_project_id = p.project_id');

        $query2 = $qb2->getQuery();

        $compensations = $query2->getArrayResult();

        return $this->render('project_details.html.twig', array("project" => $project[0], "compensations" => $compensations));
    }
}