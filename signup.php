<?php
require_once("php/session.php"); 
require_once 'php/includes/function.php';
require_once ('php/includes/user_navigation.php');  
 $connection = require_once ('php/db_oop.php');
   $home = lcfirst($_SESSION['role']);

   	$email = '';
   	$first_name = '';
	$last_name = '';
	$middle_name = '';
	$email = '';
	$gender = '';
	$dob = '';
	$department = '';
	$role = '';
	$phone_no = '';
	$home_address = '';
	


	if($_SERVER['REQUEST_METHOD']==='POST'){	
	$first_name = htmlspecialchars(trim(strtoupper(post_data('first_name'))));
	$last_name = htmlspecialchars(trim(strtoupper(post_data('last_name'))));
	$middle_name = htmlspecialchars(trim(strtoupper(post_data('middle_name'))));
	$gender = htmlspecialchars(trim(strtoupper(post_data('gender'))));
	$dob = htmlspecialchars(trim(post_data('dob')));//progarm in date entered in greater than current date..show error.
	$department = htmlspecialchars(trim(strtoupper(post_data('department'))));
	$email = htmlspecialchars(trim(post_data('email')));
	$phone_no = htmlspecialchars(trim(post_data('phone_no')));
	$home_address = htmlspecialchars(trim(strtoupper(post_data('home_address'))));
	
	$errors = validateFirst($first_name, $errors);
	$errors= validateLast($last_name, $errors);
	$errors = validateMiddle($middle_name, $errors);
	$errors = validateGender($gender, $errors);
	$errors = validateDob($dob, $errors);
	$errors = validateAddress($home_address, $errors);
	$errors = validateEmail($email, $errors);
	$errors = validatePhone($phone_no, $errors);
	$errors = validateDeparment($department, $errors);	
	$errors= validateLast($last_name, $errors);
   
	




$results = $connection->checkWorkers($first_name, $email, $phone_no);
			if(count($results) > 0){
 			foreach ($results as $result) {
 				$checkName = $result['first_name'];
 				$checkEmail = $result['email'];
 				$checkNumber =  $result['phone_no'];
 				}
 			}else{

 			}
				
				if(!empty($errors)){
					$status = 'Oh Snap! Ensure required fields are filled correctly';
				}
				else{
					if($first_name === $checkName && $email === $checkEmail && $phone_no === $checkNumber) {
						$status = 'This Details Exists in Database';
				}else
					if($connection->signUp($first_name, $last_name, $middle_name, $email, $gender, $dob, $department, $phone_no, $home_address)){
						header("location: $home?inserted ");
						$msg = 'Record inserted succesfully';
				}
			else{
					$status = 'Something went wrong';
				}
			   }
		 	
 }									

 					 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Portal | Sign Up</title>
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
		
<?php  include('php/includes/layouts/header_admin.php'); ?>	
			<!-- breadcrumb start -->
			<!-- ================ -->
			<div class="breadcrumb-container">
				<div class="container">
					<ol class="breadcrumb">
						
                        <li><i class="fa fa-home pr-10"></i><a href="admin">Admin</a></li>
                       
						<li class="active"> Register Staff</li>
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
								<h2 class="title text-center">Register Worker</h2>
								<?php if(isset($status)) : ?>
										<p class='text-center text-uppercase' style='color:red'><?php echo $status; ?></p>

									<?php elseif(isset($msg)) : ?>
										<p class='text-center text-uppercase' style='color:green'><?php echo $msg; ?></p>
									
									<?php else : ?>
										
									<?php endif; ?> 
								<form action="" method="post" class="form-horizontal" id="data-form" role="form">
									
									<div class="form-group has-feedback">
										<label for="first_name" class="col-sm-3 control-label">First Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $first_name?>" placeholder="First Name" required> 
											<i class="fa fa-user form-control-feedback"></i>
											<div class="invalid-feedback">
											
											 <span class="text-danger small"><?php echo $errors['first_name'] ?? ''?></span>
											</div>
										</div>
									</div>
									<div class="form-group has-feedback">
										<label for="last_name" class="col-sm-3 control-label">Last Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $last_name?>" placeholder="Last Name" required>
											<i class="fa fa-user form-control-feedback"></i>
											<div class="invalid-feedback">
											
											 <span class="text-danger small"><?php echo $errors['last_name'] ?? ''?></span>
											</div>
										</div>
									</div>

									<div class="form-group has-feedback">
										<label for="middle_name" class="col-sm-3 control-label">Other Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="middle_name" name="middle_name" value="<?php echo $middle_name?>" placeholder="Middle Name" >
											<i class="fa fa-user form-control-feedback"></i>
											<div class="invalid-feedback">
											
											 <span class="text-danger small"><?php echo $errors['middle_name'] ?? ''?></span>
											</div>
										</div>
									</div>

									<div class="form-group has-feedback">
										<label for="email" class="col-sm-3 control-label">Email</label>
										<div class="col-sm-8">
											<input type="email" class="form-control" id="email" name="email" value="<?php echo $email?>" placeholder="Email" required>
											<i class="fa fa-envelope form-control-feedback"></i>
											<span id="email_status"><?php echo $errors['email'] ?? ''?></span>
										</div>
									</div>

									<div class="form-group has-feedback">
										<label for="gender" class="col-sm-3 control-label">Gender</label>
										<div class="col-sm-8">
											<select name="gender" id="gender" class="form-control">
											<?php if (strlen($gender) > 0): ?>

												<option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
											<?php else : ?>
							                    <option value="">Select gender</option>
							          		<?php endif; ?>
							                    <option value="Male">Male</option>
							                    <option value="Female">Female</option>
											</select>
											<div class="invalid-feedback">
											
											 <span class="text-danger small"><?php echo $errors['gender'] ?? ''?></span>
											</div>
										</div>
									</div>

									<div class="form-group has-feedback">
										<label for="dob" class="col-sm-3 control-label">Dob</label>
										<div class="col-sm-8">
											<input type="date" class="form-control" id="dob" name="dob" value="<?php echo $dob ?>"placeholder="dd-mm-yyyy" value="" min="1940-01-01" >
											<div class="invalid-feedback">
												<span class="text-danger small"><?php echo $errors['dob'] ?? ''?></span>
											</div>
										</div>
									</div>

									<div class="form-group has-feedback">
										<label for="department" class="col-sm-3 control-label">Department</label>
                                    	<div class="col-sm-8">
											<select name="department" id="department" class="form-control">
												<?php if (strlen($department) > 0) :?> 
							                    <option value="<?php echo $department; ?>"><?php echo $department; ?></option>
							          <?php else : ?>
							          					<option value="">Select Department</option>
							          <?php endif ; ?>
							                    <option value="Ushering">Ushering</option> 
							                    <option value="Choir">Choir</option>
							                    <option value="Media">Media</option>       
											</select>
											<div class="invalid-feedback">
											
											 <span class="text-danger small"><?php echo $errors['department'] ?? ''?></span>
											</div>
										</div>
									</div>
								
                                    <div class="form-group has-feedback">
                                    	<label for="tel" class="col-sm-3 control-label">Mobile</label>
										<div class="col-sm-8">
											<input type="tel" class="form-control" name="phone_no" value="<?php echo $phone_no?>" placeholder="Phone no." required>
											<i class="fa fa-phone form-control-feedback"></i>
											<div class="invalid-feedback">
											
											 <span class="text-danger small"><?php echo $errors['phone_no'] ?? ''?></span>
										</div>
									</div>
								</div>
                                    
                                    <div class="form-group has-feedback">
                                    	<label for="home_address" class="col-sm-3 control-label">Address</label>
                                		<div class="col-sm-8">
                                        	<textarea class="form-control" rows="3" id="home_address" name="home_address" 
                                        	  placeholder="Address"></textarea>
											<i class="fa fa-pencil form-control-feedback"></i>
											<div class="invalid-feedback">
											 <span class="text-danger small"><?php echo $errors['home_address'] ?? ''?></span>
											</div>
										</div>
									</div>
									
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-8">
											<button type="submit" name="submit_staff" class="btn btn-group btn-default btn-animated">Submit <i class="fa fa-check"></i></button>
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
				<?php  include('php/includes/layouts/footer_admin.php'); ?>
						
		</div>
		<!-- page-wrapper end -->

		<!-- JavaScript files placed at the end of the document so the pages load faster -->
		<!-- ================================================== -->
		<!-- Jquery and Bootstap core js files -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script type="text/javascript" src="plugins/jquery.min.js"></script>
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
		<script>
	
		</script>

	</body>
</html>

