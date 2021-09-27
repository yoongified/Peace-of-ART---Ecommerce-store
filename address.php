<?php
  include("poa-top.php");
  require('query.php');
 
  $obj=new query();
  $condition_arr=array('customer_id'=>$_SESSION['USER_ID']);
  
  if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($con,$_GET['type']);    
    if($type=='delete'){
      $id=get_safe_value($con,$_GET['id']);
      $condition_arr=array('id'=>$id);
      $result=$obj->deleteData($con,'addressbook',$condition_arr);
    }
  }
 
//prx($result);

if(!isset($_SESSION['USER_LOGIN'])){
?>
	<script>window.location.href='home.php';</script>
<?php
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
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>NAME</th>
                  <th>ADDRESS</th>
                  <th>CITY</th>
                  <th class="col-md-2 col-sm-3">PHONE</th>
                  <th><a href="add_address.php"><i class="fas fa-plus-square"></i>  ADD</a></th>
                </tr>
              </thead>
              <tbody>
                <?php
                   $condition_arr=array('customer_id'=>$_SESSION['USER_ID']);
                   $result=$obj->getData($con,'addressbook','*',$condition_arr);
                    $i=1;
                    if(isset($result['0'])){
                    foreach($result as $list){
                ?>
                <tr>
                  <td>#<?php echo $i?></td>
                  <td><?php echo $list['name']?></td>
                  <td><?php echo $list['address']?></td>
                  <td><?php echo $list['city']?></td>
                  <td><?php echo $list['mobile']?></td>
                  <td>
                    
                      <?php
                      echo "<a href='add_address.php?id=".$list['id']."'><span class='fas fa-edit '></span></a>";
                      echo "             ";  
                      echo "<a href='?type=delete&id=".$list['id']."'><span class='fas fa-trash '></span></a>";
                      ?>
                    
                  </td>
                </tr>
                <?php $i++; }}else{?>
                  <tr>
                    <td colspan=6>No Addresses found. Add one today!!</td>
                  </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
  include("poa-footer.php");
?>