<?php 
require_once 'php/includes/function.php';  
$connection = require_once ('php/db_oop.php');

   $first_name = '';
   $last_name = '';
   $email = '';
   $request = '';


if($_SERVER['REQUEST_METHOD'] ==='POST'){
		$first_name =  htmlspecialchars(trim(post_data('first_name')));
        $last_name =  htmlspecialchars(trim(post_data('last_name')));
        $email = htmlspecialchars(trim(post_data('email')));
		$request = htmlspecialchars(trim(strtoupper(post_data('request'))));

        $errors = validateFirst($first_name, $errors);
		$errors= validateLast($last_name, $errors);
        $errors = validateEmail($email, $errors);
        $errors = validateAddress($request, $errors);
        $name = "{$first_name} {$last_name}";
	
		if(!empty($errors)){
		 	$status = 'Oh Snap! Ensure required fields are filled correctly';
		 }
		 else{ 
		 		if($connection->addRequest($name, $email, $request)){
		 		 header("location: index");
				 $msg = 'Record inserted succesfully';
		 }
		 else{
		 	$status = 'Something went wrong';
		 }
		}
	$connection = null;
}


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>RCCG HOM EJIGBO | Sign Up</title>
	<?php include("php/meta.php"); ?>
        <?php include("php/links.php"); ?>
		<link href="css/custom.css" rel="stylesheet">
	</head>


	<body class="no-trans    ">

		<!-- scrollToTop -->
		<!-- ================ -->
		<div class="scrollToTop circle"><i class="icon-up-open-big"></i></div>
		
		<!-- page wrapper start -->
		<!-- ================ -->
		<div class="page-wrapper">
		
	<?php include("php/includes/layouts/header_admin.php"); ?>
		
			<!-- breadcrumb start -->
			<!-- ================ -->
			<div class="breadcrumb-container">
				<div class="container">
					<ol class="breadcrumb">
						<li><i class="fa fa-home pr-10"></i><a href="index">Home</a></li>
                       
						<li class="active">Prayer Request</li>
					</ol>
				</div>
			</div>
			<!-- breadcrumb end -->

			<!-- main-container start -->
			<!-- ================ -->
			<div class="main-container dark-translucent-bg" style="background-image:url('images/pattern-8.png');">
				<div class="container">
					<div class="row">
						<!-- main start -->
						<!-- ================ -->
						<div class="main object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
							<div class="form-block center-block p-30 light-gray-bg border-clear">
								<h2 class="title text-center">Prayer Request</h2>
								<?php
									if(isset($status)){
										echo "<p class='text-center text-uppercase' style='color:red'>{$status}</p>";
									}
									else if(isset($msg)){
										echo "<p class='text-center text-uppercase' style='color:green'>{$msg}</p>";
									}
									else{
										echo "";
									}
								?>
								<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-horizontal" role="form" >
									<div class="form-group has-feedback">
										<label for="first_name" class="col-sm-3 control-label">First Name</label>
										<div class="col-sm-8">
											<input type="text" id="disabledTextInput" class="form-control"  name="first_name" value="<?php echo $first_name; ?>" placeholder="First Name" required>
											
										</div>
									</div>
									<div class="form-group has-feedback">
										<label for="last_name" class="col-sm-3 control-label">Last Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="last_name" name="last_name" required value="<?php echo $last_name; ?>" placeholder="Last Name" required>
											<i class="fa fa-user form-control-feedback"></i>
											<div class="invalid-feedback">
											 <span class="text-danger small"><?php echo $errors['last_name'] ?? ''?></span>
											</div>
										</div>
									</div>
                                    <div class="form-group has-feedback">
										<label for="email" class="col-sm-3 control-label">Email</label>
										<div class="col-sm-8">
											<input type="text" class="form-control"  name="email" value="<?php echo $email; ?>"   placeholder="Email">
											<i class="fa fa-envelope form-control-feedback"></i>
											<span class="text-danger small"><?php echo $errors['email'] ?? ''?></span>
										</div>
									</div>
                                    <div class="form-group has-feedback">
										<label for="prayer_request" class="col-sm-3 control-label">Prayer request</label>
										<div class="col-sm-8">
											<textarea class="form-control" cols="30" rows="4" name="request"><?php echo $request; ?></textarea>
											<i class="fa fa-home form-control-feedback"></i>
											<span class="text-danger small"><?php echo $errors['request'] ?? ''?></span>
										</div>
									</div>
									
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-8">
											<button type="submit" class="btn btn-group btn-default btn-animated">Submit <i class="fa fa-check"></i></button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<!-- main end -->
					</div>
				</div>
			</div>
			<!-- main-container end -->
			
<?php include("php/includes/layouts/footer_admin.php"); ?>
			
		</div>
		<!-- page-wrapper end -->

		<!-- JavaScript files placed at the end of the document so the pages load faster -->
		<!-- ================================================== -->
		<!-- Jquery and Bootstap core js files -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script type="text/javascript" src="plugins/jquery.min.js"></script>
		<!-- <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script> -->
		<!-- Modernizr javascript -->
		<script type="text/javascript" src="plugins/modernizr.js"></script>
		<!-- Magnific Popup javascript -->
		<script type="text/javascript" src="plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
		<!-- Appear javascript -->
		<script type="text/javascript" src="plugins/waypoints/jquery.waypoints.min.js"></script>
		<!-- Count To javascript -->
		<script type="text/javascript" src="plugins/jquery.countTo.js"></script>
		<!-- Parallax javascript -->
		<script src="plugins/jquery.parallax-1.1.3.js"></script>
		<!-- Contact form -->
		<script src="plugins/jquery.validate.js"></script>
		<!-- Owl carousel javascript -->
		<script type="text/javascript" src="plugins/owl-carousel/owl.carousel.js"></script>
		<!-- SmoothScroll javascript -->
		<script type="text/javascript" src="plugins/jquery.browser.js"></script>
		<script type="text/javascript" src="plugins/SmoothScroll.js"></script>
		<!-- Initialization of Plugins -->
		<script type="text/javascript" src="js/template.js"></script>
		<!-- Custom Scripts -->
		<script type="text/javascript" src="js/custom.js"></script>

	</body>
</html>
