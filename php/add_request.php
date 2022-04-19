<?php 
require_once 'includes/function.php';  
$connection = require_once ('db_oop.php');

if($_SERVER['REQUEST_METHOD'] ==='POST'){
		$first_name =  htmlspecialchars(trim(strtoupper(post_data('first_name'))));
        $last_name =  htmlspecialchars(trim(strtoupper(post_data('last_name'))));
        $email = htmlspecialchars(trim(post_data('email')));
		$request = htmlspecialchars(trim(strtoupper(post_data('home_address'))));

        $errors = validateFirst($first_name, $errors);
		$errors= validateLast($last_name, $errors);
        $errors = validateEmail($email, $errors);
        $errors = validateAddress($request, $errors);
        $name = "{$first_name} {$last_name}";
	
		if(!empty($errors)){
		 	$status = 'Oh Snap! Ensure required fields are filled correctly';
			 header("Location:../index?{$status}");
		 }
		 else{ 
		 		if($connection->addRequest($name, $email, $request)){
					header("Location:../index?mailsend");
				}else{
				   header("Location:../index?error");
				}
		}
	$connection = null;
}