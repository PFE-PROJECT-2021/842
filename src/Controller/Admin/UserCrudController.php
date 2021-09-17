<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $fields = [

            IdField::new('id')
                ->hideOnIndex()->hideOnForm()->hideOnDetail(),
            TextField::new('nom')
                ->setLabel('Nom utilisateur')->setColumns('col-6'),
            TextField::new('email')
                ->setLabel('Adresse email')->setColumns('col-6'),
            TextField::new('prenom')
                ->setLabel('Prenom')->hideOnIndex()->setColumns('col-6'),
            TextField::new('telephone')
                ->setLabel('Numéro telephone')->setColumns('col-6'),
        ];

        return $fields;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['nom' => 'DESC'])
            ->setPageTitle('index', 'Liste utilisateurs')
            ->setPageTitle('new', 'Ajouter nouveau utilisateur')
            ->setPageTitle('detail', 'Détails utilisateur');
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
            ->add('nom')
            ->add('email')
            ;
    }
}
