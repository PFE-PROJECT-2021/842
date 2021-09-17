<?php

namespace App\Controller\Admin;

use App\Entity\Ficheprospect;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class FicheprospectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ficheprospect::class;
    }


    public function configureFields(string $pageName): iterable
    {
        $fields = [

            IdField::new('id')
                ->hideOnIndex()->hideOnForm()->hideOnDetail()->setColumns('col-sm-4 col-lg-2'),
            DateField::new('dateappel')
                ->setLabel('Date appel')->setFormat('dd-MM-Y')->renderAsNativeWidget()->setColumns('col-sm-4 col-lg-2'),
            AssociationField::new('client')
                ->setLabel('Nom de l\'entreprise')->setColumns('col-5')->autoComplete(),
            DateTimeField::new('daterappel')
                ->setLabel('Date rappel')->setFormat('dd-MM-Y')->renderAsNativeWidget()->setColumns('col-sm-4 col-lg-2'),
            TextEditorField::new('commentaireappel')
                ->setLabel('Commentaire')->setColumns('col-12'),
        ];

        return $fields;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['dateappel' => 'DESC'])
            ->setPageTitle('index', 'Liste des fichiers prospects')
            ->setPageTitle('new', 'Ajouter nouveau prospect')
            ->setPageTitle('detail', 'Détails fiche prospect');
//            ->setPageTitle('edit', fn (Ficheclient $client) => sprintf('Editing <b>%s</b>', $client->getName()));
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions ->add(Crud::PAGE_INDEX, 'detail');

        /*->setPermission(Action::NEW, 'ROLE_ADMIN');
        ->setPermission(Action::DELETE, 'ROLE_SUPER_ADMIN');*/

    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            // ->add(EntityFilter::new('marque'))
            ->add('dateappel')
            ->add('client')
            ->add('daterappel')
            ;
    }

}
