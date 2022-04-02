<?php
require_once 'includes/pdo_connect.php';
require_once("secure.php");

$statement = $conn->prepare("SELECT * FROM  user_details" );
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
	$is_coloumn = true;
	if($count > 0) {
	  foreach($records as $record) {
		if($is_coloumn) {		  	  
		  fputcsv($fh, array_keys($record));
		  $is_coloumn = false;
		}		
		fputcsv($fh, array_values($record));
	  }
	   fclose($fh);
	}
	exit;  
}