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
				$id_count = $_GET['id_count'];
				$query = "DELETE FROM counters WHERE id_count = $id_count LIMIT 1";
				$result = $mysqli->query($query);
				
				if($result){
					header("LOCATION: indexCounters.php");
					exit();
				} else {
					echo "<strong type='color:red'>Có lỗi trong quá trình xóa</strong>";
				}
			?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/footer.php';?> 