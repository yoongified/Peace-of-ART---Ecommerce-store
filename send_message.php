<?php
require('DATABASE/connection.php');
require('DATABASE/functions.php');
$name=get_safe_value($con,$_POST['name']);
$email=get_safe_value($con,$_POST['email']);
$mobile=get_safe_value($con,$_POST['mobile']);
$comment=get_safe_value($con,$_POST['message']);
$added_on=date('Y-m-d h:i:s');


if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
  echo "nameErr";
}
else if(!preg_match( "/^[^0-9][_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$email)){
 echo "emailErr";
}else if(!preg_match('/^[1-9][0-9]{9}+$/', $mobile)){
  echo "mobErr";
}
else{
  mysqli_query($con,"insert into contact(name,email,mobile,comment,added_on) values('$name','$email','$mobile','$comment','$added_on')");
  echo "Thank you";
}

?>