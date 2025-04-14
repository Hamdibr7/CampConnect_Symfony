<?php

namespace App\Form;

use App\Entity\Publication;
use App\Entity\Utilisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PublicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('contenu') // Text content of the publication
            ->add('typePub') // Renamed to match camelCase convention
            ->add('description') // Description of the publication
            ->add('utilisateurid', EntityType::class, [
                'class' => Utilisateur::class,
                'choice_label' => 'id', // Replace 'id' with a more descriptive property (e.g., username)
                'label' => 'User',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Publication::class,
        ]);
    }
}