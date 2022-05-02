<?php

namespace App\Controller\Admin;

use App\Entity\Hans;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class HansCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Hans::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Hans')
            ->setEntityLabelInPlural('Hans')
            ->setSearchFields(['id', 'hansId', 'title', 'content', 'kalliope']);
    }

    public function configureFields(string $pageName): iterable
    {
        $hansId = IntegerField::new('hansId');
        $title = TextField::new('title');
        $content = TextareaField::new('content');
        $kalliope = ArrayField::new('kalliope');
        $author = AssociationField::new('author');
        $id = IntegerField::new('id', 'ID');

        if (Crud::PAGE_INDEX === $pageName) {
            return [$id, $hansId, $title, $author];
        } elseif (Crud::PAGE_DETAIL === $pageName) {
            return [$id, $hansId, $title, $content, $kalliope, $author];
        } elseif (Crud::PAGE_NEW === $pageName) {
            return [$hansId, $title, $content, $kalliope, $author];
        } elseif (Crud::PAGE_EDIT === $pageName) {
            return [$hansId, $title, $content, $kalliope, $author];
        }
    }
}
