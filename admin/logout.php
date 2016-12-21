<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/header.php';?>
<?php

if (isset ( $_SESSION ['id_user'] )) {
	unset ( $_SESSION ['id_user'] );
	unset ( $_SESSION ['username'] );	
}
	header ("location:/baitap/creative_onepage/admin/login.php");
	exit();
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/baitap/creative_onepage/templates/admin/inc/footer.php';?> 