<?php

namespace App\Form;

use App\Entity\ParentUser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ParentUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('LastName')
            ->add('FirstName')
            ->add('Occupation')
            ->add('Address')
            ->add('Gender', ChoiceType::class, [
                'choices'  => [
                    'Male' => true,
                    'Female' => false,
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ParentUser::class,
        ]);
    }
}
