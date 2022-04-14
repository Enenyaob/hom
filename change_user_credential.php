<?php
 require_once("php/session.php");
 require_once 'php/includes/function.php';
 require_once ('php/includes/user_navigation.php'); 
$connection = require_once ('php/db_oop.php');
$role = 'Admin';
require_once("php/secure.php");


if(isset($_POST['update_user'])){
$id = htmlspecialchars(trim(post_data('id')));
$user_name =  htmlspecialchars(trim(post_data('user_name')));
$password = trim(post_data('password'));
$password2 = trim(post_data('password2'));
 	$errors = validateUsername($user_name, $errors);
	$errors = validatePassword($password, $errors);
	$errors = passConfirm($password2, $password, $errors);

	if ($password===$password2) {		
	$secure_pass = securePass($password);
}

	$checkUsername = $connection->checkUsername($user_name);
	if (isset($checkUsername)) {
		$checkname = $checkUsername['user_name'];
	}else{
		$checkname = null;
	}

		if ($checkname == $user_name && $user_name != $_SESSION['MM_Username']) {
			$errors = 1;
			$status = 'This User Name Is Not Available';
		}else
	    if(!empty($errors)){
		 	$status = 'Oh Snap! Ensure required field is entered correctly';
		 }else{
		 	if($connection->updateLogin($id, $user_name,$secure_pass)){
				 header("location: $home?inserted");
		 		 $msg = 'Update inserted succesfully';
		 	}else{
		 	$status = 'Something went wrong';
		 }
		}
	}
	else{

 if(isset($_POST['search_user'])){
 	$key = htmlspecialchars(trim(post_data('phone_no')));
 	$key2 = htmlspecialchars(trim(post_data('role')));
 	$errors = validatePhone($key, $errors);;
 	$errors = validateRole($key2, $errors);

	    if(!empty($errors)){
		 	$status = 'Oh Snap! Ensure required field is entered correctly';
		 }else{
 		$results = $connection->getUser($key,$key2);
 		if(is_array($results) && $results == true ){
 			$msg = 'Record found';
 		}elseif(!is_array($results) && $results == false){
 			$status ='No Record found';
 		}
 		else{
 			$status = 'Oh Snap! Something went wrong';
 		}
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
		<title>Portal | Change User Credential</title>
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
					<ol class="breadcrumb"><!-- 
						<li><i class="fa fa-home pr-10"></i><a href="dispensary">Dash Board</a></li> -->
				
                        <li><i class="fa fa-home pr-10"></i><a href="<?php echo lcfirst($_SESSION['role']); ?>"><?php echo ($_SESSION['role']); ?></a></li>
                       
						<li class="active">Update User Credentials</li>
					</ol>
				</div>
			</div>
			<!-- breadcrumb end -->
			
			<div id="page-start"></div>

			<!-- section start -->
			<!-- ================ -->
						<section class="pv-30 light-gray-bg clearfix">
					<div class="container">
                    <h3 class="title text-center  text-default"><b>Update User Credentials </b></h3>
                    <div class="separator"></div>
                <div class="row">
                
                  <div class="col-md-3">
              
<nav class="navbar navbar-default" role="navigation">
						<div class="container-fluid">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>

								</button>	
						</div>
                  	<div class="collapse navbar-collapse" id="navbar-collapse-1">
                 <ul class="nav nav-pills nav-stacked">
				 <?php 

					foreach ($item as $key => $value) {
						if ( $current_page == $key ) {
							echo '<li class="active"><a href="' . $key . '">' . $value . '</a></li>';
						}
						else {
							echo '<li><a href="' . $key . '">' . $value . '</a></li>';
						}
					}

?>
			</ul>
						</div>
					</div>
				</nav>
                </div>
               <div class="col-md-9">
			
            <div class="main">
							<div class="form-block center-block p-30 light-gray-bg border-clear">
									<?php if(isset($status)) : ?>
										<p class='text-center text-uppercase' style='color:red'><?php echo $status; ?></p>

									<?php elseif(isset($msg)) : ?>
										<p class='text-center text-uppercase' style='color:green'><?php echo $msg; ?></p>
									
									<?php else : ?>
										
									<?php endif; ?> 
								<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> " method="post" id="profile-form" class="form-horizontal">
									<?php if (isset($results['user_id'])): ?>
									 <div class="form-group has-feedback">
									 	<input type="hidden" name="id" value="<?php echo $results['user_id'] ?>">
										<div class="col-sm-8">
											<input type="text" class="form-control" id="user_name" name="user_name"  value="" required placeholder="User Name">
											<i class="fa fa-user form-control-feedback"></i>
             								<span id="name_status"></span>
             								<div class="invalid-feedback">
											
											 <span class="text-danger small"><?php echo $errors['user_name'] ?? ''?></span>


										</div>
										</div>
									</div>
                                    	<div class="form-group has-feedback">
										<div class="col-sm-8">
											<input type="password" class="form-control" id="password" name="password"  required placeholder="password">
											<i class="fa fa-lock form-control-feedback"></i>
											<span id="pswd_status"></span>
											<div class="invalid-feedback">
											
											 <span class="text-danger small"><?php echo $errors['password'] ?? ''?></span>
											</div>
										</div>
									</div>
									<div class="form-group has-feedback">
										<div class="col-sm-8">
											<input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password" required>
											<i class="fa fa-lock form-control-feedback"></i>
											<div class="invalid-feedback">
											
											 <span class="text-danger small"><?php echo $errors['password2'] ?? ''?></span>
											</div>
										</div>
									</div>
									 <?php else: ?>
								    <div class="form-group has-feedback">
										<div class="col-sm-8">
											<select name="role"  id="role" class="form-control">
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

									<div class="form-group has-feedback">
										<div class="col-sm-8">
											<input type="text" class="form-control"  name="phone_no" id="phone_no" placeholder="Phone Number" value="" required>
											<i class="fa fa-user form-control-feedback"></i>
             								<span id="name_status"></span>
             								<div class="invalid-feedback">
											 <span class="text-danger small"><?php echo $errors['phone_no'] ?? ''?></span>
											</div>
										</div>
									</div>
									<?php endif ?>

                            
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-8">
									            <?php if (isset($results['user_id'])): ?>
									                <button type="submit" name="update_user"class="btn btn-group btn-default btn-animated">Update <i class="fa fa-check"></i></button>
									            <?php else: ?>
									               <button type="submit" name="search_user" class="btn btn-group btn-default btn-animated">Search <i class="fa fa-search"></i></button>
									            <?php endif ?>	
                                       
										</div>
									</div>
								</form>
							</div>
						
						</div>
<!-- 											
 -->					 
					   <div class="table-responsive">
  <table class="table">
    <?php $table = '<thead>
    <tr class="info">
    <th>First Name</th>
    <th> Last Name </th>
    <th> Role </th>
  
    
    </tr>
     </thead>';
     if(isset($results) == true &&  is_array($results)){
     	echo "$table";
     }else{
     	
     }
     ?>
      <?php if( isset($results) && is_array($results) ): ?>
	<?php
		
	if(isset($msg)){
		 $results;
		 }else{
		 	if(isset($status)){
		 	echo $status;
		 }
		 }
		  ?>
		  
     <tbody>
     	<td><?php echo $results['first_name']?></td><td><?php echo $results['last_name'] ?></td><td><?php echo $results['role'] ?></td>
       </tbody>
		  <?php endif; ?>
  </table>
</div>


					<br>
                    </div>
			</div>
						</div>
		
					
			</section>
			<!-- section end -->

			





			
<?php include('php/includes/layouts/footer_admin.php'); ?>
		</div>
		<!-- page-wrapper end -->

		<!-- JavaScript files placed at the end of the document so the pages load faster -->
		<!-- ================================================== -->
		<!-- Jquery and Bootstap core js files -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script type="text/javascript" src="plugins/jquery.min.js"></script>
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

	</body>
</html>
