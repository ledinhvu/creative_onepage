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
                      <a href="addCounters.php" class="button">
                      	<span>Add Counters<img src="/baitap/creative_onepage/templates/admin/images/plus-small.gif" alt="Thêm tin"></span>
                      </a>
                  </div>
                  <div class="clear"></div>
            </div>
            
            <div class="grid_12">
                <!-- Example table -->
                <div class="module">
                	<h2><span>List Counters</span></h2>
                    
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:4%; text-align: center;">ID</th>
                                    <th >Counters name</th>
                                    <th>Value </th>
                                    <th>Image</th>
                                    <th style="width:15%; text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
								$query = "SELECT * FROM counters";
								//thực hiện truy vấn
								$result = $mysqli->query($query);
								while($row = mysqli_fetch_assoc($result)){
								$id_count = $row['id_count'];
								$ten_count = $row['count_name'];
                                $value_count = $row['value'];
                                $img_count = $row['img'];
                                 $path = '/baitap/creative_onepage/files/'.$img_count;
							?>
                                <tr>
                                    <td class="align-center"><?php echo $id_count; ?></td>
                                    <td><?php echo $ten_count;?></td>
                                    <td><?php echo $value_count;?></td>
                                    <td style="text-align:center">
                                        <?php
										if($img_count== NULL){
											echo "Không có hình";
										}else{
									    ?>
                                        <img src="<?php echo $path;?>" class="img" style="width:60px"/>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <a href="editCounters.php?id_count=<?php echo $id_count;?>">Edit<img src="/baitap/creative_onepage/templates/admin/images/pencil.gif" alt="edit" /></a>
                                        <a href="delCounters.php?id_count=<?php echo $id_count;?>">Delete <img src="/baitap/creative_onepage/templates/admin/images/bin.gif" width="16" height="16" alt="delete" /></a>
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