<?php
 require_once("php/session.php");

if (isset($_SESSION['role'])){
$current_page = substr($_SERVER['REQUEST_URI'],5);  // trim off the leading slash
$current_page = str_replace('.php', '', $current_page);  // trim off the extension


   
 if ($_SESSION['role'] == 'Counselor'){
		$item = ['counselor' => 'Dash Board', 'add_member' => 'Create New Member', 'search_member' => 'Find Member', 'view_all_members' =>'View All Members', '#' =>'Blank' ] ;
 	} 
 	if ($_SESSION['role'] == 'Pastorate') {
 		$item = ['pastorate' => 'Dash Board', 'view_all_members' => 'View All Members', 'view_workers' => 'View Workers', 'search_member' =>'Find Member', 'prayer_requests' =>'View Prayer Requests', 'calendar' =>'Calendar', '#' => 'Blank'];
 	} 
 	if ($_SESSION['role'] == 'Admin') {
 		$item = ['admin' => 'Dash Board', 'signup' => 'Register worker', 'view_workers' => 'View Workers', 'add_member' => 'Create New Member', 'verify_payments' =>'Verify Payments', 'search_member' =>'Find Member', 'change_user_credential' => 'Change User Credential' ]; 	
}
//Iterate Over associative array.
}






?>