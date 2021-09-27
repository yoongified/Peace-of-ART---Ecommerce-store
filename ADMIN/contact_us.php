<?php
    require('dash-top.php');
	
    if(isset($_GET['type']) && $_GET['type']!=''){
		$type=get_safe_value($con,$_GET['type']);
		if($type=='delete'){
			$id=get_safe_value($con,$_GET['contact_id']);
			$delete_sql="delete from contact where id='$id'";
			mysqli_query($con,$delete_sql);
		}
	}

    $sql="SELECT id,`name`,email,mobile,comment,added_on FROM contact order by id desc";
    $res=mysqli_query($con,$sql);
	
?>



<div class="main-container">
 <!------admin table contents--->     
 	<div class="page-heading">
		<div>
			<h1>CONTACT US</h1>
			<h2>CUSTOMER QUERIES</h2>
		</div>
				
				
	</div>
  			<?php 
				while($row=mysqli_fetch_assoc($res)){?>
				<div class="tb">
					<div class="flex">
						<div class="review-deets">
							<table>
								<tr>
									<th>ID</th>
									<td>#<?php echo $row['id']?></td>
								</tr>
								<tr>
									<th>MOBILE</th>
									<td><?php echo $row['mobile']?></td>
								</tr>
								<tr>
									<th>DATE</th>
									<td><?php echo $row['added_on']?></td>
								</tr>
							</table>
						</div>
							
						<div class="review-content">
							<h3><?php echo $row['name']?>    |   <?php echo $row['email']?></h3>
							<p><?php echo $row['comment']?></p>
									<br>
							<div>
								<?php
									echo "      <a href='?type=delete&contact_id=".$row['id']."'><span class='fas fa-trash red'></span></a>";						
								?>
							</div>
						</div>
						
					</div>
					
				</div>

			<?php } ?>

	<div class="options">
		<p>You nice keep goin!</p>
		<a href="home.php"><button type="submit"></i>BACK</button></a>
	</div>
</div>

<?php
    require('dash-footer.php');
?>