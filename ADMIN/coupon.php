<?php
    require('dash-top.php');
/**status toggle */
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='stats'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['coup_id']);
		if($operation=='active'){
			$status='1'; 
		}else{
			$status='0';
		}
		$update_status="update coupon_master set stats='$status' where id='$id'";
		mysqli_query($con,$update_status);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['coup_id']);
		$delete_sql="delete from coupon_master where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}
	
?>


<!--Main Content starts --->
    
<div class="main-container">  

	<!---START CATEGORY---->
        <div class="page-heading">
			<div><h1>COUPON
				 MASTER</h1></div>
				<div class="card">TOTAL COUPONS
				<h1>
				<?php 
					$query="select * from coupon_master ";
					$res=mysqli_query($con,$query);
					$num=mysqli_num_rows($res);
					echo $num;
				?>
				</h1>
			</div>
		</div>
			   
        <div class="tb">
            <table class="table" id="editable_table">
			    <thead>
					<tr>
						<th>ID</th>
						<th>COUPON CODE</th>
						<th>COUPON VALUE</th>
						<th>COUPON TYPE</th>
						<th>MIN CART VALUE</th>
						<th>STATUS</th>
						
					</tr>
					
				</thead>
				<tbody>
				<?php 
					
						
					while($row=mysqli_fetch_assoc($res)){?>
					<tr>
						<td><?php echo $row['id']?></td>
						<td><?php echo $row['coupon_code']?></td>
						<td><?php echo $row['coupon_value']?></td>
						<td><?php echo $row['coupon_type']?></td>
						<td>₹<?php echo $row['cart_min_value']?></td>

						<td>
								<?php
								if($row['stats']==1){
									echo "<a class='badge badge-info ' href='?type=stats&operation=deactive&coup_id=".$row['id']."'><span class='active'>Active</span></a>";
								}else{
									echo "<a class='badge badge-secondary' href='?type=stats&operation=active&coup_id=".$row['id']."'><span class='deactive'>Inactive</span></a>";
								}
								?>
						</td>
						<td>
								<?php
								echo "<a href='manage-coupon.php?coup_id=".$row['id']."'><span class='fas fa-edit blue'></span></a>";
								
								echo "<a href='?type=delete&coup_id=".$row['id']."'><span class='fas fa-trash red'></span></a>";
								
								?>
						</td>				
						
					<?php } ?>	
					</tr>
				</tbody>
			</table>
			
			<div class="options" >
				<a href="manage-coupon.php"><button><i class="fas fa-plus-circle"></i>ADD NEW COUPON</button></a> 
			</div>

        </div>   

	<!---END CATEGORY---->
<!--Main Content ends ---> 
	</div>



<?php
    require('dash-footer.php');
?>