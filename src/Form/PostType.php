<?php

namespace App\Form;

use App\Entity\Continent;
use App\Entity\Country;
use App\Entity\Post;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TypeTextType::class, array(
                'label' => 'titre',
                'attr' => array(
                    'placeholder' => 'Titre'
                )
            ))
            ->add('content', TextareaType::class, array(
                'label' => 'Contenu',
                'attr' => array(
                    'placeholder' => 'Votre article'
                )
            ))
            ->add('continent', ChoiceType::class, [
                'placeholder' => "Choisissez un continent",             
              
            ])
            ->add('country', //EntityType::class, [            
                //'placeholder' => "Choisissez un pays", 
                //'class' => Country::class,
                //]
                )
            
            //->add('user')
            ->add('picture', FileType::class, [
                'label' => 'Ajouter une image',
                'required' =>false,
                ])
            ->add('Valider', SubmitType::class );
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}