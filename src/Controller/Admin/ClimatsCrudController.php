<?php

namespace App\Controller\Admin;

use App\Entity\Climats;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ClimatsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Climats::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('Climat');
    }

}
