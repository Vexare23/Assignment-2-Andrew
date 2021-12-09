<?php

declare(strict_types=1);

namespace App;

class OutOfStockProduct extends Product
{
    public function getPrice(): string
    {
        return 'Out of stock';
    }
}
