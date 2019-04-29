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
                'label' => 'Nom'
                ))
            ->add('address', null, array(
                'label' => 'Adresse'
                ))
            ->add('city', null, array(
                'label' => 'Ville'
                ))
            ->add('cp', null, array(
                'label' => 'Code postal'
                ))
            ->add('phonenumber', null, array(
                'label' => 'Telephone'
                ))
            ->add('email', null, array(
                'label' => 'Email'
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
