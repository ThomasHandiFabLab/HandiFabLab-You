<?php

namespace App\Form;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array(
                'label' => "Nom du projet :",
                'attr' => array(
                    'placeholder' => "Exemple : Joystick 2.0"
                ),
            ))
            ->add('description', TextareaType::class, array(
                'label' => "Description :",
                'attr' => array(
                'placeholder' => "Exemple : Ceci est un Joystick adapté spécifiquement pour ..."
                )
            ))
            ->add('deadline_at', null, array(
                'widget' => 'choice',
                'label' => 'Au plus tard :'
            ))
            ->add('picture', FileType::class, array(
                'label' => 'Photo :',
                'attr' => array(
                    'placeholder' => "Photo format : PDF, JPG, PNG, JPEG :"
                ),
            ))
            ->add('weight', null, array(
                'label' => 'Paramètre du projet :',
                'attr' => array(
                    'placeholder' => "Poids de l'objet en gramme."
                ),
            ))
            ->add('width', null, array(
                'label' => false,
                'attr' => array(
                    'placeholder' => "Largeur de l'objet en centimètre."
                ),
            ))
            ->add('length', null, array(
                'label' => false,
                'attr' => array(
                    'placeholder' => "Longueur de l'objet en centimètre."
                ),
            ))
            ->add('height', null, array(
                'label' => false,
                'attr' => array(
                    'placeholder' => "Hauteur de l'objet en centimètre."
                ),
            ))
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
