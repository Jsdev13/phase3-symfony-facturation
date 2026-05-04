<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastName', TextType::class, [
                'label' => 'Nom',
                'constraints' => [
                    new NotBlank(message: 'Veuillez entrer votre nom'),
                    new Length(max: 255),
                ],
            ])
            ->add('firstName', TextType::class, [
                'label' => 'Prenom',
                'constraints' => [
                    new NotBlank(message: 'Veuillez entrer votre prenom'),
                    new Length(max: 255),
                ],
            ])
            ->add('siret', TextType::class, [
                'label' => 'SIRET',
                'constraints' => [
                    new NotBlank(message: 'Veuillez entrer votre SIRET'),
                    new Length(max: 255),
                ],
            ])
            ->add('companyName', TextType::class, [
                'label' => 'Raison Sociale',
                'constraints' => [
                    new NotBlank(message: 'Veuillez entrer votre raison sociale'),
                    new Length(max: 255),
                ],
            ])
            ->add('iban', TextType::class, [
                'label' => 'IBAN',
                'constraints' => [
                    new NotBlank(message: 'Veuillez entrer votre IBAN'),
                    new Length(max: 255),
                ],
            ])
            ->add('email')
            ->add('plainPassword', PasswordType::class, [
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank(
                        message: 'Please enter a password',
                    ),
                    new Length(
                        min: 6,
                        minMessage: 'Your password should be at least {{ limit }} characters',
                        max: 4096,
                    ),
                ],
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