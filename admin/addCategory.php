<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/header.php';?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/functions/dbconnect.php'; ?>

<script type="text/javascript">
			$(document).ready(function(){
			$("#news").validate({
				rules: {
					category: {
						required: true,
					},
					
				},
				messages: {
					category: {
						required: "<p type = 'color:red'>Require input</p>",
					},
				}
			});
		});
</script>
            <!-- Form elements -->    
            <div class="grid_12">
            
                <div class="module">
                     <h2><span>Add Category(*)</span></h2>
                        
                     <div class="module-body">
					 <?php
						if(isset($_POST['add'])){
							$category = mysql_real_escape_string($_POST['category']);
							//$tendanhmuctin = $mysqli->real_escape_string($_POST['tendanhmuctin']);
							$query = "INSERT INTO categorys(name) VALUES('$category')";
							//thực hiện truy vấn
							$result = $mysqli->query($query);
							if($result) {
								header("LOCATION: indexCategory.php");
								exit();
							} else {
								echo "Error in progress add category!";
							}
						}
					 ?>
                        <form action="" method="POST" enctype="multipart/form-data" id="news" >
                            <p>
                                <label>Name category</label>
                                <input type="text" name="category" value="" class="input-medium" />
                            </p>
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