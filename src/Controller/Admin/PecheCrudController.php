<?php

namespace App\Controller\Admin;

use App\Entity\Peche;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class PecheCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Peche::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield AssociationField::new('Pecheur');
        yield AssociationField::new('Poisson');
        yield AssociationField::new('Climat');
        yield AssociationField::new('SessionPeche');
        yield IntegerField::new('Temperature')->setLabel('Température en °C');
        yield IntegerField::new('Taille')->setLabel('Taille en cm');
        yield TimeField::new('Heure')->setLabel('Heure de capture');

    }

}
