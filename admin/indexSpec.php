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
    <a href="addSpec.php" class="button">
      <span>Add Specialization <img src="/baitap/creative_onepage/templates/admin/images/plus-small.gif" alt="Thêm tin"></span>
        </a>
  </div>
  <div class="clear"></div>
</div>
  <div class="grid_12">
    <!-- Example table -->
      <div class="module">
        <h2><span>Specializations List</span></h2>
          <div class="module-table-body">
            <form action="">
              <table id="myTable" class="tablesorter">
                <thead>
                  <tr>
                    <th style="width:4%; text-align: center;">No.</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Value</th>
                    <th>Icons</th>
                    <th style="width:20%; text-align: center;">Edit</th>
                    <th style="width:20%; text-align: center;">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    // include get page
                    require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/functions/getpage.php';
                    $max_result = 10; // max row display
                    $index_row = $page*$max_result-$max_result;
                    $query = "SELECT * FROM specialization LIMIT $index_row, $max_result";
                    $index=1; // index
                    $result = $mysqli->query($query);
                    while($row = mysqli_fetch_assoc($result)){
                    //get information
                    $id_spec = $row['id_special'];
                    $title = $row['title'];
                    $content = $row['content'];
                    $value = $row['value'];                                  
                  ?>
                  <tr>
                    <td class="align-center"><?php echo $index++; ?></td>
                    <td><?php echo $title;?></td>
                    <td><?php echo $content;?></td>
                    <td><?php echo $value;?></td>
                    <td style="width: 80px;">
                      <?php 
                        $query7 = "SELECT * FROM spec_rela_n INNER JOIN special_icon ON spec_rela_n.id_spec_icon=special_icon.id_spe_icon WHERE id_special=$id_spec";
                        $result7 = $mysqli->query($query7);
                        while($row = mysqli_fetch_assoc($result7)){
                          $icon = $row['name']; //get name icon
                          echo "$icon\n";
                        }   
                      ?>
                    </td>
                    <td align="center">
                      <a href="editSpec.php?id_spec=<?php echo $id_spec;?>">Edit<img src="/baitap/creative_onepage/templates/admin/images/pencil.gif" alt="edit" /></a>
                    </td>
                    <td align="center">
                        <a href="deleteSpec.php?id_spec=<?php echo $id_spec;?>">Delete<img src="/baitap/creative_onepage/templates/admin/images/bin.gif" width="16" height="16" alt="delete" /></a>
                    </td>
                    </tr>
                    <?php 
                        } 
                    ?>
                    <tr >
                      <td colspan="7">
                        <nav  class="text-right">
                          <ul class="pagination">
                            <?php
                              $querySD  = "SELECT COUNT(id_special) AS 'numberrow' FROM specialization ";
                              $resultSD  = $mysqli->query ( $querySD );
                              $arSD   = mysqli_fetch_assoc( $resultSD );
                              $total_row  = $arSD ['numberrow']; // Total row in table
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