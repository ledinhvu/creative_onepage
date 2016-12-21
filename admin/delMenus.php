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
				$id_menu = $_GET['id_menus'];
				$query = "DELETE FROM menus WHERE id_menus = $id_menu LIMIT 1";
				$result = $mysqli->query($query);
				
				if($result){
					header("LOCATION: indexMenus.php");
					exit();
				} else {
					echo "<strong type='color:red'>Có lỗi trong quá trình xóa</strong>";
				}
			?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/footer.php';?> 