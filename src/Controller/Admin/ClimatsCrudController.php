<?php

namespace App\Controller\Admin;

use App\Entity\Climats;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ClimatsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Climats::class;
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
