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
        <h2 style="margin-top: 0px; margin-bottom: 15px;"><span>Edit Project</span></h2>    
        <div class="module-body">
		<?php
			if(isset($_GET['id_project'])){
				$id_project = $_GET['id_project'];}
				$str_query = "SELECT * FROM projects INNER JOIN categorys ON projects.id_cate=categorys.id_cate WHERE id_projects=$id_project";
						
				$kqua = $mysqli->query($str_query);
				$arr_TT = mysqli_fetch_assoc($kqua);
				$name_project = $arr_TT['projects_name'];
				$name_category = $arr_TT['name'];
				$hinh_anh = $arr_TT['img'];
				$path = '/baitap/creative_onepage/files/'.$hinh_anh;
				if(isset($_POST['edit'])){
					$project =$mysqli->real_escape_string($_POST['project']);
					$category = $mysqli->real_escape_string($_POST['taskoption']);
					$query2 = "SELECT * FROM categorys WHERE name='$category'";
										
					$result2 = $mysqli->query($query2);
					$row = mysqli_fetch_assoc($result2);
					$id_cate = $row['id_cate'];
					$name = $_FILES['hinhanh']['name'];
					if($name == NULL ){
						//không sửa hình
						$str = "UPDATE projects SET projects_name='$project',id_cate='$id_cate' WHERE id_projects=$id_project";
						$kq1 = $mysqli->query($str);
						if($kq1){
							header("LOCATION:indexProject.php?page=1");
							exit();
						}else{
							echo "Error in progress edit";
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
						if(($type == IMAGETYPE_GIF) || ($type == IMAGETYPE_PNG) || ($type == IMAGETYPE_JPEG)){
							$path = $_SERVER['DOCUMENT_ROOT'];
							$path_upload = $path.'/baitap/creative_onepage/files/'.$ten_hinh;
							$ketqua = move_uploaded_file($tmp_name,$path_upload);
							if($ketqua){
								//thực hiện update
								$str = "UPDATE projects SET projects_name='$project',id_cate='$id_cate',
									img='$ten_hinh' WHERE id_projects = $id_project";
								$kq1 = $mysqli->query($str);
								if($kq1){
									header("LOCATION:indexProject.php?page=1");
									exit();
								}else{
									echo "<strong style = 'color:red'>error in progress edit</strong>";
								}					
							}else{
								echo "<strong style = 'color:red'>error in progress edit image</srong> ";
							}
						}else {
							$ten_hinh = '';
							$str1 = "UPDATE projects SET projects_name='$project',id_cate='$id_cate',
									img='$ten_hinh' WHERE id_projects = $id_project";
							$kq2 = $mysqli->query($str1);
							if($kq2){
								header("LOCATION:indexProject.php?page=1");
								exit();
							}else{
								echo "<strong style = 'color:red'>error in progress edit</strong>";
							}
						}
					}
				}
					if(isset($_POST['del'])){
						//b1:xóa hình ảnh trên thư mục server
						$path = $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/files/'.$hinh_anh;
						$result = unlink("$path");
						if($result){//b2 thực hiện update cột picture trong db
							$sql = "UPDATE projects SET img = '' WHERE id_projects=$id_project";
							$ketqua2 = $mysqli->query($sql);
							if($ketqua2){
								$url = "editProject.php?id_project={$id_project}";
								header("LOCATION:{$url}");
								exit();
							}else {
								echo "<strong style = 'color:red'>Error in progress update image</strong>";
							}
						}else{
							echo "<strong style = 'color:red'>Error in progress delete image </strong>";
						}
					}
		?>

        <form action="" method="POST" enctype="multipart/form-data" id="frm-edit">
            <p>
                <label>Name Project(*)</label>
                <input type="text" name="project" value="<?php echo $name_project;?>" class="input-medium" />
            </p>
            <p>
                <label>Name Category(*)</label>
                <select name="taskoption">
                    <option value=""> </option>
                    <?php
                        $query = "SELECT name FROM categorys";
						//thực hiện truy vấn
						$result1 = $mysqli->query($query);
						while($row = mysqli_fetch_assoc($result1)){
							$name_cate = $row['name'];
                    ?>
                    <option value="<?php echo $name_cate;?>" <?php if($name_cate===$name_category) echo "selected"?>><?php echo $name_cate;?></option>
    				<?php
    					}
    				?>
                </select>
            </p>
			<?php
				if($hinh_anh !=NULL){
			?>
				<p>
                	<label></label>
                        <img src = "<?php echo $path;?>" width = "100px" height = "100px" />
						<input class="submit-green" name="del" type="submit" value="Delete" /> 
                </p>
			<?php } ?>
				<p>
                    <label>Images</label>
                    <input type="file"  name="hinhanh" value="" />
                </p>
                <fieldset>
                    <input class="submit-green" name="edit" type="submit" value="Submit" /> 
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
			$("#frm-edit").validate({
				rules: {
					project: {
						required: true,
					},
					category: {
						required: true,
					},
					
				},
				messages: {
					project: {
						required: "<strong style = 'color:red'>require input!</strong>",
					},
					category: {
						required: "<strong style = 'color:red'>require input!</strong>",
					},
					
				}
			});
		});
</script>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/footer.php';?> 