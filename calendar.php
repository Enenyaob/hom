<?php
require_once("php/session.php");
require_once 'php/includes/function.php';
require_once ('php/includes/user_navigation.php'); 
$connection = require_once ('php/db_oop.php');
$role = 'Pastorate';
require_once("php/secure.php");


if($_SERVER['REQUEST_METHOD'] ==='POST'){
  $event = htmlspecialchars(trim(post_data('event')));
  $event_date = htmlspecialchars(trim(post_data('dob')));
  $errors = validateEvent($event, $errors);
  $errors = validateDob($event_date, $errors);

  if(!empty($errors)){
      $status = 'Oh Snap! Ensure required fields are filled correctly';
    }else{
      if($connection->addCalendar($event, $event_date)){
        echo '<script>alert("Your entry has been added to the timeline")</script>';
        $_POST = '';
         
    }
    else{
      $status = 'Something went wrong';
    }
    
  }
     
}


$result = $connection->getCalendar();
foreach($result as $row){

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
     
        <title>RCCG Hom Ejigbo | Calender</title>
        <link rel="stylesheet" href="timeline/css/timeline.min.css" />
    <?php include("php/meta.php"); ?>
    <script src="timeline/js/jquery.js"></script>
        <script src="timeline/js/timeline.min.js"></script>
        <?php include("timeline/links.php"); ?>
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>

    <!-- scrollToTop -->
    <div class="scrollToTop circle"><i class="icon-up-open-big"></i></div>
    
    <!-- page wrapper start -->
    <div class="page-wrapper">
    
   <?php  include('php/includes/layouts/header_admin.php'); ?>
    
      <!-- breadcrumb start -->
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
  <section class="cd-h-timeline js-cd-h-timeline margin-bottom-md">
    <div class="container">
          <h3 class="title text-default logo-font text-center ">Year Planner Timeline </h3>
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
    <?php if($_SESSION['role'] == 'Pastorate'): ?>
       <a href="#" class="btn btn-default btn-animated" data-toggle="modal" data-target="#myModal" id="m-t">Add Schedule <i class="fa fa-calendar"></i></a>
    <?php endif; ?>

                
                <?php if(isset($status)) : ?>
                    echo "<p class='text-center text-uppercase' style='color:red'>{$status}</p>";
                  
                <?php elseif(isset($msg)) :?>
                    echo "<p class='text-center text-uppercase' style='color:green'>{$msg}</p>";
                <?php else: ?>
                <?php endif; ?>

      <div class="panel panel-default">
        <div class="panel-heading">
                    <h3 class="panel-title">Schdule <?php date('D-m-y'); ?></h3>
                </div>
                <div class="panel-body">
                  <div class="timeline">
                        <div class="timeline__wrap">
                            <div class="timeline__items">
                            <?php
                            foreach($result as $row)
                            {
                            ?>
                              <div class="timeline__item">
                                    <div class="timeline__content">
                                      <h2><?php echo $row["event_date"]; ?></h2>
                                      <p><?php echo $row["event"]; ?></p>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
      </div>
    </div>
  </div>
</div>



   <!-- .cd-h-timeline__events -->
  </div>
  <?php  include('php/includes/layouts/calenderModal.php'); ?>
</div>

</div>
  </section>
  <?php include('php/includes/layouts/footer_admin.php'); ?>
</div>





 <!-- <script type="text/javascript" src="plugins/jquery.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
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
    <script src="timeline/js/jquery.js"></script>
        <script src="timeline/js/timeline.min.js"></script>
</body>
</html>
<script>
$(document).ready(function(){
    jQuery('.timeline').timeline();
});
</script>