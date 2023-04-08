<?php

namespace Interfaces;


interface ProductInterface
{
    public function getProducts();

    public function addProduct($product);

    public function updateProduct($product);

    public function deleteProduct($productId);
}