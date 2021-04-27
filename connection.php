<?php
    $db_driver="mysql"; 
    $host = "localhost"; 
    $database = "iteh2lb1var4";
    $dsn = "$db_driver:host=$host; dbname=$database";
    $username = "root"; 
    $password = "root";
    $options = array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    try {
    $dbh = new PDO ($dsn, $username, $password, $options);
    }
    catch (PDOException $e) {

    }
?>