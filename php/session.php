<?php 
session_start();
if(!isset($_SESSION['MM_Username']) || $_SESSION['MM_Username'] == "" ){
	header("Location:index.php");
	exit;
}

?> 