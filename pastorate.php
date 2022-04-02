<?php
 require_once("php/session.php");
require_once ('php/includes/user_navigation.php');
$connection = require_once("php/db_oop.php");
$role = 'Pastorate';
require_once("php/secure.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>RCCG Hom Ejigbo | Pastorate</title>
		<?php include("php/meta.php"); ?>
        <?php include("php/links.php"); ?>

		<!-- Custom css --> 
		<link href="css/custom.css" rel="stylesheet">
	</head>

	
	<body id="admins" class="no-trans  transparent-header  ">

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
                        		<ul class="nav nav-pills nav-stacked">
								  <?php 

									foreach ($item as $key => $value) {
									    if ( $current_page == $key ) {
									    	//<li class="active"><a href="contact.php">Contact</a></li>
									         echo '<li class="active"><a href="' . $key . '">' . $value . '</a></li>';
									    }
									    else {
									    	echo '<li><a href="' . $key . '">' . $value . '</a></li>';
									    }
									}

								   ?>
								  
								</ul>
						    </div>
                        <div class="col-md-9">
                        <div class="row">
						<div class="col-md-4 ">
							<div class="pv-30 ph-20 feature-box bordered shadow text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="100">
								<span class="icon default-bg circle"><i class="fa fa-archive"></i></span>
								<h3>View First Timer</h3>
								<div class="separator clearfix"></div>
								
								<a href="first_timer_view">Go Here <i class="pl-5 fa fa-angle-double-right"></i></a>
							</div>
						</div>
                        <div class="col-md-4 ">
							<div class="pv-30 ph-20 feature-box bordered shadow text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="100">
								<span class="icon default-bg circle"><i class="fa fa-archive"></i></span>
								<h3>View Workers</h3>
								<div class="separator clearfix"></div>
								
								<a href="view_workers">Go Here <i class="pl-5 fa fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="col-md-4 ">
							<div class="pv-30 ph-20 feature-box bordered shadow text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="150">
								<span class="icon default-bg circle"><i class="fa fa-users"></i></span>
								<h3>Find Member</h3>
								<div class="separator clearfix"></div>
								
								<a href="search_member">Go Here <i class="pl-5 fa fa-angle-double-right"></i></a>
							</div>
						</div>
                        
                        </div>
                        <div class="row">
                        <div class="col-md-4 ">
							<div class="pv-30 ph-20 feature-box bordered shadow text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="150">
								<span class="icon default-bg circle"><i class="fa fa-users"></i></span>
								<h3>View Prayer Points</h3>
								<div class="separator clearfix"></div>
								
								<a href="prayer_requests">Go Here <i class="pl-5 fa fa-angle-double-right"></i></a>
							</div>
						</div>
                        
						<div class="col-md-4 ">
							<div class="pv-30 ph-20 feature-box bordered shadow text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="200">
								<span class="icon default-bg circle"><i class="fa fa-sitemap"></i></span>
								<h3>Calender</h3>
								<div class="separator clearfix"></div>
								
								<a href="calender">Go Here <i class="pl-5 fa fa-angle-double-right"></i></a>
							</div>
						</div>
                        
                        	<div class="col-md-4 ">
							<div class="pv-30 ph-20 feature-box bordered shadow text-center object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="200">
								<span class="icon default-bg circle"><i class="fa fa-sitemap"></i></span>
								<h3>Blank</h3>
								<div class="separator clearfix"></div>
								
								<a href="#">Go Here <i class="pl-5 fa fa-angle-double-right"></i></a>
							</div>
						</div>
                        </div>
                        
                        
                        </div>
                    
                        </div>
                        
					
			
						</div>
		
					
			</section>
			<!-- section end -->

			





<?php include("php/includes/layouts/footer_admin.php"); ?>			
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
