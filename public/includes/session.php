
<?php session_start(); 
	function confirm_login(){
	if (!isset($_SESSION['us'])){redirect('../logout.php');}
}
	function confirm_login2(){
	if (!isset($_SESSION['uz'])){redirect('../logout.php?adm');}
}



?>