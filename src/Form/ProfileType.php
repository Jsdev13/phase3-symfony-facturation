<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('companyName', TextType::class, [
                'label' => 'Raison Sociale',
                'help' => 'Le nom de votre entreprise qui apparaîtra sur vos factures.'
            ])
            ->add('siret', TextType::class, [
                'label' => 'Numéro SIRET (Optionnel)',
                'required' => false
            ])
            ->add('iban', TextType::class, [
                'label' => 'IBAN',
                'help' => 'Compte bancaire qui recevra les virements de vos clients.'
            ])
            ->add('cgv', TextareaType::class, [
                'label' => 'CGV',
                'help' => 'Conditions generale de vente',
                'attr' => ['rows' => 5]
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}