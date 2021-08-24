<?php

namespace App\Service;

use App\Entity\Order;
use App\Entity\Products;
use App\Entity\User;
use Framework\Database\Database;

class Ordering
{
    private Order $order;
    private Database $db;

    public function __construct()
    {
        $this->order = new Order();
        $this->db = new Database();
    }

    public function setOrder($order)
    {
        try {
            if (Authentication::isAuth()) {
                $this->order->setUserId(Authentication::getId());
            }
            $this->order->setFirstName($order['user']['firstName']);
            $this->order->setLastName($order['user']['lastName']);
            $this->order->setAddress($order['user']['address']);
            $this->order->setPhone($order['user']['phone']);
            $this->order->setProducts($order['products']);

            $this->db->beginTransaction();
            $this->order->insert();

            $this->order->insertProducts();
            $this->db->commit();
        } catch (\PDOException | \Exception $e) {
            $this->db->rollback();
            throw $e;
        }
    }
}
