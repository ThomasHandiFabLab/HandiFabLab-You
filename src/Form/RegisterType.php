<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, array(
                'label' => 'Email',
            ))
            ->add('username', null, array(
                'label' => "Nom d'utilisateur",
            ))
            ->add('Password', PasswordType::class, array(
                'label' => 'Mot de passe',
            ))
            ->add('confirmPassword', PasswordType::class, array(
                'label' => 'Confirmation du mot de passe',
            ))
            ->add('city', null, array(
                'label' => "Ville",
            ))
            ->add('address', null, array(
                'label' => "Adresse",
            ))
            ->add('cp', null, array(
                'label' => "Code postale",
            ))
            ->add('phonenumber', null, array(
                'label' => "Téléphone",
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
