<?php
    require('dash-top.php');

	if(isset($_GET['type']) && $_GET['type']!=''){
		$type=get_safe_value($con,$_GET['type']);
		if($type=='best'){
			$operation=get_safe_value($con,$_GET['operation']);
			$id=get_safe_value($con,$_GET['pid']);
			if($operation=='active'){
				$best='1'; 
			}else{
				$best='0';
			}
			$update_status="update product set best_seller='$best' where product_id='$id'";
			mysqli_query($con,$update_status);
		}
	}


	$res=mysqli_query($con,"SELECT * FROM product where best_seller='1' order by product_id desc");
?>

<!--Main Content starts --->
<div class="main-container">  
        <div class="page-heading">
				<div><h1>FEATURED PRODUCTS</h1></div>
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
							<td>#<?php echo $row['product_id']?></td>
							<td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['img1']?>" ></td>
							<td><?php
									echo "<a href='view-product.php?pid=".$row['product_id']."'>"?> <?php echo $row['pname']?> </a>
							</td>
							<td>₹<?php echo $row['mrp']?></td>
							<td><?php echo $row['stock']?></td>
							<td>
									<?php
										echo "<a class='badge badge-info ' href='?type=best&operation=deactive&pid=".$row['product_id']."'><span class='red'>REMOVE</span></a>";
									?>
							</td>	
							
						<?php } ?>	
						</tr>
					</tbody>
				</table>
			</div>
			
        </div>     

		<div class="options">
			<p>COOL!</p>
			<a href="product.php"><button >BACK</button></a>
		</div>


<!--Main Content ends ---> 
</div>


<?php
    require('dash-footer.php');
?>