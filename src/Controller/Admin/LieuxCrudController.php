<?php

namespace App\Controller\Admin;

use App\Entity\Lieux;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LieuxCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Lieux::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('Commune');
        yield IntegerField::new('cp');
    }

}
