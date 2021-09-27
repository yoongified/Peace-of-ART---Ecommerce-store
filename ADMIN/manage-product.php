<?php
ob_start();
require('dash-top.php');

$cat='';
$scat='';
$name='';
$brand='';

$mrp='';
$price='';
$stock='';
$image='';
$image_required='required';

$multipleImageArr=[];

$short='';
$desc='';

$title='';
$keyword='';
$best='';
$stats='';
$msg='';

if(isset($_GET['pi']) && $_GET['pi']!=''){
	$id=get_safe_value($con,$_GET['pi']);
	$delete_sql="delete from images where id='$id'";
	mysqli_query($con,$delete_sql);
}

if(isset($_GET['pid']) && $_GET['pid']!=''){
	$image_required='';
	$id=get_safe_value($con,$_GET['pid']);
	$res=mysqli_query($con,"select * from product where product_id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$cat=$row['cat_id'];
		$scat=$row['subcat_id'];
		$name=$row['pname'];
		$brand=$row['brand'];

		$mrp=$row['mrp'];
		$price=$row['price'];
		$stock=$row['stock'];

		$image=$row['img1'];

		$short=$row['short_desc'];
		$desc=$row['descr'];
		$best=$row['best_seller'];
		$title=$row['meta_title'];
		$keyword=$row['meta_keyword'];

		$stats=$row['stats'];

		$resMultipleImage=mysqli_query($con,"SELECT id,product_images FROM images where product_id='$id'");
		if(mysqli_num_rows($res)>0){
			$kk=0;
			while($rowMultipleImage=mysqli_fetch_assoc($resMultipleImage)){
				$multipleImageArr[$kk]['product_images']=$rowMultipleImage['product_images'];
				$multipleImageArr[$kk]['id']=$rowMultipleImage['id'];
				$kk++;
			}
		}

	}
	else{
		header('location:product.php');
		die();
	}
}



if(isset($_POST['add'])){

	$cat=get_safe_value($con,$_POST['category']);
	$scat=get_safe_value($con,$_POST['subcategory']);

	$name=get_safe_value($con,$_POST['product']);
	$brand=get_safe_value($con,$_POST['brand']);

	$mrp=get_safe_value($con,$_POST['mrp']);
	$price=get_safe_value($con,$_POST['price']);
	$stock=get_safe_value($con,$_POST['stock']);

	$short=get_safe_value($con,$_POST['short']);
	$desc=get_safe_value($con,$_POST['description']);
	$best=get_safe_value($con,$_POST['best_seller']);
	$title=get_safe_value($con,$_POST['mtitle']);
	$keyword=get_safe_value($con,$_POST['mkeyword']);
	
	$stats=get_safe_value($con,$_POST['status']);

	$ress=mysqli_query($con,"select * from product where pname='$name'");
	$check=mysqli_num_rows($ress);
	if($check>0){
		if(isset($_GET['pid']) && $_GET['pid']!=''){
			$d=mysqli_fetch_assoc($ress);
			if($id==$d['product_id']){
			}
			else{
				$msg="Product already exist";	 /**ERROR WHILE RENAMING EXISTING PRODUCT*/
			}
		}
		else{ 
				$msg="Product already exists"; /**ERROR WHILE ADDING NEW PRODUCT*/
		}
	}

	if($_FILES['image']['type']!='' && ($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpeg' && $_FILES['image']['type']!='image/jpg')){
		$msg="Select only png,jpg,jpeg format";
	}
	
	if(isset($_FILES['product_images'])){
		foreach($_FILES['product_images']['type'] as $key=>$val){
			if($_FILES['product_images']['type'][$key]!='' && ($_FILES['product_images']['type'][$key]!='image/png' && $_FILES['product_images']['type'][$key]!='image/jpeg' && $_FILES['product_images']['type'][$key]!='image/jpg')){
				$msg="Select only png,jpg,jpeg format in multiple images";
			}
		}
	}

	if($msg==''){
		if(isset($_GET['pid']) && $_GET['pid']!=''){
			if($_FILES['image']['name']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
				$update_sql="UPDATE product SET cat_id='$cat',subcat_id='$scat',pname='$name',brand='$brand',mrp='$mrp',price='$price',stock='$stock',short_desc='$short',descr='$desc',best_seller='$best',meta_title='$title',meta_keyword='$keyword',stats='$stats',img1='$image' WHERE product_id='$id'";
			}else{
				$update_sql="UPDATE product SET cat_id='$cat',subcat_id='$scat',pname='$name',brand='$brand',mrp='$mrp',price='$price',stock='$stock',short_desc='$short',descr='$desc',best_seller='$best',meta_title='$title',meta_keyword='$keyword',stats='$stats' WHERE product_id='$id'";
			}
			mysqli_query($con,$update_sql);
		}
		else{
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
			mysqli_query($con,"INSERT INTO product(cat_id,subcat_id,pname,brand,mrp,price,stock,short_desc,descr,best_seller,meta_title,meta_keyword,stats,img1)VALUES($cat,$scat,'$name','$brand','$mrp','$price','$stock','$short','$desc','$best','$title','$keyword','$stats','$image')");

			$id=mysqli_insert_id($con); //for multiple images retreive product id 
		}

		/**MULTIPLE IMAGES START */
		if(isset($_GET['pid']) && $_GET['pid']!=''){ 
			foreach($_FILES['product_images']['name'] as $key=>$val){
				if($_FILES['product_images']['name'][$key]!=''){
					if(isset($_POST['product_images_id'][$key])){
						$image=rand(111111111,999999999).'_'.$_FILES['product_images']['name'][$key];
						move_uploaded_file($_FILES['product_images']['tmp_name'][$key],PRODUCT_MULTIPLE_IMAGE_SERVER_PATH.$image);

						mysqli_query($con,"UPDATE images SET product_images='$image' where product_id='".$_POST['product_images_id'][$key]."'");
					}else{
						$image=rand(111111111,999999999).'_'.$_FILES['product_images']['name'][$key];
						move_uploaded_file($_FILES['product_images']['tmp_name'][$key],PRODUCT_MULTIPLE_IMAGE_SERVER_PATH.$image);

						mysqli_query($con,"INSERT INTO images(product_id,product_images)VALUES('$id','$image')");

					}
				}
			}
		}else{
			if(isset($_FILES['product_images']['name'])){
				foreach($_FILES['product_images']['name'] as $key=>$val){
					$image=rand(111111111,999999999).'_'.$_FILES['product_images']['name'][$key];
					move_uploaded_file($_FILES['product_images']['tmp_name'][$key],PRODUCT_MULTIPLE_IMAGE_SERVER_PATH.$image);

					mysqli_query($con,"INSERT INTO images(product_id,product_images)VALUES('$id','$image')");
				}
			}

		}
		/**MULTIPLE IMAGES END */
		
		header('location:product.php');
		die();
	}	
}
/**check for null character if not assigned put null string */
?>

<!--Main Content starts --->
<div class="main-container">  
        <div class="page-heading">
				<div><h1>ADD PRODUCT</h1></div>
		</div>
			   
        <div class="tb ">
            <form  method="post" enctype="multipart/form-data">
				<div class="form">
					<select class="dropdown" id="category" name="category" onchange="get_subcat('')" required>
					<option value="">Select Category</option>
						<?php
							$catres=mysqli_query($con,"SELECT cat_id,cat_name from category order by cat_name asc");
								while($row=mysqli_fetch_assoc($catres)){
									if($row['cat_id']==$cat){
										echo "<option selected value=".$row['cat_id'].">".$row['cat_name']."</option>";
									}else{
										echo "<option value=".$row['cat_id'].">".$row['cat_name']."</option>";
									}
								}								
						?>
					</select>

					<select class="dropdown" id="subcategory" name="subcategory">
					<!---------OPTIONS WILL BE DONE USING JQUERY AJAX------>
					</select>
				</div>

				<div class="form">
					<label >Product Name</label>
					<input type="text" name="product" required value="<?php echo $name?>">
					
				</div>
				<div class="form">
					<label >Brand</label><input type="text" name="brand" value="<?php echo $brand?>" >
				</div>
				<div class="pform">
					<label >MRP</label><input type="number" maxlength="7" size="8" name="mrp" value="<?php echo $mrp?>" required>
					<label >PRICE</label><input type="number" maxlength="7" size="8" name="price" value="<?php echo $price?>" required>
					<label >STOCK</label><input type="number" maxlength="5" size="5" name="stock" value="<?php echo $stock?>" required>
				</div>
				<div class="pform">
					<label >IMAGES</label>
					<div class="form">
						<div id="image_box">
							<input style='width: 555px;' type="file" name="image" <?php echo $image_required?>>					
							<?php 
							if($image!=''){
								echo "<a target='_blank' href='".PRODUCT_IMAGE_SITE_PATH.$image."'><img width='100px' src='".PRODUCT_IMAGE_SITE_PATH.$image."'/></a>";
							}				
							?>
						</div>
					</div><button class="btnn" type="button" onclick=add_more_images()>ADD IMAGE</button>			
				</div>
				<?php
					//DISPLAY MULTI IMG IF EXISTS	
					if(isset($multipleImageArr[0])){
						foreach($multipleImageArr as $list){
							?>
							<div class="form">
							<?php
							echo "<div class='pform' id='add_image_box".$list['id']."'><input style='width: 555px;' type='file' name='product_images[]'". $image_required .">";
							echo "<a target='_blank' href='".PRODUCT_MULTIPLE_IMAGE_SITE_PATH.$list['product_images']."'><img width='100px' src='".PRODUCT_MULTIPLE_IMAGE_SITE_PATH.$list['product_images']."'/></a><button class='btnn' type='button' onclick=remove_image('".$list['id']."')><a href='manage-product.php?pid=".$id."&pi=".$list['id']."'>REMOVE</a></button></div>";
							echo "<input type='hidden' name='product_images_id[]' value='".$list['id']."'>";
						
						}?></div> <?php 
					}
				?>
				<div class="form">
					<label >Short Description</label><textarea rows="5" name="short"  required><?php echo $short?></textarea>
				</div>
				<div class="form">
					<label > Description</label><textarea rows="10"  name="description" required><?php echo $desc?></textarea>
				</div>
				<div class="pform">
					<label > Best Seller</label>
					<select class="dropdown" name="best_seller" required>
						<?php 
							if($best==1){
								echo "<option value=1 selected>YES</option>
								<option value=0 >NO</option>";
							}else if($best==0){
								echo "<option value=1 >YES</option>
								<option value=0 selected>NO</option>";
							}else{
								echo "<option value=1 >YES</option>
								<option value=0>NO</option>";
							}
						?>
					</select>
					<label > Meta Title</label><input type="text" name="mtitle" value="<?php echo $title?>" >
					<label > Meta Keyword</label><input type="text" name="mkeyword" value="<?php echo $keyword?>" >
					<label > Status</label>
					<select class="dropdown" name="status" required>
						<?php 
							if($stats==1){
								echo "<option value=1 selected>ACTIVE</option>
								<option value=0 >INACTIVE</option>";
							}else if($stats==0){
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
				<div class="options">
					<button class="btnn" type="submit" name="add">ADD PRODUCT</button>
				</div>

		</form>
	</div>   

	<div class="options">
		<p>Keep Going!</p>
		<a href="product.php"><button >BACK</button></a>
	</div>


<!--Main Content ends ---> 
	</div>
<script>
	function get_subcat(subcategory){
		var category=jQuery("#category").val();
		jQuery.ajax({
			url:'subcat.php',
			type:'post',
			data:'category='+category+'&subcategory='+subcategory,
			success:function(result){ 
				result=result.replace(/[\r\n]+/gm,"");
				jQuery('#subcategory').html(result);
			}			
		});
	}
	var total_image=1;
    function add_more_images(){
		total_image++;
		var html='<div class="form" id="add_image_box'+total_image+'"><input   style="width: 555px;" type="file" name="product_images[]" <?php echo $image_required?> ><button class="btnn" type="button" onclick=remove_image("'+total_image+'")>REMOVE</button></div>';
		jQuery('#image_box').after(html);
	}
	function remove_image(id){
		jQuery('#add_image_box'+id).remove();

	}



</script>

<?php
    require('dash-footer.php');
?>
<script>
	<?php 
		if(isset($_GET['pid'])){
	?>
		get_subcat('<?php echo $scat?>');
	<?php	
		}
	?>
</script>