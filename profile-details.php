<?php
  include("poa-top.php");

if(!isset($_SESSION['USER_LOGIN'])){
?>
	<script>window.location.href='home.php';</script>
<?php
}
?>
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">MY ACCOUNT</h1>
					<ol class="breadcrumb">
						<li><a href="home.php">Home</a></li>
						<li class="active">Profile</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="user-dashboard page-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="list-inline dashboard-menu text-center">
          <li><a class="active" href="profile-details.php">Profile Details</a></li>
          <li><a href="wishlist.php">Wishlist</a></li>
          <li><a href="order.php">Orders</a></li>

          
        </ul>
      <!--START PROFILE-->
        <div class="dashboard-wrapper dashboard-user-profile">
            <h1 class="widget-title">MY PROFILE</h1>
            <form class="checkout-form">
              <div class="checkout-country-code clearfix">
                  <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" id="fname" placeholder="" value="<?php echo $_SESSION['USER_NAME']?>">
                    <span class="field_error" id="fname_error"></span>
                  </div>
                  <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" id="lname" placeholder="" value="<?php echo $_SESSION['USER_LNAME']?>">
                    <span class="field_error" id="lname_error"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label>Email ID</label>
                  <input type="email" class="form-control" id="email" placeholder="" value="<?php echo $_SESSION['USER_EMAIL']?>" disabled>
                </div>
                <div class="form-group">
                  <label>Mobile</label>
                  <input type="text" class="form-control" id="mobile" placeholder="" value="<?php echo $_SESSION['USER_MOBILE']?>"  pattern="[1-9]{1}[0-9]{9}" maxlength="10" required>
                  <span class="field_error" id="mob_error"></span>
                </div>
                <div class="alert alert-success alert-common profile-change" role="alert"><i class="tf-ion-thumbsup"></i><span class="profile-success">Well done!</span></div>
                <button type="button" class="btn btn-main btn-medium btn-round-full update-profile-btn" onclick="update_profile()">SAVE CHANGES</button>
            </form>

            <hr>

            <h1 class="widget-title">CHANGE PASSWORD</h1>
            <form id="changepass-form">
              <div class="profile-pass">
                  <div class="form-group profile-pass-div">
                  <label>Current Password</label>
                  <input type="password" class="form-control" id="currentpass" placeholder="" value="" >
                  <span class="field_error" id="currentpass_error"></span>
                </div>
                <div class="checkout-country-code clearfix profile-pass-div">
                  <div class="form-group">
                    <label>New Password</label>
                    <input type="password" class="form-control" id="newpass" placeholder="" >
                    <span class="field_error" id="newpass_error"></span>
                  </div>
                  <div class="form-group">
                    <label>Confirm New Password</label>
                    <input type="password" class="form-control" id="confirm_newpass" placeholder="" >
                    <span class="field_error" id="confirm_newpass_error"></span>
                  </div>
                </div>
              </div> 
              <div class="alert alert-success alert-common pass-change" role="alert"><i class="tf-ion-thumbsup"></i><span class="pass-success"></span></div>
              <button type="button" class="btn btn-main btn-medium btn-round-full update-pass-btn" onclick="update_pass()">CHANGE PASSWORD</button>
            </form>
        </div>
      <!--END PROFILE-->
      </div>
    </div>
  </div>
</section>

<script>

function update_profile(){
  
  jQuery('.field_error').html('');

  var fname=jQuery('#fname').val();
  var lname=jQuery('#lname').val();
  var mobile=jQuery('#mobile').val();
  var is_error="";
  if(fname==""){
    jQuery('#fname_error').html('please enter first name');
    is_error="yes";
  }if(lname==""){
    jQuery('#lname_error').html('please enter last name');
    is_error="yes";
  }if(mobile==""){
    jQuery('#mob_error').html('please enter mobile no');
    is_error="yes";
  }

  if(is_error==""){
    jQuery('.update-profile-btn').html('Please Wait..');
    jQuery('.update-profile-btn').attr('disabled',true);
    
    jQuery.ajax({
      url:'update_profile.php',
      type:'post',
      data:'fname='+fname+'&lname='+lname+'&mobile='+mobile,
      success:function(result){
        result=result.replace(/[\r\n]+/gm,"");
        
        if(result=='nameErr'){
          alert('Only letters and white space allowed in name');
        }if(result=='emailErr'){
          alert('Invalid email format. Eg. peace@gmail.com');
        }
        if(result=='mobErr'){
          alert('Enter a valid 10 digit mobile number.');
        }
        if(result=='Changes Saved Successfully'){
          
          jQuery('.profile-change').show();
          jQuery('.profile-success').html(result);
          
        }
        jQuery('.update-profile-btn').html('SAVE CHANGES');
        jQuery('.update-profile-btn').attr('disabled',false);
        
      }
    });
  }
    
    
}

function update_pass(){
  jQuery('.field_error').html('');

  var currentpass=jQuery('#currentpass').val();
  var newpass=jQuery('#newpass').val();
  var confirm_newpass=jQuery('#confirm_newpass').val();

  var is_error="";
  if(currentpass==""){
    jQuery('#currentpass_error').html('please enter current password');
    is_error="yes";
  }if(newpass==""){
    jQuery('#newpass_error').html('please enter new password');
    is_error="yes";
  }if(confirm_newpass==""){
    jQuery('#confirm_newpass_error').html('please re-enter new password');
    is_error="yes";
  }if(newpass!='' && confirm_newpass!="" && newpass!=confirm_newpass){
    jQuery('#confirm_newpass_error').html('please enter same password');
    is_error="yes";
  }



  if(is_error==""){
    jQuery('.update-pass-btn').html('Please Wait..');
    jQuery('.update-pass-btn').attr('disabled',true);
    
    jQuery.ajax({
      url:'update_pass.php',
      type:'post',
      data:'currentpass='+currentpass+'&newpass='+newpass,
      success:function(result){
        result=result.replace(/[\r\n]+/gm,"");
        if(result=='no'){
          jQuery('#currentpass_error').html('Please enter your current password');
        }else{
        jQuery('.pass-change').show();
        jQuery('.pass-success').html(result);
        jQuery('#changepass-form')[0].reset();
        
        }
        jQuery('.update-pass-btn').html('CHANGE PASSWORD');
        jQuery('.update-pass-btn').attr('disabled',false);
      }
    });
  }
    
    
}
</script>

<?php
  include("poa-footer.php");
?>