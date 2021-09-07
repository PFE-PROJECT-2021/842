<?php

namespace App\Controller\Admin;

use App\Entity\Ficheclient;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FicheclientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ficheclient::class;
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
