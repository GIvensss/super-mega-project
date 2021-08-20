<?php

namespace App\Service;

use Framework\Exceptions\ValidationException;

class UserValidation
{
    /**
     * @throws ValidationException
     */
    public function validateUserData($name, $password): bool
    {
        if (!$this->validateUserName($name)) {
            throw new ValidationException("User name MUST consist of Latin letters and numbers");
        }
        if (!$this->validatePassword($password)) {
            throw new ValidationException("Password MUST consist of Latin letters and numbers");
        }
        return true;
    }

    /**
     * @throws ValidationException
     */
    public function validateNewUserData($name, $email, $password, $confirm): bool
    {
        if (!$this->validateUserName($name)) {
            throw new ValidationException("User name MUST consist of Latin letters and numbers");
        }
        if (!$this->validateEmail($email)) {
            throw new ValidationException("Its not email");
        }
        if (!$this->validatePassword($password)) {
            throw new ValidationException("Password MUST consist of Latin letters and numbers");
        }
        if (!$this->confirmPassword($password, $confirm)) {
            throw new ValidationException("Password mismatch");
        }
        return true;
    }

    private function validateUserName($name): bool
    {
        if (strlen($name) > 15 || strlen($name) < 4) {
            return false;
        }
        return (bool)preg_match('/^[a-zA-Z0-9]+$/', $name);
    }

    private function validatePassword($password): bool
    {
        if (strlen($password) > 100 || strlen($password) < 4) {
            return false;
        }
        return (bool)preg_match('/^[a-zA-Z0-9]+$/', $password);
    }

    private function validateEmail($email): bool
    {
        if (strlen($email) > 254 || strlen($email) < 3) {
            return false;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    private function confirmPassword($password, $confirm): bool
    {
        if ($password !== $confirm) {
            return false;
        }
        return true;
    }
}
