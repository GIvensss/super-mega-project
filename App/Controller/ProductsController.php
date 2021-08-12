<?php

namespace App\Controller;

use Framework\Helpers\Renderer\Renderer;
use App\Entity\Products;

class ProductsController
{
    private Renderer $render;
    private Products $products;
    private array $productsList;

    public function __construct()
    {
        $this->render = new Renderer();
        $this->products = new Products();
    }

    public function showList()
    {
        try {
            $this->productsList = $this->products->getProducts();
            $this->render->render("layout.php", $this->productsList, "products.php");
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function showItem($id)
    {
        try {
            $productItem = $this->products->getProductById($id[0]);
            $this->render->render("layout.php", $productItem, "about.php");
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
