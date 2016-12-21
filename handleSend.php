<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/functions/dbconnect.php'; ?>
<?php 
	if(isset($_POST['send'])){
		$name = mysql_real_escape_string($_POST['name']);
		$email = mysql_real_escape_string($_POST['email']);
		$company = mysql_real_escape_string($_POST['company']);
		$content = mysql_real_escape_string($_POST['content']);
		$query = "INSERT INTO contact(name,email,company,content) VALUES ('$name','$email','$company','$content')";
		$result = $mysqli->query($query);
		if($result) {
			header("LOCATION: index.php");
			exit();
		} else {
			echo "<p style='color:red'>Add contact error</p>";
		}
	} else {
		echo "<p style='color:red'>ERROR!</p>";
	}
?>