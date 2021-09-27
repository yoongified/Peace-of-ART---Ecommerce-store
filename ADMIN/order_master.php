<?php
    require('dash-top.php');
			
$res=mysqli_query($con,"select distinct `order`.*,order_status.name as order_status_str from `order`,order_status where order_status.id=`order`.order_status order by `order`.id desc");

?>

<!--Main Content starts --->
<div class="main-container">  
        <div class="page-heading">
			<div><h1>ORDER MASTER</h1></div>
				<div class="card">TOTAL ORDERS
				<h1>
				<?php 
					$num=mysqli_num_rows($res);
					echo $num;
				?>
				</h1>

			</div>

		</div>
			   
        <div class="tb">
            <table class="table ">
			<thead>
				<tr>
					<th>Order ID</th>
					<th>Customer ID</th>
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
				<?php while($row=mysqli_fetch_assoc($res)){ ?>
				<tr>
					<td>#<?php echo $row['id']?>
					<br><i class="fas fa-file-pdf"></i><a href="../order_invoice.php?id=<?php echo $row['id']?>&date=<?php echo $row['added_on']?>">PDF</a>
					</td>
					<td><?php echo $row['customer_id']?></td>
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
		<div class="options">
			<p>You nice keep goin!</p>
			<a href="home.php"><button type="submit"></i>BACK</button></a>
		</div>

<!--Main Content ends ---> 
	</div>

<?php
    require('dash-footer.php');
?>