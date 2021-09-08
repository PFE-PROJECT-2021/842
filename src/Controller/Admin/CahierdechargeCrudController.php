<?php

namespace App\Controller\Admin;

use App\Entity\Cahierdecharge;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CahierdechargeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cahierdecharge::class;
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
