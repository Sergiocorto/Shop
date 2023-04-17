<?php

namespace Repositories;


class ProductRepository
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

    public function add($product)
    {
        return $this->repository->add($product);
    }

    public function update($product)
    {
        return $this->repository->update($product);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}