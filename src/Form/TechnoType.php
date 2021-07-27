<?php

namespace App\Form;

use App\Entity\Outil;
use App\Entity\Techno;
use App\Entity\Tutoriel;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TechnoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if ($options['ajout']==true):
            $builder
                ->add('nom', TextType::class,[
                    'required'=>false,
                    'label'=>false,
                    'attr'=>[
                        'placeholder'=>'Veuillez saisir le nom de la technologie choisie'
                    ]
                ])
                ->add('domaine', ChoiceType::class,[
                    'required'=> false,
                    'label' => false,
                    'choices'=>[
                        'Front' => 'Front',
                        'Back' => 'Back',
                        'Autre' => 'Autre',
                    ],
                ])
                ->add('intro', TextareaType::class,[
                    'required'=>false,
                    'label'=>false,
                    'attr'=>[
                        'placeholder'=>'Veuillez saisir le contenu de l\'introduction'
                    ]
                ])
                ->add('doc', TextType::class,[
                    'required'=>false,
                    'label'=>false,
                    'attr'=>[
                        'placeholder'=>'Veuillez saisir le lien vers la documentation'
                    ]
                ])
                ->add('photo', FileType::class,[
                    'required'=>false,
                    'label'=>false
                ])
                ->add('Valider', SubmitType::class)
            ;
        else:
            $builder
                ->add('nom', TextType::class,[
                    'required'=>false,
                    'label'=>false,
                    'attr'=>[
                        'placeholder'=>'Veuillez saisir le nom de la technologie choisie'
                    ]
                ])
                ->add('domaine', ChoiceType::class,[
                    'required'=> false,
                    'label' => false,
                    'choices'=>[
                        'Front' => 'Front',
                        'Back' => 'Back',
                        'Autre' => 'Autre',
                    ],
                ])
                ->add('intro', TextareaType::class,[
                    'required'=>false,
                    'label'=>false,
                    'attr'=>[
                        'placeholder'=>'Veuillez saisir le contenu de l\'introduction'
                    ]
                ])
                ->add('doc', TextType::class,[
                    'required'=>false,
                    'label'=>false,
                    'attr'=>[
                        'placeholder'=>'Veuillez saisir le lien vers la documentation'
                    ]
                ])
                ->add('photo', FileType::class,[
                    'required'=>false,
                    'label'=>false
                ])
                ->add('Valider', SubmitType::class)
            ;
        endif;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Techno::class,
            'ajout'=>false
        ]);
    }
}
