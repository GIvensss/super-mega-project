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
    public function page($page)
    {
        try {
            $productsList = $this->products->getPage($page[0], 3);
            $this->render->render("layout.php", $productsList, "products.php");
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    public function showItem($id)
    {
        try {
            $productId = $id[0];
            $this->products->setId($productId);
            $productItem = $this->products->getProductById();
            $this->render->render("layout.php", $productId, "about.php");
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    public function category($id)
    {
        try {
            $categoryId = $id[0];
            $this->products->setCategoryId($categoryId);
            $productsList = $this->products->getProductsByCategory();
            $this->render->render("layout.php", $productsList, "products.php");
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    public function band($id)
    {
        try {
            $bandId = $id[0];
            $this->products->setBandId($bandId);
            $productsList = $this->products->getProductsByBand();
            $this->render->render("layout.php", $productsList, "products.php");
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
