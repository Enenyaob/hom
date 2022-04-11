<?php 
 require_once("php/session.php");
 require_once 'php/includes/function.php';
 require_once ('php/includes/user_navigation.php');
 include_once("php/export_csv.php"); 
$connection = require_once ('php/db_oop.php');
$role = $_SESSION['role'];
require_once("php/secure.php");

		$results = $connection->getWorkers();
		if(count($results) > 0 ){
 			$msg= '';
 		}elseif(count($results) == 0){
			$status ='No Record found';
 		}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>RCCG Hom Ejigbo | View created Firstimers</title>
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
					<h3 class="title text-default logo-font text-center ">Workers List </h3>
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
					</div>
				</nav>
                </div>
               <div class="col-md-9">
			  					 <?php if(isset($status)) : ?>
										<p class='text-center text-uppercase' style='color:red'><?php echo $status; ?></p>

									<?php elseif(isset($msg)) : ?>
										<p class='text-center text-uppercase' style='color:green'><?php echo $msg; ?></p>
									
									<?php else : ?>
										
									<?php endif; ?> 
					
					 
					   <div class="table-reponsive">
  <table class="table">
    <thead>
    <tr class="info">
    <th>Name</th>
    <th>Last Name</th>
    <th>Other</th>
    <th>Gender</th>
    <th> Department </th>
    <th>D0B</th>
    <th>Phone No. </th>
    <th>Email</th>
    <th>Address</th>
    </tr>
     </thead>
           <?php if( isset($results) && is_array($results) ): ?>
	<?php foreach ($results as $result): ?>

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
  	<td><?php echo $result['first_name'] ?></td><td><?php echo $result['last_name'] ?></td><td><?php echo $result['middle_name'] ?></td><td><?php echo $result['gender'] ?></td><td><?php echo $result['department'] ?></td><td><?php echo $result['dob'] ?></td><td><?php echo $result['phone_no'] ?></td><td><?php echo $result['email'] ?></td><td><?php echo $result['home_address'] ?></td>
       </tbody>
       <?php endforeach; ?>
		  <?php endif; ?>
  </table>
</div>
<?php if(isset($results)) :?>
							<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">					
				<a type="submit" id="export_csv_data" name='export_csv_data' value="Export to CSV" class="btn btn-info">Export to CSV</a>
			</form>
			<?php else : ?>
			<?php endif ?> 
<div class="fa-pull-right">

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
