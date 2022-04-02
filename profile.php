<?php 
require_once("php/session.php");
require_once 'php/includes/function.php';
require_once ('php/includes/user_navigation.php');  
$connection = require_once ('php/db_oop.php');
$home = lcfirst($_SESSION['role']);

   $user_name = '';
   $first_name = '';
   $last_name = '';
   $middle_name;
   $email = '';
   $phone_no = '';
   $home_address = '';

$key = $_SESSION['MM_Username']; 
$results = $connection->checkUser($key);
foreach ($results as $result) {
}
$id = $result['id'];



if($_SERVER['REQUEST_METHOD'] ==='POST'){
		$user_name =  htmlspecialchars(trim(post_data('user_name')));
		$password = trim(post_data('password'));
		$password2 = trim(post_data('password2'));
		$first_name = htmlspecialchars(trim(strtoupper(post_data('first_name'))));
		$last_name = htmlspecialchars(trim(strtoupper(post_data('last_name'))));
		$middle_name = htmlspecialchars(trim(strtoupper(post_data('middle_name'))));
		$email = htmlspecialchars(trim(post_data('email')));
		$phone_no = htmlspecialchars(post_data('phone_no'));
		$home_address = htmlspecialchars(trim(strtoupper(post_data('home_address'))));

	$errors = validateUsername($user_name, $errors);
	$errors = validatePassword($password, $errors);
	$errors = passConfirm($password2, $password, $errors);
	$errors= validateLast($last_name, $errors);

	if ($password===$password2) {
		
	$secure_pass = securePass($password);
}
	$checkUsername = $connection->checkUsername($user_name);
	if (isset($checkUsername)) {
		$checkname = $checkUsername['user_name'];
	}else{
		$checkname = null;
	}

		var_dump($checkname);
		if ($checkname == $user_name && $user_name != $result['user_name']) {
			$errors = 1;
			$status = 'This User Name Is Not Available';
		}else
		if(!empty($errors)){
		 	$status = 'Oh Snap! Ensure required fields are filled correctly';
		 }
		 else{ 
		 		if($connection->updateProfile($id, $user_name, $secure_pass, $last_name, $email, $phone_no, $home_address)){
		 		 header("location: $home ");
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
						<li><i class="fa fa-home pr-10"></i><a href="<?php echo lcfirst($_SESSION['role']); ?>"><?php echo ($_SESSION['role']); ?></a></li>
                       
						<li class="active">Profile</li>
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
								<h2 class="title text-center">Profile</h2>
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
								<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-horizontal" role="form" onsubmit="return checkall()">
                                	
                                        <div class="form-group has-feedback">
										<label for="user_name" class="col-sm-3 control-label">User Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="user_name" name="user_name" onblur="checkname()" value="<?php echo $result['user_name']; ?>" required>
											<i class="fa fa-user form-control-feedback"></i>
             								<span id="name_status"></span>
             								<div class="invalid-feedback">
											
											 <span class="text-danger small"><?php echo $errors['user_name'] ?? ''?></span>


										</div>
										</div>
									</div>
                                    	<div class="form-group has-feedback">
										<label for="password" class="col-sm-3 control-label">Password</label>
										<div class="col-sm-8">
											<input type="password" class="form-control" name="password"  onblur="checkpswd()" required>
											<i class="fa fa-lock form-control-feedback"></i>
											<span id="pswd_status"></span>
											<div class="invalid-feedback">
											
											 <span class="text-danger small"><?php echo $errors['password'] ?? ''?></span>
											</div>
										</div>
									</div>
                                    <div class="form-group has-feedback">
										<label for="password2" class="col-sm-3 control-label">Confirm Password</label>
										<div class="col-sm-8">
											<input type="password" class="form-control" name="password2" placeholder="Confirm Password" required>
											<i class="fa fa-lock form-control-feedback"></i>
											<div class="invalid-feedback">
											
											 <span class="text-danger small"><?php echo $errors['password2'] ?? ''?></span>
											</div>
										</div>
									</div>

									<div class="form-group has-feedback">
										<label for="password" class="col-sm-3 control-label">Email</label>
										<div class="col-sm-8">
											<input type="text" class="form-control"  name="email" value="<?php echo $result['email']; ?>"   placeholder="Email">
											<i class="fa fa-envelope form-control-feedback"></i>
											<span class="text-danger small"><?php echo $errors['email'] ?? ''?></span>
										</div>
									</div>

									
									<div class="form-group has-feedback">
										<label for="first_name" class="col-sm-3 control-label">First Name</label>
										<div class="col-sm-8">
											<input type="text" id="disabledTextInput" class="form-control"  name="first_name" value="<?php echo $result['first_name']; ?>" >
											
										</div>
									</div>
									<div class="form-group has-feedback">
										<label for="last_name" class="col-sm-3 control-label">Last Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="last_name" name="last_name" required value="<?php echo $result['last_name']; ?>" >
											<i class="fa fa-user form-control-feedback"></i>
											<div class="invalid-feedback">
											 <span class="text-danger small"><?php echo $errors['last_name'] ?? ''?></span>
											</div>
										</div>
									</div>
									<div class="form-group has-feedback">
										<label for="middle_name" class="col-sm-3 control-label">Other Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="middle_name" name="middle_name" required value="<?php echo $result['middle_name']; ?>" >
											<i class="fa fa-user form-control-feedback"></i>
											<div class="invalid-feedback">
												<span class="text-danger small"><?php echo $errors['middle_name'] ?? ''?></span>
											</div>
											
										</div>
									</div>
                                    
                                     <div class="form-group has-feedback">
										<label for="role" class="col-sm-3 control-label">Role</label>
										<div class="col-sm-8">
										<input class="form-control" type="text" placeholder="<?php echo $result['role']; ?>" readonly>
										</div>
									</div>

									<div class="form-group has-feedback">
										<label for="department" class="col-sm-3 control-label">Department</label>
										<div class="col-sm-8">
										<select name="department" id="department" class="form-control">
												<?php if (isset($department)) :?> 
							                    <option value="<?php echo $department; ?>"><?php echo $department; ?></option>
							          <?php else : ?>
							          					<option value="<?php echo $result['department'] ;?>"><?php echo $result['department'] ;?></option>
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
										<label for="last_name" class="col-sm-3 control-label">Phone No</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="last_name" name="phone_no" required value="<?php echo $result['phone_no']; ?>" >
											<i class="fa fa-user form-control-feedback"></i>
											<div class="invalid-feedback">
											 <span class="text-danger small"><?php echo $errors['phone_no'] ?? ''?></span>
											</div>
										</div>
									</div>

										 <div class="form-group has-feedback">
										<label for="email" class="col-sm-3 control-label">Home Address</label>
										<div class="col-sm-8">
											<textarea class="form-control" name="home_address"><?php echo $result['home_address']; ?></textarea>
											<i class="fa fa-home form-control-feedback"></i>
											<span class="text-danger small"><?php echo $errors['home_address'] ?? ''?></span>
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
		<script>
		   function checkname()
		    {
		    
		       var name=document.getElementById( "user_name" ).value;
		    
		       if(name)
		       {
		            $.ajax({
		               type: 'post',
		               url: 'js/check.php',
		               data: {
		               user_name:name,
		               },
		               success: function (response) {
		               $( '#name_status' ).html(response);
		                  if(response=="Username taken" || response=="Username must be 6-12 characters")    
		                  {
		                     return false;   
		                  }
		                  else
		                  {
		                     return true;  
		                  }
		                }
		              });
		    
		       }
		       else
		       {
		           $( '#name_status' ).html("");
		           return false;
		       }
		    }

		    function checkemail()
		    {
		    
		       var email=document.getElementById( "email" ).value;
		    
		       if(email)
		       {
		           $.ajax({
		               type: 'post',
		               url: 'js/check.php',
		               data: {
		               email:email,
		               },
		               success: function (response) {
		               $( '#email_status' ).html(response);
		               if(response=="Valid email id")   
		               {
		                  return true;  
		               }
		               else
		               {
		                  return false; 
		               }
		             }
		           });


		        }
		        else
		        {
		           $( '#email_status' ).html("");
		           return false;
		        }
		    
		    }

		     function checkpswdlen()
		    {
		    
		       var pswd=document.getElementById( "password" ).value;
		       // var pswd2=document.getElementById( "password2" ).value;
		    
		       if(pswd)
		       {
		           $.ajax({
		               type: 'post',
		               url: 'js/check.php',
		               data: {
		               password:pswd,
		               },
		               success: function (response) {
		               $( '#pswd_status' ).html(response);
		               if(response=="password strength is strong")   
		               {
		                  return true;  
		               }
		               else
		               {
		                  return false; 
		               }
		             }
		           });

		        }
		        else
		        {
		           $( '#pswd_status' ).html("");
		           return false;
		        }
		    }

		    function checkpswd()
		    {
		    
		       var pswd2=document.getElementById( "password" ).value;
		    
		       if(pswd2)
		       {
		           $.ajax({
		               type: 'post',
		               url: 'js/check.php',
		               data: {
		               password:pswd2,
		               },
		               success: function (response) {
		               $( '#pswd_status' ).html(response);
		               if(response=="Password Matched")   
		               {
		                  return true;  
		               }
		               else
		               {
		                  return false; 
		               }
		             }
		           });


		        }
		        else
		        {
		           $( '#pswd_status' ).html("");
		           return false;
		        }
		    
		    }


		    function checkall()
		    {
		        var namehtml=document.getElementById("name_status").innerHTML;
		        var emailhtml=document.getElementById("email_status").innerHTML;
		       //var pswdhtml=document.getElementById("pswd_status").innerHTML;
		        var pswd2html=document.getElementById("pswd_status").innerHTML;
		       
		       if((namehtml == 'Username valid') && (emailhtml=="Valid email id") && (pswdhtml=="password strength is strong") && (pswd2html=="Password Matched"))
		       {
		          return true;
		       }
		       else
		       {
		          return false;
		       }
		    }
		</script>

	</body>
</html>
