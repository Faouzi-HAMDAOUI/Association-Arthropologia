<?php

namespace App\Form;

use App\Entity\Diagnostic;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;

class DiagnosticType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du site',
                'attr' => [
                    'placeholder' => 'Renseigner le nom du site',
                    'class' => 'form-control'
                ]
            ])
            ->add('delimitation', TextType::class, [
                'label' => 'Délimitation du site',
                'attr' => [
                    'placeholder' => 'Ex: Espace public (parterre fleuri, terre-plein sur avenue, quartier entier, etc.)',
                    'class' => 'form-control'
                ]
            ])
            ->add('proprietaire', TextType::class, [
                'label' => 'Propriétaire(s)/Gestionnaire(s)',
                'attr' => [
                    'placeholder' => 'Renseigner le nom du/des propriétaire(s) ',
                    'class' => 'form-control'
                ]
            ])
            ->add('adresse', TextType::class, [
                'label' => 'Adresse',
                'attr' => ['placeholder' => 'Renseigner l\'adresse du site']
            ])
            ->add('objectif', TextType::class, [
                'label' => 'Utilisation/Objectif du site',
                'attr' => [
                    'placeholder' => 'Ex : Zone de détente pour le public, aire de jeux...',
                    'class' => 'form-control'
                ]
            ])
            ->add('mail', TextType::class, [
                'label' => 'E-mail (facultatif)',
                'attr' => [
                    'placeholder' => 'exemlpe@domain.fr...',
                    'class' => 'form-control'
                ]
            ])
            ->add('etape', HiddenType::class)
            ->add('score1', HiddenType::class)
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
