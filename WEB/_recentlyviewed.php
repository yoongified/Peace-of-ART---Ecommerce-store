<?php
	//unset($_COOKIE['RECENT']);
	if(isset($_COOKIE['RECENT'])){
		$arrRECENT=unserialize($_COOKIE['RECENT']);
		//get only 4 products
		$countRecent=count($arrRECENT);
		$countStart=$countRecent-4;
		if($countRecent>4){
			$arrRECENT=array_slice($arrRECENT,$countStart,4);
		}

		$recentVIEWid=implode(",",$arrRECENT);
		$res=mysqli_query($con,"SELECT * FROM product where product_id IN ($recentVIEWid)");
	
?>

<section class="products section bg-gray">
	<div class="container">
		<div class="row">
			<div class="title text-center">
				<h2>RECENTLY VIEWED PRODUCTS</h2>
			</div>
		</div>
		<div class="row">
		<?php 
			while($list=mysqli_fetch_assoc($res)){
		?>
			<div class="col-md-3">
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
<?php 
	$arCOOKIE=unserialize($_COOKIE['RECENT']);
	if(($key=array_search($pid,$arCOOKIE))!==false){
		unset($arCOOKIE[$key]);
	}
	$arCOOKIE[]=$pid;
	setcookie('RECENT',serialize($arCOOKIE),time()+60*60);
	}
	else{
		$arCOOKIE[]=$pid;
		setcookie('RECENT',serialize($arCOOKIE),time()+60*60);
	}

 ?>