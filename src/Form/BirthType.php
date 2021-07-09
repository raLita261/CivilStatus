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
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;



class BirthType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('declarationDate', DateTimeType::class, [
                'widget' => 'single_text',
            ])
            ->add('officeLocation')
            ->add('officier')
            ->add('payment')
            ->add('status', ChoiceType::class, [
                'choices'  => [
                    'Pending' => 'Pending',
                    'Approved' => 'Approved',
                    'Failed' => 'Failed',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Birth::class,
        ]);
    }
}
