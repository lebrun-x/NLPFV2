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

class ParticipateController extends Controller
{
    /**
     * @Route("/participate/{pid}/{cid}")
     */
    public function home($pid, $cid)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $qb1 = $em->createQueryBuilder();

        $qb1->select('c')
            ->from('AppBundle:Compensation', 'c')
            ->where('c.compensation_id = ' . $cid);

        $query1 = $qb1->getQuery();

        $compensation = $query1->getResult();

        $qb2 = $em->createQueryBuilder();
        $qb2->select('p')
            ->from('AppBundle:Project', 'p')
            ->where('p.project_id = ' . $pid);

        $query2 = $qb2->getQuery();

        $project = $query2->getResult();

        return $this->render('participate.html.twig', array("project" => $project, "compensation" => $compensation));
    }

    /**
     * @Route("/participate/{pid}/{cid}/confirm")
     */
    public function confirm($pid, $cid)
    {
        /*** TODO: INSERT INTO \"contribution\" VALUES (default, now(), " + userId + ", " + compensationId + ") RETURNING contribution_id, date, ref_user_id, ref_compensation_id"; ***/
        $em = $this->getDoctrine()->getEntityManager();

        $qb1 = $em->createQueryBuilder();

        $qb1->select('c')
            ->from('AppBundle:Compensation', 'c')
            ->where('c.compensation_id = ' . $cid);

        $query1 = $qb1->getQuery();

        $compensation = $query1->getResult();

        $qb2 = $em->createQueryBuilder();
        $qb2->select('p')
            ->from('AppBundle:Project', 'p')
            ->where('p.project_id = ' . $pid);

        $query2 = $qb2->getQuery();

        $project = $query2->getResult();

        return $this->render('index.html.twig', array("project" => $project, "compensation" => $compensation));
    }
}