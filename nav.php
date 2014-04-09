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

$sql = "SELECT * FROM windows ORDER BY ID ASC";

//$dir    = '/var/www/org/silverelitez/lexic/admin/';
//$sql = scandir($dir);
//$files2 = scandir($dir, 1);

//print_r($files1);
//print_r($files2);

foreach ($dbh->query($sql) as $row)
{
	$title = $row['title'];
	$name = $row['name'];

	echo "<div align='left' style='border:0; padding: 5px; width:100%; vertical-align: middle;' id='btndiv".$name."'><button class='button' id='btn".$name."' onclick='togglewindow(\"".$name."\")'>".$title."</button><br></div>";
	
	// echo "<div align='left' style='border:0; padding: 5px; width:100%; vertical-align: middle;' id='btndiv".$name."'><button class='button' id='btn".$name."' onclick='togglewindow(\"".$name."\")'>".$title."</button><br></div>";

}

?>
