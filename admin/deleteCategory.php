<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/header.php';?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/functions/dbconnect.php'; ?>

            <?php
				$id_cate = $_GET['id_cate'];
				$query = "DELETE FROM categorys WHERE id_cate=$id_cate LIMIT 1";
				$result = $mysqli->query($query);
				
				if($result){
					header("LOCATION: indexCategory.php");
					exit();
				} else {
					echo "<strong type='color:red'>Có lỗi trong quá trình xóa</strong>";
				}
			?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/footer.php';?> 