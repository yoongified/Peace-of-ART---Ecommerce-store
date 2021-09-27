<?php
  include("poa-top.php");

if(!isset($_SESSION['USER_LOGIN'])){
?>
  <script>window.location.href='home.php';</script>
<?php
}
$uid=$_SESSION['USER_ID'];
if(isset($_GET['wishlist_id'])){
  $wid=$_GET['wishlist_id'];
  mysqli_query($con,"delete from wishlist where id='$wid' and customer_id='$uid'");
}
$res=mysqli_query($con,"select product.product_id,product.pname,product.img1,product.mrp,
product.price,wishlist.id from product,wishlist where 
wishlist.product_id=product.product_id and wishlist.customer_id='$uid'");

?>
 


<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">MY ACCOUNT</h1>
					<ol class="breadcrumb">
						<li><a href="home.php">Home</a></li>
						<li class="active">Wishlist</li>
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
          			<li><a class="active" href="wishlist.php">Wishlist</a></li>
					<li><a class href="order.php">Orders</a></li>		
				</ul>

				<div class="dashboard-wrapper user-dashboard">
					<div class="table-responsive">
						<table class="table">
							<thead>
                <tr>
                  <th class=""></th>
                  <th class="">Item Name</th>
                  <th class="">Item Price</th>
                  <th class="">Actions</th>
                </tr>
							</thead>
							<tbody>
                <?php 
                  while($row=mysqli_fetch_assoc($res)){
                ?>
                <tr class="">
                  <td class=""><img width="80" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['img1']?>" alt="" /></td>
                  <td class="">
                    <div class="product-info">
					<a href="product.php?id=<?php echo $row['product_id']?>"><?php echo $row['pname']?></a>
                    </div>
                  </td>
                  <td class="">₹<?php echo $row['price']?><br>
                  <strike>₹<?php echo $row['mrp']?></strike>
                  </td>

                  <td class="">
                    <a class="product-remove" href="wishlist.php?wishlist_id=<?php echo $row['id']?>" ><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
						</table>  
					</div> 
				</div>
			</div>
		</div>
    <a href="home.php" class="btn btn-main pull-left">Continue Shopping</a>
    <a href="checkout.php" class="btn btn-main pull-right">Checkout</a>
	</div>
</section>





<?php
  include("poa-footer.php");
?>