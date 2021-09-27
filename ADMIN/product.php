<?php
    require('dash-top.php');		
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='stats'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['pid']);
		if($operation=='active'){
			$status='1'; 
		}else{
			$status='0';
		}
		$update_status="update product set stats='$status' where product_id='$id'";
		mysqli_query($con,$update_status);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['pid']);
		$delete_sql="delete from product where product_id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

?>

<!--Main Content starts --->
<div class="main-container">  
        <div class="page-heading">
				<div><h1>PRODUCT MASTER</h1></div>
				<div class="card">TOTAL PRODUCTS
				<h1>
				<?php 
					$quer="SELECT * FROM product order by product.product_id desc";
					$res=mysqli_query($con,$quer);
					$num=mysqli_num_rows($res);
					echo $num;
				?>
				</h1>
				</div>
				
		</div>
		<div class="options">
			<a href="manage-product.php"><button ><i class="fas fa-plus-circle"></i>ADD NEW PRODUCT</button></a>
		</div>   
        <div class="tb">
			<div class="product-list">
				<table class="table" id="editable_table">
					<thead>
						<tr>
							<th>ID</th>
							<th colspan=2>PRODUCT</th>
							<th>MRP</th>
							<th>IN STOCK</th>
							<th colspan=2></th>
						</tr>
					</thead>
					<tbody>
					<?php 
						
							
						while($row=mysqli_fetch_assoc($res)){?>
						<tr>
							<td><?php echo $row['product_id']?></td>
							<td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['img1']?>" ></td>
							<td><?php
									echo "<a href='view-product.php?pid=".$row['product_id']."'>"?> <?php echo $row['pname']?> </a>
							</td>
							<td>₹<?php echo $row['mrp']?></td>
							<td><?php echo $row['stock']?></td>
							<td>
									<?php
									if($row['stats']==1){
										echo "<a class='badge badge-info ' href='?type=stats&operation=deactive&pid=".$row['product_id']."'><span class='active'>Active</span></a>";
									}else{
										echo "<a class='badge badge-secondary' href='?type=stats&operation=active&pid=".$row['product_id']."'><span class='deactive'>Inactive</span></a>";
									}
									?>
							</td>
							<td>
									<?php
									echo "<a href='manage-product.php?pid=".$row['product_id']."'><span class='fas fa-edit blue'></span></a>";
									
									echo "<a href='?type=delete&pid=".$row['product_id']."'><span class='fas fa-trash red'></span></a>";
									
									?>
							</td>				
							
						<?php } ?>	
						</tr>
					</tbody>
				</table>
			</div>
		
        </div>   

		
	    

<!--Main Content ends ---> 
	</div>

<?php
    require('dash-footer.php');
?>