<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/header.php';?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/functions/dbconnect.php'; ?>
            <!-- Form elements -->    
            <div class="grid_12">
            
                <div class="module">
                     <h2><span>Edit Category</span></h2>
                        
                     <div class="module-body">
					 <?php
						$id_cate= $_GET['id_cate'];
						$query = "SELECT * FROM categorys WHERE id_cate=$id_cate ";
							//thực hiện truy vấn
							$result1 = $mysqli->query($query);
							$arr_Cat = mysqli_fetch_assoc($result1);
							$name_category = $arr_Cat['name'];
							if(isset($_POST['sua'])){
								$category = $_POST['category'];
								$str = "UPDATE categorys SET name = '$category' WHERE
								id_cate =$id_cate LIMIT 1";
								$result2 = $mysqli->query($str);
								if($result2) {
									header("LOCATION: indexCategory.php");
									exit();
								}else {
									echo "<strong>Có lỗi xảy ra trong quá trình sửa </strong>";
								}
							}
							
					 ?>
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
                        <form action="" method="POST" enctype="multipart/form-data" id="news">
                            <p>
                                <label>Name category(*)</label>
                                <input type="text" name="category" value="<?php echo $name_category;?>" class="input-medium" />
                            </p>
                            <fieldset>
                                <input class="submit-green" name="sua" type="submit" value="Edit" /> 
                                <input class="submit-gray" name="reset" type="reset" value="Reset" />
                            </fieldset>
                        </form>
						
                     </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
        		<div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/footer.php';?> 