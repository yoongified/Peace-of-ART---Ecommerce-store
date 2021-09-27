<?php
require('DATABASE/connection.php');
require('DATABASE/functions.php');

$fname=get_safe_value($con,$_POST['fname']);
$lname=get_safe_value($con,$_POST['lname']);
$mobile=get_safe_value($con,$_POST['mobile']);

$uid=$_SESSION['USER_ID'];

if(!preg_match("/^[a-zA-Z-' ]*$/",$fname)){
    echo "nameErr";
}else if(!preg_match("/^[a-zA-Z-' ]*$/",$lname)){
    echo "nameErr";
}else if(!preg_match('/^[1-9][0-9]{9}+$/', $mobile)){
echo "mobErr";
}else{
    mysqli_query($con,"UPDATE customer SET fname='$fname',lname='$lname',mobile='$mobile' WHERE customer_id='$uid'" );
    $_SESSION['USER_NAME']=$fname;
    $_SESSION['USER_LNAME']=$lname;
    $_SESSION['USER_MOBILE']=$mobile;

    echo "Changes Saved Successfully";
}


?>