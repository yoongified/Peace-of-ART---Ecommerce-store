<section class="call-to-action bg-gray section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="title">
					<h2>SUBSCRIBE TO NEWSLETTER</h2>
					<p>Subscribe now and receive a box filled with special offers, latest arrivals and handpicked items just for you.</p>
				</div>
				<form method="post">
					<div class="col-lg-6 col-md-offset-3">
							<div class="input-group subscription-form">
							<input type="email"  class="form-control" placeholder="Enter Your Email Address" id="emailsub">
							<span class="input-group-btn">
								<button onclick="news()" type="button" class="btn btn-main" type="button">Subscribe Now!</button>
							</span>
							</div><!-- /input-group -->
					</div>
				</form>
				

			</div>
		</div> 		<!-- End row -->
	</div>   	<!-- End container -->
</section>   <!-- End section -->

<script>
	function news(){	
		var email=jQuery('#emailsub').val();
		if(emailsub!=''){
			jQuery.ajax({
			url:'news.php',
			type:'post',
			data:'email='+email,
			success:function(result){
		        result=result.replace(/[\r\n]+/gm,"");
				if(result=='email_present'){
					alert('Already subscribed');
				}
				if(result=='emailErr'){
					alert('Invalid email format. Eg. peace@gmail.com');
				}if(result=='done'){
					alert('Thank you for subscribing. Enjoy new content every week!!');
					window.location.href=window.location.href;
				}
			}
			});
		}
	}
</script> 