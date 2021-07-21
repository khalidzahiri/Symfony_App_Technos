<?php

namespace App\Form;

use App\Entity\Tips;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
            ->add('resume', TextType::class,[
                'required'=>false,
                'label'=>false,
                'attr'=>[
                    'placeholder'=>'Veuillez saisir le nom de la technologie choisie'
                ]
            ])
        //    ->add('idTechno')
        //    ->add('idUser')
        //    ->add('idCategorie')
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
