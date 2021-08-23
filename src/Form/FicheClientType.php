<?php

namespace App\Form;

use App\Entity\FicheClient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FicheClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom_client')
            ->add('tel_client')
            ->add('email_client')
            ->add('raison_sociale')
            ->add('activite')
            ->add('site_web')
            ->add('referencement')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FicheClient::class,
        ]);
    }
}
