<?php

namespace App\Form;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array(
                'label' => false,
                'attr' => array(
                    'placeholder' => "Nom de du projet"
                ),
            ))
            ->add('start_at', null, array(
                'date_widget' => 'single_text',
                'label' => 'Début'
            ))
            ->add('end_at', null, array(
                'date_widget' => 'single_text',
                'label' => 'Fin'
            ))
            ->add('created_at', null, array(
                'date_widget' => 'single_text',
                'label' => 'Début demande'
            ))
            ->add('description', null, array(
                'attr' => array(
                'rows' => 4
                )
            ))
            ->add('deadline_at', null, array(
                'date_widget' => 'single_text',
                'label' => 'Au plus tard'
            ))
            ->add('price', MoneyType::class, array(
                'label' => 'Prix'
            ))
            ->add('picture', UrlType::class, array(
                'label' => false,
                'attr' => array(
                    'placeholder' => "URL de l'image"
                ),
            ))
            ->add('weight', null, array(
                'label' => false,
                'attr' => array(
                    'placeholder' => "Poid maximale de l'objet"
                ),
            ))
            ->add('width', null, array(
                'label' => false,
                'attr' => array(
                    'placeholder' => "Largeur de l'object"
                ),
            ))
            ->add('length', null, array(
                'label' => false,
                'attr' => array(
                    'placeholder' => "Longueur de l'object"
                ),
            ))
            ->add('height', null, array(
                'label' => false,
                'attr' => array(
                    'placeholder' => "Hauteur de l'object"
                ),
            ))
            ->add('Categories', null, array(
                'choice_label' => 'name',
                'expanded' => true,
            ))
            ->add('users', null, array(
                'label' => false,
                'attr' => array(
                    'placeholder' => "URL de l'image"
                ),
            ))
            ->add('fablab', null, array(
                'label' => false,
                'attr' => array(
                    'placeholder' => "Nom de du FabLab"
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
