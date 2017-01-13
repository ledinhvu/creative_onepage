<?php

require_once "vendor/autoload.php";
if(isset($_POST['send'])){
$name =$_POST['name'];
$email =$_POST['email'];
$company =$_POST['company'];
$content =$_POST['content'];
$mail = new PHPMailer;

//Enable SMTP debugging. 
$mail->SMTPDebug = 0;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "noreplythanhle@gmail.com";                 
$mail->Password = "!@#noreply!@#";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 587;                                   
$mail->CharSet = 'UTF-8';
$mail->From = "dinhvu12t3bkdn@gmail.com";
$mail->FromName = $name;

$mail->addAddress("dinhvu12t3bkdn@gmail.com", "le dinh vu");

$mail->isHTML(true);

$mail->Subject = "Subject Text";
$mail->Body = $email."<br />".$company."<br />".$content;
$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message has been sent successfully";
}
}
?>