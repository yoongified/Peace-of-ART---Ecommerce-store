<?php
  require("DATABASE/connection.php");
  require("DATABASE/functions.php");
  require("add_to_cart.php");

$cat_res=mysqli_query($con,"select * from category where stats=1 ");

$obj=new add_to_cart();
$totalProduct=$obj->totalProduct();


if(isset($_SESSION['USER_LOGIN'])){
	$uid=$_SESSION['USER_ID']; 

	if(isset($_GET['wishlist_id'])){
		$wid=$_GET['wishlist_id'];
		mysqli_query($con,"delete from wishlist where id='$wid' and customer_id='$uid'");
	}
	$totalWish=mysqli_num_rows(mysqli_query($con,"select product.pname,product.img1,product.mrp,
	product.price,wishlist.id from product,wishlist where 
	wishlist.product_id=product.product_id and wishlist.customer_id='$uid'"));
	
}
$script_name=$_SERVER['SCRIPT_NAME'];
$script_name_arr=explode('/',$script_name);
$mypage=$script_name_arr[count($script_name_arr)-1];
$meta_title="PEACE OF ART";
$meta_key="PEACE OF ART";

if($mypage=='product.php'){
	$product_id=get_safe_value($con,$_GET['id']);
	$product_meta=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM product WHERE product_id='$product_id'"));
	$meta_title=$product_meta['meta_title'];
	$meta_key=$product_meta['meta_keyword'];
} /**Similarly for rest */
if($mypage=='about.php'){
	$meta_title="ABOUT US | PEACE OF ART";
	$meta_key="ABOUT US | PEACE OF ART";
}
if($mypage=='blog.php'){
	$meta_title="BLOG | PEACE OF ART";
	$meta_key="BLOG | PEACE OF ART";
}
if($mypage=='cart.php'){
	$meta_title="MY CART | PEACE OF ART";
	$meta_key="MY CART | PEACE OF ART";
}
if($mypage=='category.php'){
	$meta_title="CATEGORIES | PEACE OF ART";
	$meta_key="CATEGORIES | PEACE OF ART";
}
if($mypage=='checkout.php'){
	$meta_title="CHECKOUT | PEACE OF ART";
	$meta_key="CHECKOUT | PEACE OF ART";
}
if($mypage=='coming-soon.php'){
	$meta_title="COMING SOON | PEACE OF ART";
	$meta_key="COMING SOON | PEACE OF ART";
}
if($mypage=='confirmation.php'){
	$meta_title="ORDER PLACED | PEACE OF ART";
	$meta_key="ORDER PLACED | PEACE OF ART";
}
if($mypage=='contact.php'){
	$meta_title="CONTACT US | PEACE OF ART";
	$meta_key="CONTACT US | PEACE OF ART";
}
if($mypage=='faq.php'){
	$meta_title="FAQ | PEACE OF ART";
	$meta_key="FAQ | PEACE OF ART";
}
if($mypage=='forget-password.php'){
	$meta_title="FORGOT PASSWORD | PEACE OF ART";
	$meta_key="FORGOT PASSWORD | PEACE OF ART";
}
if($mypage=='login.php'){
	$meta_title="LOGIN | PEACE OF ART";
	$meta_key="LOGIN | PEACE OF ART";
}
if($mypage=='order.php'){
	$meta_title="MY ORDERS | PEACE OF ART";
	$meta_key="MY ORDERS | PEACE OF ART";
}
if($mypage=='shop.php'){
	$meta_title="SHOP | PEACE OF ART";
	$meta_key="SHOP | PEACE OF ART";
}
if($mypage=='signin.php'){
	$meta_title="SIGN IN | PEACE OF ART";
	$meta_key="SIGN IN | PEACE OF ART";
}
if($mypage=='wishlist.php'){
	$meta_title="MY WISHLIST | PEACE OF ART";
	$meta_key="MY WISHLIST | PEACE OF ART";
}




?>


<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title><?php echo $meta_title?></title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="keywords" content="<?php echo $meta_key?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

  <link rel="stylesheet" href="plugins/fontawesome/css/fontawesome.min.css">
  <link rel="stylesheet" href="plugins/fontawesome/css/brands.min.css">
  <link rel="stylesheet" href="plugins/fontawesome/css/solid.min.css">

  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  
  <!-- Animate css -->
  <link rel="stylesheet" href="plugins/animate/animate.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">
  
</head>

<body id="body">

<!-- Start Top Header Bar -->
<section class="top-header">
	<div class="container">
		<div class="row-header">
			<div class="col-md-4 col-xs-12 col-sm-4">
				<div >
					<?php
						if(isset($_SESSION['USER_LOGIN'])){
							echo '<a  href="profile-details.php"><i class="fas fa-user-circle"></i>Hi '.$_SESSION['USER_NAME'].'</a>  ' ; 
							echo '<a  href="order.php"><i class="fas fa-box-open"></i></a>' ; 
							echo '<a  href="logout.php"><i class="fas fa-sign-out-alt"></i></i></a>' ; 
						}
						else{
							echo '<a  href="login.php"><i class="fa fa-user" aria-hidden="true"></i>LOGIN/REGISTER</a>';
							
						}
					?>
            		
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Site Logo -->
				<div class="logo text-center">
					<a href="home.php">
						PEACE OF ART

					</a>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				
				<ul class="top-menu text-right list-inline">
					<!-- Wishlist -->
					<?php 
						if(isset($_SESSION['USER_LOGIN'])){
					?>
					<li class="dropdown search dropdown-slide">
						<a href="wishlist.php">
						<i class="fas fa-heart"></i><span class="wish_badge" id='lblWishCount'><?php echo $totalWish; ?></span> 
						</a>
					</li>
					<!-- / Wishlist -->
					<?php }?>
					<!-- Cart -->
					<li class="dropdown cart-nav dropdown-slide">
						<a href="cart.php" >
							<i class="fas fa-shopping-cart"></i><span class="cart_badge" id='lblCartCount'><?php echo $totalProduct; ?></span>
						</a>
					</li><!-- / Cart -->

					<!-- Search -->
					<li class="dropdown search dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
							<i class="fas fa-search"></i></a>
						<ul class="dropdown-menu search-dropdown">
							<li>
								<form action="search.php" method="get"><input type="search" name="str" class="form-control" placeholder="Search..."></form>
							</li>
						</ul>
					</li><!-- / Search -->

					

				</ul><!-- / .nav .navbar-nav .navbar-right -->
			</div>
		</div>
	</div>
</section>
<!-- End Top Header Bar -->


<!-- Main Menu Section -->
<section class="menu">
	<nav class="navbar navigation">
		<div class="container">
			<div class="navbar-header">
				<h2 class="menu-title">Main Menu</h2>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
					aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			</div><!-- / .navbar-header -->

			<!-- Navbar Links -->
			<div id="navbar" class="navbar-collapse collapse text-center">
				<ul class="nav navbar-nav">

					<!-- Home -->
					<li class="dropdown ">
						<a href="home.php">Home</a>
					</li><!-- / Home -->

					<!-- Home -->
					<li class="dropdown ">
						<a href="shop.php">SHOP</a>
					</li><!-- / Home -->

					<!-- Pages -->
					<li class="dropdown full-width dropdown-slide">
						<a href="category.php" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">CATEGORY <i class="fas fa-chevron-down"></i></a>
						<div class="dropdown-menu">
							<div class="row">
							<?php   while($row=mysqli_fetch_assoc($cat_res)){ ?>
								<!-- CATEGORIES -->
								<div class="col-sm-3 col-xs-12">
									<ul>
										<a href="category.php?id=<?php echo $row['cat_id'];?>"><li class="dropdown-header"><?php echo $row['cat_name']; $catid=$row['cat_id']; ?></li></a>
										<?php 
											$subcat_res=mysqli_query($con,"select * from subcategory where cat_id='$catid' and stats='1'"); 
											if(mysqli_num_rows($subcat_res)>0){
											?>
											<li role="separator" class="divider"></li>
											<?php 
												while($row=mysqli_fetch_assoc($subcat_res)){?>
												<li><a href="category.php?id=<?php echo $row['cat_id'];?>&subcatid=<?php echo $row['subcat_id'];?>"><?php echo $row['subcat_name'] ?></a></li>
											<?php } ?>		
										<?php } ?>	
									</ul>
								</div>
							<?php } ?>

							</div><!-- / .row -->
						</div><!-- / .dropdown-menu -->
					</li><!-- / Pages -->

					<!-- Shop -->
					<li >
						<a target="_blank" href="coming-soon.php" >COMING SOON </a>

					</li><!-- / coming soon -->
					<!-- Home -->
					<li class="dropdown ">
						<a href="faq.php">FAQ</a>
					</li><!-- / Home -->
				-->
				</ul><!-- / .nav .navbar-nav -->

			</div>
			<!--/.navbar-collapse -->
		</div><!-- / .container -->
	</nav>
</section>









