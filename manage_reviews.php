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

$title='';
$rating='';
$review='';

if(isset($_GET['id']) && $_GET['id']!=''){
  $id=get_safe_value($con,$_GET['id']);
  $condition_arr=array('review_id'=>$id);
  $result=$obj->getData($con,'product_review','*',$condition_arr);
  $title=$result['0']['title'];
  $rating=$result['0']['rating'];
  $review=$result['0']['review'];
}

if(isset($_POST['reviewsubmit'])){
  
  $title=get_safe_value($con,$_POST['title']);
	$rating=get_safe_value($con,$_POST['rating']);
  $review=get_safe_value($con,$_POST['review']);

  $condition_arr=array('customer_id'=>$customer_id,'title'=>$title,'rating'=>$rating,'review'=>$review);

  if($msg==''){
    if(isset($_GET['id']) && $_GET['id']!=''){
      $update_sql="UPDATE product_review SET `title`='$title',`rating`='$rating',review='$review' WHERE review_id='$id' and customer_id=$customer_id";
      $res=mysqli_query($con,$update_sql);
    }
?>
          <script>window.location.href='reviews.php';</script>
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
              <form method="post">													
                <div class="form-group" >
                  <select class="form-control" name="rating" required>
                    <option value="">Select Rating</option>
                    <option value="5">Fantastic</option>
                    <option value="4">Great</option>
                    <option value="3">Good</option>
                    <option value="2">Bad</option>
                    <option value="1">Worst</option>
                  </select>
                </div>
                <div class="form-group">
                  <input class="form-control" id="" name="title" rows=10 placeholder="Enter your review title here...." value="<?php echo $title?>"required />
                </div>
                <div class="form-group">
                  <textarea class="form-control" id="" name="review" rows=10 placeholder="Enter your review here...." required ><?php echo $review?></textarea>
                </div>
                <input class="btn btn-main mt-20" type="submit" name="reviewsubmit" value="SUBMIT REVIEW" />
                <div class="field_error"><?php echo $msg?></div>
              </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
  include("poa-footer.php");
?>