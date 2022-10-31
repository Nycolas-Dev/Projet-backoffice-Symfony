<?php

namespace App\Form;

use App\Entity\Candidateportfolios;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class CandidateportfoliosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('candidateportfoliotitre')
            ->add('candidateportfoliomissions', TextareaType::class, [ 'required' => true])
            ->add('candidateportfoliosociete', TextType::class)
            ->add('candidateportfoliosecteur', ChoiceType::class, [
                'required'=>true,
                'choices' => [
                    'Agriculture, sylviculture et pêche' => 'Agriculture, sylviculture et pêche',
                    'Industries extractives' => 'Industries extractives',
                    'Industrie manufacturière' => 'Industrie manufacturière',
                    'Production et distribution d\'électricité, de gaz, de vapeur et d\'air conditionné' => 'Production et distribution d\'électricité, de gaz, de vapeur et d\'air conditionné',
                    'Production et distribution d\'eau `/ assainissement, gestion des déchets et dépollution' => 'Production et distribution d\'eau `/ assainissement, gestion des déchets et dépollution',
                    'Construction' => 'Construction',
                    'Commerce / réparation d\'automobiles et de motocycles' => 'Commerce / réparation d\'automobiles et de motocycles',
                    'Transports et entreposage' => 'Transports et entreposage',
                    'Hébergement et restauration' => 'Hébergement et restauration',
                    'Information et communication' => 'Information et communication',
                    'Activités financières et d\'assurance' => 'Activités financières et d\'assurance',
                    'Activités immobilières' => 'Activités immobilières',
                    'Activités spécialisées, scientifiques et techniques' => 'Activités spécialisées, scientifiques et techniques',
                    'Activités de services administratifs et de soutien' => 'Activités de services administratifs et de soutien',
                    'Administration publique' => 'Administration publique',
                    'Enseignement' => 'Enseignement',
                    'Santé humaine et action sociale' => 'Santé humaine et action sociale',
                    'Arts, spectacles et activités récréatives' => 'Arts, spectacles et activités récréatives',
                    'Autres activités de services' => 'Autres activités de services',
                ],
                'multiple' => true,
                'placeholder' => '', 
                ])
            ->add('candidateportfoliocontexte', ChoiceType::class, [
                'required'=>true,
                'choices' => [
                    'Start-up' => 'Start-up',
                    'PME/PMI' => 'PME/PMI',
                    'ETI' => 'ETI',
                    'Grand compte' => 'Grand compte'
                ],
                'multiple' => true,
                'placeholder' => '',
                ])
            ->add('candidateportfoliodurationfrom', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'MM/yyyy',
                'input' => 'datetime',
                'input_format' => 'Y-m-d',
                'required' => false,
            ])
            ->add('candidateportfoliodurationto', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'MM/yyyy',
                'input' => 'datetime',
                'input_format' => 'Y-m-d',
                'required' => false,
            ])
            // ->add('candidateid')
            // ->add('candidateportfoliolastupdate')
        ;

        $builder->get('candidateportfoliosecteur')
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

        $builder->get('candidateportfoliocontexte')//{{ path('portfolio_delete', {'id' : portfolio.candidateportfolioid })}}
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
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidateportfolios::class,
        ]);
    }
}
