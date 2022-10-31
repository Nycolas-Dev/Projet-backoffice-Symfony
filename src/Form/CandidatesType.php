<?php

namespace App\Form;

use App\Entity\Candidates;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormEvents;
use App\Form\Type\ArrayType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\CallbackTransformer;
use Doctrine\ORM\EntityRepository;

class CandidatesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    { 
        $this->idUser = $options['id_user'];

        $builder
            ->add('candidateresume', TextareaType::class)
            ->add('candidatetags', TextareaType::class)
            ->add('candidateexperience', ChoiceType::class, [
                'choices' => [
                    '< 15 ans' => '< 15 ans',
                    '15 - 20 ans' => '15 - 20 ans',
                    '20 - 25 ans' => '20 - 25 ans',
                    '> 25 ans' => '> 25 ans',
                ],
                'placeholder' => ''
            ])
            ->add('candidatequalification', ChoiceType::class, [
                'choices' => [
                    'Bac' => 'Bac',
                    'Bac+2' => 'Bac+2',
                    'Bac+3' => 'Bac+3',
                    'Bac+4' => 'Bac+4',
                    'Bac+5' => 'Bac+5',
                ],
                'placeholder' => ''
            ])
            ->add('candidatecjm', TextType::class)
            ->add('candidatepreferences', ChoiceType::class, [
                'required'=>false,
                'choices' => [
                    'Conseil' => 'Conseil',
                    'Direction de projet' => 'Direction de projet',
                    'Temps partagé' => 'Temps partage',
                    'Management de transition' => 'Management de transition'
                ],
                'multiple' => true,
                'placeholder' => '', 
                ])
            ->add('candidatedaymove', ChoiceType::class, [
                'choices' => [
                    '< 1h' => '< 1h',
                    '1h à 1h30' => '1h à 1h30',
                    '> 1h30' => '> 1h30',
                ],
                'placeholder' => '',
            ])
            ->add('candidateweekmove', ChoiceType::class, [
                'choices' => [
                    '< 2h' => '< 2h',
                    '2h à 4h' => '2h à 4h',
                    '> 4h' => '> 4h',
                ],
                'placeholder' => ''
            ])
            ->add('candidatewmobility', ChoiceType::class, [
                'choices' => [
                    '1 nuit' => '1 nuit',
                    '2 nuits' => '2 nuits',
                    '3 nuits' => '3 nuits',
                    '4 nuits' => '4 nuits',
                    '5 nuits' => '5 nuits',
                ],
                'placeholder' => ''
            ])
            // ->add('candidateavailability', CheckboxType:: class, [
            //     'required' => false,
            //     'empty_data' => false,
            // ])
            // ->add('candidateavailabilitydate', DateType::class, [
            //     'widget' => 'single_text',
            //     'html5' => false,
            //     'attr' => ['class' => 'js-datepicker'],
            // ])
            
            ->add('candidatemetier', ChoiceType::class, [
                'choices' => [
                    'IT' => 'IT',
                    'Finance' => 'Finance',
                    'RH' => 'RH',
                    'Executive' => 'Executive',
                    'Juridique' => 'Juridique',
                    'Supply-chain' => 'Supply-chain',
                    'Achat' => 'Achat',
                    'Commerce' => 'Commerce',
                    'Marketing/Communication' => 'Marketing/Communication',
                ],
                'placeholder' => ''
            ])
            //->add('candidatefonction')
            // ->add('candidatecercle')
            // ->add('candidatestatus')
            // ->add('candidateinfos')
            // ->add('candidatelastupdate')
            // ->add('candidateuseremail')
        ; 
        
        $builder->get('candidatepreferences')
        ->addModelTransformer(new CallbackTransformer(
            function ($tagsAsArray) {
                // transform the array to a string
                return explode('; ', $tagsAsArray);
            },
            function ($tagsAsString) {
                // transform the string back to an array
                return implode('; ', $tagsAsString);
            }
        ));

        // $builder->get('candidatetags')
        // ->addModelTransformer(new CallbackTransformer(
        //     function ($tagsAsArray) {
        //         // transform the array to a string
        //         return explode('; ', $tagsAsArray);
        //     },
        //     function ($tagsAsString) {
        //         // transform the string back to an array
        //         return implode('; ', $tagsAsString);
        //     }
        // ));
        
    }



    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidates::class,
            'id_user' => null,
        ]);
    }
}
