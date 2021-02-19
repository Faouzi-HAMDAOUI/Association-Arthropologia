<?php

namespace App\Form;

use App\Entity\Diagnostic;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Diagnostic2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', HiddenType::class)
            ->add('delimitation', HiddenType::class)
            ->add('proprietaire', HiddenType::class)
            ->add('adresse', HiddenType::class)
            ->add('objectif', HiddenType::class)
            ->add('mail', HiddenType::class)
            ->add('etape', HiddenType::class)
            ->add('score', HiddenType::class,  [
                'attr' => [
                    'id' => 'score'
                ]
            ])
            ->add('score1', HiddenType::class,  [
                'attr' => [
                    'id' => 'score1'
                ]
            ])
            ->add('score2', HiddenType::class)
            ->add('score3', HiddenType::class)
            ->add('score4', HiddenType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Diagnostic::class,
        ]);
    }
}
