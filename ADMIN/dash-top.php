<?php
    require('connection.php');
    require('functions.php'); 
if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){}
else{
    header('location:admin-login.php');
    die();   
}
?>

<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8">
        <title>ADMIN | DASHBOARD</title>
        <link rel="stylesheet" href="dashboard.css">  
        <link rel="stylesheet" href="css/style.css">
  
              <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
              <link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<!---popup-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">



    </head>
    <body style=" background: #efe8f6;">

        <!--wrapper start-->
        <div class="wrapper">
            <!--header menu start-->
            <div class="header">
                <div class="header-menu">
                    <div class="title">Peace of <span>Art</span></div>
                    <div class="sidebar-btn">
                        <i class="fas fa-bars"></i>
                    </div>
                    
                      <a href="admin-logout.php"> <button name="logout"><i class="fas fa-door-open"></i></button>  </a>        
                </div>
            </div>
            <!--header menu end-->
            <!--sidebar start-->
            <div class="sidebar">
                <div class="sidebar-menu">
                    <li class="item">
                        <a href="home.php" class="menu-btn">
                            <i class="fas fa-desktop"></i><span>HOME</span>
                        </a>
                    </li>
                    <li class="item" id="profile">
                        <a href="#profile" class="menu-btn">
                            <i class="fas fa-newspaper"></i><span>CATALOG <i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="category.php"><i class="fas fa-tasks"></i><span>CATALOG MASTER</span></a>
                            <a href="manage-category.php"><i class="fas fa-pen"></i><span>MANAGE CATALOG</span></a>
                        </div>
                    </li>
                    <li class="item" id="messages">
                        <a href="#messages" class="menu-btn">
                            <i class="fas fa-palette"></i><span>PRODUCTS <i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="product.php"><i class="fas fa-tasks"></i><span>PRODUCT MASTER</span></a>
                            <a href="manage-product.php"><i class="fas fa-pen"></i><span>MANAGE PRODUCTS</span></a>
                            <a href="featured-product.php"><i class="fas fa-star"></i><span>FEATURED</span></a>
                        </div>
                    </li>
                    <li class="item">
                        <a href="reviews.php" class="menu-btn">
                            <i class="fas fa-thumbs-up"></i><span> PRODUCT REVIEWS</span>
                        </a>
                    </li>
                    <li class="item" id="settings">
                        <a href="order_master.php" class="menu-btn">
                            <i class="fas fa-boxes"></i><span>ORDERS</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="customer.php" class="menu-btn">
                            <i class="fas fa-user"></i><span>CUSTOMERS</span>
                        </a>
                    </li>
                    
                    <li class="item">
                        <a href="coupon.php" class="menu-btn">
                            <i class="fas fa-ticket-alt"></i><span>COUPON MASTER</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="contact_us.php" class="menu-btn">
                            <i class="fas fa-question-circle"></i><span>QUERIES</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="reports.php" class="menu-btn">
                            <i class="fas fa-chart-bar"></i><span>REPORTS</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="settings.php" class="menu-btn">
                            <i class="fas fa-cog"></i><span>SETTINGS</span>
                        </a>
                    </li>
                </div>
            </div>
            <!--sidebar end-->

<script type="text/javascript">
$(document).ready(function(){
$(".sidebar-btn").click(function(){
    $(".wrapper").toggleClass("collapse");
});
});
</script>

