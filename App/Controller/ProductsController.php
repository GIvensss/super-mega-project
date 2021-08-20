<?php

namespace App\Controller;

use Framework\Helpers\Renderer\Renderer;
use App\Entity\Products;

class ProductsController
{
    private Renderer $render;
    private Products $products;

    public function __construct()
    {
        $this->render = new Renderer();
        $this->products = new Products();
    }

    public function index()
    {
        try {
            $productsList = $this->products->getProducts();
            $this->render->render("layout.php", $productsList, "home.php");
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    public function showList()
    {
        try {
            $productsList = $this->products->getProducts();
            $this->render->render("layout.php", $productsList, "products.php");
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    public function showItem($id)
    {
        try {
            $this->products->setId($id[0]);
            $productItem = $this->products->getProductById();
            $this->render->render("layout.php", $productItem, "about.php");
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
