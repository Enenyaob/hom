<?php require_once("php/session.php"); 
 require_once 'php/includes/function.php';
 require_once ('php/includes/user_navigation.php'); 
 $connection = require_once ('php/db_oop.php');

$key1 = 'members';
$row = $connection->numCount($key1);
	if(count($row) > 0 ){
		// Here we have the total row count
		$rows = count($row);
	}

// This is the number of results we want displayed per page
$page_rows = 10;
// This tells us the page number of our last page
$last = ceil($rows/$page_rows);
// This makes sure $last cannot be less than 1
if($last < 1){
	$last = 1;
}
// Establish the $pagenum variable
$pagenum = 1;
// Get pagenum from URL vars if it is present, else it is = 1
if(isset($_GET['pn'])){
	$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}
// This makes sure the page number isn't below 1, or more than our $last page
if ($pagenum < 1) { 
    $pagenum = 1; 
} else if ($pagenum > $last) { 
    $pagenum = $last; 
}
// This sets the range of rows to query for the chosen $pagenum
$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
// This is your query again, it is for grabbing just one page worth of rows by applying $limit


	if(isset($row)){
		$key = $limit;
	$results = $connection->allMember($key);
	if(count($results) > 0 ){
		
		$msg ="Record Found";
	}else{
		$status = "No Record Found";
	}
}

$connection = null;

//confirm_query($result);
// This shows the user what page they are on, and the total number of pages
$textline1 = "(<b>$rows</b>) Members";
$textline2 = "Page <b>$pagenum</b> of <b>$last</b>";
// Establish the $paginationCtrls variable
$paginationCtrls = '';
// If there is more than 1 page worth of results
if($last != 1){
	/* First we check if we are on page one. If we are then we don't need a link to 
	   the previous page or the first page so we do nothing. If we aren't then we
	   generate links to the first page, and to the previous page. */
	if ($pagenum > 1) {
        $previous = $pagenum - 1;
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">Previous</a> &nbsp; &nbsp; ';
		// Render clickable number links that should appear on the left of the target page number
		for($i = $pagenum-4; $i < $pagenum; $i++){
			if($i > 0){
		        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
			}
	    }
    }
	// Render the target page number, but without it being a link
	$paginationCtrls .= ''.$pagenum.' &nbsp; ';
	// Render clickable number links that should appear on the right of the target page number
	for($i = $pagenum+1; $i <= $last; $i++){
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
		if($i >= $pagenum+4){
			break;
		}
	}
	// This does the same as above, only checking if we are on the last page, and then generating the "Next"
    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Next</a> ';
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Portal | View All Members</title>
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
                       <?php if(isset($_GET['pn'])) :  ?>
						<li class="active">View All Members</li>
						<?php else: ?>
							<li class="active"><?php echo $item[$current_page]; ?></li>
						<?php endif ?>
					</ol>
				</div>
			</div>
			<!-- breadcrumb end -->
			
			<div id="page-start"></div>

			<!-- section start -->
			<!-- ================ -->
				<section class="pv-30 light-gray-bg clearfix">
					<div class="container">
                    <h3 class="title text-center text-default"><b>Members List</b></h3>
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
									    }elseif (isset($_Get['pn'])) {
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
										<p class='text-center text-uppercase' style='color:green'></p>
									
									<?php else : ?>
										
									<?php endif; ?> 
                      <h4><?php echo $textline1; ?></h4>
  					<p><?php echo $textline2; ?></p>
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
									<th>Email</th>
									<th>Phone No. </th>
									<th>Date</th>
								</tr>
							</thead>
							<?php endif ?> 
                            <?php if( isset($results) && is_array($results) ): ?>
                            <?php foreach ($results as $result): ?>
							<tbody>
								<td><?php echo $result['first_name']." ".$result['last_name'] ?></td>
								<td><?php echo $result['age_group'] ?></td>
								<td><?php echo $result['gender'] ?></td>
								<td><?php echo $result['home_address'] ?></td>
								<td><?php echo $result['email'] ?></td>
								<td><?php echo $result['phone_no'] ?></td>
								<td><?php echo $result['create_date'] ?></td>
							</tbody>
							<?php endforeach; ?>
                        </table>
                      <?php endif; ?>
                    <?php endif; ?>
<div class="fa-pull-right">
<nav aria-label="Page navigation">
  <ul class="pagination">
<?php echo $paginationCtrls; ?>
  </ul>
</nav>

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
