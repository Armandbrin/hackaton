<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                "attr" => ["placeholder" => "email*", "class" => "w-[80vw] rounded-lg"]
            ])
            ->add("prenom", TextType::class, [
                "attr" => ["placeholder" => "Prénom*", "class" => "w-[80vw] rounded-lg"]
            ])
            ->add("nom", TextType::class, [
                "attr" => ["placeholder" => "nom*", "class" => "w-[80vw] rounded-lg"]
            ])
            ->add("age", IntegerType::class, [
                "attr" => ["placeholder" => "age", "class" => "w-[80vw] rounded-lg"]
            ])
            ->add("poste", TextType::class, [
                "attr" => ["placeholder" => "poste*", "class" => "w-[80vw] rounded-lg"]
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password', "placeholder" => "Mot-de-passe*", "class" => "w-[80vw] rounded-lg"],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
