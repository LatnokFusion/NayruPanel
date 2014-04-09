<?php
session_start();
$errmsg_arr = array();
$errflag = false;
// configuration
$dbhost 	= "localhost";
$dbname		= "userpanel";
$dbuser		= "";
$dbpass		= "";
 
// database connection
$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
 
// new data
 
$user = $_POST['username'];
$password = $_POST['password'];

//echo $user.$password;

// query
$result = $conn->prepare("SELECT * FROM users WHERE username= :hjhjhjh AND password= :asas");
$result->bindParam(':hjhjhjh', $user);
$result->bindParam(':asas', $password);
$result->execute();
$rows = $result->fetch(PDO::FETCH_NUM);
if($rows > 0) {
//header("location: index.php");
echo "0";
} else { echo "1"; }
if($errflag) {
	//$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
	//header("location: login.php");
	echo "2";
	session_write_close();
	exit();
}
 
?>
