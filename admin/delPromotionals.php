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
				$id_pro = $_GET['id_pro'];
				$query = "DELETE FROM promotionals WHERE id_pro = $id_pro LIMIT 1";
				$result = $mysqli->query($query);
				
				if($result){
					header("LOCATION: indexPromotionals.php");
					exit();
				} else {
					echo "<strong style = 'color:red'>Có lỗi trong quá trình xóa</strong>";
				}
				
			?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/footer.php';?> 