<?php
class UserValidator {
	private $data;
	private $errors = [];
	private static $fields = ['user_name','first_name', 'last_name', 'middle_name', 'age_group', 'gender', 'home_address', 'email', 'phone_no'];

	public function __construct($post_data){
		$this->data = $post_data;
	}
	
	public function validateForm(){
		foreach (self::$fields as $field) {
			htmlspecialchars(stripcslashes($field));
			return;
		}

// 		function post_data($field){
// 	$_POST['field'] ??='';
// 	return htmlspecialchars(stripcslashes($field, $this->data));
// }

		$this->validateUsername();
		$this->validateFirstname();
		$this->validateLasttname();
		$this->validateMiddleName();
		$this->validateGender();
		$this->validateAddress();
		$this->validateEmail();
		$this->validatePhoneNo();
		$this->validateAge();
		return $this->errors;

	}

	private function validateUsername(){
		$val = trim($this->data['user_name']);
		if(empty($val)){
			$this->addError('user_name', 'This field cannot be empty');
		} else {
			if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)) {
				$this->addError('user_name', 'Username must be 6-12 characters & alphanumeric');
			}
		}
	}


	private function validateFirstname(){
		$val = trim($this->data['first_name']);
		if(empty($val)){
			$this->addError('first_name', 'This field cannot be empty');
		} else {
			if(!preg_match("/^[a-zA-Z]*$/", $val)) {
				$this->addError('first_name', 'Only letter allowed');
			}
		}
	}


	private function validateLasttname(){
		$val = trim($this->data['last_name']);
		if(empty($val)){
			$this->addError('last_name', 'This field cannot be empty');
		} else {
			if(!preg_match("/^[a-zA-Z]*$/", $val)) {
				$this->addError('last_name', 'Only letter allowed');
			}
		}
	}

	private function validateMiddleName(){
		$val = trim($this->data['middle_name']);
		if (empty($val)){
	    	$val = '' ;
	    } else{
	    	if (!preg_match("/^[a-zA-Z]*$/",$val)){
	    		$this->addError('middle_name', 'Only letter allowed');
	    	}
	    }
	}

	private function validateEmail(){
		$val = trim($this->data['email']);
		if(empty($val)){
			$this->addError('email', 'This field cannot be empty');
		}else{
			if(!filter_var($val, FILTER_VALIDATE_EMAIL)){
				$this->addError('email', 'Enter a valid email');
			}
		}
	}

	private function validateAge(){
		$val = trim($this->data['age_group']);
		 if($val == 'Please select'){
			$this->addError('age_group', 'Select a group');
		}
	}

	private function validateGender(){
		$val = trim($this->data['gender']);
		 if($val == 'Please select'){
			$this->addError('gender', 'Select a gender');
		}
	}


	private function validateAddress(){
	 	$val = trim($address);
	 	if(!$val){
			$this->addError('home_address', 'This field cannot be empty');
		}
		elseif (!preg_match("/^[-a-zA-Z0-9 ,#'\/.]{5,50}$/", $val)) {
			$this->addError("Numbers, alphabets and '-,#\/.' and not more than 50 Characters");
		} 
	 }

	 private function validatePhoneNo($phone_no){
	 	$val = trim($phone_no);
	 	if(!$val){
			$this->addError('phone_no', 'Oh Snap! Phone Number is Incorrect');;
		}
		elseif(strlen($val) < 11){
			$this->addError('phone_no', 'Oh Snap! Phone Number is Incorrect');
		} 
	 }

	private function addError($key, $val){
		$this->errors[$key] = $val;

	}
}





?>   