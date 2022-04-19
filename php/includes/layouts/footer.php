<?php 
if (isset($_GET["mailsend"])){
	echo "<script>alert('Message sent!')</script>";
}
?>
<!-- footer top start -->
			<!-- ================ -->
		
			<!-- footer top end -->

			<!-- footer start (Add "dark" class to #footer in order to enable dark footer) -->
			<!-- ================ -->
			<footer id="footer" class="clearfix dark ">

				<!-- .footer start -->
				<!-- ================ -->
				<div class="footer">
					<div class="container">
						<div class="footer-inner">
							<div class="row">
								<div class="col-md-8">
									<div class="footer-content">
										<div class="logo-footer"><img id="logo-footer" src="images/ccg.png" alt=""></div>
										<div class="row">
											<div class="col-md-6">
											
												<ul class="social-links circle animated-effect-1">
													<li class="facebook"><a target="_blank" href="http://www.facebook.com/enenya.obinna"><i class="fa fa-facebook"></i></a></li>
													<li class="twitter"><a target="_blank" href="http://www.twitter.com/Obinna05431772"><i class="fa fa-twitter"></i></a></li>
													<li class="googleplus"><a target="_blank" href="http://instagram.com/swinginge/"><i class="fa fa-instagram"></i></a></li>
													<li class="linkedin"><a target="_blank" href="http://www.linkedin.com/in/enenya-obinna"><i class="fa fa-linkedin"></i></a></li>
												</ul>
												<ul class="list-icons">
													
													<li><a href="tel:+2347037208799"><i class="fa fa-phone pr-10 text-default"></i>(+234) 703-720-8799</a></li>
													<?php if(isset($_SESSION['role'])) : ?>
														<li><a href="<?php echo lcfirst($_SESSION['role']); ?>"><i class="fa fa-user pr-10"></i>Enter Portal</a></li>
													<?php else: ?>	
														<li><a href="login"><i class="fa fa-lock pr-10"></i>Workers Portal</a></li>
													<?php endif ?>
												</ul>
											</div>
											<div class="col-md-6">
												<div class="mapouter"><div class="gmap_canvas"><iframe width="320" height="250" id="gmap_canvas" src="https://maps.google.com/maps?q=baracuda%20beach&t=&z=13&ie=UTF8&iwloc=&output=embed " frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://youtube-embed-code.com"></a><br><style>.mapouter{position:relative;text-align:right;height:250px;width:320px;}</style><a href="https://google-map-generator.com">map generator</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:250px;width:320px;}</style></div></div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="footer-content">
										<h2 class="title">Contact Us</h2>
										<br>
										<div class="alert alert-success hidden" id="MessageSent2">
											We have received your message, we will contact you very soon.
										</div>
										<div class="alert alert-danger hidden" id="MessageNotSent2">
											Oops! Something went wrong please refresh the page and try again.
										</div>
										<form action="<?php echo htmlspecialchars('php/contactForm.php');?>
										" method="post" role="footer-form" id="footer-form" class="margin-clear">
											<div class="form-group has-feedback">
												<label class="sr-only" for="name2">Name</label>
												<input type="text" class="form-control" id="name2" placeholder="Name" name="name2">
												<i class="fa fa-user form-control-feedback"></i>
											</div>

											<div class="form-group has-feedback">
												<label class="sr-only" for="email2">Email address</label>
												<input type="email" class="form-control" id="email2" placeholder="Enter email" name="email2">
												<i class="fa fa-envelope form-control-feedback"></i>
											</div>

											<div class="form-group has-feedback">
												<label class="sr-only" for="subject2">Subject</label>
												<input type="text" class="form-control" id="subject2" placeholder="Subject" name="subject2">
												<i class="fa fa-book form-control-feedback"></i>
											</div>

											<div class="form-group has-feedback">
												<label class="sr-only" for="message2">Message</label>
												<textarea class="form-control" rows="6" id="message2" placeholder="Message" name="message2"></textarea>
												<i class="fa fa-pencil form-control-feedback"></i>
											</div>
											
													<input type="submit" value="Send" class="margin-clear submit-button btn btn-default">
												</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- .footer end -->

				<!-- .subfooter start -->
				<!-- ================ -->
				<div class="subfooter">
					<div class="container">
						<div class="subfooter-inner">
							<div class="row">
							<div class="col-md-12">
									<p class="text-center">Copyright © 2021 All Rights Reserved.  Developed by <a target="_blank">Obinna</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- .subfooter end -->

			</footer>
			<!-- footer end -->
			