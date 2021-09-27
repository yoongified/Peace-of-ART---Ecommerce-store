<?php
  include("poa-top.php");
?>



<section class="signin-page account">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
          
          <h2 class="text-center">Create Your Account</h2>
          <form class="text-left clearfix" action="home.php">
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="First Name" name="fname" id="fname" >
              <span class="field_error" id="fname_error"></span>
            </div>
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="Last Name" name="lname" id="lname" >
              <span class="field_error" id="lname_error"></span>
            </div>
            
            <div class="form-group" style="display: flex;">
              <input type="email" class="form-control"  placeholder="Email" name="email" id="email" >
              <button type="button" onclick="email_sent_otp()" class="btn btn-main btn-small email_sent_otp">SEND OTP</button>
              
              
            </div>
            <div class="form-group email-verify">
              <span class="field_error" id="email_error"></span>
              <span id="email_otp_result"></span>
            </div>
            <div class="form-group email-verify">
              <input type="text" class="form-control email_verify_otp"  placeholder="OTP" name="email_otp" id="email_otp" >
              <button type="button" onclick="email_verify_otp()" class="btn btn-main btn-small email_verify_otp">VERIFY OTP</button>
            </div>
            
            <div class="form-group">
              <input type="text" class="form-control"  pattern="[0-9]{10}" placeholder="mobile" name="mobile" id="mobile" >
              <span class="field_error" id="mob_error"></span>
            </div>
            <div class="form-group">
              <input type="password" class="form-control"  placeholder="Password" name="password" id="password" >
              <span class="field_error" id="pass_error"></span>
            </div>
            <div class="text-center">
              <button type="button" onclick="user_register()" class="btn btn-main text-center">Sign In</button>
            </div>
            
          </form>
          
          <p class="mt-20">Already have an account ?<a href="login.php"> Login</a></p>
          <p><a href="forget-password.php"> Forgot your password?</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  function email_sent_otp(){
    jQuery('#email_error').html('');
    var email=jQuery('#email').val();
    if(email==''){
      jQuery('#email_error').html('Please Enter OTP');
    }
    else{
      jQuery('.email_sent_otp').html('Please Wait..');
      jQuery('.email_sent_otp').attr('disabled',true);
      jQuery('.email_sent_otp');
      
      jQuery.ajax({
        url:'send_otp.php',
        type:'post',
        data:'email='+email+'&type=email',
        success:function(result){
          result=result.replace(/[\r\n]+/gm,"");
          if(result=='done'){
            jQuery('#email').attr('disabled',true);
            jQuery('.email_verify_otp').show();
            jQuery('.email_sent_otp').hide();
          }else{
            jQuery('.email_sent_otp').html('SEND OTP');
            jQuery('.email_sent_otp').attr('disabled',false);
            jQuery('#email_error').html('Please try after sometime');
          }
        }
      });
    }
    
  }
  function email_verify_otp(){
    jQuery('#email_error').html('');
    var otp=jQuery('#email_otp').val();
    if(otp==''){
      jQuery('#email_error').html('Please Enter OTP');
    }
    else{
      jQuery.ajax({
        url:'check_otp.php',
        type:'post',
        data:'otp='+otp+'&type=email',
        success:function(result){
          result=result.replace(/[\r\n]+/gm,"");
          if(result=='done'){
            jQuery('.email_verify_otp').hide();
            jQuery('#email_otp_result').html('Email ID Verified');
          }else{
            jQuery('#email_error').html('Please enter valid OTP');
          }
        }
      });
    }
  }
</script>

<?php
include("poa-footer.php");
?>
