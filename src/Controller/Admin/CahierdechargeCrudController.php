<?php

namespace App\Controller\Admin;

use App\Entity\Cahierdecharge;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Validator\Constraints\File;

class CahierdechargeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cahierdecharge::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $certificatFile = TextareaField::new('pjfiles')
            ->setFormType(VichImageType::class);

        $certificatName = TextareaField::new('pjname', 'Pièce Jointe');

        $fields= [
            IdField::new('id')
                ->hideOnIndex()->hideOnForm()->hideOnDetail()->setColumns('col-sm-4 col-lg-2'),
            TextField::new('infoproj')
                ->setLabel('Nom projet')->setColumns('col-6 col-md-4 col-lg-4'),
            TextEditorField::new('descriptproj')
                ->setLabel('Description')->setColumns('col-12'),
        ];

        if ($pageName == Crud::PAGE_INDEX || $pageName == Crud::PAGE_DETAIL) {
            $fields[] = $certificatName;
        } else {
            $fields[] = $certificatFile;
        }

        return $fields;
    }

    public function configureCrud(Crud $crud): Crud
    {
        $cahierdecharge = new Cahierdecharge();

        return $crud
            ->setDefaultSort(['infoproj' => 'ASC'])
            ->setPageTitle('index', 'Liste des cahiers de charge')
            ->setPageTitle('new', 'Ajouter Cahier de charge')
            ->setPageTitle('detail', 'Détails Cahier de charge')
            ->overrideTemplate('crud/detail', '/admin/detailscdc.html.twig');
//            ->setPageTitle('edit', fn (Ficheclient $client) => sprintf('Editing <b>%s</b>', $client->getName()));
    }

    public function configureActions(Actions $actions): Actions
    {
        $downloadbtn = Action::new('download', 'Telecharger pièce jointe', 'fa fa-download')
        ->linkToUrl( '', '')
        ->setHtmlAttributes([
            'target' => '_blank'
        ])
        ->displayAsLink()
        ->addCssClass('btn btn-success')
        ;

        return $actions ->add(Crud::PAGE_INDEX, $downloadbtn);
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            // ->add(EntityFilter::new('marque'))
            ->add('infoproj')
            ->add('pjname')
            ;
    }
}
