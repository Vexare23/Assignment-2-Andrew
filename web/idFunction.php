<?php

function getProd($id) {

    $config = getConfiguration();
    $dbh = createDatabaseConnection($config['username'], $config['password'], $config['host'], $config['database']);

    $query = ('SELECT * FROM category WHERE id ='.$id);
}