<?php

namespace App\Form;

use App\Entity\ContactForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name', TextType::class, ['label' => 'Neved'],  [
            'attr' =>  ['oninvalid'=>'setCustomValidity("Would you please enter a valid email?")']
            ]) 
        ->add('email', EmailType::class, ['label' => 'E-mail címed'])
        ->add('message', TextareaType::class, ['label' => 'Üzenet szövege'] )
        ->add('save', SubmitType::class, ['label' => 'Küldés'], [
            'attr' => ['class'=>'btn btn-default']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ContactForm::class,
            ]);
    }
}
