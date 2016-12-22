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
        <h2 style="margin-top: 0px; margin-bottom: 15px;"><span>Edit Category</span></h2>    
        <div class="module-body">
		<?php
			$id_cate= $_GET['id_cate'];
			if($id_cate!=null){ // has id category
				$query = "SELECT * FROM categorys WHERE id_cate=$id_cate ";
				//thực hiện truy vấn
				$result1 = $mysqli->query($query);
				$arr_Cat = mysqli_fetch_assoc($result1);
				$name_category = $arr_Cat['name'];
				if(isset($_POST['edit'])){
					//get category from feild input when submit
					$category = htmlentities($_POST['category']);
					//Update
					$str = "UPDATE categorys SET name = '$category' WHERE
					id_cate =$id_cate LIMIT 1";
					$result2 = $mysqli->query($str);
					if($result2) { //success
						header("LOCATION: indexCategory.php?page=1");
						exit();
					}else { //fail
						echo "<p style='color:red'>Error in progress edit category</p>";
					}
				}
			} else  {
				echo "<p style='color:red'>ERROR!</p>"; //without id category
			}
			
		?>
        <form action="" method="POST" enctype="multipart/form-data" id="news">
            <p>
                <label>Name category(*)</label>
                <input type="text" name="category" value="<?php echo $name_category;?>" class="input-medium" />
            </p>
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
					category: {
						required: true,
					},					
				},
				messages: {
					category: {
						required: "<p style = 'color:red'>Require input</p>",
					},
				}
			});
		});
</script>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/footer.php';?> 