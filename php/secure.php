<?php // creating database connections
 require_once("session.php");
 
if (isset($_SESSION['user_id'])) {
$id = $_SESSION['user_id'];
}
	$result = $connection->checkId($id);
	  	 if ( $role == $result['role']) {
	 	}else{
	 		if($role !== $result['role']){
	 		$page = lcfirst($result['role']);
	 		header("Location:$page.php");
	 		exit;
	 	}
	 }

 
	  