<?php
    require('dash-top.php');
    $res=mysqli_query($con,"SELECT * FROM `admin` ORDER BY id desc");
	
	if(isset($_GET['type']) && $_GET['type']!=''){
		$type=get_safe_value($con,$_GET['type']);
		if($type=='delete'){
			$id=get_safe_value($con,$_GET['aid']);
			$delete_sql="delete from `admin` where id='$id'";
			mysqli_query($con,$delete_sql);
		}
		header('location:settings.php');
	}
?>

<div class="main-container">
 <!------admin table contents--->     
 	<div class="page-heading">
		<div><h1><i class="fas fa-cogs"></i>  ADMIN SETTINGS</h1>
	</div>				
	</div>
	<div class="tb">
		<table>
			<tr>
				<th>ID</th>
				<th>NAME</th>
				<th>EMAIL</th>
				<th>MOBILE</th>
				<th></th>
			</tr>
			<?php
				while($row=mysqli_fetch_assoc($res)){prx($row);
			?>
				<tr>
					<td><?php echo $row['id']?></td>
					<td><?php echo $row['name']?></td>
					<td><?php echo $row['email']?></td>
					<td><?php echo $row['mobile']?></td>
					<td>
					<?php echo "<a href='?type=delete&aid=".$row['id']."'><span class='fas fa-trash red'></span></a>";?>
					</td>
				</tr>
			<?php }	?>
		</table>
	</div>
	<div class="tb" >
		<div class="page-heading">
			<div><h2>MY PROFILE</h2></div>
		</div>
		<div style="display:flex">
			<div style="text-align: center;flex: 40%;">
				<img src="<?php echo ADMIN_IMAGE_SITE_PATH.$_SESSION['ADMIN_IMG']?>" alt="">
				<p>ID : #<?php echo $_SESSION['ADMIN_ID']?></p>
			</div>
			<div style="flex: 60%;">
				<form>
					<div class="form">
						<label>Name</label>
						<input type="text" class="form-control" id="fname" placeholder="" value="<?php echo $_SESSION['ADMIN_NAME']?>">
						<span class="field_error" id="fname_error"></span>
					</div>
					<div class="pform">
						<div class="form">
							<label>Email ID</label>
							<input type="email" class="form-control" id="email" placeholder="" value="<?php echo $_SESSION['ADMIN_EMAIL']?>" disabled>
						</div>
						<div class="form">
							<label>Mobile</label>
							<input type="text" class="form-control" id="mobile" placeholder="" value="<?php echo $_SESSION['ADMIN_MOBILE']?>"  pattern="[1-9]{1}[0-9]{9}" maxlength="10" required>
							<span class="field_error" id="mob_error"></span>
						</div>
					</div>
					
					<div class="profile-change" role="alert"><i class="tf-ion-thumbsup"></i><span class="profile-success"></span></div>
					<div class="options">
						<button class="btnn update-profile-btn" type="submit" onclick="update_profile()">SAVE CHANGES</button>
					</div>
				</form>
			</div>
		</div>	

	</div>

	<div class="tb">
		<div class="page-heading">
			<div><h2>CHANGE PASSWORD</h2></div>
		</div>
			<form id="changepass-form">
				<div style="display:flex">
					<div class="form">
						<label>Current Password</label>
						<input type="password" class="form-control" id="currentpass" placeholder="" value="" >
						<span class="field_error" id="currentpass_error"></span>
					</div>
					<div>
						<div class="form">
							<label>New Password</label>
							<input type="password" class="form-control" id="newpass" placeholder="" >
							<span class="field_error" id="newpass_error"></span>
						</div>
						<div class="form">
							<label>Confirm New Password</label>
							<input type="password" class="form-control" id="confirm_newpass" placeholder="" >
							<span class="field_error" id="confirm_newpass_error"></span>
						</div>
					</div>
				</div>
                
                <div class="pass-change" role="alert"><i class="tf-ion-thumbsup"></i><span class="pass-success"></span></div>
			    <div class="options">
					<button class="btnn update-pass-btn" type="button" onclick="update_pass()">CHANGE PASSWORD</button>
				</div>
            </form>

	</div>

	<div class="options">
		<p>You nice keep goin!</p>
		<a href="home.php"><button type="submit"></i>BACK</button></a>
	</div>

</div>

<script>

function update_profile(){
  
  jQuery('.field_error').html('');

  var name=jQuery('#fname').val();
  var mobile=jQuery('#mobile').val();
  var is_error="";
  if(name==""){
    jQuery('#fname_error').html('please enter first name');
    is_error="yes";
  }if(mobile==""){
    jQuery('#mob_error').html('please enter mobile no');
    is_error="yes";
  }

  if(is_error==""){
    jQuery('.update-profile-btn').html('Please Wait..');
    jQuery('.update-profile-btn').attr('disabled',true);
    
    jQuery.ajax({
      url:'admin_update_profile.php',
      type:'post',
      data:'fname='+name+'&mobile='+mobile,
      success:function(result){
        result=result.replace(/[\r\n]+/gm,"");
        
        if(result=='nameErr'){
          alert('Only letters and white space allowed in name');
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
      url:'admin_update_pass.php',
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
    require('dash-footer.php');
?>