<?php

namespace App\Controller\Admin;

use App\Entity\Performanceagent;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PerformanceagentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Performanceagent::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $fields = [

            IdField::new('id')
                ->hideOnIndex()->hideOnForm()->hideOnDetail(),
            DateField::new('dateappel')
                ->setLabel('Date Appel')->setFormat('dd-MM-Y')->renderAsNativeWidget()->setColumns('col-6 col-md-4 col-lg-4'),
            AssociationField::new('agent')
                ->setLabel('Téléprospectrice')->setColumns('col-4'),
            IntegerField::new('nbappel')
                ->setLabel('Nombre d\'appel émises' )->setColumns('col-5 col-md-4 col-lg-4'),

        ];

        return $fields;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['dateappel' => 'DESC'])
            ->setPageTitle('index', 'Liste nombre appel émis des agents')
            ->setPageTitle('new', 'Ajouter nombre d\'appel d\'un agent')
            ->setPageTitle('detail', 'Détails performance agent');
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
            //->add(DateCalendarFilter::new('datepriserdv'))
            ->add('dateappel')
            ->add('agent')
            ;
    }
}
