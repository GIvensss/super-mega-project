<?php

namespace App\Entity;

use Framework\Database\Database;
use PDO;

class Products
{
    protected Database $db;
    private int $id;
    private string $name;
    private float $price;
    private int $category_id;
    private int $band_id;

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

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    /**
     * @param int $category_id
     */
    public function setCategoryId(int $category_id): void
    {
        $this->category_id = $category_id;
    }

    /**
     * @return int
     */
    public function getBandId(): int
    {
        return $this->band_id;
    }

    /**
     * @param int $band_id
     */
    public function setBandId(int $band_id): void
    {
        $this->band_id = $band_id;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    private string $description;


    public function __construct()
    {
        $this->db = Database::getInstance();
    }
    public function insert()
    {
        $query = 'INSERT INTO product(name, price, band_id, category_id, description) 
                VALUES (:name, :price, :band_id, :category_id, :description)';
        $statement = $this->db->query(
            $query,
            [
                'name' => $this->name,
                'price' => $this->price,
                'band_id' => $this->band_id,
                'category_id' => $this->category_id,
                'description' => $this->description
            ]
        );
    }

    public function getProducts(): array
    {
        $query = 'SELECT product.id, product.name, product.price, product.description, product.image_src,
                band.name AS `band` FROM product LEFT JOIN band ON product.band_id = band.id;';
        $statement = $this->db->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductById()
    {
        $query = 'SELECT product.id, product.name, product.price, product.description, product.image_src,
                    band.name AS `band`, category.name AS `category` FROM product 
                    LEFT JOIN band ON product.band_id = band.id
                    LEFT JOIN category ON product.category_id = category.id
                    WHERE product.id = :id';

        $statement = $this->db->query($query, ['id' => $this->id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}
