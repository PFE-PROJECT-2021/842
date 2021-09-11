<?php

namespace App\Controller\Admin;

use App\Entity\Ficheclient;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;


class FicheclientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ficheclient::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nomclient') ->setLabel('Nom et prénom'),
            TextField::new('telclient') ->setLabel('Téléphone'),
            EmailField::new('emailcli')->setLabel('Adresse email'),
            TextField::new('activite') ->setLabel('Activité'),
            TextField::new('raisonsociale') ->setLabel('Raison Sociale'),
            TextField::new('siteexistant') ->setLabel('Site existant'),
            TextField::new('referencement') ->setLabel('Référencement'),

        ];
    }

}
