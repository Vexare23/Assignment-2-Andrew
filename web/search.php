<?php

declare(strict_types=1);

require 'vendor/autoload.php';

require_once 'functions.php';

$config = getConfiguration();
$dbh = createDatabaseConnection($config['username'], $config['password'], $config['host'], $config['database']);

//var_dump($_GET);//die();
$sth4 = $dbh->prepare("SELECT * FROM products WHERE name LIKE :term");
$str = '%' . $_GET['name'] . '%';
$sth4->bindParam(':term', $str);
$items = $sth4->execute();
$items = $sth4->fetchAll(PDO::FETCH_ASSOC);

$verify = 0;
foreach ($items as $search) {
    if ($_GET['name'] == $search['name']){
        $verify = 1;
    }
}
if ($verify == 0) {
    if ($_GET['name'] == '') {
        header('Location: /index.php?redirect=2');
    } else {
        header('Location: /index.php?redirect=1');
    }
    die();
}
//var_dump($items);die()
?>
<h1>It works!!! =D</h1>

<div class="container">
    <div class="row">
        <?php foreach ($items as $item) {
            //var_dump($item);
            //var_dump($_GET);?>
            <div class="col-lg-4 pet-list-item">
                <?php if($_GET['name'] == $item['name']) { ?>
                    <h2>

                        Name of product:<?php echo $item['name']; ?> <br>
                        Price in euro: <?php echo $item['price']; ?>
                        <hr>
                    </h2>
                <?php } ?>

            </div>
        <?php } ?>
    </div>
</div>