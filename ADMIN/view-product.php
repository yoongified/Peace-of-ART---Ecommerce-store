<?php
    require('dash-top.php');
	$id=$_GET['pid'];
	// Checking data it is a number or not
	if(!is_numeric($id)){
	echo "Data Error";
	exit;
}
$res=mysqli_query($con,"SELECT * FROM product WHERE product_id='$id'");
$row=mysqli_fetch_assoc($res);
$review=mysqli_query($con,"select * from product_review where product_id='$id' order by review_id desc");
?>

<!--Main Content starts --->
<div class="main-container">  
	<div class="page-heading">
		<div>
			<h2>PRODUCT ID : #<?php echo $row['product_id'] ?></h2>
			<h1><?php echo $row['pname'] ?></h1>
		</div>
	</div>
			   
    <div class="tb">
		<div class="product-deets">	
			<!---Product IMG START-->
			<div>
				<!-- The grid: four columns -->
				<div class="row" >
					<div class="column">
						<img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['img1'] ?>"  onclick="myFunction(this);">
					</div>
					<?php
						$resMultipleImage=mysqli_query($con,"SELECT id,product_images FROM images where product_id='$id'");
						if(mysqli_num_rows($resMultipleImage)>0){
						while($rowMultipleImage=mysqli_fetch_assoc($resMultipleImage)){
					?>
						<div class="column">
							<img src="<?php echo PRODUCT_MULTIPLE_IMAGE_SITE_PATH.$rowMultipleImage['product_images'];?>" alt='' data-zoom-image="<?php echo PRODUCT_MULTIPLE_IMAGE_SITE_PATH.$rowMultipleImage['product_images'];?>" onclick="myFunction(this);">
						</div>
					<?php }} ?>		
				</div>
				<!-- The expanding image container -->
				<div class="container">
				<!-- Close the image -->
				<span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>

				<!-- Expanded image -->
				<img id="expandedImg" style="width:100%">

				<!-- Image text -->
				<div id="imgtext"></div>
				</div>
			</div>
			<!---Product IMG END-->

			<!---Product details START-->
			<div style="margin:auto;">
				<table>
					<tr>
						<th>BRAND</th>
						<td><?php echo $row['brand'] ?></td>
					</tr>
					<tr>
						<th>CATEGORY</th>
						<td><?php echo $row['cat_id'] ?></td>
					</tr>
					<tr>
						<th>SUBCATEGORY</th>
						<td><?php echo $row['subcat_id'] ?></td>
					</tr>
					<tr>
						<th>MRP</th>
						<td><?php echo $row['mrp'] ?></td>
					</tr>
					<tr>
						<th>PRICE</th>
						<td><?php echo $row['price'] ?></td>
					</tr>
					<tr>
						<th>STOCK</th>
						<td><?php echo $row['stock'] ?></td>
					</tr>
					<tr>
						<th>META TITLE</th>
						<td><?php echo $row['meta_title'] ?></td>
					</tr>
					<tr>
						<th>META KEYWORD</th>
						<td><?php echo $row['meta_keyword'] ?></td>
					</tr>
					<tr>
						<th>BESTSELLER</th>
						<td>
						<?php 
							if($row['best_seller']==1){
								echo "YES";
							}else if($row['best_seller']==0){
								echo "NO";
							}
						?>
						</td>
					</tr>
					<tr>
						<th>STATUS</th>
						<td><?php 
							if($row['stats']==1){
								echo "ACTIVE";
							}else if($row['stats']==0){
								echo "INACTIVE";
							}
						?>
						</td>
					</tr>
				</table>
			</div>
			
			
		</div>
		<br><hr><br>
		<h3>SHORT DESCRIPTION</h3>
		<?php echo $row['short_desc'] ?> <br><br><hr><br>
		<h3>DESCRIPTION</h3>
		<?php echo $row['descr'] ?>

		<!---Product details END-->
		<div class="options">
			<a href="manage-product.php?pid=<?php echo $row['product_id']?>"><button><i class="fas fa-edit"></i>EDIT PRODUCT</button></a>
		</div>  
	</div>
		
	<div class="tb">
		<div class="page-heading">
			<div><h2>PRODUCT REVIEWS</h2></div>
		</div>
		<?php 	
		$query="select * from product_review where product_id='$id' order by review_id desc";
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
								<th>CUSTOMER ID</th>
								<td><?php echo $row['customer_id']?></td>
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
			<p>COOL!</p>
			<a href="product.php"><button >BACK</button></a>
	</div>
<!--Main Content ends ---> 
</div>

<script>
	function myFunction(imgs) {
  // Get the expanded image
  var expandImg = document.getElementById("expandedImg");
  // Get the image text
  var imgText = document.getElementById("imgtext");
  // Use the same src in the expanded image as the image being clicked on from the grid
  expandImg.src = imgs.src;
  // Use the value of the alt attribute of the clickable image as text inside the expanded image
  imgText.innerHTML = imgs.alt;
  // Show the container element (hidden with CSS)
  expandImg.parentElement.style.display = "block";
}
</script>

<?php
    require('dash-footer.php');
?>