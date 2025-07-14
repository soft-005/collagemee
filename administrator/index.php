<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php if (isset($_SESSION['uz'])) {
	redirect('./access.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
		<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
	<link rel="icon" type="image/x-icon" href="../assets/images/favicon.png">
	<link rel="stylesheet" type="text/css" href="../assets/back/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/back/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<style type="text/css">
			body{background: rgb(248,244,182);}
	header{background: ;padding: 10px 20px;color:rgb(220,220,220);}
	header ul{display: inline-block;}
	header h3{display: inline-block;}
header ul li{display: inline-block;}
header ul li ul{display: none;position: absolute;}
header ul li ul li{display: block;}
header ul li:hover ul{display: block;}
.round{border-radius: 100px;}
.shadow{box-shadow: 5px 7px 10px grey;}
form input{padding:8px 16px;border-radius: 10px;border:none;border-left: 5px solid grey;width: 80%;}
form input[type="submit"]{width: 45%;border-radius: 100px;}
input[type="checkbox"]{width: 20px;}


	</style>


</head><body style="background:#000;color:#fff;"><div style="background: linear-gradient(to bottom, rgba(200,200,200,.8), 80%, #1d1a16);
position: absolute;top: 0;left: 0;right: 0;height: 100%;">
<header class="p-5" style="">
	<h3 class="text-light bg-dark py-2 px-4 round">  <img src="../assets/images/logo.png" width="180px" height="70px" /> </h3></header>
		<div class="row col-lg-10 mx-auto" style="margin-top: 70px;">
<div class="col-lg-6 text-center cal mx-auto" style="background:  transparent;border-radius: 10px;padding: 20px;height: 450px;">
<h3 class="text-light" style="text-shadow:0 0 2.5px #000;font-size:2em;"><strong>Access more, Login.</strong></h3>
	<form method="post" action="../includes/crud.php?c=43724863673254632576" class="mt-5 text-center d-block mx-auto ">
		<i class="fas mr-3 fa-envelope"></i><input type="text" placeholder="Email" name="name" class="d-inline-block mx-auto my-3"><br/>
		<i class="fas mr-3 fa-key"></i><input type="password" placeholder="Password" name="password" class="d-inline-block mx-auto my-3">
		<div class="r d-block mx-auto text-center">
		<small><input type="checkbox" class="mr-1" name=""/>Remember me</small>
		 </div>
		<input type="Submit" style="" value="log in" name="" class="shadow btn text-light bg-dark d-block mx-auto my-3">
		<!-- <small>Forgotten password?</small> -->
	</form>

	</div>
	
</div>

</body>
</html>