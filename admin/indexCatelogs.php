<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/tuan3/templates/admin/inc/header.php';?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/tuan3/functions/dbconnect.php'; ?>
            <div class="bottom-spacing">
                  <!-- Button -->
                  <div class="float-left">
                      <a href="addCatelogs.php" class="button">
                      	<span>Thêm danh mục tin <img src="/baitap/tuan3/templates/admin/images/plus-small.gif" alt="Thêm tin"></span>
                      </a>
                  </div>
                  <div class="clear"></div>
            </div>
            
            <div class="grid_12">
                <!-- Example table -->
                <div class="module">
                	<h2><span>Danh sách tin</span></h2>
                    
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:4%; text-align: center;">ID</th>
                                    <th>Tên Danh Mục Tin</th>
                                    <th style="width:11%; text-align: center;">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
								$query = "SELECT * FROM catelogs";
								//thực hiện truy vấn
								$result = $mysqli->query($query);
								while($row = mysqli_fetch_assoc($result)){
								$id_cat = $row['id_cate'];
								$ten_dmt = $row['cate_name'];
							?>
                                <tr>
                                    <td class="align-center"><?php echo $id_cat; ?></td>
                                    <td><a href=""><?php echo $ten_dmt;?></a></td>
                                    <td align="center">
                                        <a href="editCatelogs.php?id_cate=<?php echo $id_cat;?>">Sửa <img src="/baitap/tuan3/templates/admin/images/pencil.gif" alt="edit" /></a>
                                        <a href="delCatelogs.php?id_cate=<?php echo $id_cat;?>">Xóa <img src="/baitap/tuan3/templates/admin/images/bin.gif" width="16" height="16" alt="delete" /></a>
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