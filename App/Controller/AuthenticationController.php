<?php

namespace App\Controller;

use App\Service\UserValidation;
use Framework\Exceptions\ValidationException;
use Framework\Helpers\Renderer\Renderer;
use App\Entity\Authentication;

class AuthenticationController
{
    private Renderer $render;
    private Authentication $authentication;
    private UserValidation $validation;

    public function __construct()
    {
        $this->render = new Renderer();
        $this->authentication = new Authentication();
        $this->validation = new UserValidation();
    }

    public function index(array $params)
    {
        try {
            $errors = [];
            if (!empty($_POST)) {
                $login = htmlspecialchars($params['login']);
                $password = htmlspecialchars($params['password']);

                if ($this->authentication->auth($login, $password)) {
                    header("Location: /cabinet");
                } else {
                    $errors[] = "Incorrect username or password";
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
