<?php

namespace Controllers;

use Interfaces\ProductInterface;

class ProductController
{

    private $product;

    public function __construct(ProductInterface $product)
    {
        $this->product = $product;
    }

    public function getProductsView()
    {
        $this->product->getProducts();
    }

    public function addProduct($product)
    {
        $this->product->addProduct($product);
    }

    public function updateProduct($product)
    {
        if($this->product->updateProduct($product));
    }

    public function deleteProduct($param)
    {
        $this->product ->deleteProduct($param['id']);
    }
}