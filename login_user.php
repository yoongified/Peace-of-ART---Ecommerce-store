<?php
require('DATABASE/connection.php');
require('DATABASE/functions.php');


$email=get_safe_value($con,$_POST['email']);
$pass=get_safe_value($con,$_POST['password']);

$res=mysqli_query($con,"select * from customer where email='$email' and password='$pass'");
$check=mysqli_num_rows($res);

if($check>0){ 
    $row=mysqli_fetch_assoc($res);
    $_SESSION['USER_LOGIN']='yes';
    $_SESSION['USER_ID']=$row['customer_id'];
    $_SESSION['USER_NAME']=$row['fname']; 
    $_SESSION['USER_LNAME']=$row['lname']; 
    $_SESSION['USER_EMAIL']=$row['email']; 
    $_SESSION['USER_MOBILE']=$row['mobile']; 

    if(isset($_SESSION['WISHLIST_ID']) && $_SESSION['WISHLIST_ID']!=''){
          add_wishlist($con,$_SESSION['USER_ID'],$_SESSION['WISHLIST_ID']);
          unset($_SESSION['WISHLIST_ID']);
    }

     echo "valid";
}
else{
     
     echo "wrong";
}

?>