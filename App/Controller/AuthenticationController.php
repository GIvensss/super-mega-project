<?php

namespace App\Controller;

use Framework\Exceptions\ValidationException;
use Framework\Helpers\Renderer\Renderer;
use App\Service\Authentication;

class AuthenticationController
{
    private Renderer $render;
    private Authentication $authentication;

    public function __construct()
    {
        $this->render = new Renderer();
        $this->authentication = new Authentication();
    }

    public function index(array $params)
    {
        try {
            $errors = [];
            if (!empty($_POST)) {
                if ($this->authentication->auth($params)) {
                    header("Location: /cabinet");
                }
            }
            $this->render->render("layout.php", $errors, "auth.php");
        } catch (ValidationException $e) {
            $errors[] = $e->getMessage();
            $this->render->render("layout.php", $errors, "auth.php");
        }
    }

    public function logout()
    {
        $this->authentication->logout();
        header("Location: /products");
    }
}
