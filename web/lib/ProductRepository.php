<?php

declare(strict_types=1);

namespace App;

interface ProductRepository
{
    public function findAll(): array;
    public function find($id): /*OutOfStockProduct*/ Product ;

}
