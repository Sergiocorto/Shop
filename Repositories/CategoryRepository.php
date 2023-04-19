<?php


namespace Repositories;


class CategoryRepository
{
    private $tableName;
    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(): array
    {
        return $this->repository->getAll($this->tableName);
    }

    public function getById($id)
    {
        return $this->repository->getById($id);
    }

    public function add($category)
    {
        return $this->repository->add($category);
    }

    public function update($category)
    {
        return $this->repository->update($category);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}