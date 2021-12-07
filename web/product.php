<?php

require_once 'functions.php';
$config = getConfiguration();
$dbh = createDatabaseConnection($config['username'], $config['password'], $config['host'], $config['database']);


$sth3 = $dbh->prepare('SELECT * FROM products');
$sth3->execute();
$items = $sth3->fetchAll(PDO::FETCH_ASSOC);

$sth5 = $dbh->prepare('SELECT * FROM category');
$sth5->execute();
$cat = $sth5->fetchAll(PDO::FETCH_ASSOC);
//var_dump($cat);
?>
    <h1>Category: <?php
    foreach ($cat as $id) {
    if ($_GET['id'] == $id['id']) {
        echo $id['name'];
    }}?></h1>
<br>

<div class="container">
    <div class="row">
        <?php foreach ($items as $item) { ?>
            <div class="col-lg-4 pet-list-item">
                <?php if($_GET['id'] == $item['categoryId']) { ?>
                <h2>
                        Name of product: <a href="/productdet.php?id=<?php echo $item['id']; ?>">
                        <?php echo $item['name']; ?>
                    </a>
                </h2>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>