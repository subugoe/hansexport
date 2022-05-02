<?php

namespace App\Controller\Admin;

use App\Entity\Author;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AuthorCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Author::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Author')
            ->setEntityLabelInPlural('Author')
            ->setSearchFields(['id', 'author']);
    }

    public function configureFields(string $pageName): iterable
    {
        $author = TextField::new('author');
        $born = DateTimeField::new('born');
        $hans = AssociationField::new('hans');
        $id = IntegerField::new('id', 'ID');

        if (Crud::PAGE_INDEX === $pageName) {
            return [$id, $author, $born, $hans];
        } elseif (Crud::PAGE_DETAIL === $pageName) {
            return [$id, $author, $born, $hans];
        } elseif (Crud::PAGE_NEW === $pageName) {
            return [$author, $born, $hans];
        } elseif (Crud::PAGE_EDIT === $pageName) {
            return [$author, $born, $hans];
        }
    }
}
