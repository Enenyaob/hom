<?php
session_start();

	session_destroy();
	header("location: index");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Signout</title>
		<?php include("php/meta.php"); ?>
        <?php include("php/links.php"); ?>

	</head>
	<body class="no-trans  transparent-header  ">
	</body>
</html>
