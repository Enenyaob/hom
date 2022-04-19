<?php 
$dbhost = 'localhost';
$dbname = 'dbhom';
$dbuser = 'root';
$dbpass = '';


$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(mysqli_connect_errno()){
	die("Database connection failed: ".
		mysqli_connect_error() .
		"(" . mysqli_connect_errno() . ")"
	);
}

?>