<?php

namespace App\Form;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array(
                'label' => false,
                'attr' => array(
                    'placeholder' => "Nom de l'événement"
                ),
            ))
            ->add('start_at', null, array(
                'date_widget' => 'single_text',
                'label' => 'Début'
            ))
            ->add('end_ad', null, array(
                'date_widget' => 'single_text',
                'label' => 'Fin'
            ))
            ->add('created_at')
            ->add('description', null, array(
                'attr' => array(
                    'rows' => 4
                )
            ))
            ->add('deadline_at')
            ->add('price', MoneyType::class, array(
                'label' => 'Prix'
            ))
            ->add('picture', UrlType::class, array(
                'label' => false,
                'attr' => array(
                    'placeholder' => "URL de l'image"
                ),
            ))
            ->add('weight')
            ->add('width')
            ->add('length')
            ->add('height')
            ->add('Categories', null, array(
                'choice_label' => 'name',
                'expanded' => true,
            ))
            ->add('users')
            ->add('fablab')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
