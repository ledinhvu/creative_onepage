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
                     <h2 style="margin-top: 0px; margin-bottom: 15px;"><span>Edit Counters</span></h2>
                        
                     <div class="module-body">
					 <?php
						$id_count = 0;
						if(isset($_GET['id_count'])){
						$id_count = $_GET['id_count'];}
						
						$str_query = "SELECT * FROM counters WHERE id_count=$id_count";
						
						$kqua = $mysqli->query($str_query);
						$arr_TT = mysqli_fetch_assoc($kqua);
						$countname = htmlspecialchars($arr_TT['count_name']);
						$value = $arr_TT['value'];
						$hinh_anh = $arr_TT['img'];
						$path = '/baitap/creative_onepage/files/'.$hinh_anh;
						if(isset($_POST['sua'])){
							$countname1 =$mysqli->real_escape_string($_POST['title1']);
							$value1 = $mysqli->real_escape_string($_POST['content1']);
							$name = $_FILES['hinhanh']['name'];
							if($name == NULL ){
								//không sửa hình
								$str = "UPDATE counters SET count_name ='$countname1',value='$value1'
								 WHERE id_count=$id_count";
								$kq1 = $mysqli->query($str);
								if($kq1){
									header("LOCATION:indexCounters.php");
									exit();
								}else{
									echo "Có lỗi khi sửa";
								}
							}else{//có sửa hình ảnh

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
								if(($type == IMAGETYPE_GIF) OR ($type == IMAGETYPE_PNG) OR ($type == IMAGETYPE_JPEG)){
									$path = $_SERVER['DOCUMENT_ROOT'];
									$path_upload = $path.'/baitap/creative_onepage/files/'.$ten_hinh;
									$ketqua = move_uploaded_file($tmp_name,$path_upload);
								}else {
									$ten_hinh = '';
									$str1 = "UPDATE counters SET count_name ='$countname1',value='$value1',
									img='$ten_hinh' WHERE id_count = $id_count";
									$kq2 = $mysqli->query($str1);
									if($kq2){
										header("LOCATION:indexCounters.php");
										exit();
									}else{
										echo "<strong style = 'color:red'>có lỗi khi sửa</strong>";
									}
								}
								
								if($ketqua){
									//thực hiện update
									$str = "UPDATE counters SET count_name ='$countname1',value='$value1',
									img='$ten_hinh' WHERE id_count = $id_count";
									$kq1 = $mysqli->query($str);
									if($kq1){
										header("LOCATION:indexCounters.php");
										exit();
									}else{
										echo "<strong style = 'color:red'>có lỗi khi sửa</strong>";
									}
									
								}else{
									echo "<strong style = 'color:red'>có lỗi khi thêm hình ảnh</srong> ";
								}
							}
						}
						if(isset($_POST['xoahinh'])){
							//b1:xóa hình ảnh trên thư mục server
							$path = $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/files/'.$hinh_anh;
						    $result = unlink("$path");
							if($result){//b2 thực hiện update cột picture trong db
								$sql = "UPDATE counters SET img = '' WHERE id_count=$id_count";
								$ketqua2 = $mysqli->query($sql);
								if($ketqua2){
								$url = "editCounters.php?id_count={$id_count}";
									header("LOCATION:{$url}");
									exit();
								}else {
									echo "<strong style = 'color:red'>có lỗi update hình</strong>";
								}
							}else{
								echo "<strong style = 'color:red'>có lỗi khi xóa hình</strong>";
							}
						}
					 ?>
<script type="text/javascript">
			$(document).ready(function(){
			$("#frm-edit").validate({
				rules: {
					title1: {
						required: true,
					},
					content1: {
						required: true,
					},
					
				},
				messages: {
					title1: {
						required: "<strong style = 'color:red'>Chưa nhập title!</strong>",
					},
					content1: {
						required: "<strong style = 'color:red'>Chưa nhập content!</strong>",
					},
					
				}
			});
		});
</script>
                        <form action="" method="POST" enctype="multipart/form-data" id="frm-edit">
                            <p>
                                <label>Counters Name(*)</label>
                                <input type="text" name="title1" value="<?php echo $countname;?>" class="input-medium" />
                            </p>
                            <p>
                                <label>Value(*)</label>
                                <input type="number" name="content1" value="<?php echo $value;?>" class="input-medium" />
                            </p>
							<?php
								if($hinh_anh !=NULL){
							?>
							<p>
                                <label>Hình ảnh cũ</label>
                                <img src = "<?php echo $path;?>" width = "100px" height = "100px" />
								<input class="submit-green" name="xoahinh" type="submit" value="Delete" /> 
                            </p>
								<?php } ?>
							<p>
                                <label>Images</label>
                                <input type="file"  name="hinhanh" value="" />
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