<?php

  include("poa-top.php");
  require('query.php');
if(!isset($_SESSION['USER_LOGIN'])){
?>
	<script>window.location.href='home.php';</script>
<?php
}
$msg='';
$customer_id=$_SESSION['USER_ID'];
$obj=new query();

$name='';
$address='';
$city='';
$mobile='';

if(isset($_GET['id']) && $_GET['id']!=''){
  $id=get_safe_value($con,$_GET['id']);
  $condition_arr=array('id'=>$id);
  $result=$obj->getData($con,'addressbook','*',$condition_arr);
  $name=$result['0']['name'];
  $address=$result['0']['address'];
  $city=$result['0']['city'];
  $mobile=$result['0']['mobile'];
}

if(isset($_POST['submit'])){
  
  $name=get_safe_value($con,$_POST['name']);
	$address=get_safe_value($con,$_POST['address']);
  $city=get_safe_value($con,$_POST['city']);
  $mobile=get_safe_value($con,$_POST['mobile']);
 
  $condition_arr=array('customer_id'=>$customer_id,'name'=>$name,'address'=>$address,'city'=>$city,'mobile'=>$mobile);

  $ress=mysqli_query($con,"select * from addressbook where `address`='$address' and customer_id=$customer_id");
	$check=mysqli_num_rows($ress);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$d=mysqli_fetch_assoc($ress);
			if($id==$d['id']){
			}
			else{
				$msg="ADDRESS already exist";	 /**ERROR WHILE RENAMING EXISTING PRODUCT*/
			}
		}
		else{ 
				$msg="ADDRESS already exists"; /**ERROR WHILE ADDING NEW PRODUCT*/
		}
	}
  if($msg==''){
    if(isset($_GET['id']) && $_GET['id']!=''){
      $update_sql="UPDATE addressbook SET `name`='$name',`address`='$address',mobile='$mobile' WHERE id='$id' and customer_id=$customer_id";
      $res=mysqli_query($con,$update_sql);
    }
    else{
        $obj->insertData($con,'addressbook',$condition_arr);
        
    }?>
          <script>window.location.href='address.php';</script>
        <?php
  }
  
  

  
}


?>
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">MY ACCOUNT</h1>
					<ol class="breadcrumb">
						<li><a href="home.php">Home</a></li>
						<li class="active">Address Book</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="user-dashboard page-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
	  	<ul class="list-inline dashboard-menu text-center">
          <li><a href="profile-details.php">Profile Details</a></li>
          <li><a href="wishlist.php">Wishlist</a></li>
          <li><a href="order.php">Orders</a></li>
          <li><a class="active" href="address.php">Address</a></li>
          
        </ul>

        <div class="dashboard-wrapper user-dashboard">
          <h1 class="widget-title">ADD NEW ADDRESS LINE</h1>
            <form class="checkout-form" method="post">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control"  name="name" value="<?php echo $name?>" >
                 
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" class="form-control" name="address" value="<?php echo $address?>" >
                
                </div>
                <div class="form-group">
                  <label>City</label>
                  <input type="text" class="form-control"  name="city" value="<?php echo $city?>" >
             
                </div>
                <div class="form-group">
                  <label>Mobile</label>
                  <input type="text" class="form-control"  name="mobile" value="<?php echo $mobile?>" >
               
                </div>
                <div class="field_error"><?php echo $msg?></div>
                
                <button type="submit" name="submit" class="btn btn-main ">ADD</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
  include("poa-footer.php");
?>