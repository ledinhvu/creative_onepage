<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/header.php';?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/functions/dbconnect.php'; ?>
            <div class="bottom-spacing">
                  <!-- Button -->
                  <div class="float-left">
                      <a href="addProject.php" class="button">
                      	<span>Add Projects <img src="/baitap/creative_onepage/templates/admin/images/plus-small.gif" alt="Thêm tin"></span>
                      </a>
                  </div>
                  <div class="clear"></div>
            </div>
            
            <div class="grid_12">
                <!-- Example table -->
                <div class="module">
                	<h2><span>Projects List</span></h2>
                    
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:4%; text-align: center;">STT</th>
                                    <th style="width:30%; text-align: center;">Name Projects</th>
                                    <th style="width:20%; text-align: center;">Name Categorys</th>
                                    <th style="width:200px; text-align: center;">Images</th>
                                    <th style="width:11%; text-align: center;">Features</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
								$query = "SELECT * FROM projects inner join categorys on projects.id_cate=categorys.id_cate";
								//thực hiện truy vấn
                                $index=1;
								$result = $mysqli->query($query);
								while($row = mysqli_fetch_assoc($result)){
								$id_project = $row['id_projects'];
								$name_cate = $row['name'];
                                $name_project = $row['projects_name'];
                                $img = $row['img'];
                                $path = '/baitap/creative_onepage/files/'.$img;
							?>
                                <tr>
                                    <td class="align-center"><?php echo $index++; ?></td>
                                    <td><?php echo $name_project;?></td>
                                    <td><?php echo $name_cate;?></td>
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
                                        <a href="editProject.php?id_project=<?php echo $id_project;?>">Edit<img src="/baitap/creative_onepage/templates/admin/images/pencil.gif" alt="edit" /></a>
                                        <a href="deleteProject.php?id_project=<?php echo $id_project;?>">Delete<img src="/baitap/creative_onepage/templates/admin/images/bin.gif" width="16" height="16" alt="delete" /></a>
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