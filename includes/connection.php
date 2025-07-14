<?php
require("constants.php");

// 1. Create a database connection
$connection = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
if ($connection->connect_errno) {
	die("Database connection failed: " . $connection->connect_error . $connection->connect_errno);
}



// 2. Select a database to use 
//$db_select = mysql_select_db(DB_NAME,$connection);
//if (!$db_select) {
//	die("Database selection failed: " . mysql_error());
//}
?>
