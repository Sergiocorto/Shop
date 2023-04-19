<?php

$routes = [
    'products' => 
    [
        'controller' => 'Controllers\ProductController',
        'model' => 'Models\Product',
        'repository' => 'Repositories\ProductRepository',
        'tableName' => 'products',
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
    'categories' =>
        [
            'controller' => 'Controllers\CategoryController',
            'model' => 'Models\Category',
            'repository' => 'Repositories\CategoryRepository',
            'tableName' => 'categories',
            'actions' =>
                [
                    'page' => [
                        'requestMethod' => 'GET',
                        'method' => 'getCategoriesView'
                    ],
                    'add' => [
                        'requestMethod' => 'POST',
                        'method' => 'addCategory'
                    ],
                    'update' => [
                        'requestMethod' => 'PUT',
                        'method' => 'updateCategory'
                    ],
                    'delete' => [
                        'requestMethod' => 'DELETE',
                        'method' => 'deleteCategory'
                    ],
                ]
        ],
];