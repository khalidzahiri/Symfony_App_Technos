<?php

namespace App\Form;

use App\Entity\CategorieTips;
use App\Entity\Techno;
use App\Entity\Tips;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TipsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class,[
                'required'=>false,
                'label'=>false,
                'attr'=>[
                    'placeholder'=>'Veuillez saisir le nom de la technologie choisie'
                ]
            ])
            ->add('resume', TextareaType::class,[
                'required'=>false,
                'label'=>false,
                'attr'=>[
                    'placeholder'=>'Veuillez saisir le nom de la technologie choisie'
                ]
            ])
            ->add('categorieTips', EntityType::class,[
                'required'=>false,
                'label'=>false,
                'class'=>CategorieTips::class,
                'choice_label'=>"nom"
            ])
            ->add('techno', EntityType::class,[
                'required'=>false,
                'label'=>false,
                'class'=>Techno::class,
                'choice_label'=>'nom',
                'multiple'=>true,
                'attr'=>[
                    'class'=>'select2'
                ]
            ])
            ->add('Valider', SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tips::class,
        ]);
    }
}
