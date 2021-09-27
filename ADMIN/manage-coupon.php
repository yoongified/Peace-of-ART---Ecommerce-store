<?php
ob_start();
require('dash-top.php');

$coupon_code='';
$coupon_value='';
$coupon_type='';
$cart_min_value='';
$status='';

$msg='';

if(isset($_GET['coup_id']) && $_GET['coup_id']!=''){
	$id=get_safe_value($con,$_GET['coup_id']);
	$res=mysqli_query($con,"select * from coupon_master where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$coupon_code=$row['coupon_code'];
		$coupon_value=$row['coupon_value'];
		$coupon_type=$row['coupon_type'];
		$cart_min_value=$row['cart_min_value'];
		$status=$row['stats'];
	}
	else{
		header('location:coupon.php');
		die();
	}
}



if(isset($_POST['add'])){

	$coupon_code=get_safe_value($con,$_POST['coupon_code']);
	$coupon_value=get_safe_value($con,$_POST['coupon_value']);
	$coupon_type=get_safe_value($con,$_POST['coupon_type']);
	$cart_min_value=get_safe_value($con,$_POST['cart_min_value']);
	$status=get_safe_value($con,$_POST['stats']);

	$ress=mysqli_query($con,"select * from coupon_master where coupon_code='$coupon_code'");
	$check=mysqli_num_rows($ress);
	if($check>0){
		if(isset($_GET['coup_id']) && $_GET['coup_id']!=''){
			$d=mysqli_fetch_assoc($ress);
			if($id==$d['id']){
			}
			else{
				$msg="Coupon already exist";	 /**ERROR WHILE RENAMING EXISTING Coupon*/
			}
		}
		else{ 
				$msg="Coupon already exists"; /**ERROR WHILE ADDING NEW Coupon*/
		}
	}

	if($msg==''){
		if(isset($_GET['coup_id']) && $_GET['coup_id']!=''){
			$update_sql="UPDATE coupon_master SET coupon_code='$coupon_code',coupon_value='$coupon_value',coupon_type='$coupon_type',cart_min_value='$cart_min_value',stats='$status' WHERE id='$id'";
			mysqli_query($con,$update_sql);
		}
		else{
			mysqli_query($con,"INSERT INTO coupon_master(coupon_code,coupon_value,coupon_type,cart_min_value,stats)VALUES('$coupon_code','$coupon_value','$coupon_type','$cart_min_value','$status')");
		}
		header('location:coupon.php');
		die();
	}	
}
/**check for null character if not assigned put null string */
?>

<!--Main Content starts --->
<div class="main-container">  
        <div class="page-heading">
				<div><h1>ADD COUPON</h1></div>
		</div>
			   
        <div class="tb ">
            <form  method="post" enctype="multipart/form-data">

				<div class="form">
					<label >COUPON CODE</label>
					<input type="text" name="coupon_code" required value="<?php echo $coupon_code?>">	
				</div>
				<div class="form">
					<label >COUPON VALUE</label>
					<input type="number" name="coupon_value" required value="<?php echo $coupon_value?>">	
				</div>
				<div class="pform">
					<label >COUPON TYPE</label>
					<select class="dropdown" name="coupon_type" required>
						<?php 
							if($coupon_type=='PERCENTAGE'){
								echo "<option value=PERCENTAGE selected>PERCENTAGE</option>
								<option value=RUPEES>RUPEES</option>";
							}else if($coupon_type=='RUPEES'){
								echo "<option value=PERCENTAGE >PERCENTAGE</option>
								<option value=RUPEES selected>RUPEES</option>";
							}else{
								echo "<option value=PERCENTAGE >PERCENTAGE</option>
								<option value=RUPEES>RUPEES</option>";
							}
						?>
					</select>

					<label >MINIMUM CART VALUE</label>
					<input type="number" name="cart_min_value" required value="<?php echo $cart_min_value?>">	

					<label >STATUS</label>
					<select class="dropdown" name="status" required>
						<?php 
							if($status==1){
								echo "<option value=1 selected>ACTIVE</option>
								<option value=0 >INACTIVE</option>";
							}else if($status==0){
								echo "<option value=1 >ACTIVE</option>
								<option value=0 selected>INACTIVE</option>";
							}else{
								echo "<option value=1 >ACTIVE</option>
								<option value=0>INACTIVE</option>";
							}
						?>
					</select>
				</div>

				<div class="field_error"><?php echo $msg?></div>
				<div>
					<button class="btnn" type="submit" name="add">ADD COUPON</button>
				</div>

		</form>
	</div>   

	<div class="options">
		<p>Successfully added!</p>
		<a href="coupon.php"><button >BACK</button></a>
	</div>


<!--Main Content ends ---> 
	</div>

<?php
    require('dash-footer.php');
?>
