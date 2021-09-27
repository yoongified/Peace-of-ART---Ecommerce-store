<?php
    require('dash-top.php');

$customer_id=get_safe_value($con,$_GET['id']);


?>

<!--Main Content starts --->
<div class="main-container">  
		<?php
			$res=mysqli_query($con,"SELECT * FROM customer WHERE customer_id='$customer_id'");
			$row=mysqli_fetch_assoc($res);
		?>
        <div class="page-heading">
			<h1>CUSTOMER DETAILS</h1>	
			<h2>CUSTOMER ID : #<?php echo $row['customer_id'] ?></h2>
			
		</div>
		
		<div class="tb">
			<table>
				<tr>
					<th>FNAME</th>
					<td><?php echo $row['fname'] ?></td>
				</tr>
				<tr>
					<th>LNAME</th>
					<td><?php echo $row['lname'] ?></td>
				</tr>
				<tr>
					<th>EMAIL</th>
					<td><?php echo $row['email'] ?></td>
				</tr>
				<tr>
					<th>MOBILE</th>
					<td><?php echo $row['mobile'] ?></td>
				</tr>
				<tr>
					<th>ADDED ON</th>
					<td><?php echo $row['added_on'] ?></td>
				</tr>
			</table>
		</div>

		<div class="tb">
			<div class="page-heading">
				<div><h2>ADDRESSBOOK</h2></div>
			</div>
		</div>

		<div class="tb">
			<?php
				$orderres=mysqli_query($con,"select distinct `order`.*,order_status.name as order_status_str from `order`,order_status where order_status.id=`order`.order_status and `order`.customer_id='$customer_id' order by `order`.id desc");
				$num=mysqli_num_rows($orderres);
	
			?>
			<div class="page-heading">
				<div><h2>ORDERS</h2></div>
			</div>
			<h3> TOTAL ORDERS : <?php echo $num;?></h3>

			<table class="table ">
			<thead>
				<tr>
					<th>Order ID
					</th>
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
				<?php while($row=mysqli_fetch_assoc($orderres)){ ?>
				<tr>
					<td>#<?php echo $row['id']?>
					<br><a href="../order_invoice.php?id=<?php echo $row['id']?>&date=<?php echo $row['added_on']?>">PDF</a>
					</td>
					<td><?php echo $row['added_on']?></td>
					<td>
						<?php echo $row['address']?><br>
						<?php echo $row['zipcode']?><br>
						<?php echo $row['city']?><br>
					</td>
					<td><?php echo $row['payment_type']?><br></td>
					<td>₹<?php echo $row['total']?><br></td>
					<td><span class="label label-primary"><?php echo $row['payment_status']?></span></td>
					<td><span class="label label-primary"><?php echo $row['order_status_str']?></span></td>
					<td><a class="btn btn-default" href="order-details_master.php?id=<?php echo $row['id']?>"><span class="blue">View</span></a></td>
				</tr>
				<?php 
					}
				?>
				
			</tbody>
			</table>
			
		</div>

		<div class="tb">
			<div class="page-heading">
				<div><h2>REVIEWS SUBMITTED</h2></div>
			</div>
				<?php 
					$query="select * from product_review where customer_id='$customer_id' order by review_id desc";
					$res=mysqli_query($con,$query);
	
					while($row=mysqli_fetch_assoc($res)){?>	   
						<div class="tb">
							<div class="flex">
								<div class="review-deets">
									<table>
										<tr>
											<th>REVIEW ID</th>
											<td><?php echo $row['review_id']?></td>
										</tr>
										<tr>
											<th>PRODUCT ID</th>
											<td><?php echo $row['product_id']?></td>
										</tr>
									</table>
								</div>
									
								<div class="review-content">
									<h3><?php echo $row['title']?></h3>
									<p><?php
										$i=$row['rating'];
										while($i>0){
									?>
										<i class="fas fa-star"></i>
									<?php $i--; } ?>
										|   <?php echo $row['added_on']?></p>
									<p><?php echo $row['review']?></p>
											<br>
								</div>
								
							</div>
							
						</div>   
					<?php }?>
					</tr>
				</tbody>
			</table>
        </div> 

		<div class="options">
			<p>You nice keep goin!</p>
			<a href="customer.php"><button type="submit"></i>BACK</button></a>
		</div>

<!--Main Content ends ---> 
	</div>

<?php
    require('dash-footer.php');
?>