<?php
require_once 'functions.php';

$config = getConfiguration();
$dbh = createDatabaseConnection($config['username'], $config['password'], $config['host'], $config['database']);

// Example how to use:
//$sth = $dbh->prepare("SELECT name, colour FROM fruit");
//$sth->execute();
//$result = $sth->fetch(PDO::FETCH_ASSOC);

?>
<html>
    <head>
        <title>My shop</title>
    </head>
    <body>
        <h1>Welcome!</h1>
    </body>
</html>
