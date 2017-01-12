<?php
/**
 * Created by PhpStorm.
 * User: supercanard
 * Date: 11/01/17
 * Time: 17:44
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Compensation;
use AppBundle\Entity\Project;
use AppBundle\Form\CompensationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\HttpFoundation\Request;

class ProjectController extends Controller
{
    public function addProjectAction(Request $request)
    {
        $project = new Project();

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $project);

        $formBuilder
            ->add('name',   TextType::class)
            ->add('author', TextType::class)
            ->add('description',   TextareaType::class)
            ->add('contact', EmailType::class)
            ->add('image', UrlType::class)
            ->add('soumettre',      SubmitType::class)
        ;

        /*$compensation = new Compensation();

        $formBuilderCompensation = $this->get('form.factory')->createBuilder(FormType::class, $compensation);

        $formBuilderCompensation
            ->add('name', TextType::class)
            ->add('amount', IntegerType::class)
            ->add('description', TextareaType::class)
            ->add('ajouter', SubmitType::class)
        ;

        $formCompensation = $formBuilderCompensation->getForm();*/

        $form = $formBuilder->getForm();

        if ($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            //$formCompensation->handleRequest($request);

            if ($form->isValid())
            {
                $user = $this->getDoctrine()->getRepository('AppBundle:User')->find(1);
                $project->setDate(new \DateTime());
                $project->setAmount(0);
                $project->setRefUserId($user);
                $em = $this->getDoctrine()->getManager();
                $em->persist($project);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Votre projet a bien été créé.');

                return $this->redirectToRoute('accueil', array('id' => $project->getProjectId()));

            }
        }
        return $this->render('project.html.twig', array('form' => $form->createView()));
    }
}