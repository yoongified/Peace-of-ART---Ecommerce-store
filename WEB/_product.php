<?php
if(isset($_GET['id'])){
	$pid=get_safe_value($con,$_GET['id']);

	$res=mysqli_query($con,"select * from product where product_id='$pid'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$get_product=get_product($con,'','',$pid);
		
	}
	else{
		?>
		<script>
		window.location.href='home.php';
		</script>
		<?php
	}
	$reviewresult=mysqli_query($con,"select product_review.*,customer.fname from product_review,customer where product_review.product_id='$pid' and product_review.customer_id=customer.customer_id and product_review.stats=1");
	
	if(isset($_SESSION['USER_ID'])){
	$cid=$_SESSION['USER_ID'];
	$reviewcheck=mysqli_query($con,"select * from product_review where customer_id='$cid' and product_id='$pid'");
	if(mysqli_num_rows($reviewcheck)>0){
		
	}else{
		if(isset($_POST['reviewsubmit'])){
		
		$rating=get_safe_value($con,$_POST['rating']);
		$title=get_safe_value($con,$_POST['title']);
		$review=get_safe_value($con,$_POST['review']);
		$added_on=date('Y-m-d h:i:s');
		mysqli_query($con,"insert into product_review(product_id,customer_id,title,review,rating,stats,added_on)values('$pid','$cid','$title','$review','$rating','1','$added_on')");
		}
	}	

	
	
}	
	
}else{
	?>
	<script>
	window.location.href='home.php';
	</script>
	<?php
}



?>

<section class="single-product">
	<div class="container">
		<div class="row">
			<div class="col-md-6" style="width: 100%;">
				<ol class="breadcrumb">
					<li><a href="home.php">Home</a></li>
					<li><a href="category.php?id=<?php echo $get_product['0']['cat_id']?>"><?php echo $get_product['0']['cat_name']?></a></li>
					<li class="active"><?php echo $get_product['0']['pname']?></li>
				</ol>
			</div>
			
		</div>
		<div class="row mt-20">
			<div class="col-md-5">
				<div class="single-product-slider">
					<div id='carousel-custom' class='carousel slide' data-ride='carousel'>
						<div class='carousel-outer'>
							<!-- me art lab slider -->
							<div class='carousel-inner '>
								<div class='item active'>
									<img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['img1']?>" alt='' data-zoom-image="images/shop/single-products/product-1.jpg" />
								</div>
								<?php
									$resMultipleImage=mysqli_query($con,"SELECT id,product_images FROM images where product_id='$pid'");
									if(mysqli_num_rows($resMultipleImage)>0){
									while($rowMultipleImage=mysqli_fetch_assoc($resMultipleImage)){
								?>
								<div class='item'>
									<img src="<?php echo PRODUCT_MULTIPLE_IMAGE_SITE_PATH.$rowMultipleImage['product_images'];?>" alt='' data-zoom-image="<?php echo PRODUCT_MULTIPLE_IMAGE_SITE_PATH.$rowMultipleImage['product_images'];?>" />
								</div>
								<?php }} ?>
						
							</div>
							
							<!-- sag sol -->
							<a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
								<i class="tf-ion-ios-arrow-left"></i>
							</a>
							<a class='right carousel-control' href='#carousel-custom' data-slide='next'>
								<i class="tf-ion-ios-arrow-right"></i>
							</a>
						</div>
						
						<!-- thumb -->
						<ol class='carousel-indicators mCustomScrollbar meartlab'>
							<li data-target='#carousel-custom' data-slide-to='0' class='active'>
								<img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['img1']?>" alt='' />
							</li>
							<?php	$i=1;
									$resMultipleImage=mysqli_query($con,"SELECT id,product_images FROM images where product_id='$pid'");
									if(mysqli_num_rows($resMultipleImage)>0){
									while($rowMultipleImage=mysqli_fetch_assoc($resMultipleImage)){
								?>
									<li data-target='#carousel-custom' data-slide-to='<?php echo $i;?>'>
										<img src='<?php echo PRODUCT_MULTIPLE_IMAGE_SITE_PATH.$rowMultipleImage['product_images'];?>' alt='' />
									</li>
								<?php $i++;}} ?>
							

							
						</ol>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="single-product-details">
					<h2><?php echo $get_product['0']['pname']?></h2>
					<p class="product-price"><strike>₹<?php echo $get_product['0']['mrp']?></strike> ₹<?php echo $get_product['0']['price']?></p>
					
					<p class="product-description mt-20">
					<?php echo $get_product['0']['short_desc']?>
					</p>
					<?php
						$ProductSoldQty=ProductSoldQty($con,$get_product['0']['product_id']);
						
						$cart_show='yes';
						if($get_product['0']['stock']>$ProductSoldQty){
							echo '<div class="alert alert-info alert-common" role="alert"><i class="tf-ion-android-checkbox-outline"></i><span>Product in stock!</span> Hurry up and get one today.</div>';
							
						}else{
							echo '<div class="alert alert-warning alert-common" role="alert"><i class="tf-ion-alert-circled"></i><span>Product currently not available!!</span>Subscribe to get notified.</div>';
							$cart_show='';
						}
					?>
					<?php
						if($cart_show!=''){
							$ProductAvail=$get_product['0']['stock']-$ProductSoldQty;
					?>
					<div class="product-quantity">
						<span>Quantity:</span>
						<div class="product-quantity-slider">
							<input id="qty" type="number" name="product-quantity" value="1" min="1"  required >
						</div>
					</div>
					<?php	} ?>
					<div class="product-category">
						<span>Categories:</span>
						<blockquote>
							<ul>
								<li><a href="category.php?id=<?php echo $get_product['0']['cat_id']?>"><?php echo $get_product['0']['cat_name']?></a></li>
								<?php
									$subid=$get_product['0']['subcat_id'];
									$subcat=mysqli_query($con,"select subcat_name from subcategory where subcat_id=$subid");
									$subrow=mysqli_fetch_assoc($subcat);
								?>
								<li><a href="category.php?id=<?php echo $get_product['0']['cat_id']?>&subcatid=<?php echo $get_product['0']['subcat_id']?>"><?php echo $subrow['subcat_name']?></a></li>
							</ul>
						</blockquote>
						
					</div>
					<?php
						if($cart_show!=''){
					?>
					<a href="javascript:void(0)" class="btn btn-main btn-medium btn-round-full  btn-icon" onclick="manage_cart('<?php echo $get_product['0']['product_id']?>','add')"><i class="tf-ion-ios-cart-outline"></i>Add To Cart</a>
					<a class="btn btn-main btn-medium btn-round-full  btn-icon" href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['product_id']?>','add','yes')" >BUY NOW</a>
					<?php	
				} ?> <br><br>
					<a class="btn btn-main btn-medium btn-round-full  btn-icon" href="javascript:void(0)" onclick="wishlist('<?php echo $get_product['0']['product_id']?>','add')" ><i class="tf-ion-ios-heart"></i>Wishlist</a>
				
				</div>
			</div>  
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="tabCommon mt-20">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#details" aria-expanded="true">Details</a></li>
						<li class=""><a data-toggle="tab" href="#reviews" aria-expanded="false">Reviews</a></li>
					</ul>
					<div class="tab-content patternbg">
						<div id="details" class="tab-pane fade active in">
							<h3>Product Description</h3><br>
							<blockquote><p><?php echo $get_product['0']['descr']?></p></blockquote>
						</div>
						<div id="reviews" class="tab-pane fade">
							
							<div class="post-comments">
						    	<ul class="media-list comments-list m-bot-50 clearlist">
								    <!-- Comment Item start-->
									<?php
									if(mysqli_num_rows($reviewresult)>0){
										
										while($list=mysqli_fetch_assoc($reviewresult)){
												
									?>
								    <li class="media">

								        <a class="pull-left" href="#!">
								            <img class="media-object comment-avatar" src="plugins/fontawesome/svgs/solid/user-circle.svg" alt="" width="50" height="50" />
								        </a>
 
								        <div class="media-body">
								            <div class="comment-info">
								                <h4 class="comment-author">
													<?php echo $list['fname']?>       <time datetime="<?php echo $list['added_on']?>">|  <?php echo $list['added_on']?></time>
								                </h4>
												<?php
													$i=$list['rating'];
													while($i>0){
												?>
								                <i class="fas fa-star"></i>
												<?php $i--; } ?>
								            </div>
											<div>
												
												<p>
												<strong><?php echo $list['title']?></strong><br><?php echo $list['review']?>
								           		</p>
											</div>
								            
								        </div>

								    </li> <!--End Comment Item -->
									<?php }} else{?>
								    	<li> No Reviews found. Be the first to leave one.</li>
										<?php if(!isset($_SESSION['USER_LOGIN'])){
											echo '<div class="alert alert-warning alert-common alert-solid" role="alert"><i class="fas fa-star"></i><a href="login.php">Please login to submit product review .</a> </div>';
										}?>
										
									<?php }?>
								</ul>
								<?php 
									if(isset($_SESSION['USER_LOGIN'])){	
										if(mysqli_num_rows(mysqli_query($con,"select * from product_review where customer_id='$cid' and product_id='$pid'"))>0){
								?>
								
								<div class="alert alert-warning alert-common alert-solid" role="alert"><i class="fas fa-star"></i>You have already submitted your review.</div>
								<?php }else{
								?>
								<div>
									<hr>
									<h3>Enter your review</h3>
									<form method="post">													
										<div class="form-group" >
											<select class="form-control" name="rating" required>
												<option value="">Select Rating</option>
												<option value="5">Fantastic</option>
												<option value="4">Great</option>
												<option value="3">Good</option>
												<option value="2">Bad</option>
												<option value="1">Worst</option>
											</select>
										</div>
										<div class="form-group">
											<input class="form-control" id="" name="title" rows=10 placeholder="Enter your review title here...." required />
										</div>
										<div class="form-group">
											<textarea class="form-control" id="" name="review" rows=10 placeholder="Enter your review here...." required ></textarea>
										</div>
										<input class="btn btn-main mt-20" type="submit" name="reviewsubmit" value="SUBMIT REVIEW" />
									</form>
								</div>
								<?php
								}
								}?>
									
								<?php
								?>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

