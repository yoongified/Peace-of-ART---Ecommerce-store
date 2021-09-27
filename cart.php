<?php
  include("poa-top.php");

  if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
   
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
					<h1 class="page-name">Shopping Cart</h1>
					<ol class="breadcrumb">
						<li><a href="home.php">Home</a></li>
						<li class="active">Cart</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="page-wrapper">
  <div class="cart shopping">
    <div class="container">
            <div class="product-list">
              <form method="post">
                <table class="table">
                  <thead>
                    <tr>
                      <th class=""></th>
                      <th class="">Item Name</th>
                      <th class="">Item Price</th>
                      <th class="">Quantity</th>
                      <th class="">Total</th>
                      <th class="">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $cart_total=0;
                        foreach($_SESSION['cart'] as $key=>$val){
                        $product_id=$key;
                        $productArr=get_product($con,'','',$key);
                        
                        $pname=$productArr[0]['pname'];
                        $mrp=$productArr[0]['mrp'];
                        $price=$productArr[0]['price'];
                        $image=$productArr[0]['img1'];
                        $qty=$val['qty'];
                        $cart_total=$cart_total+($qty*$price);
                    ?>
                    <tr class="">
                      <td class=""><img width="80" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>" alt="" /></td>
                      <td class="">
                        <div class="product-info">
                          <a href="product.php?id=<?php echo $product_id?>"><?php echo $pname?></a>
                        </div>
                      </td>
                      <td class="">₹<?php echo $price?><br>
                      <strike>₹<?php echo $mrp?></strike>
                      </td>
                      <td class="product-quantity"><input id="<?php echo $key ?>qty" type="number" value="<?php echo $qty ?>"/><br><a class="product-remove" href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','update')">Update</a></td>
                      <td class="">₹<?php echo $qty*$price ?> </td>
                      <td class="">
                        <a class="product-remove" href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php } ?>
                    <tr>
                      <td colspan=3></td>
                      <th>CART TOTAL</th>
                      <th>₹<?php echo $cart_total ?></th>
                    </tr>
                  </tbody>
                </table> <br>
                <a href="home.php" class="btn btn-main pull-left">Continue Shopping</a>
                <a href="checkout.php" class="btn btn-main pull-right">Checkout</a>
                
              </form>
            </div>
    </div>
  </div>
</div>




<?php
  include("poa-footer.php");
?>