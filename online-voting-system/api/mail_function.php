<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
  
require 'vendor/autoload.php';
   function sendOTP($email,$otp){
    /*
    require('phpmailer/class.phpmailer.php');
    require('phpmailer/class.smtp.php');

    $message_body = "One Time password for PHP login authentication is:<br><br>".$otp;
    $mail = new PHPMailer();
    $mail->AddReplyTo('sindhukasulanati@gmail.com','Sindhu');
    $mail->SetFrom('sindhukasulanati@gmail.com','Sindhu');
    $mail->AddAddress($email);
    $mail->Subject="OTP to login";
    $email->MsgHTML($message_body);
    $result=$mail->Send();
    if(!$result){
        echo "Mailer error:".$mail->ErrorInfo;
    }else{
        return $result;
    }         
    
    
    $to = $email;
    $sub = "Generic Mail";
    $msg = "Your otp is"+$otp;
    $headers = 'From: sricharankasulanati3@gmail.com' . "\r\n" .'CC: sricharankasulanati3@gmail.com';
    if(mail($to,$sub,$msg,$headers))
      echo "Your Mail is sent successfully.";
    else
      echo "Your Mail is not sent. Try Again.";
      */


  
$mail = new PHPMailer(true);
  
try {
    $mail->SMTPDebug = 2;                                       
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gfg.com;';                    
    $mail->SMTPAuth   = true;                             
    $mail->Username   = 'user@gfg.com';                 
    $mail->Password   = 'password';                        
    $mail->SMTPSecure = 'tls';                              
    $mail->Port       = 587;  
  
    $mail->setFrom('from@gfg.com', 'Name');           
    $mail->addAddress('receiver1@gfg.com');
    $mail->addAddress('receiver2@gfg.com', 'Name');
       
    $mail->isHTML(true);                                  
    $mail->Subject = 'Subject';
    $mail->Body    = 'HTML message body in <b>bold</b> ';
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $mail->send();
    echo "Mail has been sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
   }