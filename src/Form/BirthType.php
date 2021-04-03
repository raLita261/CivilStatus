<?php

namespace App\Form;

use App\Entity\Birth;
use App\Entity\OfficeLocation;
use App\Entity\PublicUser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;



class BirthType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('declarationDate', DateTimeType::class, [
                'widget' => 'single_text',
            ])
            ->add('publicUser', EntityType::class, [
                // looks for choices from this entity
                'class' => PublicUser::class,
                // uses the User.username property as the visible option string
                'placeholder' => 'Choose Person',
                'required' => true,
                'choice_label' => 'FName',

                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            ])
            ->add('officeLocation', EntityType::class, [
                // looks for choices from this entity
                'class' => OfficeLocation::class,
                // uses the User.username property as the visible option string
                'placeholder' => 'Choose Office Location',
                'required' => true,
                'choice_label' => 'location',

                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Birth::class,
        ]);
    }
}
