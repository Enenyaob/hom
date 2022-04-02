<?php
require 'php/functions.php';
$con = connect($config);

if($con){
	$pass = '';
	$pass2 = '';
	if(isset( $_POST['user_name'])){
		if(strlen($_POST['user_name'])>3 && strlen($_POST['user_name'])<13){
			$name =  $_POST['user_name'];
			$query = $con->query("select UserName from usercredentials where UserName='$name'");
			if($query->rowCount()==1){
				echo "Username taken";
			}
			else{
				echo "Username valid";
			}
		}
		else{
			echo "Username must be 4-12 characters";
		}
		exit();
	}
	if(isset($_POST['email'])){
		$email = $_POST['email'];
		$query = $con->query("select userEmail from userdetails where userEmail='$email'");
		if($query->rowCount()==1){
			echo "Email id has been used";
		}
		else{
			echo "Valid email id";
		}
		exit();
	}
	if(isset($_POST['password'])){
		$pass = $_POST['password'];
		if(strlen($pass)>6 && strlen($pass)<15){
			echo "password strength is strong<br>";
		}
		else{
			echo "password strength is weak<br>";
		}
		exit();
	}
	/*if(!empty($pass)==!empty($_POST['password2'])){
		echo "Passwords matched";
	}
	else{
		echo "Password doesnt match";
	}*/

	/*if(isset($_POST['password'])){
		$pass = md5($_POST['password']);
		$query = $con->query("select * from usercredentials where PasswordEncryptor='{$pass}'");
		$count = $query->rowCount();
		if($count==1){
			echo "Password Matched<br>";
		}
		else{
			echo "Password dont match<br>";
		}
	
	}*/
	
		
	
}

?>