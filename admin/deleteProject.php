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
		$id_project = $_GET['id_project'];
		if($id_project!=null){ //has id project
			//delete
			$query = "DELETE FROM projects WHERE id_projects=$id_project LIMIT 1";
			$result = $mysqli->query($query);
			if($result){ //success
				header("LOCATION: indexProject.php?page=1");
				exit();
			} else { //fail
				echo "<strong type='color:red'>Error in progress delete category</strong>";
			}
		}
		else {
			echo "ERROR!"; //without id project
		}	
	?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/footer.php';?> 