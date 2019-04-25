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
                'label' => false,
                'attr' => array(
                    'placeholder' => "Nom du projet"
                ),
            ))
            ->add('created_at', null, array(
                'widget' => 'choice',
                'label' => 'Début demande :'
            ))
            ->add('description', TextareaType::class, array(
                'label' => false,
                'attr' => array(
                'placeholder' => "Description"
                )
            ))
            ->add('deadline_at', null, array(
                'widget' => 'choice',
                'label' => 'Au plus tard :'
            ))
            ->add('price', MoneyType::class, array(
                'label' => 'Prix'
            ))
            ->add('picture', FileType::class, array(
                'label' => 'Photo éventuelle (PDF file)'
            ))
            ->add('weight', null, array(
                'label' => false,
                'attr' => array(
                    'placeholder' => "Poids de l'objet"
                ),
            ))
            ->add('width', null, array(
                'label' => false,
                'attr' => array(
                    'placeholder' => "Largeur de l'objet"
                ),
            ))
            ->add('length', null, array(
                'label' => false,
                'attr' => array(
                    'placeholder' => "Longueur de l'objet"
                ),
            ))
            ->add('height', null, array(
                'label' => false,
                'attr' => array(
                    'placeholder' => "Hauteur de l'objet"
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
