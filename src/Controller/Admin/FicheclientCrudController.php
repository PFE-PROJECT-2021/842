<?php

namespace App\Controller\Admin;

use App\Entity\Ficheclient;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
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
        $fields= [
            IdField::new('id')
                ->hideOnIndex()->hideOnForm()->hideOnDetail()->setColumns('col-sm-4 col-lg-2'),
            TextField::new('nomclient')
                ->setLabel('Nom et prénom')->setColumns('col-6 col-md-4 col-lg-4'),
            EmailField::new('emailcli')
                ->setLabel('Adresse email')->hideOnIndex()->setColumns('col-6 col-md-4 col-lg-4'),
            TextField::new('activite')
                ->setLabel('Activité')->setColumns('col-6 col-md-4 col-lg-4'),
            TextField::new('raisonsociale')
                ->setLabel('Raison Sociale')->setColumns('col-6 col-md-4 col-lg-4'),
            TextField::new('telclient')
                ->setLabel('Téléphone')->setColumns('col-6 col-md-4 col-lg-4'),
            BooleanField::new('siteexistant')
                ->setLabel('Site existant')->setColumns('col-5'),
            BooleanField::new('referencement')
                ->setLabel('Référencement')->setColumns('col-5'),


        ];
        return $fields;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['nomclient' => 'ASC'])
            ->setPageTitle('index', 'Liste des entreprises')
            ->setPageTitle('new', 'Ajouter Entreprise')
            ->setPageTitle('detail', 'Détails Entreprise');
//            ->setPageTitle('edit', fn (Ficheclient $client) => sprintf('Editing <b>%s</b>', $client->getName()));
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions ->add(Crud::PAGE_INDEX, 'detail');
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            // ->add(EntityFilter::new('marque'))
            ->add('nomclient')
            ->add('activite')
            ->add('raisonsociale')
            ->add('telclient')
            ->add('emailcli')
            ;
    }

}
