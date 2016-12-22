<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/header.php';?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/functions/dbconnect.php'; ?>
<?php
	if(!isset($_SESSION['id_user'])){
		//chưa đăng nhập
		header("location:login.php");
		exit();
	}
?>
<!-- Form elements -->    
<div class="grid_12">
    <div class="module">
        <h2 style="margin-top: 0px; margin-bottom: 15px;"><span>Edit Specialization Icon</span></h2>  
        <div class="module-body">
		<?php
			$id_spec_icon= $_GET['id_spec_icon'];
			if($id_spec_icon!=null){
				//get information in table special_icon
				$query = "SELECT * FROM special_icon WHERE id_spe_icon=$id_spec_icon ";
				$result1 = $mysqli->query($query);
				$arr_Cat = mysqli_fetch_assoc($result1);
				$name_spec_icon = $arr_Cat['name'];
				$name_caption=$arr_Cat['caption'];
				if(isset($_POST['edit'])){
					//get information from feilds when submit
					$name = htmlentities($_POST['name']);
					$caption = htmlentities($_POST['caption']);
					//Update
					$str = "UPDATE special_icon SET name = '$name', caption='$caption' WHERE
									id_spe_icon =$id_spec_icon LIMIT 1";
					$result2 = $mysqli->query($str);
					if($result2) { //success
						header("LOCATION: indexSpecIcon.php?page=1");
						exit();
					}else { //fail
						echo "<p style='color:red'>Error in progress edit</p>";
					}
				}
			} else {
				echo "<p style='color:red'>ERROR!</p>"; //without id icon
			}										
		?>

	    <form action="" method="POST" enctype="multipart/form-data" id="news">
	        <table style="border:none;">
	            <tr>
	                <td style="border:none;"><label>Type Icon</label></td>
	                <td style="border:none;"><input type="text" name="name" value="<?php echo $name_spec_icon;?>" class="input-medium" /></td>
	            </tr>
	            <tr>
	                <td style="border:none;"><label>Caption</label></td>
	                 <td style="border:none;"><input type="text" name="caption" value="<?php echo $name_caption;?>" class="input-medium" /></td>
	            </tr>
	        </table>
	        <fieldset>
	            <input class="submit-green" name="edit" type="submit" value="Edit" /> 
	            <input class="submit-gray" name="reset" type="reset" value="Reset" />
	        </fieldset>
	    </form>	
    	</div> <!-- End .module-body -->
    </div>  <!-- End .module -->
    <div style="clear:both;"></div>
</div> <!-- End .grid_12 -->
<!--check validation-->
<script type="text/javascript">
			$(document).ready(function(){
			$("#news").validate({
				rules: {
					name: {
						required: true,
					},
					caption: {
						required: true,
					},
				},
				messages: {
					name: {
						required: "<p style='color:red'>Require input</p>",
					},
					caption: {
						required: "<p style='color:red'>Require input</p>",
					},
				}
			});
		});
</script>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/footer.php';?> 