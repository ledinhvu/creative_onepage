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
        <h2 style="margin-top: 0px; margin-bottom: 15px;"><span>Add Projects</span></h2>   
        <div class="module-body">
		<?php
			if(isset($_POST['add'])){
				//get information from feilds when submit
				$name_project = $mysqli->real_escape_string($_POST['project']);
				$name_category = $mysqli->real_escape_string($_POST['taskoption']);
				//get id category through name
				$query2 = "SELECT * FROM categorys WHERE name='$name_category'";			
				$result2 = $mysqli->query($query2);
				$row = mysqli_fetch_assoc($result2);
				$id_cate = $row['id_cate'];
				//handle select image			
				$name = $_FILES['image']['name'];
				if($name != null){
					$tach_chuoi = explode(".",$name);
					$count = count($tach_chuoi);
					$duoi_file = $tach_chuoi[$count-1];
					unset($tach_chuoi[$count-1]);
					$ten_file = '';
					foreach($tach_chuoi as $key=>$value){
						if($key==0){
							$ten_file = $value;
						} else {
							$ten_file = $ten_file.'_'.$value;
						}
					}
					$time =time();							
					$ten_hinh = $ten_file.'_'.$time.'.'.$duoi_file;

					$tmp_name = $_FILES['image']['tmp_name'];
					$path = $_SERVER['DOCUMENT_ROOT'];
					$path_upload = $path.'/baitap/creative_onepage/files/'.$ten_hinh;
					$ketqua = move_uploaded_file($tmp_name,$path_upload);
				} else {
					$ten_hinh = '';
				}
				//Insert information					
				$str_query = "INSERT INTO projects (id_cate,projects_name,img) VALUES('$id_cate','$name_project','$ten_hinh')";		
				$result = $mysqli->query($str_query);
					if($result){ //success
						header("LOCATION: indexProject.php?page=1");
						exit();
					}else{ //fail
						echo "<p style='color:red'>Error in progress Add Project</p>";
					}
			}
		?>
					 
        <form action="" method="POST" enctype="multipart/form-data" id="frm-news">
            <p>
                <label>Name Project(*)</label>
                <input type="text" name="project" value="" class="input-medium" />
            </p>
      		<p>
                <label>Name Category(*)</label>
                <select name="taskoption">
                    <option value=""> </option>
                    <?php
                    	//get name category
                        $query = "SELECT name FROM categorys";
						$result1 = $mysqli->query($query);
						while($row = mysqli_fetch_assoc($result1)){
							$name_cate = $row['name']; //get name
                        ?>
                    <option value="<?php echo $name_cate;?>"><?php echo $name_cate;?></option>
			    	<?php
			    		}
			    	?>
                </select>
            </p>
			<p>
                <label>Images</label>
                <input type="file"  name="image" value="" />
            </p>
            <fieldset>
                <input class="submit-green" name="add" type="submit" value="Add" /> 
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
			$("#frm-news").validate({
				rules: {
					project: {
						required: true,
					},
					taskoption: {
						required: true,
					},
					image:{
						required: true,
					},
				},
				messages: {
					project: {
						required: "<strong><span style = 'color:red'>Require input!</span></strong>",
					},
					taskoption: {
						required: "<strong><span style = 'color:red'>Require input!</span></strong>",
					},
					image: {
						required: "<strong><span style = 'color:red'>Require input!</span></strong>",
					},
				}
			});
		});
</script>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/footer.php';?> 