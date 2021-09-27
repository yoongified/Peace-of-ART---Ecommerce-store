<?php
require('DATABASE/connection.php');
require('DATABASE/functions.php');

$email=get_safe_value($con,$_POST['email']);

$check=mysqli_num_rows(mysqli_query($con,"select * from news where email='$email'"));
if($check>0){
    echo "email_present";
}else if(!preg_match( "/^[^0-9][_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$email)){
    echo "emailErr";
}
else{
    $added_on=date('Y-m-d h:i:s');
    mysqli_query($con,"insert into news(email,added_on) values('$email','$added_on')");
    echo "done";
}

?>