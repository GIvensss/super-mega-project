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
        echo json_encode($this->searching->search($param));
    }
}
