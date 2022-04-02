<?php

$connect = new PDO("mysql:host=localhost;dbname=timeline", "root", "");

$query = "SELECT * FROM timeline ORDER BY id ASC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
     
        <title>RCCG Hom Ejigbo | Picture Gallery</title>
        <script src="timeline/js/jquery.js"></script>
        <script src="timeline/js/timeline.min.js"></script>
        <link rel="stylesheet" href="timeline/css/timeline.min.css" />
    <?php include("php/meta.php"); ?>
        <?php include("timeline/links.php"); ?>
 
</head>
<body>

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
                       
            <li class="active">Online Giving</li>
          </ol>
        </div>
      </div>
      <!-- breadcrumb end -->
      
      <div id="page-start"></div>
  <section class="cd-h-timeline js-cd-h-timeline margin-bottom-md">
    <div class="container">
          <h1 class="title  text-center text-default">Timeline </h1>
            <div class="row">



              <div class="col-md-3">
                <ul class="nav nav-pills nav-stacked">
  <li ><a href="counselor.php">Dash board</a></li>
  <li class="active"><a href="appointments">Create New Member</a></li>
   <li><a href="appointments_view">Search Member</a></li>
  <li><a href="staff_list.php">Absent</a></li>
  <li><a href="branch_locator">Locate a Branch</a></li>
</ul>
                </div>
               <div class="col-md-9">

    
   <div class="main">
      <div class="panel panel-default">
        <div class="panel-heading">
                    <h3 class="panel-title">Year Planner</h3>
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
                                      <h2><?php echo $row["year"]; ?></h2>
                                      <p><?php echo $row["comment"]; ?></p>
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
</div>
  </section>
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
</body>
</html>
<script>
$(document).ready(function(){
    jQuery('.timeline').timeline();
});
</script>