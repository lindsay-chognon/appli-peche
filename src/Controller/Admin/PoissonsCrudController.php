<?php

namespace App\Controller\Admin;

use App\Entity\Poissons;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PoissonsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Poissons::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('Poisson');
    }

}
