<?php

namespace App\Controller;

use Exception;
use Framework\Helpers\Renderer\Renderer;
use App\Entity\Authentication;

class CabinetController
{
    private Renderer $render;
    public function __construct()
    {
        $this->render = new Renderer();
    }

    /**
     * @throws Exception
     */
    public function index()
    {
        if (Authentication::isAuth()) {
            $this->render->render("layout.php", [], "cabinet.php");
        } else {
            header("Location: /auth");
        }
    }
}
