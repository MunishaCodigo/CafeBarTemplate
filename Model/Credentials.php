<?php
/*** mysql hostname ***/
$hostname = "localhost";

/*** mysql username ***/
$username = 'root';

/*** mysql password ***/
$password = '';

try {
    $pdo = new PDO("mysql:host=$hostname;dbname=coffeedb","root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    /*** echo a message saying we have connected ***/
    //echo 'Connected to database';
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    exit();
    }
?>
