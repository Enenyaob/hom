<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Sign In</title>
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
						<li><i class="fa fa-home pr-10"></i><a href="Index">Home</a></li>
                       
						<li class="active">Online giving</li>
					</ol>
				</div>
			</div>
			<!-- breadcrumb end -->

			<!-- main-container start -->
			<!-- ================ -->
			<div class="main-container dark-translucent-bg" style="background-image:url('images/pattern-10.png');">
				<div class="container">
					<div class="row">
						<!-- main start -->
						<!-- ================ -->
						<div class="main object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
							<div class="form-block center-block p-30 light-gray-bg border-clear">
								<h2 class="title text-center">ONLINE GIVING</h2>
								<form id ="paymentForm" class="form-horizontal" role="paymentForm">
                                	
                                <div class="form-group has-feedback">
										<label for="fname" class="col-sm-3 control-label">First Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required> 
											<i class="fa fa-user form-control-feedback"></i>
										</div>
									</div>
									<div class="form-group has-feedback">
										<label for="lname" class="col-sm-3 control-label">Last Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required>
											<i class="fa fa-user form-control-feedback"></i>
										</div>
									</div>
                                    <div class="form-group has-feedback">
										<label for="email" class="col-sm-3 control-label">Email</label>
										<div class="col-sm-8">
											<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
											<i class="fa fa-envelope form-control-feedback"></i>
                                        </div>
									</div>
                                    <div class="form-group has-feedback">
										<label for="amount" class="col-sm-3 control-label">Amount</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="amount" name="amount"  placeholder="Amount" required>
											<i class="fa fa-money form-control-feedback"></i>
										</div>
									</div>
									
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-8">
											<button type="submit" class="btn btn-block submit-button  btn-default" onclick="payWithPaystack()">Give<i class="fa fa-check"></i></button>
										</div>
									</div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-8">
                                        <img src="images/paystack_image.png">
                                        </div>
                                    </div>
								</form>
                                <script src="https://js.paystack.co/v1/inline.js"></script>
							</div>
						</div>
						<!-- main end -->
					</div>
				</div>
			</div>
			<!-- main-container end -->
			
<?php include("php/includes/layouts/footer.php"); ?>
			
		</div>

        <script>
	const paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener("submit", payWithPaystack, false);
    function payWithPaystack(e) {
    e.preventDefault();
    let handler = PaystackPop.setup({
    key: ' ', // Input your PayStack public key
    email: document.getElementById("email").value,
    amount: document.getElementById("amount").value * 100,
    firstname: document.getElementById("fname").value,
    lastname: document.getElementById("lname").value,
    ref: 'SW'+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
    window.location = "http://localhost/hom/online_giving.php?transaction=cancel"; 
    alert('Transaction Cancelled.');
    },
    callback: function(response){
    let message = 'Payment complete! Reference: ' + response.reference;
    alert(message);
    window.location = "http://localhost/hom/verify_transaction.php?reference=" + response.reference;
    }
      });
    handler.openIframe();
     }
		</script> 
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
