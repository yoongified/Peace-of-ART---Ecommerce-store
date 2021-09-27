<?php
  include("poa-top.php");
   
?>


<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">MY ACCOUNT</h1>
					<ol class="breadcrumb">
						<li><a href="home.php">Home</a></li>
						<li class="active">Orders</li>
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
          			<li><a href="wishlist.php">Wishlist</a></li>
					<li><a class="active" href="order.php">Orders</a></li>
	
				</ul>

				<div class="dashboard-wrapper user-dashboard">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Order ID</th>
									<th>Date</th>
									<th>ADDRESS</th>
									<th>Payment Type</th>
									<th>Total Price</th>
									<th>Payment Status</th>
									<th>Order Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
									$uid=$_SESSION['USER_ID'];
									$res=mysqli_query($con,"select distinct `order`.*,order_status.name as order_status_str from `order`,order_status where `order`.customer_id='$uid' and order_status.id=`order`.order_status");
								
									while($row=mysqli_fetch_assoc($res)){
								?>
								<tr>
									<td>#<?php echo $row['id']?></td>
									<td><?php echo $row['added_on']?></td>
									<td>
										<?php echo $row['address']?><br>
										<?php echo $row['zipcode']?><br>
										<?php echo $row['city']?><br>
								    </td>
									<td><?php echo $row['payment_type']?><br></td>
									<td>₹<?php echo $row['total']?><br></td>
									<td><span class="label label-warning"><?php echo $row['payment_status']?></span></td>
										
									<!---ORDER STATUS COLOR-->
									<?php
										if($row['order_status']==1)
											$ostat_color="label label-warning";
										else if($row['order_status']==2)
											$ostat_color="label label-primary";
										else if($row['order_status']==3)
											$ostat_color="label label-info";
										else if($row['order_status']==4)
											$ostat_color="label label-danger";
										else if($row['order_status']==5)
											$ostat_color="label label-success";
									?>
									<!---ORDER STATUS COLOR-->
									<td><span class="<?php echo $ostat_color?>"><?php echo $row['order_status_str']?></span></td>
									<td><a class="btn btn-default" href="order_detail.php?id=<?php echo $row['id']?>&date=<?php echo $row['added_on']?>">View</a></td>
								</tr>
								<?php 
									}
								?>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php

  include("WEB/_newsletter.php");  /**display if notsubscribed */
  include("poa-footer.php");
?>