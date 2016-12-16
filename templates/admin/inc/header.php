<?php 
	ob_start();
	session_start();
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/functions/define.php'; ?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Creative OnePage Templates</title>
        <link rel="stylesheet" type="text/css" href="/baitap/creative_onepage/templates/admin/css/styles.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="/baitap/creative_onepage/templates/admin/css/bootstrap.min.css" media="screen" />
        <script src="/baitap/creative_onepage/templates/admin/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
		<script type = "text/javascript" src = "ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="jquery.validate.js"></script>
	</head>
	<body>
    	<!-- Header -->
        <div id="header">
            <!-- Header. Status part -->
            <div id="header-status">
                <div class="container_12">
                    <div class="grid_4">
					<ul class="user-pro">
					<?php
						if(isset($_SESSION['id_user'])){
							$fullname = $_SESSION['fullname'];
							$id_user = $_SESSION['id_user'];
					?>		
							<li><a href="logout.php">Logout</a></li>
							<li>Chào, <a href="editUser.php?uid=<?php echo $id_user;?>"><?php echo $fullname;?></a></li>
                    <?php 
						} else {
					?>
						<li><a href="login.php">Login</a></li>
						<li>Chào,Khách </li>
					<?php
						}
					?>
						
                    </ul>	
                    </div>
                </div>
                <div style="clear:both;"></div>
            </div> <!-- End #header-status -->
            
            <!-- Header. Main part -->
            <div id="header-main">
                <div class="container_12">
                    <div class="grid_12">
                        <div id="logo">
                            <ul id="nav">
                                <li id="current"><a href="">Quản trị</a></li>
                            </ul>
                        </div><!-- End. #Logo -->
                    </div><!-- End. .grid_12-->
                    <div style="clear: both;"></div>
                </div><!-- End. .container_12 -->
            </div> <!-- End #header-main -->
            <div style="clear: both;"></div>
            <!-- Sub navigation -->
            <div id="subnav">
                <div class="container_12">
                    <div class="grid_12">
                        <ul>
                            <li><a href="indexMenus.php">Menus</a></li>
                            <li><a href="indexSliders.php">Sliders</a></li>
							<li><a href="indexUser.php">Promotionals</a></li>
                            <li><a href="indexUser.php">Couters</a></li>
                            <li><a href="indexUser.php">Progressbar</a></li>
                            <li><a href="indexProject.php">Projects</a></li>
                            <li><a href="indexUser.php">Specialtions</a></li>
                            <li><a href="indexSpectialIcon.php">Special icon</a></li>
                            <li><a href="indexCategory.php?page=1">Categorys</a></li>
                            <li><a href="indexUser.php">Users</a></li>
                        </ul>
                        
                    </div><!-- End. .grid_12-->
                </div><!-- End. .container_12 -->
                <div style="clear: both;"></div>
            </div> <!-- End #subnav -->
        </div> <!-- End #header -->
        
	<div class="container_12">