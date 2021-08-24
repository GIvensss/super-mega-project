<?php

namespace App\Controller;

use Framework\Helpers\Renderer\Renderer;

class CartController
{
    private Renderer $render;
    public function __construct()
    {
        $this->render = new Renderer();
    }
    public function index()
    {
        $this->render->render("layout.php", [], "cart.php");
    }
}
