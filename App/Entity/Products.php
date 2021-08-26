<?php

namespace App\Entity;

use Framework\Core\ActiveRecord;
use Framework\Database\Database;
use PDO;

class Products extends ActiveRecord
{
    protected Database $db;
    private int $id;
    private string $name;
    private float $price;
    private int $categoryId;
    private int $bandId;

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
        return $this->categoryId;
    }

    /**
     * @param int $category_id
     */
    public function setCategoryId(int $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return int
     */
    public function getBandId(): int
    {
        return $this->bandId;
    }

    /**
     * @param int $band_id
     */
    public function setBandId(int $band_id): void
    {
        $this->bandId = $band_id;
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
    public function insert(): void
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
                band.name AS `band` FROM product LEFT JOIN band ON product.band_id = band.id';
        $statement = $this->db->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById(): array
    {
        $query = 'SELECT product.id, product.name, product.price, product.description, product.image_src,
                    band.name AS `band`, category.name AS `category` FROM product 
                    LEFT JOIN band ON product.band_id = band.id
                    LEFT JOIN category ON product.category_id = category.id
                    WHERE product.id = :id';

        $statement = $this->db->query($query, ['id' => $this->id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getProductsByCategory(): array
    {
        $query = 'SELECT product.id, product.name, product.price, product.description, product.image_src
                    FROM product 
                    WHERE product.category_id = :category_id';

        $statement = $this->db->query($query, ['category_id' => $this->categoryId]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductsByBand(): array
    {
        $query = 'SELECT product.id, product.name, product.price, product.description, product.image_src
                    FROM product 
                    WHERE product.band_id = :band_id';

        $statement = $this->db->query($query, ['band_id' => $this->bandId]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPage(int $page, int $itemPerPage): array
    {
        $query = 'SELECT product.id, product.name, product.price, product.description, product.image_src
                    FROM product 
                    LIMIT %d OFFSET %d';

        $statement = $this->db->query(
            sprintf(
                $query,
                $itemPerPage,
                (($page - 1) * $itemPerPage)
            )
        );
        return $statement->fetchAll();
    }

    public function getTotalPages($itemsPerPage): int
    {
        $query = 'SELECT COUNT(*) FROM product';

        $statement = $this->db->query($query, []);
        $result = $statement->fetch();
        return ceil($result[0] / $itemsPerPage);
    }

    public function getAll(): array
    {
        $query = "SELECT * FROM product";
        $statement = $this->db->query($query);
        return $statement->fetchAll();
    }
}
