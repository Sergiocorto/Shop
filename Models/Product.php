<?php

namespace Models;

use Interfaces\ProductInterface;
use Repositories\ProductRepository;

class Product implements ProductInterface
{
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;   
    }    

    public function getProducts(): array
    {
        return $this->repository->getAll();
    }

    public function addProduct($product)
    {
        $this->repository->add($product);
    }

    public function updateProduct($product)
    {
        $this->repository->update($product);
    }

    public function deleteProduct($productId)
    {
        $this->repository->delete($productId);
    }
}