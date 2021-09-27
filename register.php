<?php
require('DATABASE/connection.php');
require('DATABASE/functions.php');

$fname=get_safe_value($con,$_POST['fname']);
$lname=get_safe_value($con,$_POST['lname']);
$email=get_safe_value($con,$_POST['email']);
$mobile=get_safe_value($con,$_POST['mobile']);
$pass=get_safe_value($con,$_POST['password']);


$check=mysqli_num_rows(mysqli_query($con,"select * from customer where email='$email'"));

if($check>0){
    echo "email_present";
}else if(!preg_match("/^[a-zA-Z-' ]*$/",$fname)){
    echo "nameErr";
}else if(!preg_match("/^[a-zA-Z-' ]*$/",$lname)){
    echo "nameErr";
}else if(!preg_match( "/^[^0-9][_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$email)){
    echo "emailErr";
}else if(!preg_match('/^[1-9][0-9]{9}+$/', $mobile)){
     echo "mobErr";
}
else{
    $added_on=date('Y-m-d h:i:s');
    mysqli_query($con,"insert into customer(fname,lname,email,mobile,password,added_on) values('$fname','$lname','$email','$mobile','$pass','$added_on')");
    echo "insert";
}

?>