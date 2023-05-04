<?php

namespace App\Controller\Admin;

use App\Entity\Pecheurs;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PecheursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Pecheurs::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('Nom');
        yield TextField::new('Prenom');
    }

}
