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
		<script type = "text/javascript" src = "ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="jquery.validate.js"></script>
        <script src="../templates/admin/js/bootstrap.min.js"></script>
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
							$id_user = $_SESSION['id_user'];
                            $username= $_SESSION['username'];
					?>		
							<li><a href="logout.php">Logout</a></li>
							<li>Chào, <?php echo $username;?></li>
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
                            <?php
                            if(isset($_SESSION['id_user'])){
                            ?>	
                            <ul id="nav">
                                <li id="current"><a href="">Manage</a></li>
                            </ul>
                            <?php 
                                 }
                             ?>
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
                        <?php
						if(isset($_SESSION['id_user'])){
					    ?>	
                            <li><a href="indexMenus.php">Menus</a></li>
                            <li><a href="indexSliders.php">Sliders</a></li>
							<li><a href="indexPromotionals.php">Promotionals</a></li>
                            <li><a href="indexCounters.php">Couters</a></li>
                            <li><a href="indexProject.php?page=1">Projects</a></li>
                            <li><a href="indexSpec.php?page=1">Specializations</a></li>
                            <li><a href="indexSpecIcon.php?page=1">Special icon</a></li>
                            <li><a href="indexCategory.php?page=1">Categorys</a></li>
                            <li><a href="indexUser.php">Users</a></li>
                            <li><a href="indexContact.php?page=1">Contacts</a></li>
                            <?php 
                                 }
                             ?>
                        </ul>
                        
                    </div><!-- End. .grid_12-->
                </div><!-- End. .container_12 -->
                <div style="clear: both;"></div>
            </div> <!-- End #subnav -->
        </div> <!-- End #header -->
        
	<div class="container_12">