<?php

namespace App\Controller\Admin;

use App\Entity\Conjointe;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ConjointeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Conjointe::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextEditorField::new('description'),
            AssociationField::new('materiau')
                ->setRequired(false)
                ->setLabel('Matériau'),
        ];
    }
    
}
