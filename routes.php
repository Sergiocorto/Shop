<?php

$routes = [
    'products' => 
    [
        'controller' => 'Controllers\ProductController',
        'model' => 'Models\Product',
        'repository' => 'Repositories\ProductRepository',
        'actions' =>
        [
            'page' => 'getProductsView',
            'add' => 'addProduct',
            'update' => 'updateProduct',
            'delete' => 'deleteProduct'
        ]
    ],
];