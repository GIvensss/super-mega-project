<?php

namespace App\Entity;

use App\Service\UserValidation;
use Framework\Exceptions\ValidationException;
use Framework\Session\Session;

class Authentication
{
    private string $login = "admin";
    private int $id = 1;
    private string $password = "admin";
    private Session $session;
    private UserValidation $validation;

    public function __construct()
    {
        $this->validation = new UserValidation();
        $this->session = new Session();
    }

    public static function isAuth(): bool
    {
        if (Session::contains("login")) {
            return true;
        }
        return false;
    }

    /**
     * @throws ValidationException
     */
    public function auth($login, $password): bool
    {
        try {
            if ($this->validation->validateUserData($login, $password)) {
                if ($login === $this->login && $password === $this->password) {
                    Session::set('login', $this->login);
                    return true;
                } else {
                    return false;
                }
            }
        } catch (ValidationException | \InvalidArgumentException $e) {
            throw $e;
        }
    }

    /**
     * @return false|string
     */
    public static function getLogin()
    {
        if (self::isAuth()) {
            return Session::get("login");
        }
        return false;
    }

    public function logout(): void
    {
        $this->session->delete("login");
    }
}
