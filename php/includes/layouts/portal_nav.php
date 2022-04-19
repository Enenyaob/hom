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