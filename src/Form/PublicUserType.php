<?php

namespace App\Form;

use App\Entity\PublicUser;
use App\Entity\ParentUser;
use phpDocumentor\Reflection\Types\Parent_;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;


class PublicUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('FName')
            ->add('LName')
            ->add('placeOfBirth')
            ->add('DoB', DateTimeType::class, [
                'widget' => 'single_text',

            ])


            ->add('isAlive', ChoiceType::class, [
                'choices' => [
                    "Alive" => true,
                    "Dead" => false
                ],
            ])
            ->add('DoD', DateTimeType::class, [
                'widget' => 'single_text',
                'required' => false,

            ])
            ->add('fatherName')
            ->add('fatherOccupation')
            ->add('motherName')
            ->add('motherOccupation')
            ->add('gender', ChoiceType::class, [
                'choices' => [
                    "Male" => true,
                    "Female" => false
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PublicUser::class,
        ]);
    }
}
