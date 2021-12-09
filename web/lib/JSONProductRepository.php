<?php
declare(strict_types=1);
namespace App;

class JSONProductRepository implements ProductRepository
{
    public function findAll(): array
    {
        $file = file_get_contents('jsonthing.json');
        return json_decode($file, true, JSON_THROW_ON_ERROR);
    }

    public function find($id): /*OutOfStockProduct*/ Product
    {
        $prod = new /*OutOfStockProduct*/ Product ();
        $pls = $this->findAll();
        //var_dump($pls[$id-1]);die();
        $prod->setId($pls[$id-1]['id']);
        $prod->setCategoryId($pls[$id-1]['categoryId']);
        $prod->setName($pls[$id-1]['name']);
        $prod->setPrice($pls[$id-1]['price']);
        return $prod;
    }
}
