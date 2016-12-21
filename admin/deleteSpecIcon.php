<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/header.php';?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/functions/dbconnect.php'; ?>

    <?php
		$id_spec_icon = $_GET['id_spec_icon'];
		if($id_spec_icon!=null){
			//get id icon using
			$query1 = "SELECT * FROM spec_rela_n WHERE id_spec_icon=$id_spec_icon LIMIT 1";
			$result1 = $mysqli->query($query1);
			$row = mysqli_fetch_assoc($result1);
			$id = $row['id_spec_icon'];
			if($id==null){ //icon without using
				//delete
				$query2 = "DELETE FROM special_icon WHERE id_spe_icon=$id_spec_icon LIMIT 1";
				$result2 = $mysqli->query($query2);
				if($result2){ //success
					header("LOCATION: indexSpecIcon.php?page=1");
					exit();
				} else { //fail
					echo "<strong type='color:red'>Error in progress delete category</strong>";
				}
			}
			else { //icon using
				echo "<p style='color:red;'>This Category is using!</p>";
			}
		}
		else {
			echo "ERROR!"; //without id icon
		}	
	?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/footer.php';?> 