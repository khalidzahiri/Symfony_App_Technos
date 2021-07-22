<?php

namespace App\Form;

use App\Entity\Techno;
use App\Entity\Tutoriel;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TutorielType extends AbstractType
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
                    'placeholder'=>'Veuillez saisir le contenu de l\'introduction'
                ]
            ])
            ->add('niveau', ChoiceType::class,[
                'required'=>false,
                'label'=>false,
                'attr'=>[
                    'placeholder'=>'Veuillez saisir le niveau de difficulté du tutoriel (De 1 à 5)'
                ],
                'choices'=>[
                    'Débutant' => '1',
                    'Amateur' => '2',
                    'Intermédiaire' => '3',
                    'Confirmé'=> '4',
                    'Expert' => '5',
                ],
            ])
            ->add('lien', TextType::class,[
                'required'=>false,
                'label'=>false,
                'attr'=>[
                    'placeholder'=>'Veuillez saisir le lien du tutoriel'
                ]
            ])
            ->add('techno', EntityType::class,[
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
            'data_class' => Tutoriel::class,
        ]);
    }
}
