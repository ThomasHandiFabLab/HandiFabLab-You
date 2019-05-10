<?php

namespace App\Form;

use App\Entity\FabLab;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FablabType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array(
                'label' => 'Nom',
                'attr' => array( 
                    'novalidate' => 'novalidate'
                )
            ))
            ->add('address', null, array(
                'label' => 'Adresse',
                'attr' => array( 
                    'novalidate' => 'novalidate'
                )
            ))
            ->add('city', null, array(
                'label' => 'Ville',
                'attr' => array( 
                    'novalidate' => 'novalidate'
                )
            ))
            ->add('cp', null, array(
                'label' => 'Code postal',
                'attr' => array( 
                    'novalidate' => 'novalidate'
                )
            ))
            ->add('phonenumber', null, array(
                'label' => 'Téléphone',
                'attr' => array( 
                    'novalidate' => 'novalidate',
                    'placeholder' => '+33'
                )
            ))

            ->add('email', null, array(
                'label' => 'Email',
                'attr' => array( 
                    'novalidate' => 'novalidate'
                )
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FabLab::class,
        ]);
    }
}
