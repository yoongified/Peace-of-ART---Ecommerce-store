<?php
  include("poa-top.php");
?>


<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Contact Us</h1>
					<ol class="breadcrumb">
						<li><a href="home.php">Home</a></li>
						<li class="active">Contact Us</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>




<section class="page-wrapper">
	<div class="contact-section">
		<div class="container">
			<div class="row">
				<!-- Contact Form -->
				<div class="contact-form col-md-6 " >
					<form id="contact-form" method="post" action="" role="form">
					
						<div class="form-group">
							<input type="text" placeholder="Your Name" class="form-control" name="name" id="name" required>
						</div>
						
						<div class="form-group">
							<input type="email" placeholder="Your Email" class="form-control" name="email" id="email" required>
						</div>
						
						<div class="form-group">
							<input type="number" placeholder="Mobile" pattern="[1-9]{1}[0-9]{9}" class="form-control" name="mobile" id="mobile" >
						</div>
						
						<div class="form-group">
							<textarea rows="6" placeholder="Message" class="form-control" name="message" id="message" style="resize:none;" required></textarea>	
						</div>
						
						<div id="mail-success" class="success">
							Thank you. The Mailman is on His Way :)
						</div>
						
						<div id="mail-fail" class="error">
							Sorry, don't know what happened. Try later :(
						</div>
						
						<div id="cf-submit">
							<button type="button" onclick="send_message()" id="contact-submit" class="btn btn-transparent" >Submit</button>
						</div>								
						
					</form>
				</div>
				<!-- ./End Contact Form -->
				
				<!-- Contact Details -->
				<div class="contact-details col-md-6 " >
					<div class="google-map">
						<div id="map"></div>
					</div>
					<ul class="contact-short-info" >
						<li>
							<i class="tf-ion-android-phone-portrait"></i>
							<span>Phone: +91-6851212121</span>
						</li>
						<li>
							<i class="tf-ion-android-globe"></i>
							<span>Fax: +91-31-000-000</span>
						</li>
						<li>
							<i class="tf-ion-android-mail"></i>
							<span>Email: peaceofart.official@gmail.com</span>
						</li>
					</ul>
					
				</div>
				<!-- / End Contact Details -->
					
				
			
			</div> <!-- end row -->
		</div> <!-- end container -->
	</div>
</section>
	

  

<?php
  include("WEB/_newsletter.php");
  include("poa-footer.php");
?>