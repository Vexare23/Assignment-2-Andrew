<?php
declare(strict_types=1);
namespace App;

use App\Exception\ConnectionException;
use App\Exception\ProductNotFoundException;

class MySQLProductRepository implements ProductRepository
{

    private \PDO $dbh;

    public function __construct(\PDO $dbh) {
        $this->dbh = $dbh;
    }

    public function findAll(): array {


        $config = getConfiguration();
        $dbh = createDatabaseConnection($config['username'], $config['password'], $config['host'], $config['database']);


        $sth3 = $dbh->prepare('SELECT * FROM products');
        $sth3->execute();
        return $sth3->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function find($id): Product {
        try {
            $sth = $this->dbh->prepare("SELECT * FROM products WHERE id = :id LIMIT 1;");
            $some = $id;
            $sth->bindParam(':id', $some);
            $sth->execute();

            $prod = new /*OutOfStockProduct*/ Product ();
        $pls = $sth->fetch(\PDO::FETCH_ASSOC);

            if (! $prod = $sth->fetch()) {
                throw new ProductNotFoundException();
            }

            $prod->setId($pls['id']);
        $prod->setCategoryId($pls['categoryId']);
        $prod->setName($pls['name']);
        $prod->setPrice($pls['price']);

        return $prod;
            // Put your existing code here
        } catch (\PDOException $e) {
            // We catch any exception here, and wrap it with our own. We need to `use` th
            throw new ConnectionException($e);
        }
    }
    /*
    public function find($id): OutOfStockProduct /*Product/ {


        $sth = $this->dbh->prepare("SELECT * FROM products WHERE id = :id LIMIT 1;");
        $some = $id;
        $sth->bindParam(':id', $some);
        $sth->execute();

        $prod = new OutOfStockProduct /*Product/ ();
        $pls = $sth->fetch(PDO::FETCH_ASSOC);

        $prod->setId($pls['id']);
        $prod->setCategoryId($pls['categoryId']);
        $prod->setName($pls['name']);
        $prod->setPrice($pls['price']);

        return $prod;
    }
    */
}
