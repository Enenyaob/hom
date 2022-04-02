<?php


$dbHost = 'localhost';
$dbName = 'dbhouseofmercy';
$dbUser = 'root';
$dbPassword = '';


		try {
			$conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e) {
				echo "connection failed". $e->getMessage();
			}
?>