<?php
require_once 'includes/pdo_connect.php';

$statement = $conn->prepare("SELECT first_name, last_name, middle_name, email, gender, dob, department, phone_no, home_address FROM  worker_details" );
$statement->execute();
$count = $statement->rowCount();
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
	$records[] = $row;		
}
 if(isset($_POST["export_csv_data"])) {	
	$csv_file = "hom_csv_".date('Y/m/d') . ".csv";			
	header("Content-Type: text/csv");
	header("Content-Disposition: attachment; filename=\"$csv_file\"");	
	$fh = fopen( 'php://output', 'w' );
	fputcsv($fh, array('First Name', 'Last Name', 'Middle Name', 'Email', 'Gender', 'Dob', 'Department', 'Phone', 'Address'));
	if($count > 0) {
	  foreach($records as $record) {		
		fputcsv($fh, array_values($record));
	  }
	   fclose($fh);
	}
	exit;  
}

