<?php

namespace App\Service;

use App\Service\UserValidation;
use App\Entity\User;
use Framework\Database\Database;
use Framework\Exceptions\ValidationException;
use Framework\Session\Session;

class Registration
{
    private UserValidation $validation;
    private Database $db;
    private User $user;

    public function __construct()
    {
        $this->validation = new UserValidation();
        $this->session = new Session();
        $this->db = new Database();
        $this->user = new User();
    }

    /**
     * @param array $params
     * @return bool
     * @throws ValidationException
     */
    public function register(array $params): bool
    {
        $this->user->setUsername(htmlspecialchars($params['username']));
        $this->user->setEmail(htmlspecialchars($params['email']));
        $this->user->setPassword(md5(md5(htmlspecialchars($params['password']))));
        $confirm = md5(md5(htmlspecialchars($params['confirm'])));
        if (
                $this->validation->validateNewUserData(
                    $this->user->getUsername(),
                    $this->user->getEmail(),
                    $this->user->getPassword(),
                    $confirm
                )
        ) {
            if ($this->isExistUsername() || $this->isExistEmail()) {
                throw new ValidationException("Entered username/email already exists");
            } else {
                $this->user->insert();
                return true;
            }
        }
        return false;
    }
    public function isExistUsername(): bool
    {
        return (bool)$this->user->getUserByUsername();
    }
    public function isExistEmail(): bool
    {
        return (bool)$this->user->getUserByEmail();
    }
}
