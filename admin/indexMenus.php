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
                      <a href="addMenus.php" class="button">
                      	<span>Add Menus<img src="/baitap/creative_onepage/templates/admin/images/plus-small.gif" alt="Thêm tin"></span>
                      </a>
                  </div>
                  <div class="clear"></div>
            </div>
            
            <div class="grid_12">
                <!-- Example table -->
                <div class="module">
                	<h2><span>List Menus</span></h2>
                    
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:4%; text-align: center;">No.</th>
                                    <th>Menu name</th>
                                    <th style="width:15%; text-align: center;">Edit</th>
                                    <th style="width:15%; text-align: center;">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
                //get page
                require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/functions/getpage.php';
                $max_result = 10; //max row display
                $index_row = $page*$max_result-$max_result;
								$query = "SELECT * FROM menus LIMIT $index_row, $max_result";
								//thực hiện truy vấn
								$result = $mysqli->query($query);
                $index = 1;
								while($row = mysqli_fetch_assoc($result)){
								$id_menu = $row['id_menus'];
								$ten_dmt = $row['menu_name'];
							?>
                                <tr>
                                    <td class="align-center"><?php echo $index++; ?></td>
                                    <td><?php echo $ten_dmt;?></td>
                                    <td align="center">
                                        <a href="editMenus.php?id_menus=<?php echo $id_menu;?>">Edit<img src="/baitap/creative_onepage/templates/admin/images/pencil.gif" alt="edit" /></a>
                                    </td>
                                    <td align="center">
                                        <a href="delMenus.php?id_menus=<?php echo $id_menu;?>">Delete <img src="/baitap/creative_onepage/templates/admin/images/bin.gif" width="16" height="16" alt="delete" /></a>
                                    </td>
                                </tr>
							<?php 
									} 
							?>
                                <tr >
                        <td colspan="4">
                          <nav  class="text-right">
                            <ul class="pagination">
                              <?php
                                $querySD  = "SELECT COUNT(id_menus) AS 'numberrow' FROM menus ";
                                $resultSD  = $mysqli->query ( $querySD );
                                $arSD   = mysqli_fetch_assoc( $resultSD );
                                $total_row  = $arSD ['numberrow']; //total row in table
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