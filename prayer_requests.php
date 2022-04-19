<?php
 require_once("php/session.php");
 require_once ('php/includes/user_navigation.php');
 $connection = require_once ('php/db_oop.php');
$role = 'Pastorate';
require_once("php/secure.php");
 
$requests = $connection->getRequests();
if(count($requests) > 0 ){
	$msg = 'Record found';
}elseif(count($requests) == 0){
	$status ='No Record found';
 		}

if($_SERVER['REQUEST_METHOD'] ==='POST'){
	$i_d = $_POST['i_d'];
	var_dump($i_d);
    $connection->removeRequest($i_d);
    header('Location: prayer_requests');
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Portal | Prayer Request</title>
		<?php include("php/meta.php"); ?>
        <?php include("php/links.php"); ?>

		<!-- Custom css --> 
		<link href="css/custom.css" rel="stylesheet">
		<style>
			.del{
				border: none;
				background-color: inherit;
				padding: 0px 0px;
				font-size: 16px;
				cursor: pointer;
				display: inline-block;
			}
		</style>
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
				
                        <li><i class="fa fa-home pr-10"></i><a href="<?php echo lcfirst($_SESSION['role']); ?>"><?php echo $_SESSION['role']; ?></a></li>
                       
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
                    <h3 class="title text-default text-center "><b>Prayer Requests</b></h3>
					<div class="separator"></div>
                <div class="row">
                
                  <div class="col-md-3">
				  <?php include("php/includes/layouts/portal_nav.php"); ?>

                </div>
               <div class="col-md-9">
               	<div class="main">
									<?php if(isset($status)) : ?>
										<p class='text-center text-uppercase' style='color:red'><?php echo $status; ?></p>

									<?php elseif(isset($msg)) : ?>
										<p class='text-center text-uppercase' style='color:green'></p>
									
									<?php else : ?>
										
									<?php endif; ?> 	
				</div>
                    
				
	<section class="">
	<?php foreach ($requests as $request): ?>
                
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                      <h4 class="title "><strong><?php echo $request['name'] ?></strong></h4>
                      <small class="title"><?php echo date('d/m/Y H:i', strtotime($request['create_date'])) ?></small>
                        <p><?php echo $request['request'] ?> </p>
                    
						<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> " method="post" class="form-horizontal">
							<input type="hidden" name="i_d" value="<?php echo $request['id'] ?>">
							<button class="del text-danger" onclick="myfunction()">Delete</button>
							
						</form>
						</div>
				</div>


          <div class="separator"></div>
		  <?php endforeach; ?>
		</div>
	</section>
          

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
		<!-- alert confirm---->
		<script type="text/javascript" src="js/validation.js"></script>


	</body>
</html>
