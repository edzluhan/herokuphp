<?php

require_once('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$connection = getenv('CONNECTION');
$database = getenv('DATABASE');
$connectionString = "mysql:host={$connection};dbname={$database}";
$username = getenv('USERNAME');
$password = getenv('PASSWORD');

$pdo = new PDO($connectionString, $username, $password); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES,false);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

foreach($pdo->query('SELECT * FROM my_test_table') as $row) {
    print_r($row);
}
