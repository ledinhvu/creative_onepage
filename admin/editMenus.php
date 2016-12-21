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
                     <h2 style="margin-top: 0px; margin-bottom: 15px;"><span>Edit Name</span></h2>
                        
                     <div class="module-body">
					 <?php
						$id_menu= $_GET['id_menus'];
						$query = "SELECT * FROM menus WHERE id_menus=$id_menu ";
							//thực hiện truy vấn
							$result = $mysqli->query($query);
							$arr_Cat = mysqli_fetch_assoc($result);
							$ten_dmt = $arr_Cat['menu_name'];
							if(isset($_POST['sua'])){
								$tendanhmuctin = $_POST['tendanhmuctin'];
								$str = "UPDATE menus SET menu_name = '$tendanhmuctin' WHERE
								id_menus =$id_menu LIMIT 1";
								$ketqua = $mysqli->query($str);
								if($ketqua) {
									header("LOCATION: indexMenus.php");
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
                                <label>Menu name(*)</label>
                                <input type="text" name="tendanhmuctin" value="<?php echo $ten_dmt;?>" class="input-medium" />
                            </p>
                            <fieldset>
                                <input class="submit-green" name="sua" type="submit" value="Submit" /> 
                                <input class="submit-gray" name="reset" type="reset" value="Reset" />
                            </fieldset>
                        </form>
						
                     </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
        		<div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/footer.php';?> 