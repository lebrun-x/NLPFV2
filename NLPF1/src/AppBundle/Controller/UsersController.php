<?php
/**
 * Created by PhpStorm.
 * User: supercanard
 * Date: 09/01/17
 * Time: 07:15
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;


class UsersController extends Controller
{
    /**
     * @Route("/user")
     */
    public function addUserAction(Request $request)
    {
        $user = new User();

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $user);

        $formBuilder
            ->add('name',   TextType::class)
            ->add('firstname', TextType::class)
            ->add('password',   PasswordType::class)
            ->add('email', EmailType::class)
            ->add('save',      SubmitType::class)
        ;

        $form = $formBuilder->getForm();

        if ($request->isMethod('POST'))
        {
            $form->handleRequest($request);

            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Votre compte est bien enregistré.');

                $repository = $this->getDoctrine()->getRepository('AppBundle:Project');

                $projects = $repository->findAll();

                $_SESSION["user"] = $user;

                return $this->render('index.html.twig', array("projects" => $projects));
            }
        }
        return $this->render('user2.html.twig', array('form' => $form->createView(),));
    }
}