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
                      <a href="addPromotionals.php" class="button">
                      	<span>Add Promotional <img src="/baitap/creative_onepage/templates/admin/images/plus-small.gif" alt="Thêm tin"></span>
                      </a>
                  </div>
                  <div class="clear"></div>
            </div>
            
            <div class="grid_12">
                <!-- Example table -->
                <div class="module">
                	<h2><span>List Promotional</span></h2>
                    
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:4%; text-align: center;">ID</th>
                                    <th style="width:10%; text-align: center;">Title</th>
                                    <th style="width:20%; text-align: center;">Detail</th>
                                    <th style="width:15%; text-align: center;">Images</th>
                                    <th style="width:10%; text-align: center;">Author</th>
                                    <th style="width:10%; text-align: center;">Job</th>
                                    <th style="width:20%; text-align: center;">About Author</th>
                                    <th style="width:11%; text-align: center;">Active</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
								$query = "SELECT * FROM promotionals";
								//thực hiện truy vấn
								$result = $mysqli->query($query);
								while($row = mysqli_fetch_assoc($result)){
								$id_pro = $row['id_pro'];
								$title = $row['title'];
                                $detail = $row['detail'];
                                $img = $row['img'];
                                $author = $row['author'];
                                $job = $row['job'];
                                $about_author = $row['about_author'];
                                $path = '/baitap/creative_onepage/files/'.$img;
							?>
                            
                                <tr>
                                    <td class="align-center"><?php echo $id_pro; ?></td>
                                    <td><?php echo $title;?></td>
                                    <td><?php echo $detail;?></td>
                                    <td style="text-align:center">
                                        <?php
										if($img== NULL){
											echo "Không có hình";
										}else{
									    ?>
                                        <img src="<?php echo $path;?>" class="img" />
                                        <?php
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $author;?></td>
                                    <td><?php echo $job;?></td>
                                    <td><?php echo $about_author;?></td>
                                    <td align="center">
                                        <a href="editPromotionals.php?id_pro=<?php echo $id_pro;?>">Edit <img src="/baitap/creative_onepage/templates/admin/images/pencil.gif" alt="edit" /></a>
                                        <a href="delPromotionals.php?id_pro=<?php echo $id_pro;?>">Delete <img src="/baitap/creative_onepage/templates/admin/images/bin.gif" width="16" height="16" alt="delete" /></a>
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