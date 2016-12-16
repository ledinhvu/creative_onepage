<?php
			$mysqli = new mysqli('localhost','root','','creative_db');
			$mysqli->set_charset("utf8");
			if(mysqli_connect_errno()){
				echo "không thể kết nối đến db:".mysqli_connect_error()."<br />";
				exit();
			}
?>