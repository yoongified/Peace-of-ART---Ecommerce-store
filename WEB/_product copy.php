<?php
if(isset($_GET['id'])){
	$pid=mysqli_real_escape_string($con,$_GET['id']);
	$res=mysqli_query($con,"select * from product where product_id='$pid'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$get_product=get_product($con,'','',$pid);
	}else{
		?>
		<script>
		window.location.href='home.php';
		</script>
		<?php
	}
}else{
	?>
	<script>
	window.location.href='home.php';
	</script>
	<?php
}?>

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
					<p class="product-price">₹<?php echo $get_product['0']['price']?></p>
					
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
							<input id="qty" type="text" value="1"  name="product-quantity">
						</div>
					</div>
					<?php	} ?>
					<div class="product-category">
						<span>Categories:</span>
						<blockquote>
							<ul>
								<li><a href="product-single.html"><?php echo $get_product['0']['cat_id']?></a></li>
								<li><a href="product-single.html"><?php echo $get_product['0']['subcat_id']?></a></li>
							</ul>
						</blockquote>
						
					</div>
					<?php
						if($cart_show!=''){
					?>
					<a href="javascript:void(0)" class="btn btn-main btn-medium btn-round-full  btn-icon" onclick="manage_cart('<?php echo $get_product['0']['product_id']?>','add')"><i class="tf-ion-ios-cart-outline"></i>Add To Cart</a>
					<a class="btn btn-main btn-medium btn-round-full  btn-icon" href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['product_id']?>','add','yes')" >BUY NOW</a>
					<?php	} ?> <br><br>
					<a class="btn btn-main btn-medium btn-round-full  btn-icon" href="javascript:void(0)" onclick="wishlist('<?php echo $get_product['0']['product_id']?>','add')" ><i class="tf-ion-ios-heart"></i>Wishlist</a>
	
				</div>
			</div>  
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="tabCommon mt-20">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#details" aria-expanded="true">Details</a></li>
						<li class=""><a data-toggle="tab" href="#reviews" aria-expanded="false">Reviews (3)</a></li>
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
								    <li class="media">

								        <a class="pull-left" href="#!">
								            <img class="media-object comment-avatar" src="images/blog/avater-1.jpg" alt="" width="50" height="50" />
								        </a>

								        <div class="media-body">
								            <div class="comment-info">
								                <h4 class="comment-author">
								                    <a href="#!">Jonathon Andrew</a>
								                	
								                </h4>
								                <time datetime="2013-04-06T13:53">July 02, 2015, at 11:34</time>
								                <a class="comment-button" href="#!"><i class="tf-ion-chatbubbles"></i>Reply</a>
								            </div>

								            <p>
								                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at magna ut ante eleifend eleifend.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod laborum minima, reprehenderit laboriosam officiis praesentium? Impedit minus provident assumenda quae.
								            </p>
								        </div>

								    </li>
								    <!-- End Comment Item -->

								    <!-- Comment Item start-->
								    <li class="media">

								        <a class="pull-left" href="#!">
								            <img class="media-object comment-avatar" src="images/blog/avater-4.jpg" alt="" width="50" height="50" />
								        </a>

								        <div class="media-body">

								            <div class="comment-info">
								                <div class="comment-author">
								                    <a href="#!">Jonathon Andrew</a>
								                </div>
								                <time datetime="2013-04-06T13:53">July 02, 2015, at 11:34</time>
								                <a class="comment-button" href="#!"><i class="tf-ion-chatbubbles"></i>Reply</a>
								            </div>

								            <p>
								                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at magna ut ante eleifend eleifend. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni natus, nostrum iste non delectus atque ab a accusantium optio, dolor!
								            </p>

								        </div>

								    </li>
								    <!-- End Comment Item -->

								    <!-- Comment Item start-->
								    <li class="media">

								        <a class="pull-left" href="#!">
								            <img class="media-object comment-avatar" src="images/blog/avater-1.jpg" alt="" width="50" height="50">
								        </a>

								        <div class="media-body">

								            <div class="comment-info">
								                <div class="comment-author">
								                    <a href="#!">Jonathon Andrew</a>
								                </div>
								                <time datetime="2013-04-06T13:53">July 02, 2015, at 11:34</time>
								                <a class="comment-button" href="#!"><i class="tf-ion-chatbubbles"></i>Reply</a>
								            </div>

								            <p>
								                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at magna ut ante eleifend eleifend.
								            </p>

								        </div>

								    </li>
							</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

