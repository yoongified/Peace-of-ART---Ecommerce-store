<?php
require('connection.php');
require('functions.php');

$fname=get_safe_value($con,$_POST['fname']);
$mobile=get_safe_value($con,$_POST['mobile']);

$aid=$_SESSION['ADMIN_ID'];

if(!preg_match("/^[a-zA-Z-' ]*$/",$fname)){
    echo "nameErr";
}else if(!preg_match('/^[1-9][0-9]{9}+$/', $mobile)){
echo "mobErr";
}else{
    mysqli_query($con,"UPDATE `admin` SET name='$fname',mobile='$mobile' WHERE id='$aid'" );
    $_SESSION['ADMIN_NAME']=$fname;
    $_SESSION['ADMIN_MOBILE']=$mobile;

    echo "Changes Saved Successfully";
}


?>