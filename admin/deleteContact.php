<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/header.php';?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/functions/dbconnect.php'; ?>

    <?php
		$id_contact = $_GET['id_contact'];
		if($id_contact!=null){
			//delete
			$query2 = "DELETE FROM contact WHERE id=$id_contact LIMIT 1";
			$result2 = $mysqli->query($query2);					
			if($result2){ //success
				header("LOCATION: indexContact.php?page=1");
				exit();
			} else { //fail
				echo "<strong type='color:red'>Error in progress delete contact</strong>";
			}
		}
		else {
			echo "ERROR!"; //without id contact
		}				
	?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/footer.php';?> 