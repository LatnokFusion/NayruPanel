<?php
/*** mysql hostname ***/
$hostname = 'localhost';

/*** mysql username ***/
$username = '';

/*** mysql password ***/
$password = '';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=userpanel", $username, $password);
    /*** echo a message saying we have connected ***/
    //echo 'Connected to database';
    }
catch(PDOException $e)
    {
    //echo $e->getMessage();
    }
?>
