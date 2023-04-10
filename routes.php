<?php

$routes = [
    'products' => 
    [
        'controller' => 'Controllers\ProductController',
        'model' => 'Models\Product',
        'repository' => 'Repositories\ProductRepository',
        'actions' =>
        [
            'page' => [
                       'requestMethod' => 'GET',
                       'method' => 'getProductsView'
                       ],
            'add' => [
                       'requestMethod' => 'POST',
                       'method' => 'addProduct'
            			],
            'update' => [
                       'requestMethod' => 'PUT',
                       'method' => 'updateProduct'
            			],
            'delete' => [
                       'requestMethod' => 'DELETE',
                       'method' => 'deleteProduct'
            			],
        ]
    ],
];