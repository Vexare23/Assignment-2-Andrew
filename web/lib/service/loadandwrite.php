<?php

interface ProductRepository
{
    public function findAll(): array;
    public function find($id): OutOfStockProduct /*Product*/ ;

}
