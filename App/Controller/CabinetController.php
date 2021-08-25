<?php

namespace App\Controller;

use App\Entity\Order;
use Exception;
use Framework\Helpers\Renderer\Renderer;
use App\Service\Authentication;

class CabinetController
{
    private Renderer $render;
    private Order $order;
    public function __construct()
    {
        $this->render = new Renderer();
        $this->order = new Order();
    }

    /**
     * @throws Exception
     */
    public function index()
    {
        if (Authentication::isAuth()) {
            $this->render->render("layout.php", [], "cabinet.php");
        } else {
            header("Location: /auth");
        }
    }

    public function getOrders()
    {
        if (Authentication::isAuth()) {
            $this->order->setUserId(Authentication::getId());
            $param = $this->order->getOrdersByUserId();
            $this->render->render("layout.php", $param, "cabinet.php");
        }
    }
}
