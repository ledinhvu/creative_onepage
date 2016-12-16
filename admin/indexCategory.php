<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/header.php';?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/functions/dbconnect.php'; ?>
            <div class="bottom-spacing">
                  <!-- Button -->
                  <div class="float-left">
                      <a href="addCategory.php" class="button">
                      	<span>Add categorys <img src="/baitap/creative_onepage/templates/admin/images/plus-small.gif" alt="Thêm tin"></span>
                      </a>
                  </div>
                  <div class="clear"></div>
            </div>
            
            <div class="grid_12">
                <!-- Example table -->
                <div class="module">
                	<h2><span>Categorys List</span></h2>
                    
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:4%; text-align: center;">STT</th>
                                    <th>Name Categorys</th>
                                    <th style="width:20%; text-align: center;">Features</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
                                require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/functions/getpage.php';
                                $max_result = 10;
                                $index_row = $page*$max_result-$max_result;
                                                $query = "SELECT * FROM categorys LIMIT $index_row, $max_result";
                                                //thực hiện truy vấn
                                $index=1;
								$result = $mysqli->query($query);
								while($row = mysqli_fetch_assoc($result)){
								$id_cate = $row['id_cate'];
								$name_cate = $row['name'];
							?>
                                <tr>
                                    <td class="align-center"><?php echo $index++; ?></td>
                                    <td><a href=""><?php echo $name_cate;?></a></td>
                                    <td align="center">
                                        <a href="editCategory.php?id_cate=<?php echo $id_cate;?>">Edit<img src="/baitap/creative_onepage/templates/admin/images/pencil.gif" alt="edit" /></a>
                                        <a href="deleteCategory.php?id_cate=<?php echo $id_cate;?>">Delete<img src="/baitap/creative_onepage/templates/admin/images/bin.gif" width="16" height="16" alt="delete" /></a>
                                    </td>
                                </tr>
							<?php 
									} 
							?>
                                <tr >
                                    <td colspan="3">
                                      <nav  class="text-right">
                                        <ul class="pagination">
                                        <?php
                                        $querySD  = "SELECT COUNT(id_cate) AS 'sodong' FROM categorys ";
                                        $resultSD  = $mysqli->query ( $querySD );
                                        $arSD   = mysqli_fetch_assoc( $resultSD );
                                        $total_row  = $arSD ['sodong'];
                                        // $total_row = mysql_query('SELECT * FROM categorys');
                                         require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/functions/listpage.php';
                                        ?>
                                        </ul>
                                      </nav>
                                  </td>
                                </tr>
                            </tbody>
                        </table>
                        </form>
                     </div> <!-- End .module-table-body -->
                </div> <!-- End .module -->
			</div> <!-- End .grid_12 -->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/footer.php';?> 