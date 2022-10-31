<?php

namespace App\Form;

use App\Entity\Candidates;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class DispoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    { 
        $builder
            // ->add('candidateavailability', ChoiceType:: class, [
            //     'choices' => [
            //         'Disponible' => true,
            //         'Indisponible' => false
            //     ]
            // ])
            ->add('candidateavailability', ChoiceType::class, [
                'choices' => [
                    'Non disponible' => 'Non disponible',
                    '1 jour/semaine' => '1 jour/semaine',
                    '2 jours/semaine' => '2 jours/semaine',
                    '3 jours/semaine' => '3 jours/semaine',
                    '4 jours/semaine' => '4 jours/semaine',
                    'Disponible' => 'Disponible',
                ],
                'placeholder' => ''
            ])
            // ->add('candidateavailabilitydate', DateType::class, [
            //     'widget' => 'single_text',
            // ])
            // ->add('candidateavailabilitydate', DateType::class, [
            //     'widget' => 'single_text',
            //     'html5' => false,
            //     'attr' => ['class' => 'js-datepicker'],
            //     'required' => false,
            // ])

        ; 
    }



    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidates::class,
        ]);
    }
}
