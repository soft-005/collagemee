<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/connection.php"); ?>
<?php require_once("../../includes/functions.php"); 
confirm_login2();
$from = '';
$message='';
include('../../includes/email.php');
if (isset($_GET['to'])) {
	$alo=0;
	$suc=0;
	$subject = $_GET['subject'];
	
$message = str_replace('
', '<br/>', $_GET['message']);
$to=[];
$to=array_map('trim', explode(',',$_GET['to']));
$alo=count($to);


include('../../includes/email.php');
if(isset($_GET['from'])){$from = $_GET['from'];}
	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
	// Create email headers
	$headers .= 'From: '.$from."\r\n".
		'Reply-To: '.$from."\r\n" .
		'X-Mailer: PHP/' . phpversion();
for($i=0;$i<$alo;$i++){			

			if(mail($to[$i], $subject, $messagei, $headers)){
			$suc+=1;
		}
}

if($suc >= 1){
	redirect('./mailer.php?success&success_qty='.$suc.'_of_'.$alo);
}
redirect('./mailer.php?failed');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		input, button,textarea{padding: 12px 20px;width: 280px;display: block;margin-bottom:20px;}
		body{padding: 100px;color: #fff;}
		@media (max-width: 800px){
			body{padding: 100px 40px;}
		}
	</style>
</head>
<body class="bg-light text-dark">
	<h2 class="my-5">Mailer <?php if(isset($_GET['success_qty'])){echo' / result:- '.$_GET['success_qty'];} ?></h2>
<form action="./mailer.php?email" method="GET" class="p-5">

	<div class="col-12">
	<select class="d-block">
		<option value="">View Email From Users.</option>
	<?php
$result = $connection->query("SELECT email, id FROM users ORDER BY id DESC");
while($f_user = $result->fetch_assoc()){echo'
<option value="'.$f_user['email'].'" onclick="document.getElementById(\'receive\').value = \''.$f_user['email'].'\';">'.$f_user['id'].' - '.$f_user['email'].'</option>';}
	 ?></select><br/><br/>
	 <input type="text" value="<?php echo $from; ?>" id="send" placeholder="Company email address" class="mt-4 d-block" name="from" /><br/><br/>
	 <input type="text" value="" id="receive" placeholder="Receiver email address" class="mt-4 d-block" name="to" />
	</div>
	<input type="text" placeholder="subject" name="subject">
	<textarea cols="10" rows="10" name="message" placeholder="Message"></textarea>
	<button>Send mail</button>
</form>	

<div class="col-12" style="position: fixed;left:20px;top:0px;">
<?php 
if (isset($_GET['successfull'])) {
	# code...
$dio = 'display: block;';
} else {
$dio = 'display: none;';
} 
if (isset($_GET['failed'])) {
	# code...
	$dio2 = 'display: block;';
} else {
$dio2 = 'display: none;';
} 
echo '
<div style="float:right">
<span class="ml-auto mr-5 px-5 py-1 float-right" id="successful" style="transition:1s ease-in-out;color: rgba(11,61,10,1);border-radius: 0 0 10px 10px;background: rgba(60,211,118,.7);width: 200px;' . $dio . '">
	<i class="fas fa-check"></i> Successful
</span>
<span class="ml-auto mr-5 px-5 py-1 float-right" id="failed" style="transition:1s ease-in-out;color: rgba(61,11,10,1);border-radius: 0 0 10px 10px;background: rgba(211,60,90,.7);width: 200px;' . $dio2 . '">
	<i class="fas fa-exclamation-triangle"></i> Failed
</span></div>';
?>
</div>

<script type="text/javascript">
	   
setInterval(function (){
    if (document.getElementById('successful').style.display == 'block') {
        setTimeout(function (){
            document.getElementById('successful').style.display = 'none';
        }, 3000);
    }
    if (document.getElementById('failed').style.display == 'block') {
        setTimeout(function (){
            document.getElementById('failed').style.display = 'none';
        }, 3000);
    }
}, 1000);
</script>
</body>
</html>

<?php $connection->close(); ?>