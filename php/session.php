<?php 
session_start();
if(!isset($_SESSION['MM_Username']) || $_SESSION['MM_Username'] == "" ){
	header("Location:portal.php");
	exit;
}


// if($_SESSION['role'] !== $role){
// 	header("Location:portal.php");
// }
?> 