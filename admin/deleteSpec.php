<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/header.php';?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/functions/dbconnect.php'; ?>
    <?php
    	//get id specialization
		$id_spec = $_GET['id_spec']; 
		if($id_spec!=null){
			//Delete
			$query = "DELETE FROM specialization WHERE id_special=$id_spec LIMIT 1";
			$result = $mysqli->query($query);
			if($result){ //success
				header("LOCATION: indexSpec.php?page=1");
				exit();
			} else { //fail
				echo "<strong type='color:red'>Error in progress delete category</strong>";
			}
		}
		else {
			echo "ERROR!"; //without id specialization
		}	
	?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/footer.php';?> 