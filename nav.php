<?php 

include('database.php');

$sql = "SELECT * FROM windows ORDER BY ID ASC";
foreach ($dbh->query($sql) as $row)
{
	$title = $row['title'];
	$name = $row['name'];

	echo "<div align='left' style='border:0; padding: 5px; width:100%; vertical-align: middle;' id='btndiv".$name."'><button class='button' id='btn".$name."' onclick='togglewindow(\"".$name."\")'>".$title."</button><br></div>";

}

?>