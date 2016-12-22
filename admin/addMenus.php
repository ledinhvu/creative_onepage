<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/header.php';?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/functions/dbconnect.php'; ?>
<?php
	if(!isset($_SESSION['id_user'])){
		//chưa đăng nhập
		header("location:login.php");
		exit();
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
						required: "<p type = 'color:red'>Bạn chưa nhập danh mục</p>",
					},
				}
			});
		});
</script>
            <!-- Form elements -->    
            <div class="grid_12">
            
                <div class="module">
                     <h2 style="margin-top: 0px; margin-bottom: 15px;"><span>Add menu(*)</span></h2>
                        
                     <div class="module-body">
					 <?php
						if(isset($_POST['them'])){
							$tendanhmuctin = htmlentities($_POST['tendanhmuctin']);
							//$tendanhmuctin = $mysqli->real_escape_string($_POST['tendanhmuctin']);
							$query = "INSERT INTO menus(menu_name) VALUES('$tendanhmuctin') ";
							//thực hiện truy vấn
							$result = $mysqli->query($query);
							if($result) {
								header("LOCATION: indexMenus.php?page=1");
								exit();
							} else {
								echo "có lỗi xảy tra trong quá trình thêm danh mục tin";
							}
						}
					 ?>
                        <form action="" method="POST" enctype="multipart/form-data" id="news" >
                            <p>
                                <label>Menu name</label>
                                <input type="text" name="tendanhmuctin" value="" class="input-medium" />
                            </p>
                            <fieldset>
                                <input class="submit-green" name="them" type="submit" value="Add" /> 
                                <input class="submit-gray" name="reset" type="reset" value="Reset" />
                            </fieldset>
                        </form>
                     </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
        		<div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/footer.php';?>  