<?php
require('DATABASE/connection.php');
require('DATABASE/functions.php');

$coupon_str=get_safe_value($con,$_POST['coupon_str']);
$jsonArr=array();
$res=mysqli_query($con,"SELECT * FROM coupon_master WHERE coupon_code='$coupon_str' and stats='1'");
$num=mysqli_num_rows($res);

if(isset($_SESSION['COUPON_ID'])){
    unset($_SESSION['COUPON_ID']);
    unset($_SESSION['COUPON_CODE']);
    unset($_SESSION['COUPON_DISCOUNT']);
}

$cart_total=0;
foreach($_SESSION['cart'] as $key=>$val){
    $productArr=get_product($con,'','',$key);    
    $price=$productArr[0]['price'];
    $qty=$val['qty'];
    $cart_total=$cart_total+($qty*$price);
}

if($num>0){
    $row=mysqli_fetch_assoc($res);
    $id=$row['id'];
	$coupon_value=$row['coupon_value'];
	$coupon_type=$row['coupon_type'];
	$cart_min_value=$row['cart_min_value'];


    if($cart_min_value>$cart_total){
        $jsonArr=array('is_error'=>'yes','result'=>'Cart Total must be '.$cart_min_value);
    }else{
        if($coupon_type=='RUPEES'){
            $coupon=$coupon_value;
        }else if($coupon_type=='PERCENTAGE'){
            $coupon=($cart_total*100)/$coupon_value;
        }
        $_SESSION['COUPON_ID']=$id;
        $_SESSION['COUPON_CODE']=$coupon_str;
        $_SESSION['COUPON_DISCOUNT']= $coupon;
        $final_price=$cart_total-$coupon;

        $jsonArr=array('is_error'=>'no','result'=>$final_price,'coupon'=>$coupon);
    }
}
else{
    $jsonArr=array('is_error'=>'yes','result'=>'Coupon Code not valid');
}
echo json_encode($jsonArr);

?>