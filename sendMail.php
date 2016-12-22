<?php

require_once "vendor/autoload.php";
//get infor
$name = mysql_real_escape_string($_POST['name']);
$email = mysql_real_escape_string($_POST['email']);
$company = mysql_real_escape_string($_POST['company']);
$content = mysql_real_escape_string($_POST['content']);

require_once "vendor/autoload.php";

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

$mail->From = "$email";
$mail->FromName = "$name";

$mail->addAddress("vddongbk@gmail.com", "Recepient Name");

$mail->isHTML(true);

$mail->Subject = "Contact";
$mail->Body = "<b>Email:</b> <i>$email</i><br>
			   <b>Company:</b> <i>$company</i><br>
			   <b>Content:</b> <i>$content</i>";
$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "<p style='margin-left:36%;color:green;font-size:30px;'>Message has been sent successfully</p>";
}