<?php
require_once("php/session.php");
require_once 'php/includes/function.php';
require_once ('php/includes/user_navigation.php'); 
$connection = require_once ('php/db_oop.php');

 if($_SERVER['REQUEST_METHOD']==='POST'){
 	$key = htmlspecialchars(trim(strtoupper(post_data('first_name'))));

 	$errors = validateFirst($key, $errors);

	    if(!empty($errors)){
		 	$status = 'Oh Snap! Ensure required field is entered correctly';
		 }else{
 		$results = $connection->getMember($key);
 		if(count($results) > 0 ){
 			$msg = 'Record found';
 		}elseif(count($results) == 0){
 			$status ='No Record found';
 		}
 		else{
 			$status = 'Oh Snap! Something went wrong';
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
		<title>Portal | Search Member</title>
		<?php include("php/meta.php"); ?>
        <?php include("php/links.php"); ?>

		<!-- Custom css --> 
		<link href="css/custom.css" rel="stylesheet">
	</head>

	
	<body id="appoints_view" class="no-trans  transparent-header  ">

		<!-- scrollToTop -->
		<!-- ================ -->
		<div class="scrollToTop circle"><i class="icon-up-open-big"></i></div>
		
		<!-- page wrapper start -->
		<!-- ================ -->
		<div class="page-wrapper">
		
		<?php include('php/includes/layouts/header_admin.php'); ?>
		
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
                    <h3 class="title logo-font text-center ">Welcome 
                    <b class="text-danger"><?php echo  ucfirst($_SESSION['MM_Username']) ; ?></b></h3>
					<div class="separator"></div>
                <div class="row">
                
                  <div class="col-md-3">
				  <?php include("php/includes/layouts/portal_nav.php"); ?>
                </div>
               <div class="col-md-9">
               	<div class="main">
					<h3 class="title  text-default"><b>Seach Member</b></h3>
									<?php if(isset($status)) : ?>
										<p class='text-center text-uppercase' style='color:red'><?php echo $status; ?></p>

									<?php elseif(isset($msg)) : ?>
										<p class='text-center text-uppercase' style='color:green'><?php echo $msg; ?></p>
									
									<?php else : ?>
										
									<?php endif; ?> 
					            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> " method="post" id="data-form" class="form-horizontal">
									<div class="form-group has-feedback">
										<label for="first_name" class="col-sm-3 control-label">Name</label>
										<div class="col-sm-5">
											<input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter Name">
											<button type="submit" name="submit_member" class="btn btn-group btn-default btn-animated">Search <i class="fa fa-search"></i></button>
											<i class="fa fa-user form-control-feedback"></i>
												<div class="invalid-feedback">
											
											 <span class="text-danger small"><?php echo $errors['first_name'] ?? ''?></span>


										</div>
										</div>
										
									</div>
								</form>
							</div>
                    
					<div class="separator"></div>
					 
					<div class="table-responsive">
                    <?php if (isset($msg)) : ?>
                     <?php if (isset($results) && is_array($results)) : ?>      
                        <table class="table">
                            <thead>
                                <tr class="info">
                                    <th>Name</th>
                                    <th> Group </th>
                                    <th> Sex </th>
                                    <th>Address</th>
                                    <th>Phone No. </th>
                                </tr>
                            </thead>
                            <?php endif ?> 
                            <?php if( isset($results) && is_array($results) ): ?>
                            <?php foreach ($results as $result): ?>
                                
                            <tbody>
                                <td><?php echo $result['first_name']." ".$result['last_name'] ?></td><td><?php echo $result['age_group'] ?></td><td><?php echo $result['gender'] ?></td><td><?php echo $result['home_address'] ?></td><td><?php echo $result['phone_no'] ?></td>
                            </tbody>
                            <?php endforeach; ?>
                        </table>
                      <?php endif; ?>
                    <?php endif; ?>
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
