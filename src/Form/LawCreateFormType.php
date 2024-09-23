<?php

namespace App\Form;

use App\Entity\Domain;

use App\Entity\Law;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class LawCreateFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Title', null, [
                'label' => "Titre",
                'attr' => [
                    'placeholder' => "Titre"
                ]
            ])
            ->add('Content', null, [
                'label' => "Contenu",
                'attr' => [
                    'placeholder' => "Contenu"
                ]
            ])
            ->add('PublishDate', null, [
            ])
            ->add('Domain', null, [
                'class' => Domain::class,
                'choice_label' => 'Title',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('Submit', SubmitType::class, [
                'label' => 'Créer',
                'attr' => [
                    'class' => 'btn btn-primary',
                    'placeholder' => "Créer"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Law::class,
        ]);
    }
}
