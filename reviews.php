<?php
  include("poa-top.php");
  require('query.php');
 
  $obj=new query();
  $condition_arr=array('customer_id'=>$_SESSION['USER_ID']);
  
  if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($con,$_GET['type']);    
    if($type=='delete'){
      $id=get_safe_value($con,$_GET['id']);
      $condition_arr=array('review_id'=>$id);
      $result=$obj->deleteData($con,'product_review',$condition_arr);
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
						<li class="active">Reviews</li>
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
          <li><a class="active" href="reviews.php">Reviews</a></li>        
        </ul>

        <div class="dashboard-wrapper user-dashboard">
          <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                  <th></th>
                  <th>Product</th>
                  <th>Review</th>
                  <th>Added on</th>
                  <th>Actions</th>
                  </tr>
                        </thead>
                        <tbody>
                        <?php
                    $customer_id=$_SESSION['USER_ID'];
                    $query="select * from product_review where customer_id='$customer_id' order by review_id desc";
                    $reviewresult=mysqli_query($con,$query);
                    if(mysqli_num_rows($reviewresult)>0){
                      
                      while($list=mysqli_fetch_assoc($reviewresult)){
                        $pid=$list['product_id'];
                        $product=mysqli_query($con,"SELECT pname,img1 from `product` where product_id=$pid");
                        $productres=mysqli_fetch_assoc($product);
                         // prx($list);
                    ?>
                  <tr >
                  <td ><img width="80" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$productres['img1']?>" alt="" /></td>
                  <td >
                    <div class="product-info">
                    <a href="product.php?id=<?php echo $list['product_id']?>"><?php echo $productres['pname']?></a>
                    </div>
                  </td>
                  
                  <td>
                  <?php
                    $i=$list['rating'];
                    while($i>0){
                  ?>
                          <i class="fas fa-star"></i>
                  <?php $i--; } ?>
                  <br>
                  <strong><?php echo $list['title']?></strong><br><?php echo $list['review']?>
                                
                  </td>
                  <td>
                    <time datetime="<?php echo $list['added_on']?>"><?php echo $list['added_on']?></time>
                  </td>
                  <td>
                    
                      <?php
                      echo "<a href='manage_reviews.php?id=".$list['review_id']."'><span class='fas fa-edit '></span></a>";
                      echo "             ";  
                      echo "<a href='?type=delete&id=".$list['review_id']."'><span class='fas fa-trash '></span></a>";
                      ?>
                    
                  </td>
                  </tr>
                  <?php }} else{?>
                        <li> No Reviews submitted yet!</li>
                     
                    <?php }?>
                </tbody>
              </table>  
            </div> 
      </div>
    </div>
  </div>
</section><br>

<?php
  include("poa-footer.php");
?>