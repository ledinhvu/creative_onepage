<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/header.php';?>      
<?php
	if(!isset($_SESSION['id_user'])){
		//chưa đăng nhập
		header("location:login.php");
		exit();
	}
?> 
            <!-- Dashboard icons -->
            <div class="grid_main_l">
            	<a href="" class="dashboard-module">
                	<img src="/baitap/creative_onepage/templates/admin/images/Crystal_Clear_write.gif" width="64" height="64" alt="edit" />
                	
                </a>
                <a href="" class="dashboard-module">
                	<img src="/baitap/creative_onepage/templates/admin/images/Crystal_Clear_files.gif" width="64" height="64" alt="edit" />
                	
                </a>
                <div style="clear: both"></div>
            </div> <!-- End .grid_7 -->
            
            <!-- Account overview -->
            <div class="grid_main_r">
                <div class="module">
                        <h2><span>Quản trị hệ thống</span></h2>
                        
                        <div class="module-body">
                        	<p class="p">
                                <strong>Phần mềm</strong> được viết trên nền tảng PHP&MySQL <br />
                                <strong>Học viên thực hiện: </strong>Lê Đình Vũ<br />
                                <strong>Email: </strong>dinhvu12t3bkdn@gmail.com<br /> 
                                <strong>Phone: </strong>0909.123.456<br />
                            </p>
                        </div>
                </div>
                <div style="clear:both;"></div>
                <div class="padding-bottom"></div>
            </div> <!-- End .grid_5 -->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/footer.php';?>              