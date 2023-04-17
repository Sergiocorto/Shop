<?php

namespace Controllers;

class ProductController
{

    private $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    public function getProductsView()
    {
        print_r($this->product->getProducts());
    }

    public function addProduct($product)
    {
        $this->product->addProduct($product);
    }

    public function updateProduct($product)
    {
        $this->product->updateProduct($product);
    }

    public function deleteProduct($param)
    {
        $this->product ->deleteProduct($param['id']);
    }
}