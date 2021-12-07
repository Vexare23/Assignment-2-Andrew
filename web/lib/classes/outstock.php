<?php

class OutOfStockProduct extends Product
{
    public function getPrice(): string
    {
        return 'Out of stock';
    }
}
