<?php

namespace App\Form;

use App\Entity\Camping;
use App\Entity\Reclamation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ReclamationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('camping', EntityType::class, [
                'class' => Camping::class,
                'choice_label' => 'nom',
                'placeholder' => 'Sélectionnez un camping',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez sélectionner un camping'
                    ])
                ]
            ])
            ->add('description', TextareaType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'La description est obligatoire'
                    ])
                ],
                'attr' => [
                    'placeholder' => 'Décrivez votre réclamation...'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reclamation::class,
        ]);
    }
}
