<?php
require('DATABASE/connection.php');
require('DATABASE/functions.php');

$currentpass=get_safe_value($con,$_POST['currentpass']);
$newpass=get_safe_value($con,$_POST['newpass']);

$uid=$_SESSION['USER_ID'];

$row=mysqli_fetch_assoc(mysqli_query($con,"SELECT `password` FROM customer WHERE customer_id='$uid'"));
if($row['password']!=$currentpass){
    echo "no";
}else{
    mysqli_query($con,"UPDATE customer SET `password`='$newpass' WHERE customer_id='$uid'");
    echo "Password Updated Successfully";
}



?>