<?php
require_once 'functions.php';

$config = getConfiguration();
$dbh = createDatabaseConnection($config['username'], $config['password'], $config['host'], $config['database']);

$nameErr = $generalErr = '';
// Example how to use:

//$result = $sth->fetch(PDO::FETCH_ASSOC);

$sth1 = $dbh->prepare("SELECT * FROM category;");
$sth1->execute();
$categor = $sth1->fetchAll(PDO::FETCH_ASSOC);
//var_dump($categor);

$sth2 = $dbh->prepare("SELECT * FROM products;");
$sth2->execute();
$prod = $sth2->fetchAll(PDO::FETCH_ASSOC);


//var_dump($_GET);
//var_dump($_SERVER['HTTP_REFERER']);

//var_dump($GLOBALS);

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
                        <a href="/product.php?id=<?php echo $item['id']; ?>">
                            <?php echo $item['name']; ?>
                        </a>
                        <hr>
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
