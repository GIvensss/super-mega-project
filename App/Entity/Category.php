<?php

namespace App\Entity;

use Framework\Core\ActiveRecord;
use Framework\Database\Database;

class Category extends ActiveRecord
{
    protected Database $db;
    private int $id;
    private string $name;

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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function insert(): void
    {
        $query = "INSERT INTO category(name) VALUE :name";
        $this->db->query($query, ['name' => $this->name]);
        $this->id = $this->db->lastInsertId();
    }

    public function getAll(): array
    {
        $query = "SELECT * FROM category";
        $statement = $this->db->query($query);
        return $statement->fetchAll();
    }
}
