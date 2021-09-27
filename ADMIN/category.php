<?php
    require('dash-top.php');
/**status toggle */
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='stats'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['cat_id']);
		if($operation=='active'){
			$status='1'; 
		}else{
			$status='0';
		}
		$update_status="update category set stats='$status' where cat_id='$id'";
		mysqli_query($con,$update_status);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['cat_id']);
		$delete_sql="delete from category where cat_id='$id'";
		mysqli_query($con,$delete_sql);
	}
}
	/**subcategory */
	if(isset($_GET['type']) && $_GET['type']!=''){
		$type=get_safe_value($con,$_GET['type']);
		if($type=='bstats'){
			$operation=get_safe_value($con,$_GET['operation']);
			$id=get_safe_value($con,$_GET['subcat_id']);
			if($operation=='active'){
				$status='1';
			}else{
				$status='0';
			}
			$update_status="update subcategory set stats='$status' where subcat_id='$id'";
			mysqli_query($con,$update_status);
		}
		if($type=='delete'){
			$id=get_safe_value($con,$_GET['subcat_id']);
			$delete_sql="delete from subcategory where subcat_id='$id'";
			mysqli_query($con,$delete_sql);
		}
		
	}
?>


<!--Main Content starts --->
    
<div class="main-container">  

	<!---START CATEGORY---->
        <div class="page-heading">
			<div><h1>CATEGORY MASTER</h1></div>
				<div class="card">TOTAL CATEGORIES
				<h1>
				<?php 
					$query="select * from category order by cat_id asc";
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
						<th>CATEGORY</th>
						<th>STATUS</th>
						
					</tr>
				</thead>
				<tbody>
				<?php 
					
						
					while($row=mysqli_fetch_assoc($res)){?>
					<tr>
						<td><?php echo $row['cat_id']?></td>
						<td><?php echo $row['cat_name']?></td>

						<td>
								<?php
								if($row['stats']==1){
									echo "<a href='?type=stats&operation=deactive&cat_id=".$row['cat_id']."'><span class='active'>Active</span></a>";
								}else{
									echo "<a href='?type=stats&operation=active&cat_id=".$row['cat_id']."'><span class='deactive'>Inactive</span></a>";
								}
								?>
						</td>
						<td>
								<?php
								echo "<a href='manage-category.php?cat_id=".$row['cat_id']."'><span class='fas fa-edit blue'></span></a>";
								
								echo "<a href='?type=delete&cat_id=".$row['cat_id']."'><span class='fas fa-trash red'></span></a>";
								
								?>
						</td>				
						
					<?php } ?>	
					</tr>
				</tbody>
			</table>
			
			<div class="options" >
				<a href="manage-category.php"><button><i class="fas fa-plus-circle"></i>ADD NEW CATEGORY</button></a> 
			</div>

        </div>   

	<!---END CATEGORY---->
	<!---START SUBCATEGORY---->
		<div class="page-heading">
				<div><h1>SUB CATEGORY MASTER</h1></div>
				<div class="card">TOTAL SUBCATEGORIES 
				<h1>
				<?php
				$query="select * from subcategory order by cat_id asc";
				$res=mysqli_query($con,$query); 
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
						
						<th>SUBCAT ID</th>
						<th>CATEGORY </th>
						<th>SUBCATEGORY</th>
						<th>STATUS</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$query="select subcategory.*,category.cat_name,category.cat_id from subcategory,category where subcategory.cat_id=category.cat_id order by subcategory.subcat_id asc";
					$res=mysqli_query($con,$query);
						
						while($row=mysqli_fetch_assoc($res)){?>
					<tr>
						<td><?php echo $row['subcat_id']?></td>
						<td><?php echo $row['cat_name']?></td> 
						<td><?php echo $row['subcat_name']?></td>

						<td>
								<?php
								if($row['stats']==1){
									echo "<a href='?type=bstats&operation=deactive&subcat_id=".$row['subcat_id']."'><span class='active'>Active</span></a>";
								}else{
									echo "<a href='?type=bstats&operation=active&subcat_id=".$row['subcat_id']."'><span class='deactive'>Inactive</span></a>";
								}
					
								?>
						</td>
						<td>
								<?php
								echo "<a href='manage-category.php?subcat_id=".$row['subcat_id']."'><span class='fas fa-edit blue' ></span></a>";
								
								echo "<a href='?type=delete&subcat_id=".$row['subcat_id']."'><span class='fas fa-trash red'></span></a>";
								
								?>
						</td>		
													
					</tr>
						
					<?php } ?>
	
				</tbody>
			</table>
			<div class="options" >
				<a href="manage-category.php"><button><i class="fas fa-plus-circle"></i>ADD NEW SUBCATEGORY</button></a> 
			
			</div>
        </div>   
	<!---END SUBCATEGORY---->


<!--Main Content ends ---> 
	</div>



<?php
    require('dash-footer.php');
?>