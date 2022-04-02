<?php

 $errors = [];
 define('REQUIRED_FIELD_ERROR', 'This field is requid');

function post_data($field){
	$_POST['field'] ??='';
	return htmlspecialchars(stripcslashes($_POST[$field]));
}

// function validate($data_set){
// 		$data_set = htmlspecialchars(trim($data_set));

// 			$data_set = strtoupper($data_set);
		
//         return $data_set;
// 	}

// 	function validateInt($data_set){
// 		$data_set = trim($data_set);
// 		return $data_set;
	//}
function validateUsername($data, $errors){
	if(!$data){
		$errors['user_name'] = REQUIRED_FIELD_ERROR;
	} elseif(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $data)) {
		$errors['user_name'] = "username must be 6-12 characters & alphanumeric";
	}
	if(isset($errors)){
	   return $errors;
	}
	else{

	}
}

function validatePassword($data, $errors){
	if(!$data){
		$errors['password'] = REQUIRED_FIELD_ERROR;
	}
	elseif(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $data)){
		$errors['password'] = "password must be 6-12 characters & alphanumeric";
	}
	if(isset($errors)){
	   return $errors;
	}
	else{

	}
}

function passConfirm($data2, $data, $errors ){
	if(!$data2){
		$errors['password2'] = REQUIRED_FIELD_ERROR;
	}	
	elseif($data !== $data2){
		$errors['password2'] = "passwords does not match";
	}
	if(isset($errors)){
	   return $errors;
	}
	else{

	}
}

function validateLast($data, $errors){
	if(!$data){
		$errors['last_name'] = REQUIRED_FIELD_ERROR;
   } elseif (!preg_match("/^[a-zA-Z]*$/",$data)) {
	 $errors['last_name'] = "Only letter allowed";
   }
   if(isset($errors)){
	   return $errors;
   }
   else{

   }
}

function validateFirst($data, $errors){
	if(!$data){
		$errors['first_name'] = REQUIRED_FIELD_ERROR;
   } elseif (!preg_match("/^[a-zA-Z]*$/",$data)) {
	 $errors['first_name'] = "Only letter allowed";
   }
   if(isset($errors)){
	   return $errors;
   }
   else{

   }
}

function validateMiddle($middle_name, $errors){
	
	if (!preg_match("/^[a-zA-Z]*$/",$middle_name)){
	    		$errors['middle_name'] = "Only letter allowed";
	    	}
		if(isset($errors)){
			return $errors;
		}
		else{
	 
		}
}

function validateSelect($data, $errors){
	if($data == "PLEASE SELECT GENDER"){
			$errors['gender'] = REQUIRED_FIELD_ERROR;
		}elseif($data == "PLEASE SELECT GROUP"){
			$errors['age_group'] = REQUIRED_FIELD_ERROR;
		}elseif($data == "PLEASE SELECT ROLE"){
			$errors['role'] = REQUIRED_FIELD_ERROR;
		}elseif($data == "PLEASE SELECT DEPARTMENT"){
			$errors['department'] = REQUIRED_FIELD_ERROR;
		}
		if(isset($errors)){
			return $errors;
		}
		else{
	 
		}
}
function validateAddress($data, $errors){
	if(!$data){
			$errors['home_address'] = REQUIRED_FIELD_ERROR;
		}
		elseif (!preg_match("/^[-a-zA-Z0-9 ,#'\/.]{3,50}$/", $data)) {
			$errors['home_address'] = "Numbers, alphabets and '-,#\/.' and not more than 50 Characters";
		} 
		if(isset($errors)){
			return $errors;
		}
		else{
	
		}
}

function validateEmail($data, $errors){
	if(empty($data)){
		$email = 'N/A';
	} else{
		if(!filter_var($data, FILTER_VALIDATE_EMAIL)){
			$errors['email'] = 'input a valid email';
		}
	 } 
	 if(isset($errors)){
		return $errors;
	}
	else{
	 }
}
function validatePhone($data, $errors){
	if(!$data){
			$errors['phone_no'] = REQUIRED_FIELD_ERROR;
		} 
		elseif(strlen($data) < 11){
		$errors['phone_no']  = 'Oh Snap! Phone Number is Incorrect';
		}
		if(isset($errors)){
			return $errors;
		}
		else{
		 }
}
function securePass($data){
	$val = password_hash($data, PASSWORD_DEFAULT);
	return $val;
}
function validateDob($data, $errors){
	if(!$data){
		$errors['dob'] = REQUIRED_FIELD_ERROR;
	} 
	if(isset($errors)){
			return $errors;
		}
		else{
	 
		}
}

function validateEvent($data, $errors){
	if(!$data){
			$errors['event'] = REQUIRED_FIELD_ERROR;
		}
		elseif (!preg_match("/^[-a-zA-Z0-9 ,#'\/.]{3,50}$/", $data)) {
			$errors['event'] = "Numbers, alphabets and '-,#\/.' and not more than 50 Characters";
		} 
		if(isset($errors)){
			return $errors;
		}
		else{
	
		}
}

?>