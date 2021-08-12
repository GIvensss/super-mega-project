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
}
