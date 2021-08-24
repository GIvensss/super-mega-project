<?php

namespace App\Entity;

use Framework\Database\Database;

class User
{
    private Database $db;

    public int $id;
    public string $username;
    public string $email;
    public string $password;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function insert()
    {
        $query = "INSERT INTO user(username, email, password) VALUES(:username, :email, :password)";
        $statement = $this->db->query(
            $query,
            [
                'username' => $this->username,
                'email' => $this->email,
                'password' => $this->password
            ]
        );
        $this->id = $this->db->lastInsertId();
    }
    public function update()
    {
        $query = "UPDATE user SET username = :username, email = :email, password = :password WHERE id = :id";
        $statement = $this->db->query(
            $query,
            [
                'username' => $this->username,
                'email' => $this->email,
                'password' => $this->password
            ]
        );
    }
    public function getUserById()
    {
        $query = "SELECT username, email, password FROM user WHERE id = :id";
        $statement = $this->db->query(
            $query,
            [
                'id' => $this->id
            ]
        );
        return $statement->fetchAll();
    }
    public function getUserByUsername()
    {
        $query = "SELECT username, email, password FROM user WHERE username = :username";
        $statement = $this->db->query(
            $query,
            [
                'username' => $this->username
            ]
        );
        return $statement->fetch();
    }
    public function setIdByUsername()
    {
        $query = "SELECT id FROM user WHERE username = :username";
        $statement = $this->db->query(
            $query,
            [
                'username' => $this->username
            ]
        );
        $result = $statement->fetch();
        $this->id = $result['id'];
    }
    public function getUserByEmail()
    {
        $query = "SELECT username, email, password FROM user WHERE email = :email";
        $statement = $this->db->query($query, ['email' => $this->email]);
        return $statement->fetch();
    }
    public function checkUser()
    {
        $query = "SELECT username, password FROM user WHERE username = :username AND password = :password";
        $statement = $this->db->query(
            $query,
            ['username' => $this->username, 'password' => $this->password]
        );
        return $statement->fetch();
    }
}
