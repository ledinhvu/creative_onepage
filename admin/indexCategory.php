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
                        <th style="width:4%; text-align: center;">No.</th>
                        <th>Name Categorys</th>
                        <th style="width:20%; text-align: center;">Edit</th>
                        <th style="width:20%; text-align: center;">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
      							<?php
                      //get page
                      require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/functions/getpage.php';
                      $max_result = 10; //max row display
                      $index_row = $page*$max_result-$max_result;
      								$query = "SELECT * FROM categorys LIMIT $index_row, $max_result";
                      $index=1; //index
      								$result = $mysqli->query($query);
      								while($row = mysqli_fetch_assoc($result)){
                        //get information
      								  $id_cate = $row['id_cate'];
      								  $name_cate = $row['name'];
      							?>
                      <tr>
                        <td class="align-center"><?php echo $index++; ?></td>
                        <td><?php echo $name_cate;?></td>
                        <td align="center">
                          <a href="editCategory.php?id_cate=<?php echo $id_cate;?>">Edit<img src="/baitap/creative_onepage/templates/admin/images/pencil.gif" alt="edit" /></a>
                        </td>
                        <td align="center">
                          <a href="deleteCategory.php?id_cate=<?php echo $id_cate;?>">Delete<img src="/baitap/creative_onepage/templates/admin/images/bin.gif" width="16" height="16" alt="delete" /></a>
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
                                $querySD  = "SELECT COUNT(id_cate) AS 'numberrow' FROM categorys ";
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