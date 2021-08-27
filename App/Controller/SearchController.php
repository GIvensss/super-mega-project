<?php

namespace App\Controller;

use App\Service\Searching;
use Framework\Helpers\Renderer\Renderer;

class SearchController
{
    private Renderer $render;
    private Searching $searching;

    public function __construct()
    {
        $this->render = new Renderer();
        $this->searching = new Searching();
    }

    public function index($param)
    {
        try {
            $productsList = $this->searching->search($param);
            $this->render->render('layout.php', $productsList, 'products.php');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
