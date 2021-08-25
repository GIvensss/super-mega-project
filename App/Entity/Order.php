<?php

namespace App\Entity;

use Framework\Database\Database;
use PDO;

class Order
{
    private Database $db;

    private int $id;
    private ?int $userId = null;
    private string $firstName;
    private string $lastName;
    private string $address;
    private string $phone;
    private array $products;



    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
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

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param array $products
     */
    public function setProducts(array $products): void
    {
        $this->products = $products;
    }

    public function insert()
    {
        $query = "INSERT INTO `order`(user_id, first_name, last_name, address, phone)
                VALUES(:user_id, :first_name, :last_name, :address, :phone)";

        $this->db->query(
            $query,
            [
                'user_id' => $this->userId,
                'first_name' => $this->firstName,
                'last_name' => $this->lastName,
                'address' => $this->address,
                'phone' => $this->phone
            ]
        );
        $this->id = $this->db->lastInsertId();
    }

    public function insertProducts()
    {
        foreach ($this->products as $product) {
            $query = "INSERT INTO order_product(order_id, product_id, product_amount)
                VALUES(:order_id, :product_id, :product_amount)";
            $this->db->query(
                $query,
                [
                    'order_id' => $this->id,
                    'product_id' => $product['id'],
                    'product_amount' => $product['amount']
                ]
            );
        }
    }

    public function getOrdersByUserId()
    {
        $query = "SELECT  
                    order_product.order_id as 'order_id',
                    SUM(order_product.product_amount) as `total_products`,
                    SUM(order_product.product_amount * product.price) as `total_price`
                    FROM `order_product` 
                    INNER JOIN product ON product.id = order_product.product_id
                    INNER JOIN `order` ON order_product.order_id = `order`.id
                    WHERE `order`.user_id = :user_id
                    GROUP BY `order_product`.order_id";
        $statement = $this->db->query($query, ['user_id' => $this->userId]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
