<?php

namespace App\Form;

use App\Entity\Patient;
use App\Entity\Rdv;
use App\Entity\EtatEnum;
use App\Entity\SpecialiteEnum;
use App\Entity\TypeEnum;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RdvType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('login', TextType::class, [
                'mapped' => false,
                'label' => 'Login patient',
            ])
            ->add('pwd', TextType::class, [
                'mapped' => false,
                'label' => 'Mot de passe',
            ])
            ->add('dateAt', null, [
                'widget' => 'single_text',
                'label' => 'Date',
            ])
            ->add('type', EnumType::class, [
                'class' => TypeEnum::class,
                'label' => 'Type',
                'choice_label' => fn(TypeEnum $type) => ucfirst(strtolower($type->name)),
                'placeholder' => 'Choisir',
            ])
            ->add('etat', EnumType::class, [
                'class' => EtatEnum::class,
                'label' => 'État',
                'choice_label' => fn(EtatEnum $etat) => ucfirst(strtolower($etat->name)),
                'placeholder' => 'Choisir',
            ])
            ->add('specialite', EnumType::class, [
                'class' => SpecialiteEnum::class,
                'label' => 'Spécialité',
                'choice_label' => fn(SpecialiteEnum $spec) => ucfirst(strtolower(str_replace('_', ' ', $spec->name))),
                'placeholder' => 'Choisir',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Rdv::class,
        ]);
    }
}
