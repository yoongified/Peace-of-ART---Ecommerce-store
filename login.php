<?php
  include("poa-top.php");
  if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']=='yes'){
  ?>
  <script>window.location.href="order.php";</script>
  <?php
  }
?>


<section class="signin-page account">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
          <h2 class="text-center">Welcome Back</h2>
          <form class="text-left clearfix" >
            <div class="form-group">
              <input type="email" class="form-control"  placeholder="Email" name="lemail" id="lemail">
              <span class="field_error" id="lemail_error"></span>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Password" name="lpassword" id="lpassword">
              <span class="field_error" id="lpass_error"></span>
            </div>
            <div class="text-center">
              <button type="button" onclick="user_login()" class="btn btn-main text-center" >Login</button>
            </div>
            
          </form><br> 
          <p><a href="forget-password.php"> Forgot your password?</a></p>
          <p class="mt-20">New in this site ?<a href="signin.php"> Create New Account</a></p>
        </div>
      </div>
    </div>
  </div>
</section> 



<?php
  include("poa-footer.php");
?>
