<?php

require_once('databaseControl.php');

$host = '127.0.0.1:3307';
$dbname = 'Info';
$username = 'root';
$password = '';
$charset = 'utf8mb4';
$collate = 'utf8mb4_unicode_ci';
$dsn = "mysql:host=$host; dbname=$dbname; charset =$charset";

$options =[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_PERSISTENT => FALSE,
    PDO::ATTR_EMULATE_PREPARES => TRUE,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES $charset COLLATE $collate"
];

$cPdo = new PDO("mysql:host=$host; charset =$charset", $username, $password, $options);

if(createDatabase($cPdo, $dbname) === true){
    $pdo = new PDO($dsn, $username, $password, $options);
}