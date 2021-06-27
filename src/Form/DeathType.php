<?php

namespace App\Form;

use App\Entity\Death;
use App\Entity\PublicUser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class DeathType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('deathDate', DateTimeType::class, [
                'widget' => 'single_text',
                'required' => false,

            ])
            ->add('declarationDate', DateTimeType::class, [
                'widget' => 'single_text',
                'required' => false,

            ])
            ->add('payment')
            ->add('officeLocation')
            ->add('officier')
            ->add('vadiny', EntityType::class, [
                // looks for choices from this entity

                'class' => PublicUser::class,
                'placeholder' => 'Choose Epoux',
                // uses the User.username property as the visible option string
                'choice_label' => 'id',

                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            ])
            ->add('maty', EntityType::class, [
                // looks for choices from this entity
                'class' => PublicUser::class,
                'placeholder' => 'Choose ID',
                // uses the User.username property as the visible option string
                'choice_label' => 'id',

                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            ])

            ->add('temoin', EntityType::class, [
                // looks for choices from this entity
                'class' => PublicUser::class,
                'placeholder' => 'Choose ID',
                // uses the User.username property as the visible option string
                'choice_label' => 'id',

                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            ])
            ->add('status', ChoiceType::class, [
                'choices'  => [
                    'Pending' => 'Pending',
                    'Approved' => 'Approved',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Death::class,
        ]);
    }
}
