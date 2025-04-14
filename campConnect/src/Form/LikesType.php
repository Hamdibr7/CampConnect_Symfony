<?php

namespace App\Form;

use App\Entity\Likes;
use App\Entity\Publication;
use App\Entity\Utilisateur;
use App\Constants\Reaction;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LikesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('reaction_type', ChoiceType::class, [
                'choices' => array_map(
                    fn ($reaction) => $reaction['name'],
                    Reaction::getAll()
                ),
                'choice_values' => array_map(
                    fn ($reaction) => $reaction['id'],
                    Reaction::getAll()
                ),
                'label' => 'Reaction',
            ])
            ->add('publicationid', EntityType::class, [
                'class' => Publication::class,
                'choice_label' => 'title',
                'label' => 'Publication',
            ])
            ->add('utilisateurid', EntityType::class, [
                'class' => Utilisateur::class,
                'choice_label' => 'username',
                'label' => 'User',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Likes::class,
        ]);
    }
}