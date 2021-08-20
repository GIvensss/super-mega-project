<?php

namespace Framework\Router;

return [

    'cabinet' => '/cabinet/index',

    'registration' => '/registration/index',

    'auth/logout' => '/authentication/logout',
    'auth' => '/authentication/index',

    'products/get' => "/products/getProducts",
    'products/([0-9]+)' => '/products/showItem/$1',
    'products' => '/products/showList',

    'api/get/([0-9]+)' => '/api/getProductById/$1',
    'api/get' => '/api/getProducts',

    '' => '/products/index'
];
