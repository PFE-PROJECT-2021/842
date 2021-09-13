<?php

namespace App\Controller\Admin;

use App\Entity\Ficheclient;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
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
            IdField::new('id')->hideOnIndex()->hideOnForm()->hideOnDetail(),
            TextField::new('nomclient') ->setLabel('Nom et prénom'),
            TextField::new('telclient') ->setLabel('Téléphone'),
            EmailField::new('emailcli')->setLabel('Adresse email')->hideOnIndex(),
            TextField::new('activite') ->setLabel('Activité'),
            TextField::new('raisonsociale') ->setLabel('Raison Sociale'),
            BooleanField::new('siteexistant') ->setLabel('Site existant'),
            BooleanField::new('referencement') ->setLabel('Référencement'),

        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['nomclient' => 'ASC'])
            ->setPageTitle('index', 'Liste des clients')
            ->setPageTitle('new', 'Ajouter nouveau client')
            ->setPageTitle('detail', 'Détails client');
//            ->setPageTitle('edit', fn (Ficheclient $client) => sprintf('Editing <b>%s</b>', $client->getName()));
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions ->add(Crud::PAGE_INDEX, 'detail');
    }

}
