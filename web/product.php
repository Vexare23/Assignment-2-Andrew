<?php

require_once 'functions.php';
require 'idFunction.php';
$config = getConfiguration();
$dbh = createDatabaseConnection($config['username'], $config['password'], $config['host'], $config['database']);

$ic = $_GET;
var_dump($_GET);//die();= .$ic

$sth3 = $dbh->prepare("SELECT * FROM products;");
$sth3->execute();
$items = $sth3->fetchAll(PDO::FETCH_ASSOC);
//$result = $sth3->fetch(PDO::FETCH_ASSOC);
//var_dump($items);die()
?>

<h1>It works!</h1>
<div class="container">
    <div class="row">
        <?php foreach ($items as $item) { ?>
            <div class="col-lg-4 pet-list-item">
                <h2>
                        Name of product: <?php echo $item['name'] ?> <br> Price in euro: <?php echo $item['price']; ?>
                    <hr>
                </h2>
            </div>
        <?php } ?>
    </div>
</div>