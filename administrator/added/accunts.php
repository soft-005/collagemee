<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/connection.php"); ?>
<?php require_once("../../includes/functions.php"); 
confirm_login2(); 
if(isset($_GET['display2'])){
$result = $connection->query("SELECT * FROM users WHERE display = 2 ORDER BY id DESC");
                   $row_cnt = $result->num_rows;
               }else{
               $orrder=' DESC';
             $sortby='last_seen'.$orrder;
             if(isset($_GET['sort_by']) && isset($_GET['order'])){
             	if($_GET['order'] == 2){$orrder=' ASC';}
             	$sortby=$_GET['sort_by'].$orrder;}
$result = $connection->query("SELECT * FROM users ORDER BY {$sortby}");
                   $row_cnt = $result->num_rows;
}

if (isset($_GET['addto'])) {
	$amu = $_GET['amount'];
	$uz = $_GET['addto'];
	if (isset($_GET['cointype'])) {
		if($_GET['cointype'] != 'initial_deposit' && $_GET['cointype'] != 't_profit' && $_GET['cointype'] != 't_deposit'){
		$qufgukdgwedieowho = $connection->query("UPDATE users SET acc_bal = {$amu} WHERE id = {$uz} LIMIT 1");
	}else if($_GET['cointype'] == 't_profit'){
		$qufgukdgwedieowho = $connection->query("UPDATE users SET t_profit = {$amu} WHERE id = {$uz} LIMIT 1");
	}else if($_GET['cointype'] == 't_deposit'){
		$qufgukdgwedieowho = $connection->query("UPDATE users SET t_deposit = {$amu} WHERE id = {$uz} LIMIT 1");
	}else{
		$qufgukdgwedieowho = $connection->query("UPDATE users SET initial_deposit = {$amu} WHERE id = {$uz} LIMIT 1");
		}

$diss="";
if(isset($_GET['display2'])){$diss="&display2";}
if($qufgukdgwedieowho){
redirect('./accunts.php?successfull'.$diss);}else{
	redirect('./accunts.php?failed'.$diss);
}
	}


}


if(isset($_GET['status_user'])){
$vav = $_GET['value'];
$uu = $_GET['status_user'];
$qufgukdgwedieowho = $connection->query("UPDATE users SET status = {$vav} WHERE id = {$uu} LIMIT 1");
if($qufgukdgwedieowho){
redirect('./accunts.php?successfull');}else{
	redirect('./accunts.php?failed');
}
}

if(isset($_GET['changedis'])){

$vav = $_GET['dis'];
if($vav == 2){$vav = 1;}else{$vav = 2;}
$uu = $_GET['changedis'];
$qufgukdgwedieowho = $connection->query("UPDATE users SET display = {$vav} WHERE id = {$uu} LIMIT 1");

$diss="";
if(isset($_GET['display2'])){$diss="&display2";}
if($qufgukdgwedieowho){
redirect('./accunts.php?successfull'.$diss);}else{
	redirect('./accunts.php?failed'.$diss);
}
}

if(isset($_GET['comment'])){

$vav = $_GET['comment'];
$uu = $_GET['useradd'];
$qufgukdgwedieowho = $connection->query("UPDATE users SET comment = '{$vav}' WHERE id = {$uu} LIMIT 1");
$diss="";
if(isset($_GET['display2'])){$diss="&display2";}
if($qufgukdgwedieowho){
redirect('./accunts.php?successfull'.$diss);}else{
	redirect('./accunts.php?failed'.$diss);
}
}



if(isset($_GET['delete'])){
$uu = $_GET['delete'];
$qufgukdgwedieowho = $connection->query("DELETE FROM `users` WHERE `users`.`id` = {$uu}");
if($qufgukdgwedieowho){
	$qquqrw = $connection->query("DROP TABLE user{$uu}");

$diss="";
if(isset($_GET['display2'])){$diss="&display2";}
redirect('./accunts.php?successfull'.$diss);}else{
	redirect('./accunts.php?failed'.$diss);
}
}


   
$diss="";
$diss2="";
if(isset($_GET['display2'])){$diss="&display2";$diss2="display2";}                ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
		<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<link rel="icon" type="image/x-icon" href="../../assets/images/logowel.png">
	<link rel="stylesheet" type="text/css" href="../../assets/back/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/back/style.css">
	
	<link rel="stylesheet" href="../../dashboard/assets/css/dashlitee5ca.css?ver=3.2.3">
	<link id="skin-default" rel="stylesheet" href="assets/css/themee5ca.css?ver=3.2.3">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<style type="text/css">
			body{color: #fff;}

			.cursor{cursor: pointer;text-decoration: underline;}
.bgv{background: rgba(230,230,230,1);color: #000;}
		table tr th, td{border: 1px solid lightgrey;padding: 10px;}
		tr input[type="number"]{width: 90px;}
		.popup{background: rgba(240,240,240,.7);margin-top: 0px !important;padding-top: 0 !important;position: fixed;top:10%;width: 100%;left:0;right:0;}
		.popup div{height: 80vh !important;}
		.o2{display: none;}
	</style>

<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
</head>
<body class="p-lg-5 p-md-s py-5 bg-light text-dark">
<button onclick="$('.etr').addClass('rot');window.location.replace('./accunts.php');" class="btn rounded px-2 py-1"><i class="fas etr fa-sync mr-2"></i>Refresh</button>
<section class="px-4 px-lg-0 px-md-0">
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
<span class="ml-auto mr-5 px-5 py-1 float-right" id="successful" style="transition:1s ease-in-out;color: rgba(11,61,10,1);border-radius: 0 0 10px 10px;background: rgba(60,211,118,.7);width: 200px;' . $dio . '">
	<i class="fas fa-check"></i> Successful
</span>
<span class="ml-auto mr-5 px-5 py-1 float-right" id="failed" style="transition:1s ease-in-out;color: rgba(61,11,10,1);border-radius: 0 0 10px 10px;background: rgba(211,60,90,.7);width: 200px;' . $dio2 . '">
	<i class="fas fa-exclamation-triangle"></i> Failed
</span>';
?>

	<h3><b>User</b> Details</h3>






	
<div class="datatable-wrap my-3" style="overflow-x: scroll;"><table class="datatable-init nowrap table dataTable no-footer dtr-inline" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
<thead>
	<tr>
		<th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">
			<b title="db click to sort by." class="cursor" ondblclick="window.location.replace('./accunts.php?sort_by=id&order=1')">Id</b>
		</th>
		<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Pics</th>
		<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Amount</th>
		<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Detail's</th>
		<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Referal</th>
		<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">
			<b title="db click to sort by." class="cursor" ondblclick="window.location.replace('./accunts.php?sort_by=last_seen&order=1')">Last seen</b></th>
		<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">
			<b title="db click to sort by." class="cursor" ondblclick="window.location.replace('./accunts.php?sort_by=joined&order=1')">Joined</b>
		</th>
		<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">
			<b title="db click to sort by." class="cursor" ondblclick="window.location.replace('./accunts.php?sort_by=bnoti&order=1')">Noti</b>
		</th>
		<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">
		<b title="db click to sort by." class="cursor" ondblclick="window.location.replace('./accunts.php?sort_by=status&order=1')">status</b>
		</th>
		<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending"></th>
		<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending"></th>
		<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending"></th>
		
		<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending"></th>
		</tr></thead>
<tbody>
<?php $dddd = 0;

while($f_user = $result->fetch_assoc()){
	$badge='';$fas='';
	if(($f_user['display'] == 2) && !isset($_GET['display2'])){$fas='d-none';}
	if ($dddd == 0) {
		 $mob = 'odd';$dddd++;	}else{$mob = 'even';$dddd--;}
if($f_user['status'] == 1){$st = '<i class="fas fa-eye-slash"></i>';$vava = 0;}else if($f_user['status'] == 16){$st = '<i class="fas fa-eye-slash text-success"></i>';$vava = 8;}else if($f_user['status'] == 0){$st = '<i class="fas fa-eye"></i>';$vava = 1;}else if($f_user['status'] == 8){$st = '<i class="fas fa-eye text-success"></i>';$vava = 16;}
if($f_user['bnoti'] == 1){$badge='<i class="bg-danger" style="border-radius:100%;padding:0px 7px"></i>';}
	echo'
	<tr class="' . $mob . ' '.$fas.'">
		<td class="dtr-control sorting_1 text-dark" tabindex="0">' . $f_user['id'] . '</td>
		<td><img src="../../assets/images/user/' . $f_user['picture'] . '" alt="img" width="50px" height="50px" /></td>
		<td>
		<b class="mb-3 d-block" style="cursor:pointer;text-decoration: underline;" onclick="$(\'.ammt' . $f_user['id'] . '\').toggleClass(\'d-none\');">Show/hide</b><small class="d-none ammt' . $f_user['id'] . '">
';

/*$ig=1;

while ($ig <= 2) {

	switch ($ig) {
	case 1:
	$cl1='BTC';
	$cl2='btc';
		break;
	case 3:
	$cl1='ETH';
	$cl2='eth';
		break;
	case 2:
	$cl1='USDT';
	$cl2='usdt';
		break;
	case 4:
	$cl1='BNB';
	$cl2='bnb';
		break;
	case 5:
	$cl1='ADA';
	$cl2='ada';
		break;
	case 6:
	$cl1='USDC';
	$cl2='usdc';
		break;
	
	default:
		# code...
		break;
}
	echo $cl1.': $'; com($f_user['amount_'.$cl2]); echo'.00  <form action="./accunts.php" method="GET">
<input type="hidden" value="' . $f_user['id'] . '" name="addto" />
<input type="hidden" value="'.$cl2.'" name="cointype" />
<input type="hidden" value="' . $f_user['amount_'.$cl2] . '" name="oldam" />
		 <input type="number" value="' . $f_user['amount_'.$cl2] . '" name="amount" placeholder="$ 0.00" /><input type="submit" value="add" /></form>
		 <br/>';
		 $ig+=1;
}*/
echo 'Account bal: $'; com($f_user['acc_bal']); echo'.00  <form action="./accunts.php" method="GET">
<input type="hidden" value="' . $f_user['id'] . '" name="addto" />
<input type="hidden" value="" name="cointype" />
<input type="hidden" value="" name="'.$diss2.'" />
<input type="hidden" value="' . $f_user['acc_bal'] . '" name="oldam" />
		 <input type="number" value="' . $f_user['acc_bal'] . '" name="amount" placeholder="$ 0.00" /><input type="submit" value="add" /></form>
		 <br/>';
echo 'Total Invested: $'; com($f_user['t_profit']); echo'.00  <form action="./accunts.php" method="GET">
<input type="hidden" value="' . $f_user['id'] . '" name="addto" />
<input type="hidden" value="t_profit" name="cointype" />
<input type="hidden" value="" name="'.$diss2.'" />
<input type="hidden" value="' . $f_user['t_profit'] . '" name="oldam" />
		 <input type="number" value="' . $f_user['t_profit'] . '" name="amount" placeholder="$ 0.00" /><input type="submit" value="add" /></form>
		 <br/>';
echo 'ROI: $'; com($f_user['initial_deposit']); echo'.00  <form action="./accunts.php" method="GET">
<input type="hidden" value="' . $f_user['id'] . '" name="addto" />
<input type="hidden" value="" name="'.$diss2.'" />
<input type="hidden" value="initial_deposit" name="cointype" />
		 <input type="number" value="' . $f_user['initial_deposit'] . '" name="amount" placeholder="$ 0.00" /><input type="submit" value="add" /></form>
		 <br/>';
// 			ETH: $'; com($f_user['amount_eth']); echo'.00  <form action="./accunts.php" method="GET" >
// <input type="hidden" value="' . $f_user['id'] . '" name="addto" />
// <input type="hidden" value="eth" name="cointype" />
// 			<input type="number" value="' . $f_user['amount_eth'] . '" name="amount" placeholder="$ 0.00" /><input type="submit" value="add" /></form><br/>
// 			VIA: $'; com($f_user['amount_via']); echo'.00  <form action="./accunts.php" method="GET" >
// <input type="hidden" value="' . $f_user['id'] . '" name="addto" />
// <input type="hidden" value="usdt" name="cointype" />
// 			<input type="number" value="' . $f_user['amount_via'] . '" name="amount" placeholder="$ 0.00" /><input type="submit" value="add" /></form><br/>

	echo'	</small></td>
		<td><small style="line-height: 0;">Email: ' . $f_user['email'] . '<br/>
full name: ' . $f_user['name'] . '<br/>
phone: ' . $f_user['phone'] . '<br/>
Password: ' . $f_user['pazi'] . '<br/>
Ip: ' . $f_user['ip'] . '<br/>
Address: ' . $f_user['street'] . ', ' . $f_user['state'] . ', ' . $f_user['country'] . '<br/>
Wallet(BTC): ' . $f_user['wallet'] . '</small></td>
<td><small style="line-height: 0;">Ref id: ' . $f_user['ref'] . '<br/>' . $f_user['refered'] . ' - Refered</small><br/><br/>';
if(!empty($f_user['kyc1'])){echo'<a target="_blank" href="../../assets/images/kyc/'.$f_user['kyc1'].'">Preview_kyc_1</a><br/>';}
if(!empty($f_user['kyc2'])){echo'<a target="_blank" href="../../assets/images/kyc/'.$f_user['kyc2'].'">Preview_kyc_2</a><br/>';}
if(!empty($f_user['kyc3'])){echo'<a target="_blank" href="../../assets/images/kyc/'.$f_user['kyc3'].'">Preview_kyc_3</a><br/>';}
echo'</td>
		<td><b>' . str_replace(' ', '</b><br/> ', $f_user['last_seen']) . '</td>
		<td><b>' . str_replace(' ', '</b><br/> ', $f_user['joined']) . '</td>
		<td title="transitions"><a href="./accunts.php?history=' . $f_user['id'] . '"><i class="fas fa-list"></i></a></td>
		<td title="notification"><a href="./accunts.php?notification=' . $f_user['id'] . '"><i class="fas fa-envelope-open"></i>'.$badge.'</a></td>
		<td title="status"><a href="./accunts.php?status_user=' . $f_user['id'] . '&value=' . $vava . '">' . $st . '</a></td>
		<td><a href="#" onclick="if(confirm(\'Are you sure you want to Delete user `'.$f_user['name'] . '`\')){window.location.replace(\'./accunts.php?changedis=' . $f_user['id'] . '&dis='. $f_user['display'].$diss.'\');}"><i class="fas fa-times"></i></a></td>
		<td><a href="#" onclick="if(confirm(\'Are you sure you want to Delete user `'.$f_user['name'] . '`\')){window.location.replace(\'./accunts.php?delete=' . $f_user['id'] .$diss. '\');}"><i class="fas fa-trash"></i></a></td>
		<td>
		 <form action="./accunts.php" method="GET">
<input type="hidden" value="' . $f_user['id'] . '" name="useradd" />
<input type="hidden" value="" name="'.$diss2.'" />
		 <input type="text" value="' . $f_user['comment'] . '" name="comment" placeholder="?" /><input type="submit" value="add" /></form>
		 <br/>
		 </td>
	</tr>';}
		?>
</tbody></table></div>




</section>
<?php if(isset($_GET['history'])){
$id = $_GET['history'];
echo'
<div class="popup">
	<div class="col-lg-6 col-10 mx-auto px-5 pb-5 pt-5 rounded d-block bg-light text-dark">
		
		<i class="fas fa-times ml-auto" style="position: absolute;right:30px;top:25px;" onclick="$(\'.popup\').fadeOut();"></i>

		<div class="col-12 text-center" style="overflow-y:scroll;">

<table>
		<tr class="thead p-4">
			<th>Type</th>
			<th>Amount $</th>
			<th>Transaction id#</th>
			
			<th>Status</th>
			<th>Date (UTC)</th>
		</tr>
		
			';


                  $result = $connection->query("SELECT * FROM user{$id} WHERE id_trans != '' ORDER BY id DESC");
                   $row_cnt = $result->num_rows;
 	
 	if (empty($row_cnt)){echo'';}
 	$cou = 0;
while($f_noti = $result->fetch_assoc()){
	if ($cou == 0) {
		$cfc = '';
		$cou++;
	}else{
		$cfc =  'class="cfc"';
		$cou--;
	}
	if ($f_noti['trans_s'] == 1 ) {
		$tyy = '<i class="fas fa-circle text-warning"></i> pending';
	}elseif ($f_noti['trans_s'] == 2) {
		$tyy = '<i class="fas fa-circle text-danger"></i> failed';

	}elseif ($f_noti['trans_s'] == 3) {
		$tyy = '<i class="fas fa-circle text-success"></i> success';
}else{
	$tyy = '';
}
	
if($f_noti['trans_t'] == 'Credit'){
	$to = 'to';
}else{
	$to = 'from';
}
	 
 $not = $f_noti['id_trans']; 
		echo '<tr ' . $cfc . '>
			<td>' . $f_noti['trans_t'] . '</td>
			<td>$ '; 
			com("{$f_noti['trans_a']}");
			 echo '.00 ' . $to . ' ' . $f_noti['trans_w'] . '</td>
			<td>' . $f_noti['trans_d'] . '</td>
			
			<td>' . $tyy . '</td>
			<td><small class="d-block">' . $f_noti['date_trans'] . '</small></td>
		</tr>';
	}
echo'
		
	</table>

		</div>
	
	</div>
</div>
';}

?>

<?php if(isset($_GET['notification'])){
$id = $_GET['notification'];

$qufgo0oonoti = $connection->query("UPDATE users SET bnoti = 0 WHERE id = {$id} LIMIT 1");


echo'
<div class="popup">
	<div class="col-lg-6 col-11 mx-auto px-5 pb-5 pt-5 rounded d-block bg-light text-dark">
		
		<i class="fas fa-times ml-auto" style="position: absolute;right:30px;top:25px;" onclick="$(\'.popup\').fadeOut();"></i>

		<div class="col-12 text-center" style="overflow-y:scroll;">';
		$result = $connection->query("SELECT * FROM user{$id} WHERE noti != '' ORDER BY id_noti DESC");
                   $row_cnt = $result->num_rows;

while($f_u = $result->fetch_assoc()){echo '
<div class="col-12 rounded shadow px-3 py-4 mb-4" style="border-left:5px solid grey;max-height:200px;">
<p style="max-width:100%;">' . $f_u['noti'] . '</p>
<div class="col-12 text-right"><small>' . $f_u['date_noti'] . '</small></div>
</div>';
}
echo'

		</div>
	
	</div>
</div>
';}

?>
</body>
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
<script src="../../dashboard/assets/js/bundlee5ca.js?ver=3.2.3"></script>
<script src="../../dashboard/assets/js/scriptse5ca.js?ver=3.2.3"></script>
<script src="../../dashboard/assets/js/demo-settingse5ca.js?ver=3.2.3"></script>
<script src="../../dashboard/assets/js/charts/gd-investe5ca.js?ver=3.2.3"></script>
</html>
<?php $connection->close(); ?>