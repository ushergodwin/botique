<?php 
require_once('config.php');
$query = $product_code = ""; $product = [];
if(!isset($_REQUEST['q'])){
	header("location: https://www.gemaglam.com/");
	exit();
}
if(isset($_REQUEST['q'])){
	$product_code = $_GET['q'];
	$category = $_GET['category'];
	if($category == "blazers"){
		$query = "SELECT name, code, price, description, image, status, category FROM blazers WHERE code = ?"; 
	}
	if($category == "accessories" ) {
		$query = "SELECT name, code, price, description, image, status, category FROM accessories WHERE code = ?";
	}
	if($category == "bags") {
		$query = "SELECT name, code, price, description, image, status, category FROM bags WHERE code = ?";
	}
	if($category == "shoes") {
		$query = "SELECT name, code, price, description, image, status, category FROM shoes WHERE code = ?";
	}
	if($category == "tops") {
		$query = "SELECT name, code, price, description, image, status, category FROM tops WHERE code = ?";
	}
	if($category == "dresses") {
		$query = "SELECT name, code, price, description, image, status, category FROM dresses WHERE code = ?";
	}
	if($category == "beauty") {
		$query = "SELECT name, code, price, description, image, status, category FROM beauty WHERE code = ?";
	}
	if($category == "trousers") {
		$query = "SELECT name, code, price, description, image, status, category FROM trousers WHERE code = ?";
	}
	if($category == "skirts") {
		$query = "SELECT name, code, price, description, image, status, category FROM skirts WHERE code = ?";
	}
	//prepare query
$stmt = $conn->prepare($query);
//bind param
$stmt->bind_param("s", $param_code);
//set param
$param_code = $product_code;
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_all(MYSQLI_ASSOC);
}

