<?php session_start(); include_once("db.php");
if(!isset($_SESSION['username'])){
    header('location: user-login.php');
    exit();
}
   $email = $_SESSION['username'];
//get user firstname
$detail = mysqli_query($con, "select firstname from users where email = '$email'");
 $got = mysqli_fetch_assoc($detail);
$status=""; $show = $hide = $firstname = "";
$category_query = "";
if (isset($_POST['add_to_cart']) && $_POST['code']!=""){
$code = $_POST['code'];
if(isset($_POST['code']) && $_POST['category'] == "blazers"){
  $category_query = "SELECT * FROM `blazers` WHERE `code`='$code'";
}
if(isset($_POST['add_to_cart']) && $_POST['category'] == "accessories"){
  $category_query = "SELECT * FROM `accessories` WHERE `code`='$code'";
}
if(isset($_POST['add_to_cart']) && $_POST['category'] == "shoes"){
  $category_query = "SELECT * FROM `shoes` WHERE `code`='$code'";
}
if(isset($_POST['add_to_cart']) && $_POST['category'] == "bags"){
  $category_query = "SELECT * FROM `bags` WHERE `code`='$code'";
}
if(isset($_POST['add_to_cart']) && $_POST['category'] == "tops"){
  $category_query = "SELECT * FROM `tops` WHERE `code`='$code'";
}
if(isset($_POST['add_to_cart']) && $_POST['category'] == "trousers"){
  $category_query = "SELECT * FROM `trousers` WHERE `code`='$code'";
}
if(isset($_POST['add_to_cart']) && $_POST['category'] == "skirts"){
  $category_query = "SELECT * FROM `skirts` WHERE `code`='$code'";
}
if(isset($_POST['add_to_cart']) && $_POST['category'] == "dresses"){
  $category_query = "SELECT * FROM `dresses` WHERE `code`='$code'";
}
if(isset($_POST['add_to_cart']) && $_POST['category'] == "beauty"){
  $category_query = "SELECT * FROM `beauty` WHERE `code`='$code'";
}

$result = mysqli_query($con, $category_query);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];
$quantity = 1; 
    $check = "select * from cart where code ='$code' && email = '$email'";
     $query = mysqli_query($con, $check);
    if(mysqli_num_rows($query)==1){
	$status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-warning'></i></strong> Product is already added to cart!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
    }else{
        $insert = "INSERT INTO cart(name, code, quantity, price, it_total_price, image, email) VALUES ('$name', '$code', '$quantity', '$price', '$price', '$image', '$email')";
        //insert in all cart table
        $all_cart = "INSERT INTO all_cart(name, code, quantity, price, it_total_price, image, email, order_ID) VALUES ('$name', '$code', '$quantity', '$price', '$price', '$image', '$email', '0')";
        //execute all cart
      $cart =  mysqli_query($con, $all_cart);
        //execute cart
        if(mysqli_query($con, $insert)){
        
	$status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been added to cart successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";   
        } 
}
}
//cart count
$word = "";
$return = mysqli_query($con, "select count(email) from cart where email = '$email'"); 
$number = mysqli_fetch_assoc($return);
$num = $number['count(email)'];
$cart_count = "";   
$cart_count = $num;
if($num == 0){
    $word = "empty";
}else if($num == 1){
    $word = "item";
}else{
    $word = "items";
}

//cart transactions
$cart_status=""; $quantity = 1; $code = ""; $currency = "UGX ";
if (isset($_POST['action']) && $_POST['action']=="remove"){
    $code = $_POST["code"];
    $remove = "DELETE from cart where code = '$code' && email ='$email'";
    if(mysqli_query($con, $remove)){
	$cart_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been removed from cart successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>"; 
    }
     $all_cart = "DELETE from all_cart where code = '$code' && email ='$email'"; 
    mysqli_query($con, $all_cart);
}

if(isset($_POST['action']) && $_POST['action']=="change"){
 $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
 $name_change = mysqli_real_escape_string($con, $_POST['code']);
 $change = mysqli_query($con, "select price from cart where code = '$name_change' && email = '$email'");
 $item_price = mysqli_fetch_assoc($change);
 $price = $item_price['price'];
$new_cost = $price * $quantity;
$final ="UPDATE cart SET quantity = '$quantity', it_total_price='$new_cost' where code='$name_change' && email = '$email'";
mysqli_query($con, $final);
    $all_cart ="UPDATE all_cart SET quantity = '$quantity', it_total_price='$new_cost' where code='$name_change' && email = '$email'";
    if(mysqli_query($con, $all_cart)){
    $cart_status = "<div class='alert alert-success alert-dismissible fade show'role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product Quantity has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";   
    }
}

//calculte total cost of the products bought
    $sql = "select SUM(it_total_price) from cart where email = '$email'";
    $execute = mysqli_query($con, $sql);
    $sum = 0;
    $gotten = mysqli_fetch_assoc($execute);
    $sum += $gotten['SUM(it_total_price)'];

    //change size
    if(isset($_POST['action']) && $_POST['action']=="change_size"){
 $size = mysqli_real_escape_string($con, $_POST['size']);
 $size_change = mysqli_real_escape_string($con, $_POST['code']);
 mysqli_query($con, "UPDATE all_cart SET size = '$size' where code='$size_change' && email = '$email'");
    $item_size ="UPDATE cart SET size = '$size' where code='$size_change' && email = '$email'";
    if(mysqli_query($con, $item_size)){
    $cart_status = "<div class='alert alert-success alert-dismissible fade show'role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Item's Size has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";   
    }
}
?>