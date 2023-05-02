<?php

namespace App\Controller\Admin;

use App\Entity\SessionPeche;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SessionPecheCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SessionPeche::class;
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
