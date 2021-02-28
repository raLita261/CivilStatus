<?php

namespace App\Form;

use App\Entity\PublicUser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PublicUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('FName')
            ->add('LName')
            ->add('DoB')
            ->add('FatherName')
            ->add('MotherName')
            ->add('Status' ,ChoiceType::class, [
                'choices'=>[
                    "Alive"=> true,
                    "Dead" => false
                ],
            ])
            ->add('DoD')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PublicUser::class,
        ]);
    }
}
