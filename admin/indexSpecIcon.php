<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/header.php';?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/functions/dbconnect.php'; ?>
<div class="bottom-spacing">
  <!-- Button -->
  <div class="float-left">
    <a href="addSpecIcon.php" class="button">
      <span>Add Specialization Icon<img src="/baitap/creative_onepage/templates/admin/images/plus-small.gif" alt="Thêm tin"></span>
    </a>
  </div>
  <div class="clear"></div>
</div>
<div class="grid_12">
  <!-- Example table -->
  <div class="module">
    <h2><span>Specialization Icons List</span></h2>                   
    <div class="module-table-body">
      <form action="">
        <table id="myTable" class="tablesorter">
          <thead>
            <tr>
              <th style="width:4%; text-align: center;">STT</th>
              <th>Type Icon</th>
              <th>Caption</th>
              <th style="width:20%; text-align: center;">Edit</th>
              <th style="width:20%; text-align: center;">Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php
              //get page
              require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/functions/getpage.php';
              $max_result = 10;  //max row display in one page
              $index_row = $page*$max_result-$max_result;
              $query = "SELECT * FROM special_icon LIMIT $index_row, $max_result";
              $index=1; //index
              $result = $mysqli->query($query);
              while($row = mysqli_fetch_assoc($result)){
                //get informations
                $id_spec_icon = $row['id_spe_icon'];
                $name = $row['name'];
                $caption = $row['caption'];
            ?>
            <tr>
              <td class="align-center"><?php echo $index++; ?></td>
              <td><?php echo $name;?></td>
              <td><?php echo $caption;?></td>
              <td align="center">
                <a href="editSpecIcon.php?id_spec_icon=<?php echo $id_spec_icon;?>">Edit<img src="/baitap/creative_onepage/templates/admin/images/pencil.gif" alt="edit" /></a>
              </td>
              <td align="center">
                <a href="deleteSpecIcon.php?id_spec_icon=<?php echo $id_spec_icon;?>">Delete<img src="/baitap/creative_onepage/templates/admin/images/bin.gif" width="16" height="16" alt="delete" /></a>
              </td>
            </tr>
            <?php 
                } 
            ?>
            <tr >
              <td colspan="6">
                <nav  class="text-right">
                  <ul class="pagination">
                  <?php
                    $querySD  = "SELECT COUNT(id_spe_icon) AS 'numberrow' FROM special_icon ";
                    $resultSD  = $mysqli->query ( $querySD );
                    $arSD   = mysqli_fetch_assoc( $resultSD );
                    $total_row  = $arSD ['numberrow'];                                     
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