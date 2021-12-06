<?php

require_once 'functions.php';
$config = getConfiguration();
$dbh = createDatabaseConnection($config['username'], $config['password'], $config['host'], $config['database']);

$sth4 = $dbh->prepare("SELECT * FROM products WHERE id = :id;");
$id = (int)$_GET['id'];
$sth4->bindParam(':id', $id);
$sth4->execute();
$items = $sth4->fetchAll(PDO::FETCH_ASSOC);
//var_dump($items);die()
?>
<h1>It works!!! =D</h1>

<div class="container">
    <div class="row">
        <?php foreach ($items as $item) { ?>
            <div class="col-lg-4 pet-list-item">
                <?php if($_GET['id'] == $item['id']) { ?>
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