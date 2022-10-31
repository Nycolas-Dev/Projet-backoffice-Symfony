<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Validator\Constraints\File;


class UsersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('userpassword')
            ->add('userfirstname', TextType::class)
            ->add('userlastname', TextType::class)
            ->add('usersalutation', ChoiceType::class, [
                'choices' => [
                    'M.' => 'M.',
                    'Mme' => 'Mme',
                ],
                'expanded' => true,
                'multiple' => false, 
            ])
            ->add('usermobile', TextType::class)
            ->add('usertelephone', TextType::class,[
                'required'=>false,
            ])
            ->add('userstreet', TextType::class)
            ->add('usercomplement', TextType::class,['required'=>false])
            ->add('usercity', TextType::class)   
            ->add('usercp', TextType::class)
            //->add('userstate', TextType::class,['required'=>false])
            //->add('usercountry', TextType::class)
            ->add('userphoto', FileType::class, [
                'data_class' => null,
                'required' => false,
            ])
            // ->add('useroptout')
            // ->add('useroptinstatus')
            // ->add('useroptinmode')
            // ->add('useroptindate')
            // ->add('userrole')
            // ->add('userlastupdate')
            ;

            // $builder->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) {
                
            //     $user = $event->getData();
            //     $form = $event->getForm();

            //     $name = $form->get('usertelephone')->getName();

            //     $form->get('usertelephone');

            //     if( $form->get('usertelephone')->getErrors() ) {
            //         $valid = array();
            //         $valid[] = $name;
            //         $valid[] = 'false';
            //     };
                

            // });
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }

}
