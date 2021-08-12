<?php

namespace App\Entity;

class Products
{
    private array $products;

    public function __construct()
    {
        $this->products = include('/home/givensss/super-mega-store/App/ProductBase/productBase.php');
    }
    public function getProducts()
    {
        return $this->products;
    }
    public function getProductById($id)
    {
        foreach ($this->products as $product) {
            if ($product['id'] == $id) {
                return $product;
            }
        }
    }
}
