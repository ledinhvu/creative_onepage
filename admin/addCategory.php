<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/header.php';?>
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
				category: {
					required: true,
				},	
			},
			messages: {
				category: {
					required: "<p style='color:red'>Require input</p>",
				},
			}
		});
	});
</script>
<!-- Form elements -->    
<div class="grid_12">    
    <div class="module">
        <h2 style="margin-top: 0px; margin-bottom: 15px;"><span>Add Category(*)</span></h2>   
            <div class="module-body">
			<?php
				if(isset($_POST['add'])){
					//get information from feild input when submit
					$category = htmlentities($_POST['category']);
					//insert
					$query = "INSERT INTO categorys(name) VALUES('$category')";
					$result = $mysqli->query($query);
					if($result) { //success
						header("LOCATION: indexCategory.php?page=1");
						exit();
					} else { //fail
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