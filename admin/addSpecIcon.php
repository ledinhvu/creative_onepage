htmlentities<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/header.php';?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/functions/dbconnect.php'; ?>
<?php
	if(!isset($_SESSION['id_user'])){
		//chưa đăng nhập
		header("location:login.php");
		exit();
	}
?>
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
<!-- Form elements -->    
<div class="grid_12">
    <div class="module">
        <h2 style="margin-top: 0px; margin-bottom: 15px;"><span>Add Specialization(*)</span></h2>  
            <div class="module-body">
				<?php
					if(isset($_POST['add'])){
						//get information from feilds when submit
						$name = htmlentities($_POST['name']);
						$caption = htmlentities($_POST['caption']);
						//Insert
						$query = "INSERT INTO special_icon(name,caption) VALUES('$name','$caption')";
						$result = $mysqli->query($query);
						if($result) { //success
							header("LOCATION: indexSpecIcon.php?page=1");
							exit();
						} else { //fail
							echo "Error in progress add specialization!";
						}
					}
				?>
            <form action="" method="POST" enctype="multipart/form-data" id="news" >
                <table style="border:none;">
                    <tr>
                    	<td style="border:none;"><label>Type Icon</label></td>
                       	<td style="border:none;"><input type="text" name="name" value="" class="input-medium" /></td>
                    </tr>
                    <tr>
                        <td style="border:none;"><label>Content</label></td>
                        <td style="border:none;"><input type="text" name="caption" value="" class="input-medium" /></td>
                    </tr>
                </table>
                <fieldset>
                    <input class="submit-green" name="add" type="submit" value="Add" /> 
                    <input class="submit-gray" name="reset" type="reset" value="Reset" />
               	</fieldset>
            </form>
        </div> <!-- End .module-body -->
    </div>  <!-- End .module -->
	<div style="clear:both;"></div>
</div> <!-- End .grid_12 -->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/footer.php';?>  