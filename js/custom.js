function send_message(){ 
	var name=jQuery("#name").val();
	var email=jQuery("#email").val();
	var mobile=jQuery("#mobile").val();
	var message=jQuery("#message").val();
	
 
	if(name==""){
		alert('Please enter name');
	}else if(email==""){
		alert('Please enter email');
	}else if(mobile==""){
		alert('Please enter mobile');
	}else if(message==""){
		alert('Please enter message');
	}
  else{ 
    
		jQuery.ajax({
			url:'send_message.php',
			type:'post',
			data:'name='+name+'&email='+email+'&mobile='+mobile+'&message='+message,
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
        if(result=='Thank you'){
          alert('Thank you. The Mailman is on His Way :)');
          window.location.href=window.location.href;
        }
			
			}	
		});
	}
}

function user_register(){
   jQuery('.field_error').html('');

	var fname=jQuery("#fname").val();
  var lname=jQuery("#lname").val();
	var email=jQuery("#email").val();
	var mobile=jQuery("#mobile").val();
	var password=jQuery("#password").val();
	var is_error="";
	if(fname==""){
    jQuery('#fname_error').html('please enter first name');
    is_error="yes";
	}if(lname==""){
		jQuery('#lname_error').html('please enter last name');
    is_error="yes";
  }if(email==""){
		jQuery('#email_error').html('please enter email');
    is_error="yes";
	}if(mobile==""){
		jQuery('#mob_error').html('please enter mobile no');
    is_error="yes";
	}if(password==""){
		jQuery('#pass_error').html('please enter password');
    is_error="yes";
  }
  
  if(is_error==""){
		jQuery.ajax({
			url:'register.php',
			type:'post',
			data:'fname='+fname+'&lname='+lname+'&email='+email+'&mobile='+mobile+'&password='+password,
			success:function(result){
        console.log("_"+result+"_");
        result=result.replace(/[\r\n]+/gm,"");
        if(result=='email_present'){
          jQuery('#email_error').html('Account already exists');
          alert('Account already exists');
        }if(result=='nameErr'){
          alert('Only letters and white space allowed in name');
        } if(result=='emailErr'){
          alert('Invalid email format. Eg. peace@gmail.com');
        }
        if(result=='mobErr'){
          alert('Enter a valid 10 digit mobile number.');
        }if(result=='insert'){
          jQuery('.register_msg p').html('Thank you for joining us');
          alert('Thank you for joining us. Please proceed to login page');
        }
        else{
          console.log("_"+result+"_");
        }
      }			
		});
	}
}

function user_login(){
  jQuery('.field_error').html('');

 var email=jQuery("#lemail").val();
 var password=jQuery("#lpassword").val();
 var is_error="";

 if(email==""){
   jQuery('#lemail_error').html('please enter email');
   is_error="yes";
 }if(password==""){
   jQuery('#lpass_error').html('please enter password');
   is_error="yes";
 }
 
 if(is_error==""){
   jQuery.ajax({
     url:'login_user.php',
     type:'post',
     data:'email='+email+'&password='+password,
     success:function(result){ 
       result=result.replace(/[\r\n]+/gm,"");
       if(result=='wrong'){
         alert('Incorrect details');
        
       } if(result=='valid'){
          window.location.href=window.location.href;
       }
       
     }			
   });
 }
}

function manage_cart(pid,type,is_checkout){

 if(type=='update'){
  var qty=jQuery("#"+pid+"qty").val();
 }else{
  var qty=jQuery("#qty").val();
 }

    jQuery.ajax({
     url:'manage_cart.php',
     type:'post',
     data:'pid='+pid+'&qty='+qty+'&type='+type,
     success:function(result){ 
       if(type=='update' || type=='remove'){
         window.location.href=window.location.href;
       }      
       result=result.replace(/[\r\n]+/gm,"");
       if(result=='not_available'){
         alert('Quantity not available');
       }
       else{
         jQuery('.cart_badge').html(result);      
      }
      if(is_checkout=='yes'){
           window.location.href='checkout.php';
      }   
     }			
   });
 
}

function sort_product(cat_id,site_path){
  var sort_product_id=jQuery("#sort_product_id").val();
  window.location.href=site_path+"/category.php?id="+cat_id+"&sort="+sort_product_id;
 
}

function wishlist(pid,type){
  jQuery.ajax({
    url:'manage_wishlist.php',
    type:'post',
    data:'pid='+pid+'&type='+type,
    success:function(result){ 
      result=result.replace(/[\r\n]+/gm,"");
      if(result=='not_login')
      {
        window.location.href='login.php';
      }
      else{
        jQuery('.wish_badge').html(result);
      }  
    }			
  });
}

