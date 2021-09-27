<?php
$str=mysqli_real_escape_string($con,$_GET['str']);


if($str!=''){
	$getproduct=get_product($con,'','','',$str);
}else{
	?>
	<script>
	window.location.href='home.php';
	</script>
	<?php
}




?>
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Shop</h1>
					<ol class="breadcrumb">
						<li><a href="home.php">Home</a></li>
						<li ><a href="shop.php">Shop</a></li>
						<li class="active"><?php echo $str?></li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="products section">
	<div class="container">
		<div class="row">
			<!--start sidebar-->
			<div class="col-md-3">
				<div class="widget product-category">
					<h4 class="widget-title">Categories</h4>
					<div class="panel-group commonAccordion" id="accordion" role="tablist" aria-multiselectable="true">
					  <?php  $cat_res=mysqli_query($con,"select * from category where stats=1");
							 while($row=mysqli_fetch_assoc($cat_res)){ 
							 $id=$row['cat_id'];
						?>
					  <div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="<?php echo $id ?>">
					      <h4 class="panel-title">
					        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $id; ?>">
							<?php echo $row['cat_name']; ?>
					        </a>
					      </h4>
					    </div>
					    <div id="collapse<?php echo $id; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?php echo $id; ?>">
					    	<div class="panel-body">
					      		<ul>
								 	 <?php 
             							$subcat_res=mysqli_query($con,"select * from subcategory where cat_id=$id"); 
            							while($row=mysqli_fetch_assoc($subcat_res)){?>
										<li><a href="category.php?id=<?php echo $row['cat_id'];?>"><?php echo $row['subcat_name'] ?></a></li>
									<?php } ?>
								</ul>
					    	</div>
					    </div>
					  </div>
					  <?php } ?>
					</div>
					
				</div>							
				


<!--end sidebar-->
			</div>

			<?php if(count($getproduct)>0){  ?>
			<div class="col-md-9">
	 		<div class="row">
					
		     <?php 
				
			foreach($getproduct as $list){  ?>
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
		<?php } 
		else { echo "Data not found"; } ?>
	</div>
</section>


