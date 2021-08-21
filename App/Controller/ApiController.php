<?php

namespace App\Controller;

use App\Entity\Products;

class ApiController
{
    private Products $products;
    public function __construct()
    {
        $this->products = new Products();
    }
    public function getProducts()
    {
        header("Content-type: application/json");
        echo json_encode($this->products->getProducts());
    }
    public function getProductById($id)
    {
        header("Content-type: application/json");
        $this->products->setId($id[0]);
        echo json_encode($this->products->getProductById());
    }
}
