<?php

namespace App\Controller\Admin;

use App\Entity\Peche;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PecheCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Peche::class;
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
