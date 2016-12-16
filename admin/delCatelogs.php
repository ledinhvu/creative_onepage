<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/tuan3/templates/admin/inc/header.php';?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/tuan3/functions/dbconnect.php'; ?>

            <?php
				$id_cat = $_GET['id_cate'];
				$query = "DELETE FROM catelogs WHERE id_cate=$id_cat LIMIT 1";
				$result = $mysqli->query($query);
				
				if($result){
					header("LOCATION: indexCatelogs.php");
					exit();
				} else {
					echo "<strong type='color:red'>Có lỗi trong quá trình xóa</strong>";
				}
			?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/tuan3/templates/admin/inc/footer.php';?> 