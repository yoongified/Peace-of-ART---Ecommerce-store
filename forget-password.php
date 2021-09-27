<?php
  include("poa-top.php");
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']=='yes'){
?>
<script>window.location.href='order.php';</script>
<?php
  }
?>





<section class="forget-password-page account">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
          <h2 class="text-center">Welcome Back</h2>
          <form class="text-left clearfix">
            <p>Please enter the email address for your account. <br> A verification code will be sent to you. Once you have received the verification code, you will be able to choose a new password for your account.</p>
            <div class="form-group">
              <input type="email" class="form-control " id="email" name="email"  placeholder="Account email address">
            </div>
            <span class="field_error" id="email_error"></span>
            <div class="text-center">
              <button type="button" onclick="forget_password()" class="btn btn-main text-center btn-forget" >Request password</button>
            </div>
          </form>
          <p class="mt-20"><a href="login.php">Back to log in</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

<script>

function forget_password(){
  jQuery('#email_error').html('');
  var email=jQuery('#email').val();
  if(email==''){
    jQuery('#email_error').html('Please Enter Email ID');
  }
  else{
    jQuery('.btn-forget').html('Please Wait..');
    jQuery('.btn-forget').attr('disabled',true);
    jQuery.ajax({
        url:'forgetpass_submit.php',
        type:'post',
        data:'email='+email,
        success:function(result){
          result=result.replace(/[\r\n]+/gm,"");
          jQuery('#email_error').html(result);
          jQuery('#email').val('');
          jQuery('.btn-forget').html('Request password');
          jQuery('.btn-forget').attr('disabled',false);
        }
      });
  }

}

</script>

<?php
  include("poa-footer.php");
?>
