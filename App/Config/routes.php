<?php

namespace Framework\Router;

return [

    'cabinet' => '/cabinet/index',

    'auth/authenticate' => '/authentication/auth',
    'auth/logout' => '/authentication/logout',
    'auth' => '/authentication/index',

    'products/([a-z]+)/([0-9]+)' => '/product/showItem/$1/$2',
    'products/([0-9]+)' => '/products/showItem/$1',
    'products' => '/products/showList',

    '' => '/products/showList'
];
