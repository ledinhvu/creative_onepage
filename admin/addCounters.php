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
					countname: {
						required: true,
					},
					
				},
				countname: {
					tendanhmuctin: {
						required: "<p type = 'color:red'>Bạn chưa nhập CounterName</p>",
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
							$count_name = htmlentities($_POST['countname']);
                            $value = htmlentities($_POST['value']);
			
							$name = $_FILES['hinhanh']['name'];
							if($name != null){
							$tach_chuoi = explode(".",$name);
							$count = count($tach_chuoi);
							$duoi_file = $tach_chuoi[$count-1];
							unset($tach_chuoi[$count-1]);
							$ten_file = '';
							foreach($tach_chuoi as $key=>$value){
								if($key==0){
									$ten_file = $value;
								}else{
									$ten_file = $ten_file.'_'.$value;
								}
							}
							$time =time();
							
							$ten_hinh = $ten_file.'_'.$time.'.'.$duoi_file;
							
						
							$tmp_name = $_FILES['hinhanh']['tmp_name'];
							$type=exif_imagetype($tmp_name);
							if(($type == IMAGETYPE_GIF) OR ($type == IMAGETYPE_PNG) OR ($type == IMAGETYPE_JEPG)){
								$path = $_SERVER['DOCUMENT_ROOT'];
								$path_upload = $path.'/baitap/creative_onepage/files/'.$ten_hinh;
								$ketqua = move_uploaded_file($tmp_name,$path_upload);
							}else {
								$ten_hinh = '';
							}
							
							}else {
								$ten_hinh = '';
							}
							
								$str_query = "INSERT INTO counters(count_name,value,img) VALUES('$count_name','$value','$ten_hinh') ";		
								$result = $mysqli->query($str_query);
								if($result){
									header("LOCATION: indexCounters.php");
									exit();
								}else{
									echo "Có lỗi khi thêm";
								}
							}
					 ?>
                     
                        <form action="" method="POST" enctype="multipart/form-data" id="news" >
                            <p>
                                <label>Counter name</label>
                                <input type="text" name="countname" value="" class="input-medium" />
                            </p>
                            <p>
                                <label>Value</label>
                                <input type="number" name="value" value="" class="input-medium" />
                            </p>
                            <p>
                                <label>Images</label>
                                <input type="file"  name="hinhanh" value="" />
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