<?php 
require_once 'php/includes/function.php';
require_once 'php/includes/pdo_connect.php';
// *** Validate request to login to this site.


if($_SERVER['REQUEST_METHOD'] ==='POST'){
    $user_name =  htmlspecialchars(trim(post_data('user_name')));
    $password = htmlspecialchars(trim(post_data('password')));
    $role =  htmlspecialchars(trim(post_data('role')));

    validateUsername($user_name, $errors);
    validatePassword($password, $errors);
    validateRole($role, $errors);
    if(!empty($errors)){
			$status = 'Oh Snap! Ensure required fields are filled correctly';
    }else{
   
      $statement = $conn->prepare("SELECT user_id,  user_name, role, secure_pass FROM  user_pass WHERE user_name = :user_name  AND role = :role" );
        $statement->bindValue('user_name', $user_name);
        $statement->bindValue('role', $role);
        $statement->execute();
        $count = $statement->rowCount();
        
//new
     if ($count > 0){
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $passCheck = password_verify($password, $row['secure_pass']);
        if ($passCheck == false) {
          $status = "Login Failed! check your login details and try again.";
        }elseif ($passCheck == true) {
          session_start();
          $_SESSION['user_id'] = $row['user_id'];
          $_SESSION['MM_Username'] = $row['user_name'];
          $_SESSION['role'] = $row['role'];

          if($_SESSION['role'] == 'Pastorate'){
            header("Location: pastorate.php");
          }
          if($_SESSION['role'] == 'Counselor'){
            header("Location: counselor.php");
          }
          if($_SESSION['role'] == 'Admin'){
            header("Location: admin.php");
          }
        }else{
          $status ="Oh Snap! Login Failed, Check if you have verified your account Please try again.";
        }
        $row = null;
      }
     }else{
      $status = "No user found.";
     }
     $statement = null;
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
						<li><i class="fa fa-home pr-10"></i><a href="Index">Portal</a></li>
                       
						<li class="active">Please Sign In</li>
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
								<h2 class="title text-center">Sign In</h2>
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
								<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id ="portal-form" class="form-horizontal" role="form">
                                	
                                	<div class="form-group has-feedback">
										<label for="user_name" class="col-sm-3 control-label">User Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="user_name" name="user_name" >
											<i class="fa fa-user form-control-feedback"></i>
             								<span id="name_status"></span>
             								<div class="invalid-feedback"><span class="text-danger small"><?php echo $errors['user_name'] ?? ''?></span>
											</div>
										</div>
									</div>
                                     <div class="form-group has-feedback">
										<label for="password" class="col-sm-3 control-label">Password</label>
										<div class="col-sm-8">
											<input type="password" class="form-control" id="password" name="password"  required>
											<i class="fa fa-lock form-control-feedback"></i>
											<span id="pswd_status"></span>
											<div class="invalid-feedback">
											    <span class="text-danger small"><?php echo $errors['password'] ?? ''?></span>
											</div>
										</div>
									</div>
                                    <div class="form-group has-feedback">
										<label for="role" class="col-sm-3 control-label">Role</label>
										<div class="col-sm-8">
                                        <select name="role" class="form-control" id="role">
                                            <option value="">Select role</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Counselor">Counselor</option>
                                            <option value="Pastorate">Pastorate</option>
                                        </select>
											<div class="invalid-feedback">
												<span class="text-danger small"><?php echo $errors['role'] ?? ''?></span>
											</div>
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
		<script type="text/javascript" src="plugins/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
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
