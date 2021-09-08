<?php

namespace App\Controller\Admin;

use App\Entity\Ficheprospect;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FicheprospectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ficheprospect::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
