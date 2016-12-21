<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/header.php';?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/functions/dbconnect.php'; ?>
<?php 
if(isset($_SESSION['id_user'])){
	header("location:/admin/index.php");
}
?>
<script type="text/javascript">
			$(document).ready(function(){
			$("#frm-news").validate({
				rules: {
					user: {
						required: true,
					},
					password: {
						required: true,
					},
				},
				messages: {
					user: {
						required: "<strong><span style = 'color:red'>Bạn chưa nhập tên tài khoản</span></strong>",
					},
					password: {
						required: "<strong><span style = 'color:red'>Bạn chưa nhập mật khẩu</span></strong>",
					},
				}
			});
		});
</script>
<!-- Form elements -->
<div class="grid_12">

	<div class="module">
		<h2>
			<span>Login</span>
		</h2>
		<div class="module-body">
		<?php
			if (isset($_POST['login'])) {
				// lay du lieu tu nguoi dung && loc loi
				$username = $mysqli->real_escape_string($_POST ['user']);
				$password = $_POST ['password'];
				$password_new = md5($password);
				// tao truy van them tin vao database
				$query = "SELECT * FROM user WHERE username = '$username' && password = '$password_new' LIMIT 1";
				// thuc hien truy van
				$result = $mysqli->query ($query);
				$arUser = mysqli_fetch_assoc($result);
				if (count($arUser) > 0) {
					$_SESSION['id_user']=$arUser['id_user'];
					$_SESSION['username']=$arUser['username'];
					//chuyển hướng
					header("location:index.php");
					exit();
				} else {
					echo "<p style ='color:red'><strong>Sai tên tài khoản hoặc mật khẩu.</strong></p>";
				}
			}
			?>
			<form action="" method="POST" name="frm-news" id="frm-news"
				enctype="multipart/form-data">
				<p>
					<label>Username</label> <input type="text" name="user"
						value="" class="input-medium" />
				</p>
				<p>
					<label>Password</label> <input type="password" name="password"
						id="confim_pass" value="" class="input-medium" />
				</p>
				<fieldset>
					<input class="submit-green" name="login" type="submit"
						value="Login" />
				</fieldset>
			</form>
		</div>
		<!-- End .module-body -->
	</div>
	<!-- End .module -->
	<div style="clear: both;"></div>
</div>
<!-- End .grid_12 -->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/footer.php';?> 