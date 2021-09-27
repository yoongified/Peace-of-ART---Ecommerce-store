<?php 
include('vendor/autoload.php');
require("DATABASE/connection.php");
require("DATABASE/functions.php");

if(!isset($_SESSION['ADMIN_LOGIN'])){
 	if(!isset($_SESSION['USER_ID'])){
	die();
}	
}

$order_id=get_safe_value($con,$_GET['id']);
$date=get_safe_value($con,$_GET['date']);

$coupondetails=mysqli_fetch_assoc(mysqli_query($con,"select coupon_discount from `order` where id=$order_id"));
$discount=$coupondetails['coupon_discount'];

$css=file_get_contents('plugins/bootstrap/css/bootstrap.min.css');
$css.=file_get_contents('css/style.css');
$css.=file_get_contents('css/invoice.css');


$html='
<h1 class="text-center">PEACE OF ART</h1>

<hr>
<h2 class="text-center">ORDER INVOICE</h2>
<h4 class="text-right">Order ID:'.$order_id.'</h4>
<h4 class="text-right">Date: '.$date.'</h4>

<h4>Payment Status: Pending</h4>
<h4>Payment Method: COD</h4>
<br>
<BLOCKQUOTE>

	<table class="table" style="text-align:center;">
		<thead>
			<tr>
				<th></th>
				<th colspan=2 >Product</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Total Price</th>
			</tr>
		</thead>
		<tbody>';
				if(isset($_SESSION['ADMIN_LOGIN'])){
					$res=mysqli_query($con,"select distinct(order_details.id),
					order_details.*,product.pname,product.img1 from
					order_details,product,`order` 
					where order_details.order_id='$order_id' 
					and order_details.product_id=product.product_id");
				}else{
					$uid=$_SESSION['USER_ID'];
					$res=mysqli_query($con,"select distinct(order_details.id),
					order_details.*,product.pname,product.img1 from
					order_details,product,`order` 
					where order_details.order_id='$order_id' and `order`.customer_id='$uid'
					and order_details.product_id=product.product_id");
				}
				
				$i=1;$total_price=0;
				if(mysqli_num_rows($res)==0){
					die();
				}
				while($row=mysqli_fetch_assoc($res)){
				$pp=$row['price']*$row['qty'];
				$total_price=$total_price+($pp);
		$html.='<tr>
				<td>#'.$i.'</td>
				<td><img class="media-object" src="'.PRODUCT_IMAGE_SITE_PATH.$row['img1'].'" height=120> </td>
				<td>'.$row['pname'].'</td>
				<td>₹'.$row['price'].'</td>
				<td>'.$row['qty'].'</td>
				<td>₹'.$pp.'</td>		
				</tr>';
				$i++;
				}
				$html.='
				<tr ><td colspan=4></td><th>SUBTOTAL</th><td>₹'.$total_price.'</td></tr>
				<tr ><td colspan=4></td><th>SHIPPING</th><td>₹0</td></tr>';
				if($discount>0){
					$html.='<tr ><td colspan=4></td><th>DISCOUNT</th><td>₹'.$discount.'</td></tr>';
				}
				$html.='<tr ><td colspan=4></td><th>TOTAL</th><th>₹'.$total_price-$discount.'</th></tr>
				</tbody>
			</table>
		</div>									
</BLOCKQUOTE>';

$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($html,2);
$file=time().'.pdf';
$mpdf->Output($file,'D');
?>



