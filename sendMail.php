<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/functions/dbconnect.php';
require_once "vendor/autoload.php";

if(isset($_POST['send'])) {
	//get infor
	$name = mysql_real_escape_string($_POST['name']);
	$email = mysql_real_escape_string($_POST['email']);
	$company = mysql_real_escape_string($_POST['company']);
	$content = mysql_real_escape_string($_POST['content']);

	//send mail use mothod stmp
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

	//store data to database 
	$query = "INSERT INTO contact(name,email,company,content) VALUES ('$name','$email','$company','$content')";
	$result = $mysqli->query($query);
		if($result && ($mail->send())) {
			echo "<p style='margin-left:36%;color:green;font-size:30px;'>Message has been sent successfully</p>";
			header("LOCATION: index.php");
			exit();
		} else {
			echo "Mailer Error: " . $mail->ErrorInfo;
		}
} else {
	echo "<p style='color:red'>ERROR!</p>";
}
?>