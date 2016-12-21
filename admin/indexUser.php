<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/header.php';?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/functions/dbconnect.php'; ?>
<?php
	if(!isset($_SESSION['id_user'])){
		//chưa đăng nhập
		header("location:login.php");
		exit();
	}
?> 
            <div class="bottom-spacing">
                  <!-- Button -->
                  <div class="float-left">
                      <a href="addUser.php" class="button">
                      	<span>Add User<img src="/baitap/creative_onepage/templates/admin/images/plus-small.gif" alt="Thêm user"></span>
                      </a>
                  </div>
                  <div class="clear"></div>
            </div>
            
            <div class="grid_12">
                <!-- Example table -->
                <div class="module">
                	<h2><span>List User</span></h2>
                    
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:4%; text-align: center;">No.</th>
                                    <th>UserName</th>
                                    <th>PassWord</th>
                                    <th style="width:15%; text-align: center;">Edit</th>
                                    <th style="width:15%; text-align: center;">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
								$query = "SELECT * FROM user";
								//thực hiện truy vấn
								$result = $mysqli->query($query);
                                $index=1;
								while($row = mysqli_fetch_assoc($result)){
								$id_user = $row['id_user'];
								$username = $row['username'];
                                $password = $row['password'];
							?>
                                <tr>
                                    <td class="align-center"><?php echo $index++; ?></td>
                                    <td class="align-center"><?php echo $username;?></td>
                                    <td class="align-center"><?php echo $password;?></td>
                                    <td align="center">
                                        <a href="editUser.php?id_user=<?php echo $id_user;?>">Edit<img src="/baitap/creative_onepage/templates/admin/images/pencil.gif" alt="edit" /></a>
                                    </td>
                                    <td align="center">
                                        <a href="delUser.php?id_user=<?php echo $id_user;?>">Delete <img src="/baitap/creative_onepage/templates/admin/images/bin.gif" width="16" height="16" alt="delete" /></a>
                                    </td>
                                </tr>
							<?php 
									} 
							?>
                            </tbody>
                        </table>
                        </form>
                     </div> <!-- End .module-table-body -->
                </div> <!-- End .module -->
			</div> <!-- End .grid_12 -->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/footer.php';?> 