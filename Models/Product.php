<?php

namespace Models;

use Interfaces\ProductInterface;
use Interfaces\RepositoryInterface;

class Product implements ProductInterface
{
    private $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;   
    }    

    /**
    * @return ProductEntity[]
    */
    public function getProducts()
    {
        return $this->repository->getAll();
        //print_r($data['page']);
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