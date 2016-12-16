<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/header.php';?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/functions/dbconnect.php'; ?>
<?php
	if(!isset($_SESSION['id_user'])){
		//chưa đăng nhập
		header("location:login.php");
		exit();
	}
?> 

<script type = "text/javascript" src = "ckeditor/ckeditor.js"></script>
            <!-- Form elements -->    
            <div class="grid_12">
            
                <div class="module">
                     <h2><span>Add Sliders</span></h2>
                        
                     <div class="module-body">
					 <?php
						if(isset($_POST['them'])){
							$title = $mysqli->real_escape_string($_POST['title']);
							$content = $mysqli->real_escape_string($_POST['title']);
			
							
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
							$path = $_SERVER['DOCUMENT_ROOT'];
							$path_upload = $path.'/baitap/creative_onepage/files/'.$ten_hinh;
							$ketqua = move_uploaded_file($tmp_name,$path_upload);
							}else {
								$ten_hinh = '';
							}
							
								$str_query = "INSERT INTO sliders (title,content,img)
											VALUES('$title','$content','$ten_hinh')";
								
										
								$result = $mysqli->query($str_query);
								if($result){
									header("LOCATION: indexSliders.php");
									exit();
								}else{
									echo "Có lỗi khi thêm";
								}
							}

					 ?>
					 
                        <form action="" method="POST" enctype="multipart/form-data" id="frm-news">
                            <p>
                                <label>Title(*)</label>
                                <input type="text" name="title" value="" class="input-medium" />
                            </p>
                            <p>
                                <label>Content(*)</label>
                              <input type="text" name="content" value="" class="input-medium" />
                            </p>
							<p>
                                <label>Images</label>
                                <input type="file"  name="hinhanh" value="" />
                            </p>
                           
                            <fieldset>
                                <input class="submit-green" name="them" type="submit" value="Submit" /> 
                                <input class="submit-gray" name="reset" type="reset" value="Reset" />
                            </fieldset>
                        </form>
                     </div> <!-- End .module-body -->
					 <script type="text/javascript">
			$(document).ready(function(){
			$("#frm-news").validate({
				rules: {
					title: {
						required: true,
					},
					content: {
						required: true,
					},
					
					
				},
				messages: {
					title: {
						required: "<strong><span style = 'color:red'>Chưa nhập title!</span></strong>",
					},
					content: {
						required: "<strong><span style = 'color:red'>Chưa nhập content!</span></strong>",
					},
					
				}
			});
		});
</script>

                </div>  <!-- End .module -->
        		<div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/footer.php';?> 