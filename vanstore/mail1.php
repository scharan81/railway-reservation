<?php
  // Import PHPMailer classes at the top
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  // Load Composer's autoloader
  require 'vendor/autoload.php';

  // Instantiation
  $mail = new PHPMailer(true);

  // Server settings
  $mail->isSMTP();
  $mail->SMTPDebug = 0;
  $mail->Debugoutput = 'html';
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;
  $mail->Username = 'tnithin.18.it@anits.edu.in';
  $mail->Password = 'bvrnxrdvcqzvueyi';

  // Sender & Recipient
  $mail->From = 'tnithin.18.it@anits.edu.in';
  $mail->FromName = 'Nithin';
  $mail->addAddress('thotanithin29@gmail.com');

  // Content
  $mail->isHTML(true);
  $mail->CharSet = 'UTF-8';
  $mail->Encoding = 'base64';
  $mail->Subject = 'Subject';
  $body = 'This is a test message';
  $mail->Body = $body;
  if ($mail->send()) {
    echo 'Success Message';
    exit();
  } else {
    echo 'Error Message';
    exit();
  }
?>