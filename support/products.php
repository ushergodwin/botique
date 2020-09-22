<?php
require_once 'config.php'; //connection to the database, should be an independent file
$sql = "SELECT * FROM admin";
$result = mysqli_query($conn, $sql);
//initial like an array
$products = array();
if(mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_array($result)) {
		array_push($products, $row);
	}
}

//use foreach loop in the index.php page
foreach ($products as $key => $value) {
	//you should the appropriate hmtl form with hidden inputs just like you did in the function product
	echo $value['username'];
}
