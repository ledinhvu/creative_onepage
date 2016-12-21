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
		$id_cate = $_GET['id_cate'];
		if($id_cate!=null){
			//select id category in table projects
			$query1 = "SELECT * FROM Projects WHERE id_cate=$id_cate LIMIT 1";
			$result1 = $mysqli->query($query1);
			$row = mysqli_fetch_assoc($result1);
			$id = $row['id_cate'];
			if($id==null){ //category without using
				//delete
				$query2 = "DELETE FROM categorys WHERE id_cate=$id_cate LIMIT 1";
				$result2 = $mysqli->query($query2);					
				if($result2){ //success
					header("LOCATION: indexCategory.php?page=1");
					exit();
				} else { //fail
					echo "<strong type='color:red'>Error in progress delete category</strong>";
				}
			}
			else { // category using
				echo "<p style='color:red;'>This Category is using!</p>";
			}
		}
		else {
			echo "ERROR!"; //without id category
		}				
	?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/footer.php';?> 