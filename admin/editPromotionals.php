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
                     <h2><span>Edit Promotionals</span></h2>
                        
                     <div class="module-body">
					 <?php
						$id_pro = 0;
						if(isset($_GET['id_pro'])){
						$id_pro = $_GET['id_pro'];}
						
						$str_query = "SELECT * FROM promotionals WHERE id_pro = $id_pro";
						
						$kqua = $mysqli->query($str_query);
						$arr_TT = mysqli_fetch_assoc($kqua);
						$title = htmlspecialchars($arr_TT['title']);
						$detail = $arr_TT['detail'];
						$hinh_anh = $arr_TT['img'];
                        $author = $arr_TT['author'];
                        $job = $arr_TT['job'];
                        $about_author = $arr_TT['about_author'];
						$path = '/baitap/creative_onepage/files/'.$hinh_anh;
						if(isset($_POST['sua'])){
							$title1 =$mysqli->real_escape_string($_POST['title1']);
							$detail1 = $mysqli->real_escape_string($_POST['detail1']);
                            $author1 = $mysqli->real_escape_string($_POST['author1']);
                            $job1 = $mysqli->real_escape_string($_POST['job1']);
                            $about_author1 = $mysqli->real_escape_string($_POST['about_author1']);
							$name = $_FILES['hinhanh']['name'];
							if($name == NULL ){
								//không sửa hình
								$str = "UPDATE promotionals SET title ='$title1',detail='$detail1',job='$job1',
                                author='$author1',about_author='$about_author1'
								 WHERE id_pro=$id_pro";
								$kq1 = $mysqli->query($str);
								if($kq1){
									header("LOCATION:indexPromotionals.php");
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
								$path = $_SERVER['DOCUMENT_ROOT'];
								$path_upload = $path.'/baitap/creative_onepage/files/'.$ten_hinh;
								$ketqua = move_uploaded_file($tmp_name,$path_upload);
								if($ketqua){
									//thực hiện update
									$str = "UPDATE promotionals SET title ='$title1',detail='$detail1',job='$job1',
                                    author='$author1',about_author='$about_author1',
									img='$ten_hinh' WHERE id_pro = $id_pro";
									$kq1 = $mysqli->query($str);
									if($kq1){
										header("LOCATION:indexPromotionals.php");
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
								$sql = "UPDATE promotionals SET img = '' WHERE id_pro=$id_pro";
								$ketqua2 = $mysqli->query($sql);
								if($ketqua2){
								$url = "editPromotionals.php?id_pro={$id_pro}";
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
					detai1: {
						required: true,
					},
                    author1: {
						required: true,
					},
					job1: {
						required: true,
					},
					
				},
				messages: {
					title1: {
						required: "<strong style = 'color:red'>Chưa nhập title!</strong>",
					},
					detail1: {
						required: "<strong style = 'color:red'>Chưa nhập detail!</strong>",
					},
                    author1: {
						required: "<strong style = 'color:red'>Chưa nhập author!</strong>",
					},
					job1: {
						required:"<strong style = 'color:red'>Chưa nhập job!</strong>",
					},
					
				}
			});
		});
</script>
                        <form action="" method="POST" enctype="multipart/form-data" id="frm-edit">
                            <p>
                                <label>Title(*)</label>
                                <input type="text" name="title1" value="<?php echo $title;?>" class="input-medium" />
                            </p>
                            <p>
                                <label>Detail(*)</label>
                                <input type="text" name="detail1" value="<?php echo $detail;?>" class="input-medium" />
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
                            <p>
                                <label>Author(*)</label>
                                <input type="text" name="author1" value="<?php echo $author;?>" class="input-medium" />
                            </p>
                            <p>
                                <label>Job(*)</label>
                                <input type="text" name="job1" value="<?php echo $job;?>" class="input-medium" />
                            </p>
                            <p>
                                <label>About Author(*)</label>
                                <input type="text" name="about_author1" value="<?php echo $about_author;?>" class="input-medium" />
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