<?php

namespace App\Controller;

use App\Entity\Band;
use App\Entity\Category;
use App\Entity\Products;
use App\Service\Ordering;

class ApiController
{
    private Products $products;
    private Category $category;
    private Band $band;

    public function __construct()
    {
        $this->products = new Products();
        $this->category = new Category();
        $this->band = new Band();
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
            $ordering = new Ordering();
            $ordering->setOrder($order);
            echo json_encode("ok");
        } else {
            echo "ТЫ куда лезиешь????????????";
        }
    }

    public function getCategories()
    {
        echo json_encode($this->category->getAll());
    }

    public function getBands()
    {
        echo json_encode($this->band->getAll());
    }
}
