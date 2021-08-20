<?php

namespace App\Entity;

use Framework\Database\Database;

class Order
{
    private Database $db;

    private int $id;
    private int $userId;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect();
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
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function insert()
    {
        $query = "INSERT INTO `order`(user_id) VALUES(:user_id)";

        $this->db->query($query, ['user_id' => $this->userId]);
        $this->id = $this->db->lastInsertId();
    }
    public function insertProduct($productId)
    {
        $query = "INSERT INTO order_product(order_id, product_id) VALUES(:order_id, :product_id)";
        $this->db->query($query, ['order_id' => $this->id, 'product_id' => $productId]);
    }
}
