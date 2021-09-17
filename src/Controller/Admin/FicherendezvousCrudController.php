<?php

namespace App\Controller\Admin;

use App\Entity\Ficherendezvous;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class FicherendezvousCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ficherendezvous::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $fields = [

            IdField::new('id')
                ->hideOnIndex()->hideOnForm()->hideOnDetail(),
            DateField::new('datepriserdv')
                ->setLabel('Date prise Rdv')->setFormat('dd-MM-Y')->renderAsNativeWidget()->setColumns('col-6 col-md-4 col-lg-4'),
            DateField::new('daterdv')
                ->setLabel('Date Rendez-vous')->setFormat('dd-MM-Y')->renderAsNativeWidget()->setColumns('col-6 col-md-4 col-lg-4'),
            IntegerField::new('prix')
                ->setLabel('Prix')->hideOnIndex()->setColumns('col-sm-4 col-lg-2'),
            IntegerField::new('notequalif')
                ->setLabel('Note Appel (/5)')->setColumns('col-sm-4 col-lg-2'),
            TextField::new('engagement')
                ->setLabel('Engagement')->hideOnIndex()->setColumns('col-6 col-md-4 col-lg-4'),
            TextField::new('rappel')
                ->setLabel('Rappel')->setColumns('col-6 col-md-4 col-lg-4'),
            TextField::new('sms')
                ->setLabel('SMS')->hideOnIndex()->setColumns('col-6 col-md-4 col-lg-4'),
            AssociationField::new('entreprise')
                ->setLabel('Nom de l\'entreprise')->setColumns('col-5')->autoComplete(),
            TextEditorField::new('commentaire')
                ->setLabel('Commentaire d\'appel')->setColumns('col-12'),
        ];

        return $fields;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['datepriserdv' => 'DESC'])
            ->setPageTitle('index', 'Liste fiche rendez-vous')
            ->setPageTitle('new', 'Ajouter nouveau rendez-vous')
            ->setPageTitle('detail', 'Détails fiche rendez-vous');
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
            ->add('datepriserdv')
            ->add('daterdv')
            ->add('notequalif')
            ;
    }
}
