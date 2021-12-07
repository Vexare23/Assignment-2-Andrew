<?php

require_once 'functions.php';

require_once __DIR__ . '/lib/classes/categor.php';
require_once __DIR__ . '/lib/classes/prod.php';
require_once __DIR__ . '/lib/classes/outstock.php';
require_once __DIR__ . '/lib/service/loadandwrite.php';
require_once __DIR__ . '/lib/service/mySQLrepo.php';
require_once __DIR__ . '/lib/service/jsonrepo.php';
require_once __DIR__ . '/lib/service/controller.php';
require_once __DIR__ . '/lib/service/viewer.php';



$config = getConfiguration();
$dbh = createDatabaseConnection($config['username'], $config['password'], $config['host'], $config['database']);

$nameErr = $generalErr = '';

$productRepository = new MySQLProductRepository($dbh);
//$productRepository = new JSONProductRepository($dbh);
$renderer = new ProductDetailViewRenderer();
$productController = new ProductController($productRepository, $renderer);
//die();
$sth1 = $dbh->prepare("SELECT * FROM category;");
$sth1->execute();
$categor = $sth1->fetchAll(PDO::FETCH_ASSOC);

$products = $productRepository->findAll();

if ($_SERVER["REQUEST_METHOD"] == "GET" && $_GET) {
    if ($_GET['redirect'] == 2) {
        $nameErr = "Cannot search for nothing";
    } else {
        $nameErr = "";
    }
    if ($_GET['redirect'] == 1) {
        $generalErr = "Product is not available in our database.";
    } else {
        $generalErr = '';

    }
}
?>

<html lang="">
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
                        <a href="/product.php?id=<?php echo $item['id'];
                        /* echo $item->getid(); */?>">
                            <?php echo $item['name'];
                            /* echo $item->getname(); */?>
                        </a>
                    </h2>
                </div>
            <?php } ?>
        </div>
        Search for a specific item <br>
        <form action="/search.php" method="GET">
            <div class="form-group">
                <label for="name" class="control-label">Name:</label>
                <input type="text" name="name" id="name" class="form-control" />
                <span class="error">* <?php echo $nameErr;?></span>
                <br><br>
            <button type="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-heart"></span>
                Search
            </button>
            <?php
            echo $generalErr;
            ?>
        </form>
    </body>
</html>


<?php foreach ($products as $product) {
//var_dump($product);
$html = $productController->viewProductAction($product['id']);
echo $html;
}