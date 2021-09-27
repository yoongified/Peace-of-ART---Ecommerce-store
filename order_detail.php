<?php
  include("poa-top.php");
$order_id=get_safe_value($con,$_GET['id']);
$date=get_safe_value($con,$_GET['date']);

$coupondetails=mysqli_fetch_assoc(mysqli_query($con,"select coupon_discount from `order` where id=$order_id"));
$discount=$coupondetails['coupon_discount'];
?>


<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">MY ACCOUNT</h1>
					<ol class="breadcrumb">
						<li><a href="home.php">Home</a></li>
						<li><a href="order.php">Orders</a></li>
						<li class="active">Order Details</li>
						<li><a href="reviews.php">Reviews</a></li>	
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="user-dashboard page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="list-inline dashboard-menu text-center">
					<li><a href="profile-details.php">Profile Details</a></li>
          			<li><a class href="wishlist.php">Wishlist</a></li>
					<li><a class="active" href="order.php">Orders</a></li>
					<li><a href="address.php">Address</a></li>
					
				</ul>

				<div class="dashboard-wrapper user-dashboard">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th></th>
									<th>Product</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total Price</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$total=0;
									$uid=$_SESSION['USER_ID'];
									$res=mysqli_query($con,"select distinct(order_details.id),
									order_details.*,product.pname,product.img1 from
									order_details,product,`order` 
									where order_details.order_id='$order_id' and `order`.customer_id='$uid'
									and order_details.product_id=product.product_id");
									while($row=mysqli_fetch_assoc($res)){
										$total=$total+($row['price']*$row['qty']);
								?>
								<tr>
									<td><img class="media-object" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['img1']?>" height=120> </td>
									<td><?php echo $row['pname']?></td>
									<td>₹<?php echo $row['price']?></td>
									<td><?php echo $row['qty']?></td>
									<td>₹<?php echo $row['price']*$row['qty']?></td>

								</tr>
								<?php 
									}
									if($discount>0){
								?>
								<tr>
									<td  colspan=3></td>
									<td>COUPON DISCOUNT</td>
									<td>-₹<?php echo $discount?></td>
								</tr>
								<?php 
									}
								?>
								<tr>
									<td  colspan=3></td>
									<td>TOTAL </td>
									<td>₹<?php echo $total-$discount?></td>
								</tr>
								
							</tbody>
						</table>
					</div>
				</div>
			
			<a href="order.php" class="btn btn-main pull-left">BACK TO ORDERS</a>
    		<a href="order_invoice.php?id=<?php echo $order_id?>&date=<?php echo $date?>" class="btn btn-main pull-right"><i class="fas fa-download"></i>DOWNLOAD INVOICE</a>
			</div>
		</div>
	</div>
</section>

<?php

  include("WEB/_newsletter.php");  /**display if notsubscribed */
  include("poa-footer.php");
?>