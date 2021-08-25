<?php

namespace Framework\Router;

return [

    'cabinet/orders' => '/cabinet/showOrders',
    'cabinet' => '/cabinet/index',

    'cart' => '/cart/index',

    'registration' => '/registration/index',

    'auth/logout' => '/authentication/logout',
    'auth' => '/authentication/index',

    'products/page/([0-9]+)' => '/products/page/$1',
    'products/([0-9]+)' => '/products/showItem/$1',

    'api/get/page/([0-9]+)' => '/api/getPage/$1',
    'api/get/total-page' => '/api/getTotalPages/',
    'api/get/([0-9]+)' => '/api/getProductById/$1',
    'api/get' => '/api/getProducts',
    'api/post-order' => '/api/postOrder',

    '' => '/products/index'
];
