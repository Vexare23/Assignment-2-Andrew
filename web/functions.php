<?php

function getConfiguration(): array {
    return json_decode(file_get_contents(__DIR__.'/../credentials.json'), true);
}

function createDatabaseConnection(string $username, string $password, string $host, string $database): PDO {
    return new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
}