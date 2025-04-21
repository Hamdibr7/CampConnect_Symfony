<?php

namespace App\Form;

use App\Entity\Panier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Validator\Constraints as Assert;

class PanierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('qte_com', IntegerType::class, [
                'label' => 'Quantité',
                'constraints' => [
                    new Assert\NotBlank(['message' => 'La quantité est obligatoire']),
                    new Assert\Positive(['message' => 'La quantité doit être positive']),
                    new Assert\Type([
                        'type' => 'integer',
                        'message' => 'La quantité doit être un nombre entier'
                    ])
                ],
                'attr' => ['class' => 'form-control']
            ])
            ->add('prix_total', NumberType::class, [
                'label' => 'Prix total',
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Le prix total est obligatoire']),
                    new Assert\Positive(['message' => 'Le prix total doit être positif']),
                    new Assert\Type([
                        'type' => 'float',
                        'message' => 'Le prix total doit être un nombre'
                    ])
                ],
                'attr' => ['class' => 'form-control']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Panier::class,
        ]);
    }
}
