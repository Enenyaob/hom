  <?php 
require_once("php/session.php"); 
require_once 'php/includes/function.php';
require_once ('php/includes/user_navigation.php');  
 $connection = require_once ('php/db_oop.php');
   $home = lcfirst($_SESSION['role']);

   	$first_name = '';
	$last_name = '';
	$middle_name = '';
	$age_group = '';
	$gender = '';
	$home_address = '';
	$email = '';
	$phone_no = '';
	$date = '';

	if($_SERVER['REQUEST_METHOD'] ==='POST'){
		$first_name = htmlspecialchars(trim(strtoupper(post_data('first_name'))));
	  	$last_name = htmlspecialchars(trim(strtoupper(post_data('last_name'))));
		$middle_name = htmlspecialchars(trim(strtoupper(post_data('middle_name'))));
		$age_group = htmlspecialchars(trim(strtoupper(post_data('age_group'))));
		$gender = htmlspecialchars(trim(strtoupper(post_data('gender'))));
		$home_address = htmlspecialchars(trim(strtoupper(post_data('home_address'))));
		$email = htmlspecialchars(trim(post_data('email')));
		$phone_no = htmlspecialchars(post_data('phone_no'));
		$date = date('Y-m-d');

		//checking if errors in input fields
		$errors = validateFirst($first_name, $errors);
		$errors= validateLast($last_name, $errors);
		$errors = validateMiddle($middle_name, $errors);
		$errors = validateAgegroup($age_group, $errors);
		$errors = validateGender($gender, $errors);
		$errors = validateAddress($home_address, $errors);
		$errors = validateEmail($email, $errors);
		$errors = validatePhone($phone_no, $errors);
      

		$results = $connection->checkMember($first_name, $email, $phone_no);
			if(count($results) > 0){
 			foreach ($results as $result) {
 				$checkName = $result['first_name'];
 				$checkEmail = $result['email'];
 				$checkNumber =  $result['phone_no'];

 				}
 			}else{

 			}

		
		//checking if errors else insert to database
		if(!empty($errors)){
			$status = 'Oh Snap! Ensure required fields are filled correctly';
		}
		else{
			if($first_name === $checkName && $email === $checkEmail && $phone_no === $checkNumber) {
						$status = 'This Details Exists in Database';
				}else
			if($connection->addFirst_timer($first_name, $last_name, $middle_name, $age_group, $gender, $home_address, $email, $phone_no, $date)){
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
		<title>Portal | Add Member</title>
		<?php include("php/meta.php"); ?>
        <?php include("php/links.php"); ?>

		<!-- Custom css --> 
		<link href="css/custom.css" rel="stylesheet">
	</head>

	
	<body id="appoints" class="no-trans  transparent-header  ">

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
                        <li><i class="fa fa-home pr-10"></i><a href="<?php echo lcfirst($_SESSION['role']); ?>"><?php echo ($_SESSION['role']); ?></a></li>
                       
						<li class="active"><?php echo $item[$current_page]; ?></li>
					</ol>
				</div>
			</div>
			<!-- breadcrumb end -->
			
			<div id="page-start"></div>

			<!-- section start -->
			<!-- ================ -->
			<section class="pv-30 light-gray-bg clearfix">
					<div class="container">
                
                    <div class="separator"></div>
                <div class="row">
                
                  <div class="col-md-3">
                  <?php include("php/includes/layouts/portal_nav.php"); ?>
                </div>
               <div class="col-md-9">
			
            <div class="main">
							<div class="form-block center-block p-30 light-gray-bg border-clear">
								<h2 class="title text-center">Create Member</h2>
                                <div class="separator"></div>
								<?php if(isset($status)) : ?>
										<p class='text-center text-uppercase' style='color:red'><?php echo $status; ?></p>

									<?php elseif(isset($msg)) : ?>
										<p class='text-center text-uppercase' style='color:green'><?php echo $msg; ?></p>
									
									<?php else : ?>
										
									<?php endif; ?> 
								<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> " id="data-form" method="post" class="form-horizontal">
									<div class="form-group has-feedback">
										<label for="first_name" class="col-sm-3 control-label">First Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="first_name" name="first_name"  value="<?php echo $first_name?>" placeholder="First Name" required>
											<i class="fa fa-user form-control-feedback"></i>
												<div class="invalid-feedback">
											<p id="demo"></p>
											 <span class="text-danger small"><?php echo $errors['first_name'] ?? ''?></span>
										</div>
										</div>
									</div>

								<div class="form-group has-feedback">
									<label for="last_name" class="col-sm-3 control-label">Last Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="last-name" name="last_name" value="<?php echo $last_name?>"  placeholder="Last Name" required>
											<i class="fa fa-user form-control-feedback"></i>
											<div class="invalid-feedback">
											
											 <span class="text-danger small"><?php echo $errors['last_name'] ?? ''?></span>
										</div>
										</div>
								</div>


									<div class="form-group has-feedback">
										<label for="middle_name" class="col-sm-3 control-label">Other Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="middle_name" name="middle_name" value="<?php echo $middle_name?>" placeholder="Other Name">
											<i class="fa fa-user form-control-feedback"></i>
											<div class="invalid-feedback">
											 <span class="text-danger small"><?php echo $errors['middle_name'] ?? ''?></span>
										</div>
										</div>
									</div>


                                    
									  <div class="form-group has-feedback">
									  	<label for="age_group" class="col-sm-3 control-label">Age Group</label>
										<div class="col-sm-8">
											<select name="age_group" id="age_group" class="form-control">
												<?php if (strlen($age_group) > 0): ?>
													<option value="<?php echo $age_group; ?>"><?php echo $age_group; ?></option>
												<?php else: ?>
							                    	<option value="">Choose age group</option>
							          			<?php endif; ?>
                    							<option value="Children">CHILDREN</option>
                    							<option value="Tenager">TEENAGER</option>
                    							<option value="Youth">YOUTH</option>
                    							<option value="Adult">ADULT</option>
                    							<option value="Elder">ELDER</option>
											</select>
											<div class="invalid-feedback">
											
											 <span class="text-danger small"><?php echo $errors['age_group'] ?? ''?></span>
											</div>
										</div>
									</div>
                                    
                                    
                                    <div class="form-group has-feedback">
                                    	<label for="gender" class="col-sm-3 control-label">Gender</label>
										<div class="col-sm-8">
											<select name="gender" id="gender" class="form-control">
							                <?php if (strlen($gender) > 0) : ?>
												<option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
												<?php else: ?>
							                <option value="">Select gender</option>
							          <?php endif ?>
							                    <option value="Male">Male</option>
							                    <option value="Female">Female</option>
											</select>
											<div class="invalid-feedback">
											
											 <span class="text-danger small"><?php echo $errors['gender'] ?? ''?></span>
											</div>
										</div>
                                    </div>
                                    <div class="form-group has-feedback">
                                    	<label for="home_address" class="col-sm-3 control-label">Address</label>
										<div class="col-sm-8">
											<textarea class="form-control" id='home_address' name="home_address" placeholder="Address"><?php echo $home_address?></textarea>
											<i class="fa fa-home form-control-feedback"></i>
											<span class="text-danger small"><?php echo $errors['home_address'] ?? ''?></span>
										</div>
									</div>
									<div class="form-group has-feedback">
										<label for="email" class="col-sm-3 control-label">Email</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="email" name="email" value="<?php echo $email?>"   placeholder="Email">
											<i class="fa fa-envelope form-control-feedback"></i>
											<span class="text-danger small"><?php echo $errors['email'] ?? ''?></span>
										</div>
									</div>
                                    <div class="form-group has-feedback">
                                    	<label for="phone_no" class="col-sm-3 control-label">Mobile</label>
										<div class="col-sm-8">
											<input type="tel" class="form-control" id="phone_no" name="phone_no" value="<?php echo $phone_no?>" placeholder="Phone no." required>
											<i class="fa fa-phone form-control-feedback"></i>
											<div class="invalid-feedback">
											
											 <span class="text-danger small"><?php echo $errors['phone_no'] ?? ''?></span>
										</div>
									</div>
								</div>
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-8">
																						
											<button type="submit" name="submit_member" class="btn btn-group btn-default btn-animated">Register <i class="fa fa-home"></i></button>
											
											
										
                                       
										</div>
									</div>
								</form>
							</div>
						
						</div>

					<br>
                    </div>
			</div>
						</div>
		
					
			</section>
			<!-- section end -->

			





			
<?php include('php/includes/layouts/footer_admin.php'); ?>
		</div>
		<script>
function myFunction() {
  var x, text;

  // Get the value of the input field with id="numb"
  x = document.getElementById("first_name").value;

  // If x is Not a Number or less than one or greater than 10
  if (isNaN(x) || x < 1 || x > 10) {
    text = "Input not valid";
  } else {
    text = "Input OK";
  }
  document.getElementById("demo").innerHTML = text;
}
</script>

		<!-- page-wrapper end -->

		<!-- JavaScript files placed at the end of the document so the pages load faster -->
		<!-- ================================================== -->
		<!-- Jquery and Bootstap core js files -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script type="text/javascript" src="plugins/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<!-- Modernizr javascript -->
		<script type="text/javascript" src="plugins/modernizr.js"></script>
		<!-- jQuery Revolution Slider  -->
		<script type="text/javascript" src="plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script type="text/javascript" src="plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
         <script type="text/javascript" src="js/myscript.js"></script>
		<!-- Isotope javascript -->
		<script type="text/javascript" src="plugins/isotope/isotope.pkgd.min.js"></script>
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
		<!-- Google Maps javascript -->
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false&amp;signed_in=true"></script>
		<script type="text/javascript" src="js/google.map.config.js"></script>
		<!-- Background Video -->
		<script src="plugins/vide/jquery.vide.js"></script>
		<!-- Owl carousel javascript -->
		<script type="text/javascript" src="plugins/owl-carousel/owl.carousel.js"></script>
		<!-- SmoothScroll javascript -->
		<script type="text/javascript" src="plugins/jquery.browser.js"></script>
		<script type="text/javascript" src="plugins/SmoothScroll.js"></script>
		<!-- Initialization of Plugins -->
		<script type="text/javascript" src="js/template.js"></script>
		<!-- Custom Scripts -->
		<script type="text/javascript" src="js/custom.js"></script>
		<script type="text/javascript" src="template.js"></script>

	</body>
</html>
