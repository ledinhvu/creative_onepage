<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/header.php';?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/functions/dbconnect.php'; ?>
<?php
	if(!isset($_SESSION['id_user'])){
		//chưa đăng nhập
		header("location:login.php");
		exit();
	}
?> 

            <?php
				$id_user = $_GET['id_user'];
				$query = "DELETE FROM user WHERE id_user = $id_user LIMIT 1";
				$result = $mysqli->query($query);
				
				if($result){
					header("LOCATION: indexUser.php");
					exit();
				} else {
					echo "<strong style = 'color:red'>Có lỗi trong quá trình xóa</strong>";
				}
				
			?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/footer.php';?> 