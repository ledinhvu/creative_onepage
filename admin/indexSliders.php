<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/tuan3/templates/admin/inc/header.php';?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/tuan3/functions/dbconnect.php'; ?>
            <div class="bottom-spacing">
                  <!-- Button -->
                  <div class="float-left">
                      <a href="addCatelogs.php" class="button">
                      	<span>Thêm hình ảnh cho slider <img src="/baitap/tuan3/templates/admin/images/plus-small.gif" alt="Thêm tin"></span>
                      </a>
                  </div>
                  <div class="clear"></div>
            </div>
            
            <div class="grid_12">
                <!-- Example table -->
                <div class="module">
                	<h2><span>Danh sách hình ảnh</span></h2>
                    
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:4%; text-align: center;">ID</th>
                                    <th style="width:20%; text-align: center;">Title</th>
                                    <th style="width:30%; text-align: center;">Content</th>
                                    <th style="width:200px; text-align: center;">Images</th>
                                    <th style="width:11%; text-align: center;">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
								$query = "SELECT * FROM sliders";
								//thực hiện truy vấn
								$result = $mysqli->query($query);
								while($row = mysqli_fetch_assoc($result)){
								$id_slide = $row['id_sliders'];
								$title = $row['title'];
                                $content = $row['content'];
                                $img = $row['img'];
                                $path = '/baitap/tuan3/files/'.$img;
							?>
                                <tr>
                                    <td class="align-center"><?php echo $id_slide; ?></td>
                                    <td><?php echo $title;?></td>
                                    <td><?php echo $content;?></td>
                                    <td style="text-align:center">
                                        <?php
										if($img== NULL){
											echo "Không có hình";
										}else{
									    ?>
                                        <img src="<?php echo $path;?>" class="img" style="width:200px"/>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <a href="editSliders.php?id_sliders=<?php echo $id_slide;?>">Sửa <img src="/baitap/tuan3/templates/admin/images/pencil.gif" alt="edit" /></a>
                                        <a href="delSliders.php?id_sliders=<?php echo $id_slide;?>">Xóa <img src="/baitap/tuan3/templates/admin/images/bin.gif" width="16" height="16" alt="delete" /></a>
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
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/tuan3/templates/admin/inc/footer.php';?> 