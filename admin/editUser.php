htmlentities<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/header.php';?>
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
                     <h2 style="margin-top: 0px; margin-bottom: 15px;"><span>Edit User</span></h2>
                        
                     <div class="module-body">
					 <?php
						$id_user= $_GET['id_user'];
						$query = "SELECT * FROM user WHERE id_user = $id_user";
						$result = $mysqli->query($query);
						$arr_U = mysqli_fetch_assoc($result);
						$user_U = htmlspecialchars($arr_U['username']);
						$pass_U = $arr_U['password'];
						
						if(isset($_POST['sua'])){
							$username = $mysqli->htmlentities($_POST['username']);
							$password = $mysqli->htmlentities($_POST['password']);
							$password_news = md5($password);
							//th1 chỉ sửa pass 
							if($username == $user_U){
								$str = "UPDATE user SET password = '$password_news' WHERE id_user = $id_user";
								$ketqua = $mysqli->query($str);
								if($ketqua) {
									header("LOCATION:indexUser.php");
									exit();
								}else{
									echo "có lỗi khi sửa";
								}
							}else{ //th2 
								$str_query = "SELECT * FROM user WHERE username = '$username' ";
								$kq = $mysqli->query($str_query);
								$arr_Ue = mysqli_fetch_assoc($kq);
								$count1 = count($arr_Ue);
								if($count1 > 0) {
									echo "Username đã tồn tại";
								}else {
									//thực hiện update
									$sql_query1 = "UPDATE user SET username='$username', password = '$password_news'
									WHERE id_user =$id_user";
									$ketqua1 = $mysqli->query($sql_query1);
									if($ketqua1) {
										header("LOCATION: indexUser.php");
										exit();
									}else{
										echo "có lỗi khi sửa";
									}
								
								}
							}
						}
						
					 ?>
<script type="text/javascript">
			$(document).ready(function(){
			$("#frm-news").validate({
				rules: {
					username: {
						required: true,
					},
					password: {
						required: true,
						minlength:4,
						maxlength:60,
					},
				},
				messages: {
					username: {
						required: "<strong style = 'color:red'>Bạn chưa nhập username</strong>",
					},
					password: {
						required: "<strong style = 'color:red'>Bạn chưa nhập mật khẩu</strong>",
						minlength: "<strong style = 'color:red'>Mật khẩu ít nhất 4 ký tự</strong>",
						maxlength: "<strong style = 'color:red'>Mật khẩu tối đa 60 ký tự</strong>", 
					},
				}
			});
		});
</script>
                        <form action="" method="POST" enctype="multipart/form-data" id="frm-news">
                            <p>
                                <label>Username(*)</label>
                                <input type="text" name="username"
								
								value="<?php echo $user_U;?>" class="input-medium" />
                            </p>
							<p>
                                <label>Password(*)</label>
                                <input type="password" name="password" value="<?php echo $pass_U;?>" class="input-medium" />
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