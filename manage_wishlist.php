<?php
require('DATABASE/connection.php');
require('DATABASE/functions.php');
require('add_to_cart.php'); 

$pid=get_safe_value($con,$_POST['pid']);
$type=get_safe_value($con,$_POST['type']);

if(isset($_SESSION['USER_LOGIN'])){
     $uid=$_SESSION['USER_ID'];
     if(mysqli_num_rows(mysqli_query($con,"select * from wishlist where customer_id='$uid' and product_id='$pid'"))>0){
          //echo "Already added";
     }
     else{   
          //$added_on=date('Y-m-d h:i:s');
         //mysqli_query($con,"insert into wishlist(customer_id,product_id,added_on) values('$uid','$pid','$added_on')");
         add_wishlist($con,$uid,$pid);
     }
     echo $total=mysqli_num_rows(mysqli_query($con,"select * from wishlist where customer_id='$uid'"));
}
else {
     $_SESSION['WISHLIST_ID']=$pid;
     echo "not_login";
}    


?>