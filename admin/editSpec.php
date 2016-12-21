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
                <h2 style="margin-top: 0px; margin-bottom: 15px;"><span>Edit Specialization</span></h2>                       
                <div class="module-body">
					 <?php
					 	// get id specialization need edit
						$id_spec= $_GET['id_spec'];
						if($id_spec!=null){ // check has id specialization
							//get information in table specialization
							$query1 = "SELECT * FROM specialization WHERE id_special=$id_spec";
							$result1 = $mysqli->query($query1);
							$arr_Cat = mysqli_fetch_assoc($result1);
							//get
							$title = $arr_Cat['title'];
							$content = $arr_Cat['content'];
							$value = $arr_Cat['value'];
							//get icon's name checked and store in array
							$query2 = "SELECT * FROM special_icon INNER JOIN spec_rela_n ON special_icon.id_spe_icon=spec_rela_n.id_spec_icon WHERE id_special=$id_spec";
							$result2 = $mysqli->query($query2);
							$i=0;
							while($row2 = mysqli_fetch_assoc($result2)){
								$checked[$i] = $row2['name']; //store
								$i++;
							}
							if(isset($_POST['edit'])){
								//get information from feild when has one event submit
								$title = mysql_real_escape_string($_POST['title']);
								$content = mysql_real_escape_string($_POST['content']);
								$value = mysql_real_escape_string($_POST['value']);
								//update information in table specialization
								$str = "UPDATE specialization SET title='$title',content='$content',value='$value' WHERE
								id_special =$id_spec LIMIT 1";
								$result2 = $mysqli->query($str);
								if(!empty($_POST['check_list'])){
								// Loop to store and display values of individual checked checkbox.
								$query5 = "DELETE FROM spec_rela_n WHERE id_special=$id_spec";
                            	$result5 = $mysqli->query($query5);
								$icon = $_POST['check_list'];
								foreach($icon as $selected){
									//get id's icon throught name
								 	$querySD  = "SELECT * FROM special_icon WHERE name='$selected' ";
                                    $resultSD  = $mysqli->query ( $querySD );
                                    $arSD   = mysqli_fetch_assoc( $resultSD );
                                    $id_spec_icon  = $arSD ['id_spe_icon']; //get
                                    //Add item
									$query7 = "INSERT INTO spec_rela_n(id_special,id_spec_icon) VALUES ('$id_spec','$id_spec_icon')";
									$result7 = $mysqli->query($query7); // query
								}
							}
								if($result2&&$result7) {
									header("LOCATION: indexSpec.php?page=1");
									exit();
								}else {
									echo "<p style='color:red;'>Error in progress edit specialization</p>";
								}
							}
						}
						else {
							echo "<p style='color:red;'>ERROR!</p>";
						}		
					 ?>
                 	<form action="" method="POST" enctype="multipart/form-data" id="news">
                        <table style="border:none;">
                        	<tr>
                        		<td style="border:none;"><label>Title</label></td>
                        		<td style="border:none;"><input type="text" name="title" value="<?php echo $title;?>" class="input-medium" /></td>
                        	</tr>
                        	<tr>
                        		<td style="border:none;"><label>Content</label></td>
                        		<td style="border:none;"><textarea name="content" style="width: 390px;height: 200px;"><?php echo $content;?></textarea></td>
                        	</tr>
                        	<tr>
                        		<td style="border:none;"><label>Value</label></td>
                        		<td style="border:none;"><input type="text" name="value" value="<?php echo $value;?>" class="input-medium" /></td>
                        	</tr>
                        	<tr>
                        		<td style="border:none;"><label>Select Icons</label></td>
                        		<td>
                        		<?php 
                        			$query1 = "SELECT * FROM special_icon";
                        			$result1 = $mysqli->query($query1);
                					while($row = mysqli_fetch_assoc($result1)){
                					$name = $row['name']; // get icon's name
                        		?> 
                        		<input type="checkbox" name="check_list[]" 
                        		<?php
                        		// check icons that checked and stored in database
                        		foreach($checked as $item){
                        				if($name===$item) echo 'checked';// if stored, print checked
                        		} ?> 
                        		value="<?php echo $name; ?>" id="<?php echo $name;?>"><label for="<?php echo $name;?>" style="margin-right: 15px;"><?php echo $name; ?></label>
                        		<?php } ?>
                        		</td>
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
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/footer.php';?> 