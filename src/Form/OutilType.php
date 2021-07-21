<?php

namespace App\Form;

use App\Entity\Outil;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OutilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class,[
                "required"=>false,
                "label"=>false,
                "attr"=>[
                    "placeholder"=>"Veuillez remplir ce champ"
                ]
            ])
            ->add('resume',TextType::class,[
                "required"=>false,
                "label"=>false,
                "attr"=>[
                    "placeholder"=>"Veuillez remplir ce champ"
                ]
            ])
    //        ->add('idTechno',TextType::class,[
    //            "required"=>false,
    //            "label"=>false,
    //            "attr"=>[
    //                "placeholder"=>"Veuillez remplir ce champ"
    //            ]
    //        ])
            ->add('Valider', SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Outil::class,
        ]);
    }
}
