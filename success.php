<?php
if ($_GET['status'] !== 'success') {
	header("Location:javascript://history.go(-1) ");
	# code...
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>RCCG Hom Ejigbo | Success Page</title>
		<?php include("php/meta.php"); ?>
        <?php include("php/links.php"); ?>

		<!-- Custom css --> 
		<link href="css/custom.css" rel="stylesheet">
	</head>

	
	<body id="appoints_view" class="no-trans  transparent-header  ">

		<!-- scrollToTop -->
		<div class="scrollToTop circle"><i class="icon-up-open-big"></i></div>
		
		<!-- page wrapper start -->
		<div class="page-wrapper">
		
		<?php include('php/includes/layouts/header.php'); ?>
		
			<!-- breadcrumb start -->
			<div class="breadcrumb-container">
				<div class="container">
					<ol class="breadcrumb">
				
                        <li><i class="fa fa-home pr-10"></i><a href="index.php">Home</a></li>
                       
						<li class="active">Success Page</li>
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
                
                 
               <div class="col-md-9">
               	<div class="main">
					<h3 class="title  text-default"><b>Successful payment</b></h3>

							<br>
						</div>
					</div>
				</div>
			</section>

		<?php include('php/includes/layouts/footer.php'); ?>
		</div>
		<!-- page-wrapper end -->

		<!-- JavaScript files placed at the end of the document so the pages load faster -->
		<!-- ================================================== -->
		<!-- Jquery and Bootstap core js files -->
		<!-- <script type="text/javascript" src="plugins/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<!-- Modernizr javascript -->
		<!-- <script type="text/javascript" src="plugins/modernizr.js"></script> -->
		<!-- jQuery Revolution Slider  -->
	<!-- 	<script type="text/javascript" src="plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script type="text/javascript" src="plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
         <script type="text/javascript" src="js/myscript.js"></script> -->
		<!-- Isotope javascript -->
		<!-- <script type="text/javascript" src="plugins/isotope/isotope.pkgd.min.js"></script> -->
		<!-- Magnific Popup javascript -->
		<!-- <script type="text/javascript" src="plugins/magnific-popup/jquery.magnific-popup.min.js"></script> -->
		<!-- Appear javascript -->
		<!-- <script type="text/javascript" src="plugins/waypoints/jquery.waypoints.min.js"></script> -->
		<!-- Count To javascript -->
		<!-- <script type="text/javascript" src="plugins/jquery.countTo.js"></script> -->
		<!-- Parallax javascript -->
		<!-- <script src="plugins/jquery.parallax-1.1.3.js"></script> -->
		<!-- Contact form -->
		<!-- <script src="plugins/jquery.validate.js"></script> -->
		<!-- Google Maps javascript -->
		<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false&amp;signed_in=true"></script>
		<script type="text/javascript" src="js/google.map.config.js"></script> -->
		<!-- Background Video -->
		<!-- <script src="plugins/vide/jquery.vide.js"></script> -->
		<!-- Owl carousel javascript -->
		<!-- <script type="text/javascript" src="plugins/owl-carousel/owl.carousel.js"></script> -->
		<!-- SmoothScroll javascript -->
		<!-- <script type="text/javascript" src="plugins/jquery.browser.js"></script>
		<script type="text/javascript" src="plugins/SmoothScroll.js"></script> -->
		<!-- Initialization of Plugins -->
		<!-- <script type="text/javascript" src="js/template.js"></script> -->
		<!-- Custom Scripts -->
		<!-- <script type="text/javascript" src="js/custom.js"></script>  -->

	</body>
</html>
