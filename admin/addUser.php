htmlentities<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/header.php';?>
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
					username: {
						required: true,
					},
					password: {
						required: true,
					},
				},
				messages: {
					username: {
						required: "<p style = 'color:red'>Username bắt buộc nhập</p>",
					},
                    password: {
						required: "<p style = 'color:red'>Password bắt buộc nhập</p>",
					},
				}
			});
		});
</script>
            <!-- Form elements -->    
            <div class="grid_12">
            
                <div class="module">
                     <h2 style="margin-top: 0px; margin-bottom: 15px;"><span>Add User(*)</span></h2>
                        
                     <div class="module-body">
					 <?php
						if(isset($_POST['them'])){
							$username = htmlentities($_POST['username']);
                            $password = htmlentities($_POST['password']);
                            $password_news = md5($password);
							//$tendanhmuctin = $mysqli->real_escape_string($_POST['tendanhmuctin']);
                            $query = "SELECT * FROM user WHERE username = '$username'";
							$result = $mysqli->query($query);
							$arr_U = mysqli_fetch_assoc($result);
							$count = count($arr_U);
							if($count > 0){
								//có tồn tại
								echo "<strong style='color:red'>Username đã tồn tại</strong>";
							} else {
								$str = "INSERT INTO user(username,password) VALUES('$username','$password_news') ";
								$ketqua = $mysqli->query($str);
								if($ketqua) {
									header("LOCATION: indexUser.php");
									exit();
								} else {
									echo "<strong> Có lỗi trong quá trình thêm</strong>";
								}
							}
						}
					 ?>
                        <form action="" method="POST" enctype="multipart/form-data" id="news" >
                            <p>
                                <label>UserName(*)</label>
                                <input type="text" name="username" value="" class="input-medium" />
                            </p>
                            <p>
                                <label>PassWord(*)</label>
                                <input type="text" name="password" value="" class="input-medium" />
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