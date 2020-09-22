<?php 
require_once('config.php');
//fetch products from each category
//blazers
$stmt = $conn->prepare("SELECT name, code, price, description, image, status, category FROM blazers ORDER BY price ASC");
$stmt->execute();
$result = $stmt->get_result();
$blazers = $result->fetch_all(MYSQLI_ASSOC);

//fech products from accessories
$accessories_status = "";
$stmt = $conn->prepare("SELECT name, code, price, description, image, status, category FROM accessories ORDER BY price ASC");
$stmt->execute();
$result = $stmt->get_result();
$accessories = $result->fetch_all(MYSQLI_ASSOC);
if(empty($accessories)){
$accessories_status = "This category has no products yet";
}
//fetch products from bags
$bags_status = "";
$stmt = $conn->prepare("SELECT name, code, price, description, image, status, category FROM bags ORDER BY price ASC");
$stmt->execute();
$result = $stmt->get_result();
$bags = $result->fetch_all(MYSQLI_ASSOC);
if(empty($bags)){
$bags_status = "This category has no products yet";
}
//fetch products from shoes
$shoes_status = "";
$stmt = $conn->prepare("SELECT name, code, price, description, image, status, category FROM shoes ORDER BY price ASC");
$stmt->execute();
$result = $stmt->get_result();
$shoes = $result->fetch_all(MYSQLI_ASSOC);
if(empty($shoes)){
$shoes_status = "This category has no products yet";
}
//fetch products from tops
$tops_status = "";
$stmt = $conn->prepare("SELECT name, code, price, description, image, status, category FROM tops ORDER BY price ASC");
$stmt->execute();
$result = $stmt->get_result();
$tops = $result->fetch_all(MYSQLI_ASSOC);
if(empty($tops)){
$tops_status = "This category has no products yet";
}
//fetch products from dresses
$dresses_status = "";
$stmt = $conn->prepare("SELECT name, code, price, description, image, status, category FROM dresses ORDER BY price ASC");
$stmt->execute();
$result = $stmt->get_result();
$dresses = $result->fetch_all(MYSQLI_ASSOC);
if(empty($dresses)){
$dresses_status = "This category has no products yet";
}
//fetch products from beauty
$beauty_status = "";
$stmt = $conn->prepare("SELECT name, code, price, description, image, status, category FROM beauty ORDER BY price ASC");
$stmt->execute();
$result = $stmt->get_result();
$beauty = $result->fetch_all(MYSQLI_ASSOC);
if(empty($shoes)){
$beauty_status = "This category has no products yet";
}
//fetch products from trousers
$trousers_status = "";
$stmt = $conn->prepare("SELECT name, code, price, description, image, status, category FROM trousers ORDER BY price ASC");
$stmt->execute();
$result = $stmt->get_result();
$trousers = $result->fetch_all(MYSQLI_ASSOC);
if(empty($shoes)){
$trousers_status = "This category has no products yet";
}
//fetch products from skirts
$skirts_status = "";
$stmt = $conn->prepare("SELECT name, code, price, description, image, status, category FROM skirts ORDER BY price ASC");
$stmt->execute();
$result = $stmt->get_result();
$skirts = $result->fetch_all(MYSQLI_ASSOC);
if(empty($shoes)){
$skirts_status = "This category has no products yet";
}
?>