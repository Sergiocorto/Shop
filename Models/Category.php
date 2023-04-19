<?php


namespace Models;


use Interfaces\CategoryInterface;
use Repositories\CategoryRepository;

class Category implements CategoryInterface
{
    private $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getCategories(): array
    {
        return $this->repository->getAll();
    }

    public function addCategory($category)
    {
        $this->repository->add($category);
    }

    public function updateCategory($category)
    {
        $this->repository->update($category);
    }

    public function deleteCategory($categoryId)
    {
        $this->repository->delete($categoryId);
    }
}