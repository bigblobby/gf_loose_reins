<?php

namespace App\Form;

use App\Entity\ContactUs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactUsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Name',
                'required' => true
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email Address',
                'required' => true
            ])
            ->add('message', null, [
                'attr' => [
                    'class' => 'contact-us-message'
                ]
            ])
            ->add('subscribe', null, [
                'label' => 'Tick this box to subscribe to our mailing list for News and Special Offers'
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Send Message'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ContactUs::class,
        ]);
    }
}
