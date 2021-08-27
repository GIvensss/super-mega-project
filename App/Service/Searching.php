<?php

namespace App\Service;

use App\Entity\Products;

class Searching
{
    private Products $products;

    public function __construct()
    {
        $this->products = new Products();
    }

    public function search($match): array
    {
        $match = $match['q'];
        $match = trim($match);
        $match = htmlspecialchars($match);
        return $this->products->getProductByMatch($match);
    }
}
