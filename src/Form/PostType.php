<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('parte', TextType::class,[
                'label' => 'Enter Parte',
                'attr' => [
                    'placeholder' => 'Parte'
                ]
            ])
            ->add('delito')
            ->add('fecha', null, [
                'widget' => 'single_text',
            ])
            ->add('hora', null, [
                'widget' => 'single_text',
            ])
            ->add('grupo')
            ->add('direccion')
            ->add('zona')
            ->add('efectivo')
            ->add('resumen', TextareaType::class)
            // ->add('save', SubmitType::class, [
            //     'attr' => [
            //         'class' => 'btn btn-primary mt-2',
            //     ]
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
