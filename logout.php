<?php
require('DATABASE/connection.php');
require('DATABASE/functions.php');

unset($_SESSION['USER_LOGIN']);   
unset($_SESSION['USER_ID']);
unset($_SESSION['USER_NAME']);


header('location:home.php');
die();
    

?>