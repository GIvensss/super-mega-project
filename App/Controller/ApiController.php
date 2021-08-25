<?php

namespace App\Controller;

use App\Entity\Products;
use App\Service\Ordering;

class ApiController
{
    private Products $products;
    private Ordering $ordering;

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

    public function getPage($page)
    {
        echo json_encode($this->products->getPage($page[0], 3));
    }

    public function getTotalPages()
    {
        echo json_encode($this->products->getTotalPages(3));
    }

    public function postOrder($order)
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            header("Content-Type: application/json");
            $this->ordering = new Ordering();
            $this->ordering->setOrder($order);
            echo json_encode("ok");
        } else {
            echo "ТЫ куда лезиешь????????????";
        }
    }
}
