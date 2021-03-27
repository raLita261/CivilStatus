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

class PublicUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('FName')
            ->add('LName')
            ->add('placeOfBirth')
            ->add('DoB')
            ->add('father', EntityType::class, [
                // looks for choices from this entity
                'class' => ParentUser::class,
                // uses the User.username property as the visible option string
                'placeholder' => 'Choose Father ID',
                'required' => false,
                'choice_label' => 'id',

                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            ])
            ->add('mother', EntityType::class, [
                // looks for choices from this entity
                'class' => ParentUser::class,
                // uses the User.username property as the visible option string
                'placeholder' => 'Choose Mother ID',
                'required' => false,
                'choice_label' => 'id',

                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            ])
            ->add('isAlive', ChoiceType::class, [
                'choices' => [
                    "Alive" => true,
                    "Dead" => false
                ],
            ])
            ->add('DoD');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PublicUser::class,
        ]);
    }
}
