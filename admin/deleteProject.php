<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/header.php';?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/functions/dbconnect.php'; ?>

            <?php
				$id_project = $_GET['id_project'];
				$query = "DELETE FROM projects WHERE id_projects=$id_project LIMIT 1";
				$result = $mysqli->query($query);
				
				if($result){
					header("LOCATION: indexProject.php");
					exit();
				} else {
					echo "<strong type='color:red'>Error in progress delete category</strong>";
				}
			?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/footer.php';?> 