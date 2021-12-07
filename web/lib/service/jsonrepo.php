<?php

class JSONProductRepository implements ProductRepository
{
    private PDO $dbh;

    public function __construct(PDO $dbh) {
        $this->dbh = $dbh;
    }
    public function findAll(): array {
        $file = file_get_contents('jsonthing.json');
        return json_decode($file, true, JSON_THROW_ON_ERROR);
    }

        public function find($id): OutOfStockProduct /*Product*/ {


        $sth = $this->dbh->prepare("SELECT * FROM products WHERE id = :id LIMIT 1;");
        $some = $id;
        $sth->bindParam(':id', $some);
        $sth->execute();
        $prod = new OutOfStockProduct /*Product*/ ();
        $pls = $sth->fetch(PDO::FETCH_ASSOC);
        $prod->setId($pls['id']);
        $prod->setCategoryId($pls['categoryId']);
        $prod->setName($pls['name']);
        $prod->setPrice($pls['price']);
        return $prod;
    }
}
