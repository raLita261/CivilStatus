<?php

namespace App\Form;

use App\Entity\Mariage;
use App\Entity\PublicUser;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class MariageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('mariageDate', DateTimeType::class, [
                'widget' => 'single_text',
                'required' => false,

            ])
            ->add('husband', EntityType::class, [
                // looks for choices from this entity
                'class' => PublicUser::class,
                'placeholder' => 'Choose Husband',
                // uses the User.username property as the visible option string
                'choice_label' => 'id',

                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                //'expanded' => true,
                // 'query_builder' => function (EntityRepository $repository) {
                //     $qb = $repository->createQueryBuilder('u');
                //     // the function returns a QueryBuilder object
                //     return $qb
                //         // find all users where 'deleted' is NOT '1'
                //         ->where($qb->expr()->neq('u.deleted', '?1'))
                //         ->setParameter('1', '1')
                //         ->orderBy('u.username', 'ASC');
                // },
            ])
            ->add('wife', EntityType::class, [
                // looks for choices from this entity
                'class' => PublicUser::class,
                'placeholder' => 'Choose Wife',
                // uses the User.username property as the visible option string
                'choice_label' => 'id',


                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            ])
            ->add('temoin', EntityType::class, [
                // looks for choices from this entity
                'class' => PublicUser::class,
                'placeholder' => 'Choose Temoin',
                // uses the User.username property as the visible option string
                'choice_label' => 'id',

                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            ])
            ->add('officeLocation')
            ->add('officier')
            ->add('payment')
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
            'data_class' => Mariage::class,
        ]);
    }
}
