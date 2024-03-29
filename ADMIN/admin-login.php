<?php

require('connection.php');
require('functions.php'); 

if(isset($_POST['login'])){
    $email=get_safe_value($con,$_POST['username']);
    $pass=get_safe_value($con,$_POST['password']);  
    $query="select * from admin where email='$email' and password='$pass'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0){
		$row=mysqli_fetch_assoc($result);
        $_SESSION['ADMIN_LOGIN']='yes';
        $_SESSION['ADMIN_NAME']=$row['name'];
		$_SESSION['ADMIN_ID']=$row['id'];
		$_SESSION['ADMIN_EMAIL']=$row['email'];
		$_SESSION['ADMIN_MOBILE']=$row['mobile'];
		$_SESSION['ADMIN_IMG']=$row['img'];
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
	<title>ADMIN LOGIN | POA</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="login/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title">
						Admin Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" placeholder="USERNAME" name="username" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" placeholder="PASSWORD" name="password" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="login">
							LOGIN
						</button>
					</div>

				</form>
			</div>
		</div>
		
	</div>
	
	
 
	

	
<!--===============================================================================================-->	
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	

</body>
</html>