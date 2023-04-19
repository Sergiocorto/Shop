<?php


namespace Controllers;


class CategoryController
{
    private $category;

    public function __construct($category)
    {
        $this->category = $category;
    }

    public function getCategoriesVies()
    {
        print_r($this->category->getCategories());
    }

    public function addCategory($category)
    {
        $this->category->addCategory($category);
    }

    public function updateCategory($category)
    {
        $this->category->updateCategory($category);
    }

    public function deleteCategory($param)
    {
        $this->category ->deleteCategory($param['id']);
    }
}