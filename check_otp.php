<?php
require('DATABASE/connection.php');
require('DATABASE/functions.php');

$otp=get_safe_value($con,$_POST['otp']); 
$type=get_safe_value($con,$_POST['type']); 
if($type=='email'){
	if($otp==$_SESSION['EMAIL_OTP']){
		echo "done";
	}else{
		echo "no";
	}

}




?>