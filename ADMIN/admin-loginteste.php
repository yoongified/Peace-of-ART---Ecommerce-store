<?php

require('connection.php');
require('functions.php'); 

if(isset($_POST['login'])){
    $username=get_safe_value($con,$_POST['username']);
    $pass=get_safe_value($con,$_POST['password']);  
    $query="select * from admin where username='$username' and password='$pass'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0){
        $_SESSION['ADMIN_LOGIN']='yes';
        $_SESSION['ADMIN_USERNAME']=$username;
        header("location:home.php");
        die();
    }
    else{  
        echo " <script>alert('Incorrect Username or password');
        </script> ";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN | LOGIN</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/235bf570e7.js" crossorigin="anonymous"></script>
</head>    

<body>
    <div class="container">
        <form method="post" class="login">
            <p class="login-text" style="font-size: 2rem;font-weight: 800;">Welcome ADMIN</p>
            <div class="input-group">
                <input type="text" placeholder="USERNAME" name="username" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="PASSWORD" name="password" required>
            </div>
            <div class="input-group">
                <button type="submit" name="login" class="btn">LOGIN</button>
            </div>
        </form>   
    </div>
 
    

</body>   
</html>