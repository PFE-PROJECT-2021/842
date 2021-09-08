<?php

namespace App\Controller\Admin;

use App\Entity\Ficheclient;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
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
            IdField::new('id'),
            TextField::new('Nom Client') ->setLabel('Nom et prénom'),
            TextField::new('Tel Client') ->setLabel('Téléphone'),
            TextField::new('Emailcli') ->setLabel('Adresse email'),
            TextField::new('Activite') ->setLabel('Activité'),
            TextField::new('raisonsociale') ->setLabel('Raison Sociale'),
            TextField::new('siteexistant') ->setLabel('Site existant'),
            TextField::new('referencement') ->setLabel('Référencement'),

        ];
    }

}
