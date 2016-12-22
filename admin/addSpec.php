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
				title: {
					required: true,
				},
				content: {
					required: true,
				},
				value: {
					required: true,
					number: true,
					max: 100,
					min: 0,
				},
				check_list:{
					required: true,
				},
			},
			messages: {
				title: {
					required: "<p style='color:red'>Require input</p>",
				},
				content: {
					required: "<p style='color:red'>Require input</p>",
				},
				value: {
					required: "<p style='color:red'>Require input</p>",
					number: "<p style='color:red'>Require just input number</p>",
					max: "<p style='color:red'>Max value 100</p>",
					min: "<p style='color:red'>Min value 0</p>",
				},
				check_list:{
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
						//get information from feild input when submit
						$title = htmlentities($_POST['title']);
						$content = htmlentities($_POST['content']);
						$value = htmlentities($_POST['value']);
						//insert 3 informations to table specialization
						$query = "INSERT INTO specialization(title,content,value) VALUES('$title','$content','$value')";
						$result = $mysqli->query($query); 
						//find id specialization new add through title
						$query3 = "SELECT * FROM specialization WHERE title='$title'";
						$result3 = $mysqli->query($query3);
                		$row1 = mysqli_fetch_assoc($result3);
                		$id_special = $row1['id_special'];
						if(!empty($_POST['check_list'])){
							// Loop to store and display values of individual checked checkbox.
							$icon = $_POST['check_list'];
							foreach($icon as $selected){
								//get id though name
								$querySD  = "SELECT * FROM special_icon WHERE name='$selected' ";
                                $resultSD  = $mysqli->query ( $querySD );
                                $arSD   = mysqli_fetch_assoc( $resultSD );
                                $id_spec_icon  = $arSD ['id_spe_icon'];
                                //insert information
								$query2 = "INSERT INTO spec_rela_n(id_special,id_spec_icon) VALUES ('$id_special','$id_spec_icon')";
								$result2 = $mysqli->query($query2);
							}
						}
						if($result&&$result2) { //success
							header("LOCATION: indexSpec.php?page=1");
							exit();
						} else { //fail
							echo "Error in progress add specialization!";
						}
					}
				?>
                <form action="" method="POST" enctype="multipart/form-data" id="news" >
                    <table style="border:none;">
                        <tr>
                        	<td style="border:none;"><label>Title</label></td>
                        	<td style="border:none;"><input type="text" name="title" value="" class="input-medium" /></td>
                        </tr>
                        <tr>
                        	<td style="border:none;"><label>Content</label></td>
                        	<td style="border:none;"><textarea name="content" style="width: 390px;height: 200px;"></textarea></td>
                        </tr>
                        <tr>
                        	<td style="border:none;"><label>Value</label></td>
                        	<td style="border:none;"><input type="text" name="value" value="" class="input-medium" /></td>
                        </tr>
                        <tr>
                        	<td style="border:none;"><label>Select Icons</label></td>
                        	<td>
                        		<?php
                        			//get name icons and display though checkboxs to select
                        			$query1 = "SELECT * FROM special_icon";
                        			$result1 = $mysqli->query($query1);
                					while($row = mysqli_fetch_assoc($result1)){
                					$name = $row['name'];
                        		?> 
                        			<input type="checkbox" name="check_list[]" value="<?php echo $name; ?>" id="<?php echo $name;?>"><label for="<?php echo $name;?>" style="margin-right: 15px;"><?php echo $name; ?></label>
                        		<?php } ?>
                        	</td>
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