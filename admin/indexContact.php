<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/header.php';?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/functions/dbconnect.php'; ?>           
  <div class="grid_12">
      <!-- Example table -->
        <div class="module">
          <h2><span>Contact List</span></h2>     
            <div class="module-table-body">
              <form action="">
                  <table id="myTable" class="tablesorter">
                    <thead>
                      <tr>
                        <th style="width:4%; text-align: center;">STT</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Company</th>
                        <th>Content</th>
                        <th style="width:20%; text-align: center;">View</th>
                        <th style="width:20%; text-align: center;">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
      							<?php
                      //get page
                      require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/functions/getpage.php';
                      $max_result = 10; //max row display
                      $index_row = $page*$max_result-$max_result;
      								$query = "SELECT * FROM contact LIMIT $index_row, $max_result";
                      $index=1; //index
      								$result = $mysqli->query($query);
      								while($row = mysqli_fetch_assoc($result)){
                        //get information
      								  $id_contact = $row['id'];
      								  $name = $row['name'];
                        $email = $row['email'];
                        $company = $row['company'];
                        $content = $row['content'];
      							?>
                      <tr>
                        <td class="align-center"><?php echo $index++; ?></td>
                        <td><?php echo $name;?></td>
                        <td><?php echo $email;?></td>
                        <td><?php echo $company;?></td>
                        <td>
                        <?php
                          if(strlen($content)<25){ 
                            echo $content;
                          } else {
                            $sub_content = substr($content,0,25)."...";
                            echo $sub_content;
                          }
                        ?>  
                        </td>
                        <td align="center">
                          <a href="viewContact.php?id_contact=<?php echo $id_contact;?>">View<img src="/baitap/creative_onepage/templates/admin/images/pencil.gif" alt="edit" /></a>
                        </td>
                        <td align="center">
                          <a href="deleteContact.php?id_contact=<?php echo $id_contact;?>">Delete<img src="/baitap/creative_onepage/templates/admin/images/bin.gif" width="16" height="16" alt="delete" /></a>
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
                                $querySD  = "SELECT COUNT(id) AS 'numberrow' FROM contact ";
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