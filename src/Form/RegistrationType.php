<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\EqualTo;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if ($options['ajout']==true):
        $builder
            ->add('username',TextType::class,[
                "required"=>false,
                "label"=>false,
                "attr"=>[
                    "placeholder"=>"Veuillez remplir ce champ"
                ]
            ])
            ->add('email', EmailType::class,[
                "required"=>false,
                "label"=>false,
                "attr"=>[
                    "placeholder"=>"Veuillez remplir ce champ"
                ]
            ])
            ->add('password', PasswordType::class,[
                "required"=>false,
                "label"=>false,
                "attr"=>[
                    "placeholder"=>"Veuillez remplir ce champ"
                ]
            ])
            ->add('nom',TextType::class,[
                "required"=>false,
                "label"=>false,
                "attr"=>[
                    "placeholder"=>"Veuillez remplir ce champ"
                ]
            ])
            ->add('prenom',TextType::class,[
                "required"=>false,
                "label"=>false,
                "attr"=>[
                    "placeholder"=>"Veuillez remplir ce champ"
                ]
            ])
            ->add('confirmPassword', PasswordType::class,[
                "required"=>false,
                "label"=>false,
                "attr"=>[
                    "placeholder"=>"Veuillez remplir ce champ"
                ],
            ])
            ->add('photo', FileType::class,[
                'required'=>false,
                'label'=>false
            ])
            ->add('linkedin',TextType::class,[
                "required"=>false,
                "label"=>false,
                "attr"=>[
                    "placeholder"=>"Vous pouvez ici saisir le lien de votre profil Linkedin"
                ]
            ])
            ->add('github',TextType::class,[
                "required"=>false,
                "label"=>false,
                "attr"=>[
                    "placeholder"=>"Vous pouvez ici saisir le lien de votre profil GitHub"
                ]
            ])
            ->add('bio',TextType::class,[
                "required"=>false,
                "label"=>false,
                "attr"=>[
                    "placeholder"=>"Petite présentation qui nous permet de vous connaitre"
                ]
            ])
            ->add('ville',TextType::class,[
                "required"=>false,
                "label"=>false,
                "attr"=>[
                    "placeholder"=>"Vous pouvez ici saisir votre ville"
                ]
            ])
            ->add('occupation',TextType::class,[
                "required"=>false,
                "label"=>false,
                "attr"=>[
                    "placeholder"=>"Exemple : 'Développeur Web React/JS' / 'Étudiant' ..."
                ]
            ])



            ->add('valider', SubmitType::class)
        ;
        else:
            $builder
                ->add('username',TextType::class,[
                    "required"=>false,
                    "label"=>false,
                    "attr"=>[
                        "placeholder"=>"Veuillez remplir ce champ"
                    ]
                ])
                ->add('email', EmailType::class,[
                    "required"=>false,
                    "label"=>false,
                    "attr"=>[
                        "placeholder"=>"Veuillez remplir ce champ"
                    ],
                    "constraints"=>[new Email(['message'=>'Veuillez rentrer un email valide'])],
                ])
                ->add('nom',TextType::class,[
                    "required"=>false,
                    "label"=>false,
                    "attr"=>[
                        "placeholder"=>"Veuillez remplir ce champ"
                    ]
                ])
                ->add('prenom',TextType::class,[
                    "required"=>false,
                    "label"=>false,
                    "attr"=>[
                        "placeholder"=>"Veuillez remplir ce champ"
                    ]
                ])
                ->add('photoModif', FileType::class,[
                    'required'=>false,
                    'label'=>false
                ])
                ->add('linkedin',TextType::class,[
                    "required"=>false,
                    "label"=>false,
                    "attr"=>[
                        "placeholder"=>"Vous pouvez ici saisir le lien de votre profil Linkedin"
                    ]
                ])
                ->add('github',TextType::class,[
                    "required"=>false,
                    "label"=>false,
                    "attr"=>[
                        "placeholder"=>"Vous pouvez ici saisir le lien de votre profil GitHub"
                    ]
                ])
                ->add('bio',TextType::class,[
                    "required"=>false,
                    "label"=>false,
                    "attr"=>[
                        "placeholder"=>"Vous pouvez ici saisir votre bio"
                    ]
                ])
                ->add('ville',TextType::class,[
                    "required"=>false,
                    "label"=>false,
                    "attr"=>[
                        "placeholder"=>"Vous pouvez ici saisir votre ville"
                    ]
                ])
                ->add('occupation',TextType::class,[
                    "required"=>false,
                    "label"=>false,
                    "attr"=>[
                        "placeholder"=>"Vous pouvez ici votre occupation"
                    ]
                ])



                ->add('valider', SubmitType::class)
            ;
        endif;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'ajout'=>false
        ]);
    }
}
