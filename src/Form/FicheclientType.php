<?php

namespace App\Form;

use App\Entity\Ficheclient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FicheclientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomclient')
            ->add('telclient')
            ->add('emailcli')
            ->add('activite')
            ->add('raisonsociale')
            ->add('siteexistant')
            ->add('referencement')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ficheclient::class,
        ]);
    }
}
