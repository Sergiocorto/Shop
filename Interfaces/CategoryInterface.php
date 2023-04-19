<?php


namespace Interfaces;


interface CategoryInterface
{
    public function getCategories();

    public function addCategory($category);

    public function updateCategory($category);

    public function deleteCategory($categoryId);
}