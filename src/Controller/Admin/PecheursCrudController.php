<?php

namespace App\Controller\Admin;

use App\Entity\Pecheurs;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PecheursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Pecheurs::class;
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
