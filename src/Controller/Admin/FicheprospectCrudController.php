<?php

namespace App\Controller\Admin;

use App\Entity\Ficheprospect;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
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
        return [
            IdField::new('id')->hideOnIndex()->hideOnForm()->hideOnDetail(),
            DateTimeField::new('dateappel')->setLabel('Date appel')->setFormat('dd-MM-Y')->renderAsNativeWidget(),
            TextEditorField::new('commentaireappel') ->setLabel('Commentaire'),
            DateTimeField::new('daterappel')->setLabel('Date rappel')->setFormat('dd-MM-Y')->renderAsNativeWidget(),
            AssociationField::new('client')->setLabel('Entreprise')
        ];
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

}
