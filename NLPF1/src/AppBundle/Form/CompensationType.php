<?php
/**
 * Created by PhpStorm.
 * User: supercanard
 * Date: 12/01/17
 * Time: 13:40
 */

namespace AppBundle\Form;



use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompensationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('description', TextareaType::class)
            ->add('amount', IntegerType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)

    {
        $resolver->setDefaults(array(

            'data_class' => 'AppBundle\Entity\Compensation'

        ));

    }
}