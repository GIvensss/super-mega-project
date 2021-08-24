<?php

namespace App\Service;

use App\Entity\User;
use App\Service\UserValidation;
use Framework\Exceptions\ValidationException;
use Framework\Session\Session;

class Authentication
{
    private Session $session;
    private UserValidation $validation;

    private User $user;

    public function __construct()
    {
        $this->validation = new UserValidation();
        $this->session = new Session();
        $this->user = new User();
    }

    public static function isAuth(): bool
    {
        if (Session::contains("username")) {
            return true;
        }
        return false;
    }

    /**
     * @throws ValidationException
     */
    public function auth(array $params): bool
    {
        $this->user->setUsername(htmlspecialchars($params['username']));
        $this->user->setPassword(md5(md5(htmlspecialchars($params['password']))));
        if ($this->validation->validateUserData($this->user->getUsername(), $this->user->getPassword())) {
            if ($this->user->checkUser()) {
                $this->user->setIdByUsername();
                echo $this->user->getUsername();
                Session::set('username', $this->user->getUsername());
                Session::set('id', $this->user->getId());
                return true;
            } else {
                throw new ValidationException("No user with this username, password was found");
            }
        }
        return false;
    }

    /**
     * @return false|string
     */
    public static function getLogin()
    {
        if (self::isAuth()) {
            return Session::get("username");
        }
        return false;
    }
    public static function getId()
    {
        if (self::isAuth()) {
            return Session::get("id");
        }
        return false;
    }

    public function logout(): void
    {
        $this->session->delete("username");
        $this->session->delete("id");
    }
}
