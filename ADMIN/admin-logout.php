<?php
session_start();

unset($_SESSION['ADMIN_LOGIN']);   
unset($_SESSION['ADMIN_NAME']);

header('location:admin-login.php');
die();
    

?>