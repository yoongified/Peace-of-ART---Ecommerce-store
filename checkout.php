<?php
  include("poa-top.php");
  if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
?>
<script>window.location.href='home.php';

</script>
<?php
  }

/**order table */
$cart_total=0;
foreach($_SESSION['cart'] as $key=>$val){
$productArr=get_product($con,'','',$key);
$price=$productArr[0]['price'];
$qty=$val['qty'];
$cart_total=$cart_total+($qty*$price);
}

 /**ORDER TABLE ENTRY */
if(isset($_POST['submit'])){
	$address=get_safe_value($con,$_POST['address']);
	$zipcode=get_safe_value($con,$_POST['zipcode']);
	$city=get_safe_value($con,$_POST['city']);
	$mobile=get_safe_value($con,$_POST['mobile']);
	$payment_type=get_safe_value($con,$_POST['payment_type']);

	$cid=get_safe_value($con,$_SESSION['USER_ID']);
	$total=$cart_total;
	$payment_status='cod';
	if($payment_type=='cod'){
		$payment_status='pending';
	}
	$order_status='1'; 
	$added_on=date('Y-m-d h:i:s');

	/**IF COUPON APPLIED */
	if(isset($_SESSION['COUPON_ID'])){
		$coupon_id=$_SESSION['COUPON_ID'];
		$coupon_code=$_SESSION['COUPON_CODE'];
		$coupon=$_SESSION['COUPON_DISCOUNT'];
		$total=$total-$coupon;
		unset($_SESSION['COUPON_ID']);
		unset($_SESSION['COUPON_CODE']);
		unset($_SESSION['COUPON_DISCOUNT']);
	}else{
		$coupon_id='';
		$coupon_code='';
		$coupon='';
	}

	/**ORDER ENTRY */
	mysqli_query($con,"insert into `order`(customer_id,address,zipcode,city,mobile,payment_type,coupon_id,coupon_code,coupon_discount,total,payment_status,order_status,added_on) values($cid,'$address',$zipcode,'$city',$mobile,'$payment_type','$coupon_id','$coupon_code','$coupon',$total,'$payment_status','$order_status','$added_on')");

	/**ORDER DETAILS ENTRY */
	$order_id=mysqli_insert_id($con);

	foreach($_SESSION['cart'] as $key=>$val){
		$productArr=get_product($con,'','',$key);
		$price=$productArr[0]['price'];
		$qty=$val['qty'];
		mysqli_query($con,"insert into order_details(order_id,product_id,qty,price) values($order_id,$key,$qty,$price)");
		
	}	

		unset($_SESSION['cart']);
	MailInvoice($con,$order_id);	
	?>	
	<script>window.location.href='confirmation.php';</script>		
	<?php		
}
?>

<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Checkout</h1>
					<ol class="breadcrumb">
						<li><a href="home.php">Home</a></li>
						<li class="active">checkout</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="page-wrapper">
   <div class="checkout shopping">
      <div class="container">
         <div class="row">
            <div class="col-md-8">

			<!---WIDGET-->
				<div class="widget product-category">		
					<div class="panel-group commonAccordion" id="accordion" role="tablist" aria-multiselectable="true">

					<?php 
						$panel_class1='#collapseOne';
						$panel_class2='#collapseTwo';
						if(!isset($_SESSION['USER_LOGIN'])) {
						$panel_class1='panelb';
						$panel_class2='panelb';
						?>
					  <div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="headingThree">
					      <h4 class="panel-title">
					        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
					          	CHECKOUT METHOD
					        </a>
					      </h4>
					    </div>
					    <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
							<div class="panel-body" style="display: flex">
							<div class="login-panel">
								<form class="text-left clearfix" >
									<div class="form-group">
									LOGIN
									<input type="email" class="form-control"  placeholder="Email" name="lemail" id="lemail">
									<span class="field_error" id="lemail_error"></span>
									</div>
									<div class="form-group">
									<input type="password" class="form-control" placeholder="Password" name="lpassword" id="lpassword">
									<span class="field_error" id="lpass_error"></span>
									</div>
									<div class="text-center">
									<button type="button" onclick="user_login()" class="btn btn-main text-center" >Login</button>
									</div>
									
								</form>
							</div>
							<div class="signin-panel">
								<form class="text-left clearfix" action="home.php">
									REGISTER
									<div class="form-group">
									<input type="text" class="form-control"  placeholder="First Name" name="fname" id="fname" >
									<span class="field_error" id="fname_error"></span>
									</div>
									<div class="form-group">
									<input type="text" class="form-control"  placeholder="Last Name" name="lname" id="lname" >
									<span class="field_error" id="lname_error"></span>
									</div>
									
									<div class="form-group" style="display: flex;">
									<input type="email" class="form-control"  placeholder="Email" name="email" id="email" >
									<button type="button" onclick="email_sent_otp()" class="btn btn-main btn-small email_sent_otp">SEND OTP</button>
									
									
									</div>
									<div class="form-group email-verify">
									<span class="field_error" id="email_error"></span>
									<span id="email_otp_result"></span>
									</div>
									<div class="form-group email-verify">
									<input type="text" class="form-control email_verify_otp"  placeholder="OTP" name="email_otp" id="email_otp" >
									<button type="button" onclick="email_verify_otp()" class="btn btn-main btn-small email_verify_otp">VERIFY OTP</button>
									</div>
									
									<div class="form-group">
									<input type="text" class="form-control"  pattern="[0-9]{10}" placeholder="mobile" name="mobile" id="mobile" >
									<span class="field_error" id="mob_error"></span>
									</div>
									<div class="form-group">
									<input type="password" class="form-control"  placeholder="Password" name="password" id="password" >
									<span class="field_error" id="pass_error"></span>
									</div>
									<div class="text-center">
									<button type="button" onclick="user_register()" class="btn btn-main text-center">Sign In</button>
									</div>
								</form>
							</div>	
					    	</div>
					    </div>
					  </div>	
						<?php }?>
				    	
					<form class="checkout-form" method="post">
						<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingOne">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="<?php echo $panel_class1 ?>" aria-expanded="false" aria-controls="collapseOne">
											BILLING DETAILS
										</a>
									</h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
									<div class="panel-body">
										
											<div class="form-group">
												<label for="user_address">Address</label>
												<input type="text" class="form-control" id="address" name="address"  required>
											</div>
											<div class="checkout-country-code clearfix">
												<div class="form-group">
												<label for="user_post_code">Zip Code</label>
												<input type="text" pattern="[1-9][0-9]{5}" class="form-control" id="zipcode" name="zipcode"  required>
												</div>
												<div class="form-group" >
												<label for="user_city">City</label>
												<input type="text" pattern="[A-Za-z]{1,}" class="form-control" id="city" name="city"  required>
												</div>
											</div>
											<div class="form-group">
												<label for="user_country">Mobile</label>
												<input type="text" pattern="[1-9][0-9]{9}" class="form-control" id="mobile" name="mobile" required>
											</div>
										
									</div>
								</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingTwo">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="<?php echo $panel_class2 ?>" aria-expanded="false" aria-controls="collapseTwo">
									Payment Method
								</a>
							</h4>
							</div>
							<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
								<div class="panel-body">
									<div class="btn-group" role="group" >
										
										Cash On Delivery<input type="radio" class="btn-check" name="payment_type" id="btnradio1" value="cod" required>
										Credit/Debit Card<input type="radio" class="btn-check" name="payment_type" id="btnradio2" value="card" autocomplete="off" disabled>
										UPI Payment<input type="radio" class="btn-check" name="payment_type" id="btnradio3" value="upi" autocomplete="off" disabled>
										
									</div>
									<!---<p>Credit Cart Details (Secure payment)</p>
									<div class="checkout-product-details">
										<div class="payment">
											<div class="card-details">
											
												<div class="form-group">
													<label for="card-number">Card Number <span class="required">*</span></label>
													<input  id="card-number" class="form-control" name="card_no"  type="tel" placeholder="•••• •••• •••• ••••">
												</div>
												<div class="form-group half-width padding-right">
													<label for="card-expiry">Expiry (MM/YY) <span class="required">*</span></label>
													<input id="card-expiry" class="form-control" name="card_ex" type="tel" placeholder="MM / YY">
												</div>
												<div class="form-group half-width padding-left">
													<label for="card-cvc">Card Code <span class="required">*</span></label>
													<input id="card-cvc" class="form-control" name="card_cvv" type="tel" maxlength="4" placeholder="CVC" >
												</div>
												
											
											</div>
										</div>
									</div>---->
								</div>
							</div>
						</div>

						<input class="btn btn-main mt-20" type="submit" name="submit" value="PLACE ORDER" />
					</form>
					</div>
					
				</div>
            </div>

			<!---ORDER SUMMARY-->
            <div class="col-md-4">
               <div class="product-checkout-details">
                  <div class="block">
                     <h4 class="widget-title">Order Summary</h4>
					 <?php 
					 	$cart_total=0;
					    foreach($_SESSION['cart'] as $key=>$val){
                        $productArr=get_product($con,'','',$key);
                        $pid=$productArr[0]['product_id'];
                        $pname=$productArr[0]['pname'];
                        $price=$productArr[0]['price'];
                        $image=$productArr[0]['img1'];
                        $qty=$val['qty'];
						$cart_total=$cart_total+($qty*$price);
                    ?>
                     <div class="media product-card">
                        <a class="pull-left" href="product.php?id=<?php echo $pid?>">
                           <img class="media-object" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image ?>" alt="Image" />
                        </a>
                        <div class="media-body">
                           <h4 class="media-heading"><a href="product-single.html"><?php echo $pname ?></a></h4>
                           <p class="price">₹<?php echo $qty*$price ?> </p>
                           <a class="product-remove" href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')">Remove<i class="fas fa-trash"></i></a>
						   
                        </div>
						<?php } ?>
                     </div>
                     <ul class="summary-prices">
						 <hr>
                        <li>
                           <span>Subtotal:</span>
                           <span class="price">₹<?php echo $cart_total ?></span>
                        </li>
                        <li>
                           <span>Shipping:</span>
                           <span class="price">FREE</span>
                        </li>
                     </ul>
					 <div class="discount-code">
                        <p>Have a discount ? enter it here</p>
						<div class="coupon-input">
							<input class="form-control" type="text" id="coupon_str" placeholder="Enter Coupon Code">
		               		<button type="button" class="btn btn-main" onclick="set_coupon()" >Apply Coupon</button>
						</div>
						<span id="coupon-error"></span>
						<div class="coupon-total">
							<span id="coupon-label">Coupon</span>
							<span id="coupon-total">₹</span>
						</div>
                     </div>
                     <div class="summary-total">
                        <span>Total</span>
                        <span id="order-total">₹<?php echo $cart_total ?></span>
                     </div>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
						</div>
   </div>
</div>

   <!-- COUPON -->
   <div class="modal fade" id="coupon-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-body">
               
            </div>
         </div>
      </div>
   </div>
<script>
	function set_coupon(){
		
		var coupon_str=jQuery('#coupon_str').val();
		if(coupon_str!=''){
			jQuery.ajax({
			url:'set_coupon.php',
			type:'post',
			data:'coupon_str='+coupon_str,
			success:function(result){
			
		        result=result.replace(/[\r\n]+/gm,"");
				console.log("_"+result+"_");
				var data=jQuery.parseJSON(result);
				if(data.is_error=='yes'){
					jQuery('#coupon-error').html(data.result);
					
				}
				if(data.is_error=='no'){
					jQuery('#coupon-error').hide();
					jQuery('.coupon-total').show();
					jQuery('#coupon-total').html('₹'+data.coupon);
					jQuery('#order-total').html('₹'+data.result);
				}
			}
			});
		}
	}
</script>  
<?php
if(isset($_SESSION['COUPON_ID'])){
	unset($_SESSION['COUPON_ID']);
	unset($_SESSION['COUPON_CODE']);
	unset($_SESSION['COUPON_DISCOUNT']);
} /**Unsets on reload of page */

  include("poa-footer.php");
?>