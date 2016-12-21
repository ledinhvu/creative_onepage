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
    	<?php
			$id_contact= $_GET['id_contact'];
			if($id_contact!=null){ // has id contact
				$query = "SELECT * FROM contact WHERE id=$id_contact ";
				$result = $mysqli->query($query);
				$row = mysqli_fetch_assoc($result);
				$name = $row['name'];
               	$email = $row['email'];
                $company = $row['company'];
                $content = $row['content'];
			} else  {
				echo "<p style='color:red'>ERROR!</p>"; //without id contact
			}
			
		?>
        <h2 style="margin-top: 0px; margin-bottom: 15px;"><span>Contact from: <?php echo "<i>$name</i>";?></span></h2>    
        <div class="module-body text-center" style="padding-right: 100px;padding-left: 180px;">
        <form action="" method="POST" enctype="multipart/form-data" id="news">
            <table style="border:none;">
            	<tbody>
            		<tr>
            			<td style="border:none;"><label>Name</label></td>
            			<td style="border:none;"><input readonly style="width: 500px;" type="text" name="name" value="<?php echo $name;?>" class="input-medium" /></td>
            		</tr>
            		<tr>
            			<td style="border:none;"><label>Email</label></td>
            			<td style="border:none;"><input readonly style="width: 500px;" type="text" name="email" value="<?php echo $email;?>" class="input-medium" /></td>
            		</tr>
            		<tr>
            			<td style="border:none;"><label>Company</label></td>
            			<td style="border:none;"><input readonly style="width: 500px;" type="text" name="company" value="<?php echo $company;?>" class="input-medium" /></td>
            		</tr>
            		<tr>
            			<td style="border:none;"><label>Content</label></td>
            			<td style="border:none;">
            				<textarea name="content" style="width: 500px;height: 300px;" wrap="hard" readonly>
            				<?php echo htmlspecialchars($content); ?>
            				</textarea>
            			</td>	
            		</tr>
            	</tbody>
            </table>
            <fieldset >
                <button type="button" class="btn btn-info"><a style="text-decoration: none;" href="indexContact.php?page=1">Back</a></button> 
            </fieldset>
        </form>	
    </div> <!-- End .module-body -->
    </div>  <!-- End .module -->
    <div style="clear:both;"></div>
</div> <!-- End .grid_12 -->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/footer.php';?> 