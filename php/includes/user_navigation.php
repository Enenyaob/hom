<?php
 require_once("php/session.php");

if (isset($_SESSION['role'])){
$current_page = substr($_SERVER['REQUEST_URI'],5);  // trim off the leading slash
$current_page = str_replace('.php', '', $current_page);  // trim off the extension


   
 if ($_SESSION['role'] == 'Counselor'){
		$item = ['counselor' => 'Dash Board', 'first_timer' => 'Create New Member', 'search_member' => 'Find Member', 'first_timer_view' =>'New Members', '#' =>'New Converts' ] ;
 	} 
 	if ($_SESSION['role'] == 'Pastorate') {
 		$item = ['pastorate' => 'Dash Board', 'first_timer_view' => 'New Members', 'view_Workers' => 'View Workers', 'search_member' =>'Find Member', 'prayer_requests' =>'View Prayer points', 'calender' =>'Calender', '#' => 'Blank'];
 	} 
 	if ($_SESSION['role'] == 'Admin') {
 		$item = ['admin' => 'Dash Board', 'signup' => 'Register worker', 'view_workers' => 'View Workers', 'first_timer' => 'Create New Member', 'verify_payments' =>'Verify Payments', 'search_member' =>'Find Member', 'edit_user' =>'Edit Users', 'calender' => 'Calender']; 	
}
//Iterate Over associative array.
}






?>