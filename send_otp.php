<?php
require('DATABASE/connection.php');
require('DATABASE/functions.php');

$type=get_safe_value($con,$_POST['type']); 
if($type=='email'){
   $email=get_safe_value($con,$_POST['email']);
   $otp=rand(111111,999999);
   $_SESSION['EMAIL_OTP']=$otp;
   $html="$otp is your OTP ";

     include('smtp/PHPMailerAutoload.php');
     $mail=new PHPMailer(true);
     $mail->isSMTP();
     $mail->Host="smtp.gmail.com";
     $mail->Port=587;
     $mail->SMTPSecure="tls";
     $mail->SMTPAuth=true;
     $mail->Username="peaceofart.official@gmail.com";
     $mail->Password="getitletitroll";
     $mail->SetFrom("peaceofart.official@gmail.com");
     $mail->addAddress($email);
     $mail->IsHTML(true);
     $mail->Subject="New OTP for SIGN UP";
     $mail->Body=$html;
     $mail->SMTPOptions=array('ssl'=>array(
          'verify_peer'=>false,
          'verify_peer_name'=>false,
          'allow_self_signed'=>false
     ));

     if($mail->send()){
          echo "done";
     }else{
          //echo "Error occur";
     }
}




?>