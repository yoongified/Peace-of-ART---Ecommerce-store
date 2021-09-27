<?php
    require('dash-top.php');

	$sql="SELECT * FROM customer";
	$res=mysqli_query($con,$sql);
?>

<!--Main Content starts --->
<div class="main-container">  
        <div class="page-heading">
				<div><h1>CUSTOMER MASTER</h1></div>
				<div class="card">TOTAL CUSTOMERS
				<h1>
				<?php 
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
						<th colspan=2>NAME</th>
						<th>EMAIL</th>
						<th>MOBILE</th>
						
					</tr>
				</thead>
				<tbody>
				<?php 
					
						
					while($row=mysqli_fetch_assoc($res)){?>
					<tr>
						<td><?php echo $row['customer_id']?></td>
						<td><?php echo $row['fname']?></td>
						<td><?php echo $row['lname']?></td>
						<td><?php echo $row['email']?></td>
						<td><?php echo $row['mobile']?></td>
						<td><a class="btn btn-default" href="customer-details.php?id=<?php echo $row['customer_id']?>"><span class="blue">View</span></a></td>


						
					<?php } ?>	
					</tr>
				</tbody>
			</table>
			
        </div>   

		<div class="options">
			<p>You nice keep goin!</p>
			<a href="home.php"><button type="submit">BACK</button></a>
		</div>

<!--Main Content ends ---> 
	</div>


<?php
    require('dash-footer.php');
?>