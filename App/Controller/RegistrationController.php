<?php

namespace App\Controller;

use App\Service\UserValidation;
use App\Service\Registration;
use Framework\Exceptions\ValidationException;
use Framework\Helpers\Renderer\Renderer;

class RegistrationController
{
    private Renderer $render;
    private Registration $registration;

    public function __construct()
    {
        $this->render = new Renderer();
        $this->registration = new Registration();
    }

    public function index(array $params)
    {
        try {
            $errors = [];
            if (!empty($_POST)) {
                if ($this->registration->register($params)) {
                    header("Location: /auth");
                }
            }
            $this->render->render("layout.php", [], "register.php");
        } catch (ValidationException | \PDOException $e) {
            $errors[] = $e->getMessage();
            $this->render->render("layout.php", $errors, "register.php");
        }
    }
}