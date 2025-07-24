<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/connection.php"); ?>
<?php require_once("../../includes/functions.php"); 
confirm_login2();


$userz = 1;


$quersite_data = "SELECT * FROM site_main WHERE id = 1";
$resulsite_data = $connection->real_query($quersite_data);
while ($ressite_data = $connection->use_result()){
$site_data = $ressite_data->fetch_assoc();}

$querdata_days = "SELECT * FROM data_days ORDER BY id DESC";
$resuldata_days = $connection->real_query($querdata_days);
while ($resdata_days = $connection->use_result()){
$data_days = $resdata_days->fetch_assoc();}


$querusers = $connection->query("SELECT id FROM users WHERE ref != '' ORDER BY id DESC");
 $users = $querusers->num_rows;



if(isset($_GET['delete_deposit'])){
$uu = $_GET['delete_deposit'];
$qufgukdgwedieowho = $connection->query("DELETE FROM `deposit` WHERE id = {$uu}");
if($qufgukdgwedieowho){
redirect('./home.php?successfull');}else{
	redirect('./home.php?failed');
}
}

if(isset($_GET['delete_coupon'])){
$uu = $_GET['delete_coupon'];
$qufgukdgwedieowho = $connection->query("DELETE FROM `coupon` WHERE id = {$uu}");
if($qufgukdgwedieowho){
redirect('./home.php?successfull#coupon');}else{
	redirect('./home.php?failed#coupon');
}
}


if(isset($_GET['delete_tried'])){
$uu = $_GET['delete_tried'];
$qufgukdgwedieowho = $connection->query("DELETE FROM `pro_click` WHERE id = {$uu}");
if($qufgukdgwedieowho){
redirect('./home.php?successfull#pro_click');}else{
	redirect('./home.php?failed#pro_click');
}
}

if(isset($_GET['cupo'])){
$code = $_GET['cupo'];
$off = $_GET['off'];
$qufgukdgwedieowho = $connection->query("INSERT INTO coupon (off, code) VALUES ({$off}, '{$code}')");
if($qufgukdgwedieowho){
redirect('./home.php?successfull#coupon');}else{
	redirect('./home.php?failed#coupon');
}

}


   
$diss="";
$diss2="";
if(isset($_GET['display2'])){$diss="&display2";$diss2="display2";}
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title></title>
		<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<link rel="icon" type="image/x-icon" href="../../assets/images/logowel.png">
	<link rel="stylesheet" type="text/css" href="../../assets/back/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/back/style.css">
	<link rel="stylesheet" type="text/css" href="../../assets/back/admin.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<style type="text/css">

body{color: #000;}
		table tr th, td{border: 1px solid lightgrey;padding: 10px;}
		input[type="file"]{
			opacity: 0;
   position: absolute;
   z-index: -1;}
.rot{transition: .1s;animation: re .8s linear .1s infinite;}

		.popup{background: rgba(240,240,240,.7);}
		.o2{display: none;}
strong{cursor: pointer;}
@keyframes re{
	0%{transform: rotate(0deg);}
	100%{transform: rotate(360deg);}
}

	</style>
<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
</head>

<body class="bg-light text-dark">
	<section class="row m-0 p-0">



		<div class="col-10 mx-auto my-5">
			<?php $result = $connection->query("SELECT * FROM deposit ORDER BY id DESC");
                   $row_cnt = $result->num_rows;
                   ?>
<strong  onclick="$('.ext').toggleClass('d-block');" class="col-12" style="border-bottom: 2px solid black;padding-bottom: 4px;">extimated deposit (<?php echo $row_cnt; ?>)
</strong>
<div style="overflow-x: scroll;display: none;" class="ext">
<table>
	<tr>
		<th>Id</th>
		<th>user Id</th>
		<th>Email/Phone</th>
		<th style="min-width: 100px">$-amount</th>
		<th>Date</th>
	</tr>
	<?php

while($f_deposit = $result->fetch_assoc()){
	$queryzkk = "SELECT display FROM users WHERE id = {$f_deposit['user_id']} LIMIT 1";
$resultfkk = $connection->real_query($queryzkk);
  while ($reaskk = $connection->use_result()){
$found_ud = $reaskk->fetch_assoc();}

	if($found_ud['display'] != 2){echo '
	<tr>
	<td>' . $f_deposit['id'] . '</td>
		<td>' . $f_deposit['user_id'] . '</td>
		<td>' . $f_deposit['detail'] . '</td>
		<td>$'; com($f_deposit['amount']); echo'</td>
		<td><b>' . str_replace(' ', '</b><br/> ', $f_deposit['created']) . '</td>
		<td><b>' . str_replace(' ', '</b><br/> ', $f_deposit['created']) . '</td>
		<td>';
		if(($f_deposit['status'] < 1) || empty($f_deposit['status'])){echo'<a href="#" onclick="if(confirm(\'Please Confirm action to continue\')){window.location.replace(\'../../includes/crud.php?c=23245567878675645342533&iid=' . $f_deposit['id'] . '&t=' . $f_deposit['type'] . '&i=' . $f_deposit['user_id'] . '&coin=' . $f_deposit['coin'] . '&id=' . $f_deposit['id_trans'] . '&s=3&amount=' . $f_deposit['amount'] . '&type=deposit/withdraw\');}" class="text-success"><i class="fas fa-check-circle"></i>approve</a><a href="#" onclick="if(confirm(\'Please Confirm action to continue\')){window.location.replace(\'../../includes/crud.php?c=23245567878675645342533&iid=' . $f_deposit['id'] . '&t=' . $f_deposit['type'] . '&i=' . $f_deposit['user_id'] . '&coin=' . $f_deposit['coin'] . '&id=' . $f_deposit['id_trans'] . '&s=2&amount=' . $f_deposit['amount'] . '&type=deposit/withdraw\');}" class="ml-2 text-danger"><i class="fas fa-times-circle mr-1"></i>Reject</a>';}elseif($f_deposit['status'] == 1){echo '<span style="color:lightgrey;"><i class="fas fa-check-circle"></i>approved</span>';}elseif($f_deposit['status'] == 2){echo '<span style="color:lightgrey;"><i class="fas fa-times-circle"></i>Denied</span>';} echo'</td>
		<td><a href="#" onclick="if(confirm(\'please confirm DELETE of transaction id: ' . $f_deposit['id'] . '\')){window.location.replace(\'./home.php?delete_deposit=' . $f_deposit['id'] . '\');}"><i class="fas fa-trash"></i></a></td>
	</tr>';}else if(isset($_GET['display2'])){echo '
	<tr>
	<td>' . $f_deposit['id'] . '</td>
		<td>' . $f_deposit['user_id'] . '</td>
		<td>' . $f_deposit['detail'] . '</td>
		<td>$'; com($f_deposit['amount']); echo'</td>
		<td><b>' . str_replace(' ', '</b><br/> ', $f_deposit['created']) . '</td>
		<td>';
		if(($f_deposit['status'] < 1) || empty($f_deposit['status'])){echo'<a href="#" onclick="if(confirm(\'Please Confirm action to continue\')){window.location.replace(\'../../includes/crud.php?c=23245567878675645342533&iid=' . $f_deposit['id'] . '&t=' . $f_deposit['type'] . '&i=' . $f_deposit['user_id'] . '&coin=' . $f_deposit['coin'] . '&id=' . $f_deposit['id_trans'] . '&s=3&amount=' . $f_deposit['amount'] . '&type=deposit/withdraw\');}" class="text-success"><i class="fas fa-check-circle"></i>approve</a><a href="#" onclick="if(confirm(\'Please Confirm action to continue\')){window.location.replace(\'../../includes/crud.php?c=23245567878675645342533&iid=' . $f_deposit['id'] . '&t=' . $f_deposit['type'] . '&i=' . $f_deposit['user_id'] . '&coin=' . $f_deposit['coin'] . '&id=' . $f_deposit['id_trans'] . '&s=2&amount=' . $f_deposit['amount'] . '&type=deposit/withdraw\');}" class="ml-2 text-danger"><i class="fas fa-times-circle mr-1"></i>Reject</a>';}elseif($f_deposit['status'] == 1){echo '<span style="color:lightgrey;"><i class="fas fa-check-circle"></i>approved</span>';}elseif($f_deposit['status'] == 2){echo '<span style="color:lightgrey;"><i class="fas fa-times-circle"></i>Denied</span>';} echo'</td>
		<td><a href="#" onclick="if(confirm(\'please confirm DELETE of transaction id: ' . $f_deposit['id'] . '\')){window.location.replace(\'./home.php?delete_deposit=' . $f_deposit['id'] . '\');}"><i class="fas fa-trash"></i></a></td>
	</tr>';

	}} ?>
</table>
</div>


</div>








		<div id="pro_click" class="col-10 mx-auto my-5">
				<?php $result = $connection->query("SELECT * FROM pro_click ORDER BY id DESC");
                   $row_cnt = $result->num_rows; ?>
<strong  onclick="$('.fxt').toggleClass('d-block');" class="col-12" style="border-bottom: 2px solid black;padding-bottom: 4px;">proceeded deposit (<?php echo $row_cnt; ?>)
</strong>
<div style="overflow-x: scroll;display: none" class="fxt">
<table>
	<tr>
		<th>Id</th>
		<th>user Id</th>
		<th>Email/Phone</th>
		<th style="min-width: 100px">$-amount</th>
		<th style="min-width: 100px">Proof.</th>
		<th>Date</th>
	</tr>
<?php

while($f_deposit = $result->fetch_assoc()){
	$queryzkk2 = "SELECT display FROM users WHERE id = {$f_deposit['user_id']} LIMIT 1";
$resultfkk2 = $connection->real_query($queryzkk2);
  while ($reaskk2 = $connection->use_result()){
$found_ud2 = $reaskk2->fetch_assoc();}

	if($found_ud2['display'] != 2){echo '
	<tr>
	<td>' . $f_deposit['id'] . '</td>
		<td>' . $f_deposit['user_id'] . '</td>
		<td>' . $f_deposit['email'] . '</td>
		<td>$'; com($f_deposit['amount']); echo'</td>
		<td><a target="_blank" href="../../assets/images/pay/' . $f_deposit['iproof'] . '">Preview</a></td>
		<td><b>' . str_replace(' ', '</b><br/> ', $f_deposit['created']) . '</td>
		<td><a href="#" onclick="if(confirm(\'please confirm DELETE of tried id: ' . $f_deposit['id'] . '\')){window.location.replace(\'./home.php?delete_tried=' . $f_deposit['id'] . '\');}"><i class="fas fa-trash"></i></a></td>
	</tr>';}else if(isset($_GET['display2'])){
echo '
	<tr>
	<td>' . $f_deposit['id'] . '</td>
		<td>' . $f_deposit['user_id'] . '</td>
		<td>' . $f_deposit['email'] . '</td>
		<td>$'; com($f_deposit['amount']); echo'</td>
		<td><b>' . str_replace(' ', '</b><br/> ', $f_deposit['created']) . '</td>
		<td><a href="#" onclick="if(confirm(\'please confirm DELETE of tried id: ' . $f_deposit['id'] . '\')){window.location.replace(\'./home.php?delete_tried=' . $f_deposit['id'] . '\');}"><i class="fas fa-trash"></i></a></td>
	</tr>';
	}} ?>
</table>
</div>


</div>

<div id="images" class="col-10 mx-auto my-5 d-none">
<strong  onclick="$('.fxtim').toggleClass('d-block');" class="col-12" style="border-bottom: 2px solid black;padding-bottom: 4px;">images
</strong>
<div style="overflow-x: scroll;display: none" class="fxtim">

<iframe style="width:80vw;height:250px;" src="../../assets/images/"></iframe>
</div></div>


		<div class="col-10 row px-0 d-none mx-auto my-5">
			<div class="col-lg-5">
<strong class="col-12" onclick="$('.chart').toggleClass('d-none');" style="border-bottom: 2px solid black;padding-bottom: 4px;">traffic
</strong>
<h3><b>Today's</b> Data</h3>
<ul><?php echo'
	<li>' . $data_days['ips'] . ' -index page</li>
	<li>' . $data_days['sessions'] . ' -user page</li>
	<li>' . $site_data['depoc'] . ' -tried deposit page</li>
	'; ?>
</ul>
</div>

	<div class="col-lg-7 col-md-7 col-sm-10 col-xs-10 ml-auto my-5 p-0 row chart">
<span class="v-text">
	<h4 class="text-muted">Visitors + online users</h4>
</span>


<script>
	var dispal, calc_rem, opdddd;
	opdddd = <?php echo $site_data['chart_setting']; ?>;
if ((opdddd == null) || (opdddd == 0) || (opdddd == NaN) || (opdddd == '')) {dispal = 1000;} else {dispal = opdddd;}
	
	if (dispal === 500) {
	document.write('<ul class="col-3 text-right py-0 amounn"><li>500</li>			<li>475</li>			<li>450</li>			<li>425</li>			<li>400</li>			<li>375</li>			<li>350</li>			<li>325</li>			<li>300</li>			<li>275</li>			<li>250</li>			<li>225</li>			<li>200</li>			<li>175</li>			<li>150</li>			<li>125</li>			<li>100</li>			<li>75</li>			<li>50</li>			<li>25</li>			<li>0</li>		</ul>'); calc_rem = .0238 * 2;}
	if (dispal === 1000) {
	document.write('<ul class="col-3 text-right py-0 amounn"><li>1,000</li>			<li>950</li>			<li>900</li>			<li>850</li>			<li>800</li>			<li>750</li>			<li>700</li>			<li>650</li>			<li>600</li>			<li>550</li>			<li>500</li>			<li>450</li>			<li>400</li>			<li>350</li>			<li>300</li>			<li>250</li>			<li>200</li>			<li>150</li>			<li>100</li>			<li>50</li>			<li>0</li>		</ul>'); calc_rem = .0238;}
	if (dispal === 2000) {
	document.write('<ul class="col-3 text-right py-0 amounn"><li>2,000</li>			<li>1900</li>			<li>1800</li>			<li>1700</li>			<li>1600</li>			<li>1500</li>			<li>1400</li>			<li>1300</li>			<li>1200</li>			<li>1100</li>			<li>1000</li>			<li>900</li>			<li>800</li>			<li>700</li>			<li>600</li>			<li>500</li>			<li>400</li>			<li>300</li>			<li>200</li>			<li>100</li>			<li>0</li>		</ul>'); calc_rem = .0238 / 2;}
	if (dispal === 3000) {
	document.write('<ul class="col-3 text-right py-0 amounn"><li>3,000</li>			<li>2850</li>			<li>2700</li>			<li>2550</li>			<li>2400</li>			<li>2250</li>			<li>2100</li>			<li>1950</li>			<li>1800</li>			<li>1650</li>			<li>1500</li>			<li>1350</li>			<li>1200</li>			<li>1050</li>			<li>900</li>			<li>750</li>			<li>600</li>			<li>450</li>			<li>300</li>			<li>150</li>			<li>0</li>		</ul>'); calc_rem = .0238 / 3;}
	
	if (dispal === 5000) {
	document.write('<ul class="col-3 text-right py-0 amounn"><li>5,000</li>			<li>4750</li>			<li>4500</li>			<li>4250</li>			<li>4000</li>			<li>3750</li>			<li>3500</li>			<li>3250</li>			<li>3000</li>			<li>2750</li>			<li>2500</li>			<li>2250</li>			<li>2000</li>			<li>1750</li>			<li>1500</li>			<li>1250</li>			<li>1000</li>			<li>750</li>			<li>500</li>			<li>250</li>			<li>0</li>		</ul>'); calc_rem = .0238 / 5;}

if (dispal === 7000) {
	document.write('<ul class="col-3 text-right py-0 amounn"><li>7,000</li>			<li>6650</li>			<li>6300</li>			<li>5950</li>			<li>5600</li>			<li>5250</li>			<li>4900</li>			<li>4550</li>			<li>4200</li>			<li>3850</li>			<li>3500</li>			<li>3150</li>			<li>2800</li>			<li>2450</li>			<li>2100</li>			<li>1750</li>			<li>1400</li>			<li>1050</li>			<li>700</li>			<li>350</li>			<li>0</li>		</ul>'); calc_rem = .0238 / 7;}
if (dispal === 10000) {
	document.write('<ul class="col-3 text-right py-0 amounn"><li>10,000</li>			<li>9500</li>			<li>9000</li>			<li>8500</li>			<li>8000</li>			<li>7500</li>			<li>7000</li>			<li>6500</li>			<li>6000</li>			<li>5500</li>			<li>5000</li>			<li>4500</li>			<li>4000</li>			<li>3500</li>			<li>3000</li>			<li>2500</li>			<li>2000</li>			<li>1500</li>			<li>1000</li>			<li>500</li>			<li>0</li>		</ul>'); calc_rem = .0238 / 10;}

<?php


$yty1 = $data_days['id'] - 1;
$querdata_days1 = "SELECT * FROM data_days WHERE id = {$yty1} LIMIT 1";
$resuldata_days1 = $connection->real_query($querdata_days1);
while ($resdata_days1 = $connection->use_result()){
$data_days1 = $resdata_days1->fetch_assoc();}
$doont1 = $data_days1['sessions'] + $data_days1['ips'];


$yty2 = $data_days['id'] - 2;
$querdata_days2 = "SELECT * FROM data_days WHERE id = {$yty2} LIMIT 1";
$resuldata_days2 = $connection->real_query($querdata_days2);
while ($resdata_days2 = $connection->use_result()){
$data_days2 = $resdata_days2->fetch_assoc();}
$doont2 = $data_days2['sessions'] + $data_days2['ips'];


$yty3 = $data_days['id'] - 3;
$querdata_days3 = "SELECT * FROM data_days WHERE id = {$yty3} LIMIT 1";
$resuldata_days3 = $connection->real_query($querdata_days3);
while ($resdata_days3 = $connection->use_result()){
$data_days3 = $resdata_days3->fetch_assoc();}
$doont3 = $data_days3['sessions'] + $data_days3['ips'];


$yty4 = $data_days['id'] - 4;
$querdata_days4 = "SELECT * FROM data_days WHERE id = {$yty4} LIMIT 1";
$resuldata_days4 = $connection->real_query($querdata_days4);
while ($resdata_days4 = $connection->use_result()){
$data_days4 = $resdata_days4->fetch_assoc();}
$doont4 = $data_days4['sessions'] + $data_days4['ips'];


$yty5 = $data_days['id'] - 5;
$querdata_days5 = "SELECT * FROM data_days WHERE id = {$yty5} LIMIT 1";
$resuldata_days5 = $connection->real_query($querdata_days5);
while ($resdata_days5 = $connection->use_result()){
$data_days5 = $resdata_days5->fetch_assoc();}
$doont5 = $data_days5['sessions'] + $data_days5['ips'];


$yty6 = $data_days['id'] - 6;
$querdata_days6 = "SELECT * FROM data_days WHERE id = {$yty6} LIMIT 1";
$resuldata_days6 = $connection->real_query($querdata_days6);
while ($resdata_days6 = $connection->use_result()){
$data_days6 = $resdata_days6->fetch_assoc();}
$doont6 = $data_days6['sessions'] + $data_days6['ips'];





$doont = $data_days['sessions'] + $data_days['ips'];

echo "

document.write('<div class=\"col-9 inn p-0\" >				<ul class=\"p-0 m-0\">			<li style=\"left:0%;height: calc(" . $doont6 . " * ' + calc_rem + 'rem);\">                               <span class=\"percent\"> <span title=\"no of Visitors\">" . $doont6 . "</span> </span></li>			<li style=\"left:14%;height: calc(" . $doont5 . " * ' + calc_rem + 'rem)\;\">                               <span class=\"percent\"> <span title=\"no of Visitors\">" . $doont5 . "</span> </span></li>			<li style=\"left:28%;height: calc(" . $doont4 . " * ' + calc_rem + 'rem);\">                               <span class=\"percent\"> <span title=\"no of Visitors\">" . $doont4 . "</span> </span></li>			<li style=\"left:42%;height: calc(" . $doont3 . " * ' + calc_rem + 'rem);\">                              <span class=\"percent\"> <span title=\"no of Visitors\">" . $doont3 . "</span> </span></li>			<li style=\"left:56%;height: calc(" . $doont2 . " * ' + calc_rem + 'rem);\">                               <span class=\"percent\"> <span title=\"no of Visitors\">" . $doont2 . "</span> </span></li>			<li style=\"left:70%;height: calc(" . $doont1 . " * ' + calc_rem + 'rem);\">                               <span class=\"percent\"> <span title=\"no of Visitors\">" . $doont1 . "</span> </span></li>			<li style=\"left:84%;height: calc(" . $doont . " * ' + calc_rem + 'rem);\">                               <span class=\"percent\"> <span title=\"no of Visitors\">" . $doont . "</span> </span></li>		</ul>	</div>');
";


?>




</script>
		

		

		<ul class="col-12 float-right days ml-auto text-right">

			<?php 
		$usee = 0;
    
function mno($mno){
if($mno == 1){$mont = 'Jan';} elseif($mno == 2){$mont = 'Feb';} elseif($mno == 3){$mont = 'Mar';} elseif($mno == 4){$mont = 'Apr';} elseif($mno == 5){$mont = 'May';} elseif($mno == 6){$mont = 'Jun';} elseif($mno == 7){$mont = 'Jul';} elseif($mno == 8){$mont = 'Aug';} elseif($mno == 9){$mont = 'Sep';} elseif($mno == 10){$mont = 'Oct';} elseif($mno == 11){$mont = 'Nov';} elseif($mno == 12){$mont = 'Dec';}
return $mont;
}
for ($usee; $usee <= 6; $usee++) {
$yty62 = ($data_days['id'] - 6) + ($usee);
$querdata_days62 = "SELECT * FROM data_days WHERE id = {$yty62} LIMIT 1";
$resuldata_days62 = $connection->real_query($querdata_days62);
while ($resdata_days62 = $connection->use_result()){
$data_days62 = $resdata_days62->fetch_assoc();}
 $arr = [];
$arr = $data_days62['dated'];

	if ($usee < 6) {
    $mftttg = $arr['5'] . $arr['6'];
		$dtt =  mno($mftttg) . ' ' . ((($arr['8'] . $arr['9']) + 0));
	}elseif ($usee == 6) {
		$dtt = 'Today';
	}
	echo '<li class="mr-1">'. $dtt . '</li>';
		}
?>
		</ul>
<h5 class="text-muted mx-auto mt-2">Traffic Monitor</h5><small class="mt-3"><a href="#" style="text-decoration: underline;"  onclick="$('.lg-chart').removeClass('d-none');" class="text-muted"><i class="fas fa-history mr-1"></i> Load More</a>

<div class="col-12 text-right modifi">
	<button> Modify <i class="fas fa-chevron-down ml-2"></i></button>
	<ul>
		<li><a href="../CRUD/send.php?content=2&chart=500">500</a></li>
		<li><a href="../CRUD/send.php?content=2&chart=1000">1,000</a></li>
		<li><a href="../CRUD/send.php?content=2&chart=2000">2,000</a></li>
		<li><a href="../CRUD/send.php?content=2&chart=3000">3,000</a></li>
		<li><a href="../CRUD/send.php?content=2&chart=5000">5,000</a></li>
		<li><a href="../CRUD/send.php?content=2&chart=7000">7,000</a></li>
		<li><a href="../CRUD/send.php?content=2&chart=10000">10,000</a></li>
	</ul>
</div>
</small>
	</div>
</div>

		<div id="message" class="col-10 mx-auto my-5">
			<?php $result = $connection->query("SELECT * FROM messages ORDER BY id DESC");
                   $row_cnt = $result->num_rows;
?>
<strong  onclick="$('.msg').toggleClass('d-block');" class="col-12" style="border-bottom: 2px solid black;padding-bottom: 4px;">messages (<?php echo $row_cnt; ?>)
</strong>
<div style="overflow-x: scroll;display: none;" class="msg">
<table>
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Email</th>
		<th style="min-width: 200px">Subject</th>
		<th style="min-width: 400px">Message</th>
		<th>Date</th>
	</tr>
	<?php
while($f_messages = $result->fetch_assoc()){echo '
	<tr>
		<td>' . $f_messages['id'] . '</td>
		<td>' . $f_messages['name'] . '</td>
		<td>' . $f_messages['email'] . '</td>
		<td>' . $f_messages['subject'] . '</td>
		<td>' . $f_messages['message'] . '</td>
		<td>' . $f_messages['created'] . '</td>
		<td><a href="../../includes/crud.php?c=2836784578352847&id=' . $f_messages['id'] . '"><i class="fas fa-trash"></i></a></td>
	</tr>'; }?>
</table>
</div>
</div>


	<div id="coupon" class="col-10 mx-auto my-5 d-none">
		<?php 
$result = $connection->query("SELECT * FROM coupon ORDER BY id DESC");
                   $row_cnt = $result->num_rows;
		?>
<strong  onclick="$('.cop').toggleClass('d-block');" class="col-12" style="border-bottom: 2px solid black;padding-bottom: 4px;">Coupon/promo code (<?php echo $row_cnt; ?>)
</strong>
<div class="cop" style="overflow-x: scroll;display: none;">
<table>
	<tr>
		<th>Id</th>
		<th>Code</th>
		<th style="min-width: 100px">+bouns</th>
		<th>Created</th>
	</tr>
	<?php 

while($f_coupon = $result->fetch_assoc()){
	echo '<tr>
		<td>' . $f_coupon['id'] . '</td>
		<td>' . $f_coupon['code'] . '</td>
		<td>' . $f_coupon['off'] . '</td>
		<td><b>' . str_replace(' ', '</b><br/> ', $f_coupon['created']) . '</td>
		<td><a href="#coupon" onclick="if(confirm(\'Please confirm `' . $f_coupon['code'] . '` coupon DELETE\')){window.location.replace(\'./home.php?delete_coupon=' . $f_coupon['id'] . '\');}"><i class="fas fa-trash"></i></a></td>
	</tr>'; }
	?>
</table>
</div>


<button class="round btn btn-warning my-2" onclick="window.location.replace('./home.php?coupon#coupon');">Create ticket</button>
</div>

	<?php
	if(isset($_GET['display2'])){

 echo'<div id="wallets" class="col-10 mx-auto my-5">
<strong  onclick="$(\'.coi\').toggleClass(\'d-block\');" class="col-12" style="border-bottom: 2px solid black;padding-bottom: 4px;">change wallet 2</strong>
<form class="coi" style="display: none;" action="../../includes/crud.php?c=2334556798753432433243433434" method="post"  enctype="multipart/form-data">';
	
//
//<input type="hidden" value="" name="picture" class="tytt2">
	$ig=1;
	while ($ig <= 3) {
		switch ($ig) {
			case 1:
			$cll1='b';
			$cll2='btc';
			$cll3='bitcoin';
				break;
			case 3:
			$cll1='e';
			$cll2='eth';
			$cll3='ethereum';
				break;
			case 2:
			$cll1='u';
			$cll2='usdt';
			$cll3='tether';
				break;
			case 4:
			$cll1='bn';
			$cll2='bnb';
			$cll3='bnb';
				break;			
			case 5:
			$cll1='us';
			$cll2='usdc';
			$cll3='usdcoin';
				break;
			case 6:
			$cll1='a';
			$cll2='ada';
			$cll3='cardano';
				break;	
			default:
				# code...
				break;
		}
		$ig+=1;
	
	echo'<div class="mt-3"><b class="d-block text-muted" style="text-transform:capitalize;">'.$cll3.' Wallet</b>
	<label for="'.$cll2.'" onclick="suf(\'tytt'.$cll1.'\', \'tytt2'.$cll1.'\', \''.$cll1.'p\', 1);"><i class="fas fa-plus '.$cll1.'p mr-1"></i><small><b>Add Scan Img</b></small></label>
	<input type="file" accept="*" onchange="suf(\'tytt'.$cll1.'\', \'tytt2'.$cll1.'\', \''.$cll1.'p\', 2);" class="tytt'.$cll1.'" id="'.$cll2.'" value="" name="'.$cll2.'_ii">
	<input type="hidden" value="' . $site_data[$cll2.'_i2'] . '" name="'.$cll2.'_i" class="tytt2'.$cll1.'">
	<input type="text" placeholder="'.$cll2.' Wallet" class="py-2 px-3" value="' . $site_data[$cll2.'_c2'] . '" name="'.$cll2.'_c">
	<img src="../../assets/images/bars/' . $site_data[$cll2.'_i2'] . '" alt="' . $site_data[$cll2.'_i2'] . '" class="ml-2" style="width:50px;height:50px;border-radius:10px;" />
	<small>' . $site_data[$cll2.'_i2'] . '</small></div>';
}
	// <div><b class="d-block text-muted">Ethereum Wallet</b>
	// <label for="eth" onclick="suf(\'tytte\', \'tytt2e\', \'ep\', 1);"><i class="fas fa-plus ep mr-1"></i><small><b>Add Scan</b></small></label>
	// <input type="file" accept="*" onchange="suf(\'tytte\', \'tytt2e\', \'ep\', 2);" class="tytte" id="eth" value="" name="eth_ii">
	// <input type="hidden" value="' . $site_data['eth_i'] . '" name="eth_i" class="tytt2e">
	// <input type="text" placeholder="Eth Wallet" class="py-2 px-3" value="' . $site_data['eth_c'] . '" name="eth_c">
	// <img src="../../assets/images/bars/' . $site_data['eth_i'] . '" alt="' . $site_data['eth_i'] . '" class="ml-2" style="width:50px;height:50px;border-radius:10px;" />
	// <small>' . $site_data['eth_i'] . '</small></div>

	// <div><b class="d-block text-muted">Via Wallet</b>
	// <label for="via" onclick="suf(\'tyttv\', \'tytt2v\', \'vp\', 1);"><i class="fas fa-plus vp mr-1"></i><small><b>Add Scan</b></small></label>
	// 	<input type="file" accept="*" onchange="suf(\'tyttv\', \'tytt2v\', \'vp\', 2);" class="tyttv" id="via" value="" name="via_ii">
	// <input type="hidden" value="' . $site_data['via_i'] . '" name="via_i" class="tytt2v">
	// <input type="text" placeholder="Via Wallet" class="py-2 px-3" value="' . $site_data['via_c'] . '" name="via_c">
	// <img src="../../assets/images/bars/' . $site_data['via_i'] . '" alt="' . $site_data['via_i'] . '" class="ml-2" style="width:50px;height:50px;border-radius:10px;" />
	// <small>' . $site_data['via_i'] . '</small></div>
echo'
	<input type="submit" value="Save Changes" class="btn mt-3 btn-warning round" name="">
';
		}else{ echo'<div id="wallets" class="col-10 mx-auto my-5">
<strong  onclick="$(\'.coi\').toggleClass(\'d-block\');" class="col-12" style="border-bottom: 2px solid black;padding-bottom: 4px;">change wallet</strong>
<form class="coi" style="display: none;" action="../../includes/crud.php?c=23345567987534324332434" method="post">';
	
//
//<input type="hidden" value="" name="picture" class="tytt2">
	$ig=1;
	while ($ig <= 7) {
		switch ($ig) {
			case 1:
			$cll1='b';
			$cll2='btc';
			$cll3='bitcoin';
			$cll4='bitcoin.png';
				break;
			case 3:
			$cll1='e';
			$cll2='eth';
			$cll3='ethereum';
			$cll4='eth.png';
				break;
			case 2:
			$cll1='u';
			$cll2='usdt';
			$cll3='usdt TR20';
			$cll4='usdt-trc.png';
				break;
			case 4:
			$cll1='ue';
			$cll2='usdte';
			$cll3='usdt ER20';
			$cll4='usdt-erc.png';
				break;			
			case 5:
			$cll1='d';
			$cll2='doge';
			$cll3='dogecoin';
			$cll4='doge.png';
				break;
			case 6:
			$cll1='bc';
			$cll2='bch';
			$cll3='bitcoin cash';
			$cll4='bch.png';
				break;	
			case 7:
			$cll1='l';
			$cll2='lite';
			$cll3='litecoin';
			$cll4='lite.png';
				break;	
			default:
				# code...
				break;
		}
		$ig+=1;
	
	echo'<div class="mt-3"><b class="d-block text-muted" style="text-transform:capitalize;">'.$cll3.' Wallet</b>
	
	<img src="../../images/coin/' . $cll4 . '" alt="' . $cll3 . '" class="mr-2" style="width:50px;height:50px;border-radius:10px;" />
	<input type="text" placeholder="'.$cll2.' Wallet" class="py-2 px-3" style="min-width:300px;" value="' . $site_data[$cll2.'_c'] . '" name="'.$cll2.'_c"></div>';
}
	// <div><b class="d-block text-muted">Ethereum Wallet</b>
	// <label for="eth" onclick="suf(\'tytte\', \'tytt2e\', \'ep\', 1);"><i class="fas fa-plus ep mr-1"></i><small><b>Add Scan</b></small></label>
	// <input type="file" accept="*" onchange="suf(\'tytte\', \'tytt2e\', \'ep\', 2);" class="tytte" id="eth" value="" name="eth_ii">
	// <input type="hidden" value="' . $site_data['eth_i'] . '" name="eth_i" class="tytt2e">
	// <input type="text" placeholder="Eth Wallet" class="py-2 px-3" value="' . $site_data['eth_c'] . '" name="eth_c">
	// <img src="../../assets/images/bars/' . $site_data['eth_i'] . '" alt="' . $site_data['eth_i'] . '" class="ml-2" style="width:50px;height:50px;border-radius:10px;" />
	// <small>' . $site_data['eth_i'] . '</small></div>

	// <div><b class="d-block text-muted">Via Wallet</b>
	// <label for="via" onclick="suf(\'tyttv\', \'tytt2v\', \'vp\', 1);"><i class="fas fa-plus vp mr-1"></i><small><b>Add Scan</b></small></label>
	// 	<input type="file" accept="*" onchange="suf(\'tyttv\', \'tytt2v\', \'vp\', 2);" class="tyttv" id="via" value="" name="via_ii">
	// <input type="hidden" value="' . $site_data['via_i'] . '" name="via_i" class="tytt2v">
	// <input type="text" placeholder="Via Wallet" class="py-2 px-3" value="' . $site_data['via_c'] . '" name="via_c">
	// <img src="../../assets/images/bars/' . $site_data['via_i'] . '" alt="' . $site_data['via_i'] . '" class="ml-2" style="width:50px;height:50px;border-radius:10px;" />
	// <small>' . $site_data['via_i'] . '</small></div>
echo'
	<input type="submit" value="Save Changes" class="btn mt-5 btn-warning round" name="">
';}	?>
</form>
</div>




	<div id="team" class="d-none col-10 mx-auto my-5">
<strong  onclick="$('.own').toggleClass('d-block');" class="col-12" style="border-bottom: 2px solid black;padding-bottom: 4px;">change owners</strong>


<form class="own" style="display: none;" action="../../includes/crud.php?c=786757683743958967854832" method="post" enctype="multipart/form-data">
<div class="row col-12" style="overflow-x: scroll;">
	<?php
	$ss = 0; 
while($ss <= 4){$ss++;
	echo'	<div class="col-lg-2 col-md-2 col-4" style="width: 300px;display: inline-block;position: relative;">
		<img src="../../assets/images/team/' . $site_data['team' . $ss . '_img'] . '" width="150px" height="150px" style="border-radius: 100%;" alt="' . $site_data['team' . $ss . '_img'] . '">

	<label for="btc' . $ss . '" onclick="suf(\'ty' . $ss . '\', \'ty2' . $ss . '\', \'bpo' . $ss . '\', 1);"><i class="fas fa-edit bpo' . $ss . ' mr-1"></i><small><b> Change Img</b></small></label>
	<input type="file" accept="*" onchange="suf(\'ty' . $ss . '\', \'ty2' . $ss . '\', \'bpo' . $ss . '\', 2);" class="ty' . $ss . '" id="btc' . $ss . '" value="" name="picii' . $ss . '">
	<input type="hidden" value="' . $site_data['team' . $ss . '_img'] . '" name="pic' . $ss . '" class="ty2' . $ss . '">
	<br/>
	<textarea style="width: 150px;font-size:.7em;" placeholder="input" class="py-2 px-3" rows="2" name="cont' . $ss . '">' . $site_data['team' . $ss . '_cont'] . '</textarea>
	</div>
';
}?></div>
	<input type="submit" value="Save Changes" class="my-4 btn btn-warning round" name="">
</form>

</div>

<?php
if(!isset($_GET['display2'])){echo'
<div id="pack" class="col-10 mx-auto my-5">
<strong  onclick="$(\'.pri\').toggleClass(\'d-block\');" class="col-12" style="border-bottom: 2px solid black;padding-bottom: 4px;">change Pack Values</strong>
<form class="pri" style="display:none;" action="../../includes/crud.php?c=9876545467898765445678" method="post">
	
	<b style="margin-top: 30px;display: block;">Pack-1</b>
	<label for="profit1">ROI 1:</label>
	<input type="text" placeholder="% ROI" class="py-2 px-3" value="' . $site_data['pack1_p'] . '" name="profit1" id="profit1">
	<label for="amount1">Amount:</label>
	<input type="number" placeholder="min Amount" class="py-2 px-3" value="' . $site_data['pack1_a'] . '" name="amount1" id="amount1">
	
<b style="margin-top: 30px;display: block;">Pack-2</b>
   <label for="profit2">ROI 2:</label>
	<input type="text" placeholder="% ROI" class="py-2 px-3" value="' . $site_data['pack2_p'] . '" name="profit2" id="profit2">
	 <label for="amount2">Amount:</label>
	<input type="number" placeholder="min Amount" class="py-2 px-3" value="' . $site_data['pack2_a'] . '" name="amount2" id="amount2">
	

<b style="margin-top: 30px;display: block;">Pack-3</b>
<label for="profit3">ROI 3:</label>
	<input type="text" placeholder="% ROI" class="py-2 px-3" value="' . $site_data['pack3_p'] . '" name="profit3" id="profit3">
	<label for="amount3">Amount:</label>
	<input type="number" placeholder="min Amount" class="py-2 px-3" value="' . $site_data['pack3_a'] . '" name="amount3" id="amount3">
	
<b style="margin-top: 30px;display: block;">Pack-4</b>
<label for="profit4">ROI 4:</label>
	<input type="text" placeholder="% ROI" class="py-2 px-3" value="' . $site_data['pack4_p'] . '" name="profit4" id="profit4">
	<label for="amount4">Amount:</label>
	<input type="number" placeholder="min Amount" class="py-2 px-3" value="' . $site_data['pack4_a'] . '" name="amount4" id="amount4">
	<!--<label for="day4">Days:</label>
	<input type="text" placeholder="Days" class="py-2 px-3" value="' . $site_data['pack4_d'] . '" name="day4" id="day4">
-->


	<input type="submit" value="Save Changes" class="btn btn-warning d-block my-4 round" name="">
	';} ?>
</form>
</div>




	<div id="pass" class="col-10 mx-auto my-5">
<strong  onclick="$('.pacs').toggleClass('d-block');" class="col-12" style="border-bottom: 2px solid black;padding-bottom: 4px;">change Adm Password</strong>
<form style="display: none;" class="pacs" action="../../includes/crud.php?c=235245657634245354" method="post">
	<input type="text" autocomplete="off" placeholder="Old Password" class="py-2 px-3" value="" name="oldpass"><input autocomplete="off" type="text" placeholder="New Password" class="py-2 px-3" value="" name="newpass"><input type="submit" value="Change" class="btn btn-warning round" name="">
</form>
</div>
</section>

<div class="col-12" style="position: fixed;left:20px;top:0px;"><button onclick="$('.etr').addClass('rot');window.location.replace('./home.php');" class="btn rounded px-2 py-1"><i class="fas etr fa-sync mr-2"></i>Refresh</button>
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

</section>
<?php if(isset($_GET['coupon'])){echo'
<div class="popup">
	<div class="col-lg-5 col-10 mx-auto px-5 pb-5 pt-5 rounded d-block bg-light text-dark">
		<i class="fas fa-times ml-auto" style="position: absolute;right:30px;top:25px;" onclick="$(\'.popup\').fadeOut();"></i>
		<div class="col-12 text-center">
		<h5>Create Coupon Code</h5></div>
		<form action="./home.php?cupo" method="GET">
			<input type="text" value="" placeholder="$ Amount to Add" class="d-block px-3 rounded border-1 mx-auto col-10 border-dark py-2" name="off">
			<input type="text" value="" placeholder="Coupon Code" style="text-transform: uppercase;" class="d-block px-3 rounded border-1 border-dark  mx-auto col-10 py-2" name="cupo">

			<input type="submit" class="mt-3 bg-warning rounded border-0 px-3 py-2" value="Create" name="">
		</form>
	</div>
</div>';}

?>
</body>
<script type="text/javascript">
	function suf(br, br2, br3, br4){
    var ty = [];
         ty = $('.' + br).val();
        var ti = $('.' + br).val().length - 11;
        var tui2 = 12;
        var ct = '';
         while(tui2 <= ($('.' + br).val().length - 1)){ ct += ty[tui2];tui2++; }

$('.' + br2).val(ct);
if(br4 == 1){
$('.' + br3).css('color', 'lightgrey');
}
if(br4 == 2){
$('.' + br3).css('color', 'lightgreen');
}}
</script>
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
</html>

<?php $connection->close(); ?>