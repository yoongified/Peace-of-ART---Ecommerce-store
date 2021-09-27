<?php
    require('dash-top.php');
/**status toggle */
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='stats'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['review_id']);
		if($operation=='active'){
			$status='1'; 
		}else{
			$status='0';
		}
		$update_status="update product_review set stats='$status' where review_id='$id'";
		mysqli_query($con,$update_status);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['review_id']);
		$delete_sql="delete from product_review where review_id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

?>

<!--Main Content starts --->
    
<div class="main-container">  

	<!---START REVIEW---->
        <div class="page-heading">
			<div><h1>CUSTOMER REVIEWS</h1></div>
				<div class="card">TOTAL REVIEWS
				<h1>
				<?php 
					$query="select product_review.*,product.img1 from product_review,product where product.product_id=product_review.product_id  order by product_review.review_id desc";
					$res=mysqli_query($con,$query);
					
					$num=mysqli_num_rows($res);
					echo $num;
				?>
				</h1>
			</div>
		</div>

	<?php 	
	while($row=mysqli_fetch_assoc($res)){
		$image=$row['img1'];
		?>	   
		
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
						<tr>
							<th>CUSTOMER ID</th>
							<td><?php echo $row['customer_id']?></td>
						</tr>
					</table>
				</div>

				<div class="review-img">
					<?php
						echo "<a target='_blank' href='".PRODUCT_IMAGE_SITE_PATH.$image."'><img width='150px' src='".PRODUCT_IMAGE_SITE_PATH.$image."'/></a>"
					?>
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
					<div>
						<?php
							if($row['stats']==1){
								echo "<a href='?type=stats&operation=deactive&review_id=".$row['review_id']."'><span class='active'>Active</span></a>";
							}else{
								echo "<a href='?type=stats&operation=active&review_id=".$row['review_id']."'><span class='deactive'>Inactive</span></a>";
							}
							echo "      <a href='?type=delete&review_id=".$row['review_id']."'><span class='fas fa-trash red'></span></a>";						
						?>
					</div>
				</div>
				
			</div>
			
        </div>   
	<?php }?>	
	<!---END REVIEW---->

<!--Main Content ends ---> 
	</div>



<?php
    require('dash-footer.php');
?>