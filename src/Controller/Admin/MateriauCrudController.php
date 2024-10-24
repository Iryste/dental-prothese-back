<?php

namespace App\Controller\Admin;

use App\Entity\Materiau;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MateriauCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Materiau::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            
        ];
    }
    
}
