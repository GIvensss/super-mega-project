<?php

namespace App\Entity;

use App\Service\UserValidation;
use Framework\Exceptions\ValidationException;
use Framework\Session\Session;

class Authentication
{
    private Session $session;
    private UserValidation $validation;

    private int $id;
    private string $username;
    private string $password;

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
    public function auth(array $params): bool
    {
        try {
            $query = "SELECT username, password FROM user WHERE username = :username AND password = :password";
            $this->username = htmlspecialchars($params['username']);
            $this->password = htmlspecialchars($params['password']);


            if ($this->validation->validateUserData($username, $password)) {
                if ($login === $this->login && $password === $this->password) {
                    Session::set('login', $this->login);
                    return true;
                }
            }
            return false;
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
