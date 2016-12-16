<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/tuan3/templates/admin/inc/header.php';?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/tuan3/functions/dbconnect.php'; ?>
            <!-- Form elements -->    
            <div class="grid_12">
            
                <div class="module">
                     <h2><span>Sửa danh mục tin</span></h2>
                        
                     <div class="module-body">
					 <?php
						$id_cate= $_GET['id_cate'];
						$query = "SELECT * FROM catelogs WHERE id_cate=$id_cate ";
							//thực hiện truy vấn
							$result = $mysqli->query($query);
							$arr_Cat = mysqli_fetch_assoc($result);
							$ten_dmt = $arr_Cat['cate_name'];
							if(isset($_POST['sua'])){
								$tendanhmuctin = $_POST['tendanhmuctin'];
								$str = "UPDATE catelogs SET cate_name = '$tendanhmuctin' WHERE
								id_cate =$id_cate LIMIT 1";
								$ketqua = $mysqli->query($str);
								if($ketqua) {
									header("LOCATION: indexCatelogs.php");
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
					tendanhmuctin: {
						required: true,
					},
					
				},
				messages: {
					tendanhmuctin: {
						required: "<p style = 'color:red'>Bạn chưa nhập danh mục</p>",
					},
				}
			});
		});
</script>
                        <form action="" method="POST" enctype="multipart/form-data" id="news">
                            <p>
                                <label>Tên danh mục tin(*)</label>
                                <input type="text" name="tendanhmuctin" value="<?php echo $ten_dmt;?>" class="input-medium" />
                            </p>
                            <fieldset>
                                <input class="submit-green" name="sua" type="submit" value="Sửa" /> 
                                <input class="submit-gray" name="reset" type="reset" value="Nhập lại" />
                            </fieldset>
                        </form>
						
                     </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
        		<div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/tuan3/templates/admin/inc/footer.php';?> 