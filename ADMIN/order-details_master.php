<?php
    require('dash-top.php');

$order_id=get_safe_value($con,$_GET['id']);

$coupondetails=mysqli_fetch_assoc(mysqli_query($con,"select coupon_discount,coupon_code from `order` where id=$order_id"));
$discount=$coupondetails['coupon_discount'];
$coupon_code=$coupondetails['coupon_code'];
if(isset($_POST['update_order_status'])){
$update_ostat=$_POST['update_order_status'];
mysqli_query($con,"update `order` set order_status=$update_ostat where id='$order_id'");
}
?>

<!--Main Content starts --->
<div class="main-container">  
        <div class="page-heading">
			<div><h1>ORDER DETAILS</h1>

			</div>	
		</div>
			   
        <div class="tb">
            <table class="table ">
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
					$res=mysqli_query($con,"select distinct(order_details.id),
					order_details.*,product.pname,product.img1,
					`order`.address,`order`.zipcode,`order`.city,`order`.order_status from
					order_details,product,`order` 
					where order_details.order_id='$order_id' and order_details.order_id=`order`.id 
					and order_details.product_id=product.product_id");
					while($row=mysqli_fetch_assoc($res)){
					$address=$row['address'];
					$zip=$row['zipcode'];
					$city=$row['city'];
					$ostatus=$row['order_status'];
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
					<td ></td>
					<td >COUPON DISCOUNT</td>
					<td colspan=2><?php echo $coupon_code?></td>
					<td>- ₹<?php echo $discount?></td>
				</tr>
				<?php 
					}
				?>
				<tr>
					<td colspan=2></td>
					<td colspan=2>TOTAL </td>
					<td>₹<?php echo $total-$discount?></td>
				</tr>

			</tbody>
			</table>
							
        </div>   
		<div class="flex">
			<div class="tb">
				<strong>ADDRESS</strong>
				<br> <?php echo $address?> ,  <?php echo $city?> , <?php echo $zip?>
			</div>
			<div class="tb">
		
					<strong>ORDER STATUS  </strong>   
					<div>     
						<?php $ostatus_arr=mysqli_fetch_assoc(mysqli_query($con,"SELECT  `name` from order_status where id='$ostatus'")); 
											echo $ostatus_arr['name']?>
					</div>
					<div >
						<form method="post">
							<select class="dropdown" id="category-dropdown" name="update_order_status">
								<option >Select Status</option>
								<?php
									$res=mysqli_query($con,"SELECT distinct * from order_status");
									while($row=mysqli_fetch_assoc($res)){
										echo "<option value=".$row['id'].">".$row['name']."</option>";
									}					
								?>
							</select>
							<button class="btnn" type="submit" name="updatestat">UPDATE</button>
						</form>
					</div>

			</div>
		</div>

		<div class="options">
			<p>You nice keep goin!</p>
			<a href="order_master.php"><button type="submit"></i>BACK</button></a>
		</div>

<!--Main Content ends ---> 
	</div>

<?php
    require('dash-footer.php');
?>