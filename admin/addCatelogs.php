<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/tuan3/templates/admin/inc/header.php';?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/tuan3/functions/dbconnect.php'; ?>

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
						required: "<p type = 'color:red'>Bạn chưa nhập danh mục</p>",
					},
				}
			});
		});
</script>
            <!-- Form elements -->    
            <div class="grid_12">
            
                <div class="module">
                     <h2><span>Thêm danh mục tin(*)</span></h2>
                        
                     <div class="module-body">
					 <?php
						if(isset($_POST['them'])){
							$tendanhmuctin = mysql_real_escape_string($_POST['tendanhmuctin']);
							//$tendanhmuctin = $mysqli->real_escape_string($_POST['tendanhmuctin']);
							$query = "INSERT INTO catelogs(cate_name) VALUES('$tendanhmuctin') ";
							//thực hiện truy vấn
							$result = $mysqli->query($query);
							if($result) {
								header("LOCATION: indexCatelogs.php");
								exit();
							} else {
								echo "có lỗi xảy tra trong quá trình thêm danh mục tin";
							}
						}
					 ?>
                        <form action="" method="POST" enctype="multipart/form-data" id="news" >
                            <p>
                                <label>Tên danh mục tin</label>
                                <input type="text" name="tendanhmuctin" value="" class="input-medium" />
                            </p>
                            <fieldset>
                                <input class="submit-green" name="them" type="submit" value="Thêm" /> 
                                <input class="submit-gray" name="reset" type="reset" value="Nhập lại" />
                            </fieldset>
                        </form>
                     </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
        		<div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/tuan3/templates/admin/inc/footer.php';?>  