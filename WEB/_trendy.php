<section class="products section bg-gray">
	<div class="container">
		<div class="row">
			<div class="title text-center">
				<h2>TRENDY PRODUCTS</h2>
			</div>
		</div>
		<div class="row">
			<?php 
				$getproduct=get_product($con,6,'','','','',"best");
				foreach($getproduct as $list){ ?>
			<div class="col-md-4">
				<div class="product-item">
					<div class="product-thumb">
						<span class="bage">Sale</span>
						<img class="img-responsive" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['img1']?>" alt="product-img" />
						<div class="preview-meta">
							<ul>
								<li>
									<a href="product.php?id=<?php echo $list['product_id']?>" ><i class="tf-ion-ios-search-strong"></i></a>
								</li>
								<li>
									<a href="javascript:void(0)" onclick="wishlist('<?php echo $list['product_id']?>','add')" ><i class="tf-ion-ios-heart"></i></a>
								</li>
								<div class="cart-add">
									<input id="qty" type="text" value="1" name="product-quantity" >
								</div>
								<li>
									<a href="javascript:void(0)" onclick="manage_cart('<?php echo $list['product_id']?>','add')"><i class="tf-ion-android-cart"></i></a>
								</li>
							</ul>
                      	</div>
					</div>
					<div class="product-content">
						<h4><a href="product.php?id=<?php echo $list['product_id']?>"><?php echo $list['pname']?></a></h4>
						<p class="price">₹<?php echo $list['price']?></p>
					</div>
				</div>
			</div>
			<?php }?>
		</div>
	</div>
</section>