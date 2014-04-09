<?php

/*** mysql hostname ***/
$hostname = 'localhost';

/*** mysql username ***/
$username = '';

/*** mysql password ***/
$password = '';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=adminpanel", $username, $password);
    /*** echo a message saying we have connected ***/
    //echo 'Connected to database';
    }
catch(PDOException $e)
    {
    //echo $e->getMessage();
    }

if ( isset($_POST['mode']) ) {
$mode = $_POST['mode'];
$user = $_POST['username'];
$col = $_POST['col'];
$value = $_POST['value'];

$sql = "SELECT * FROM wallpapers ORDER BY ID ASC";

}
?>
