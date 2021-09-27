<?php
ob_start();
require('dash-top.php');
$cat='';
$msg_cat='';
if(isset($_GET['cat_id']) && $_GET['cat_id']!=''){
	$id=get_safe_value($con,$_GET['cat_id']);
	$res=mysqli_query($con,"select * from category where cat_id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$cat=$row['cat_name'];
	}
	else{
		header('location:category.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$cat=get_safe_value($con,$_POST['cat_name']);
	$ress=mysqli_query($con,"select * from category where cat_name='$cat'");
	$check=mysqli_num_rows($ress);
	if($check>0){
		if(isset($_GET['cat_id']) && $_GET['cat_id']!=''){
			$d=mysqli_fetch_assoc($ress);
			if($id==$d['cat_id']){
			}
			else{
				$msg_cat="Category already exist";	 /**ERROR WHILE RENAMING EXISTING CAT*/
			}
		}
		else{ 
				$msg_cat="Category already exists"; /**ERROR WHILE ADDING NEW CAT*/
		}
	}

	if($msg_cat==''){
		if(isset($_GET['cat_id']) && $_GET['cat_id']!=''){
			mysqli_query($con,"UPDATE category SET cat_name='$cat' WHERE cat_id='$id'");
		}
		else{
			mysqli_query($con,"INSERT INTO category(cat_name,stats) VALUES('$cat','1')");
		}
		header('location:category.php');
		die();
	}

}

/**SUBCATEGORY */
$subcat='';
$msg_subcat='';
if(isset($_GET['subcat_id']) && $_GET['subcat_id']!=''){
	$sid=get_safe_value($con,$_GET['subcat_id']);
	$res=mysqli_query($con,"select * from subcategory where subcat_id='$sid'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$subcat=$row['subcat_name'];
		$cat=$row['cat_id'];
	}
	else{
		header('location:category.php');
		die();
	}
}

if(isset($_POST['submitsub'])){	
	$subcat=get_safe_value($con,$_POST['subcat_name']);
	$scatid=get_safe_value($con,$_POST['scatid']);
	$ress=mysqli_query($con,"select * from subcategory where subcat_name='$subcat'");
	$check=mysqli_num_rows($ress);
	if($check>0){
		if(isset($_GET['subcat_id']) && $_GET['subcat_id']!=''){
			$d=mysqli_fetch_assoc($ress);
			if($sid==$d['subcat_id']){
			}
			else{
				$msg_subcat="Subcategory already exist";	 /**ERROR WHILE RENAMING EXISTING SUBCAT*/		
			}
		}
		else{ 
				$msg_subcat="Subcategory already exists"; /**ERROR WHILE ADDING NEW SUBCAT*/
		}
	}

	if($msg_subcat==''){
		if(isset($_GET['subcat_id']) && $_GET['subcat_id']!=''){
			mysqli_query($con,"UPDATE subcategory SET subcat_name='$subcat' WHERE subcat_id='$sid'");
		}
		else{
			mysqli_query($con,"INSERT INTO subcategory(cat_id,subcat_name,stats) VALUES('$scatid','$subcat','1')");
		}
		header('location:category.php');
		die();
	}

}


?>

<!--Main Content starts --->
<div class="main-container">  
        <div class="page-heading">
				<div><h1>MANAGE CATALOG</h1></div>
		</div>
	<!-- Hide divisions	based on edit delete n add-->	
	
	<!---ADD new category--->
		<div class="tb">
            <form  method="post">
				<div class="form">
					<label >CATEGORY NAME</label>
					<input style="width: 100%;margin-bottom: 10px; margin-top: 10px;" type="text"  name="cat_name" pattern="[A-Za-z]{1,25}" required value="<?php echo $cat?>">
					<br>
					<button class="btnn" name="submit" type="submit">ADD CATEGORY</button>
					<div class="field_error"><?php echo $msg_cat?></div>
				</div>
			</form>
        </div>   
<?php

?>
	<!---ADD new subcategory--->
	<div class="tb">
            <form  method="post">
				<div class="form">
					<label >SUBCATEGORY NAME</label>
					<?php
					$query = "SELECT cat_id,cat_name FROM category";
					$res=mysqli_query($con,$query);
					?>
					<select class="dropdown" name="scatid" required>
					<?php
					
						while($row=mysqli_fetch_assoc($res))
						{
							if($row['cat_id']==$cat){
								echo "<option selected value=".$row['cat_id'].">".$row['cat_name']."</option>";
							}else{
								echo "<option value=".$row['cat_id'].">".$row['cat_name']."</option>";
							}
						}	
					?> </select> <br>
					<input style="width: 100%;margin-bottom: 10px; margin-top: 10px;" type="text" name="subcat_name" pattern="[A-Za-z]{1,25}" required value="<?php echo $subcat?>" >
				
					<button class="btnn" type="submit" name="submitsub">ADD SUBCATEGORY</button>
					<div class="field_error"><?php echo $msg_subcat?></div>
				</div>
			</form>
        </div>  

 
	 <div class="options">
		<p>You nice keep goin! go back to catalog </p>
			<a href="category.php"><button type="submit">BACK</button></a>
	</div>

<!--Main Content ends ---> 
	</div>


<?php
    require('dash-footer.php');
?>