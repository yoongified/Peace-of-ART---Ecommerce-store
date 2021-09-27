<?php
    require('dash-top.php');

    $ordercount=mysqli_query($con,"select * from `order`");
	$ordc=mysqli_num_rows($ordercount);

    $customercount=mysqli_query($con,"select * from `customer`");
	$custc=mysqli_num_rows($customercount);

    $revenuecount=mysqli_query($con,"select total from `order`");
    $revenue=0;
    while($rev=mysqli_fetch_assoc($revenuecount)){
        $revenue+=$rev['total'];
    }


?>

<div class="main-container"> <!---cards for total customer order and revenue--->
    <div class="home">
        <div class="card">
            <div class="front-face">
                <div class="imgbox"><img src="images/rating.png" alt=""></div>
                <h4>CUSTOMERS</h4>
            </div>
            <div class="back-face">
            <div class="content">
                <a href="customer.php">
                    <h4>TOTAL CUSTOMERS</h4>
                    <h1><?php  echo $custc?></h1>
                </a>                
                </div>
            </div>
        </div>
        <div class="card">
            <div class="front-face">
                <div class="imgbox"><img src="images/delivery-box.png" alt=""></div>
                <h4>ORDERS</h4>
            </div>
            <div class="back-face">
                
            <div class="content">
                <a href="order_master.php">
                    <h4>TOTAL ORDERS</h4>
                    <h1><?php echo $ordc?></h1>
                </a>    
                </div>
            </div>
        </div>
        <div class="card">
            <div class="front-face">
                <div class="imgbox"><img src="images/wallet.png" alt=""></div>
                <h4>REVENUE</h4>
            </div>
            <div class="back-face">
                <div class="content">
                    <h4>REVENUE EARNED</h4>
                    <h1>₹<?php echo $revenue?></h1>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="front-face">
                <div class="imgbox"><img src="images/monitor.png" alt=""></div>
                <h4>REPORTS</h4>
            </div>
            <div class="back-face">
            <div class="content">
                <a href="reports.php">
                    <h4>VIEW</h4>
                    <h1>REPORT</h1>
                </a>    
                </div>
            </div>
        </div>
    </div>  

    <div class="tb">
        <?php
            $orderres=mysqli_query($con,"select distinct `order`.*,order_status.name as order_status_str from `order`,order_status where order_status.id=`order`.order_status order by `order`.id desc limit 5");
        ?>
        <div class="page-heading">
				<div><h2> RECENT ORDERS</h2></div>
		</div>

        <table class="table ">
        <thead>
            <tr>
                <th>Order ID
                </th>
                <th>Date</th>
                <th>ADDRESS</th>
                <th>Payment Type</th>
                <th>Total Price</th>
                <th>Payment Status</th>
                <th>Order Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_assoc($orderres)){ ?>
            <tr>
                <td>#<?php echo $row['id']?>
                <br><i class="fas fa-file-pdf"></i><a href="../order_invoice.php?id=<?php echo $row['id']?>&date=<?php echo $row['added_on']?>">PDF</a>
                </td>
                <td><?php echo $row['added_on']?></td>
                <td>
                    <?php echo $row['address']?><br>
                    <?php echo $row['zipcode']?><br>
                    <?php echo $row['city']?><br>
                </td>
                <td><?php echo $row['payment_type']?><br></td>
                <td>₹<?php echo $row['total']?><br></td>
                <td><span class="label label-primary"><?php echo $row['payment_status']?></span></td>
                <td><span class="label label-primary"><?php echo $row['order_status_str']?></span></td>
                <td><a class="btn btn-default" href="order-details_master.php?id=<?php echo $row['id']?>"><span class="blue">View</span></a></td>
            </tr>
            <?php 
                }
            ?>
            
        </tbody>
        </table>
        
    </div>

    <div class="tb">
        <?php
        //BEST SELLERS
        $res=mysqli_query($con,"SELECT * FROM product where best_seller='1' order by product_id desc limit 8");
        
        ?>
            <div class="page-heading">
                    <div><h2>BEST SELLERS</h2></div>
            </div>
            <div class="home">
            <?php 						
                while($row=mysqli_fetch_assoc($res)){?>
                <div class="card-best">
                    <div class="front-face">
                    <div class="imgbox"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['img1']?>" alt=""></div>
                    </div>
                    <div class="back-face">
                        <div class="content">
                        <h4><?php echo "<a href='view-product.php?pid=".$row['product_id']."'>"?> <?php echo $row['pname']?> </a></h4>  
                        </div>
                    </div>
                </div>
            <?php } ?>	
            </div>
    </div>

  <!---ADD new product/cat--->
  <div class="page-heading">
		<div class="card"><a href="manage-product.php"><i class="fas fa-plus-circle"></i> NEW PRODUCT</a></div>
        <div class="card"><a href="manage-category.php"><i class="fas fa-plus-circle"></i>NEW CATEGORY</a> </div>
        <div class="card"><a href="manage-category.php"><i class="fas fa-plus-circle"></i>NEW SUBCATEGORY</a></div>
  </div>

    <div class="tb">
            <div class="page-heading">
                <div><h2><a href="reviews.php"> RECENT REVIEWS</a></h2></div>
            </div>
            <?php 	
            $query="select product_review.*,product.img1 from product_review,product where product.product_id=product_review.product_id  order by product_review.review_id desc limit 5";
            $res=mysqli_query($con,$query);
            while($row=mysqli_fetch_assoc($res)){
                $image=$row['img1'];?>	   
                <div class="tb">
                    <div class="flex">
                        <div class="review-deets">
                            <table>
                                <tr>
                                    <th>REVIEW ID</th>
                                    <td><?php echo $row['review_id']?></td>
                                </tr>
                                <tr>
                                    <th>PRODUCT ID</th>
                                    <td><?php echo $row['product_id']?></td>
                                </tr>
                                <tr>
                                    <th>CUSTOMER ID</th>
                                    <td><?php echo $row['customer_id']?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="review-img">
                            <?php
                                echo "<a target='_blank' href='".PRODUCT_IMAGE_SITE_PATH.$image."'><img width='150px' src='".PRODUCT_IMAGE_SITE_PATH.$image."'/></a>"
                            ?>
                        </div>
                        <div class="review-content">
                            <h3><?php echo $row['title']?></h3>
                            <p><?php
                                $i=$row['rating'];
                                while($i>0){
                            ?>
                                <i class="fas fa-star"></i>
                            <?php $i--; } ?>
                                |   <?php echo $row['added_on']?></p>
                            <p><?php echo $row['review']?></p>
                                    <br>
                        </div>
                        
                    </div>
                    
                </div>   
            <?php }?>
    </div>



    <div class="tb">
        <div class="page-heading">
				<div><h2>CUSTOMER QUERIES</h2></div>
		</div>
        <?php 

            $sql="SELECT id,`name`,email,mobile,comment,added_on FROM contact order by id desc";
            $res=mysqli_query($con,$sql);

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
                    </div>
                    
                </div>
                
            </div>

        <?php } ?>
    </div>

</div>

<?php
    require('dash-footer.php');
?>