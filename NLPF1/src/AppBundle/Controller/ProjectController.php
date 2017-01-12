<?php
/**
 * Created by PhpStorm.
 * User: supercanard
 * Date: 11/01/17
 * Time: 17:44
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use AppBundle\Entity\Compensation;
use AppBundle\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ProjectController extends Controller
{

    /**
     * @Route("/projet")
     */
    public function home() {
        return $this->render('project.html.twig');
    }

    /**
     * @Route("/projet/{data2}")
     */

    public function addProjectAction($data2)
    {
        $user = $_SESSION["user"];

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);

        $data = json_decode($data2);

        $project = new Project();

        $project->setAmount(0);
        $project->setAuthor($data[0]->author);
        $project->setContact($data[0]->contact);
        $project->setDate(new \DateTime());
        $project->setDescription($data[0]->description);
        $project->setImage($data[0]->image);
        $project->setName($data[0]->name);
        $project->setRefUserId($user);


        $em->persist($project);
        $em->flush();

        for ($i = 0; $i < count($data[1]); ++$i) {
            $compensation = new Compensation();
            $compensation->setName($data[1][$i]->name);
            $compensation->setAmount($data[1][$i]->amount);
            $compensation->setDescription($data[1][$i]->description);
            $compensation->setRefProjectId($project);

            $em->persist($compensation);
            $em->flush();
        }


        $repository = $this->getDoctrine()->getRepository('AppBundle:Project');

        $projects = $repository->findAll();

        return $this->render('index.html.twig', array("projects" => $projects));
    }
}