<?php
require('connection.php');
require('functions.php');

$currentpass=get_safe_value($con,$_POST['currentpass']);
$newpass=get_safe_value($con,$_POST['newpass']);

$aid=$_SESSION['ADMIN_ID'];

$row=mysqli_fetch_assoc(mysqli_query($con,"SELECT `password` FROM `admin` WHERE id='$aid'"));
if($row['password']!=$currentpass){
    echo "no";
}else{
    mysqli_query($con,"UPDATE `admin` SET `password`='$newpass' WHERE id='$aid'");
    echo "Password Updated Successfully";
}



?>