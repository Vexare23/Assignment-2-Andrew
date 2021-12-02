<?php
require_once 'functions.php';

$config = getConfiguration();
$dbh = createDatabaseConnection($config['username'], $config['password'], $config['host'], $config['database']);

// Example how to use:

//$result = $sth->fetch(PDO::FETCH_ASSOC);

$sth1 = $dbh->prepare("SELECT * FROM category;");
$sth1->execute();
$categor = $sth1->fetchAll(PDO::FETCH_ASSOC);
//var_dump($categor);

$sth2 = $dbh->prepare("SELECT * FROM products;");
$sth2->execute();
$prod = $sth2->fetchAll(PDO::FETCH_ASSOC);
//var_dump($prod);

?>

<html>
    <head>
        <title>My shop</title>
    </head>
    <body>
    <h1>Welcome!</h1>
    <hr>
    <div class="container">
        <div class="row">
            <?php foreach ($categor as $item) { ?>
                <div class="col-lg-4 pet-list-item">
                    <h2>
                        <a href="/product.php?productId=1234">
                            <?php echo $item['name']; ?>
                        </a>
                        <hr>
                    </h2>
                </div>
            <?php } ?>
        </div>
    </body>
</html>
