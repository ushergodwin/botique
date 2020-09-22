<?php session_start(); require_once 'config.php'; require_once 'db.php';
$email = $_SESSION['username']; $currency = "UGX ";
//get the user agent
$user_agent = $_SERVER['HTTP_USER_AGENT'];
//update cart and all_cart with the user email
mysqli_query($con, "UPDATE cart SET email ='$email' WHERE user_agent ='$user_agent'");
mysqli_query($con, "UPDATE all_cart SET email ='$email' WHERE user_agent ='$user_agent'");
//get the sum using the email

$sql = "select SUM(it_total_price) from cart where email = '$email'";
    $execute = mysqli_query($con, $sql);
    $sum = 0;
    $gotten = mysqli_fetch_assoc($execute);
    $sum += $gotten['SUM(it_total_price)'];
//echo the appropriate payment method
//get user firstname
 $detail = mysqli_query($con, "select firstname from users where email = '$email'");
 $got = mysqli_fetch_assoc($detail);
 //all users details
  $details = mysqli_query($con, "select firstname, lastname, contact from users where email = '$email'");
 $info = mysqli_fetch_assoc($details);
// //users location
 $user_location = mysqli_query($con, "SELECT location FROM address WHERE email ='$email'");
 $location = mysqli_fetch_assoc($user_location);
$second_message =""; $payment_message = ""; $show_total= 0;  


$message ="";    $_SESSION['payment'] = 0;
if(isset($_POST['delivery'])){
    $d = $_POST['delivery'];
    if($d == 5000){
     $location_query = mysqli_query($con, "select location from address where email ='$email' limit 1");
     $get_location = mysqli_fetch_assoc($location_query);
     $location = $get_location['location'];
     $price_query = mysqli_query($con, "select price from deliveryprices where location='$location'");
     $get_price = mysqli_fetch_assoc($price_query);
     $delivery_cost = $get_price['price']; 
     $_SESSION['payment'] = $delivery_cost;  
     $message = "Delivered between"."&nbsp;".$start."&nbsp; and ".$till;
    }
    if($d == 0){
        $message = "Ready for pickup by ".$pick;
    }
}
$second_message =""; $third_message = ""; $show_total= 0;   
$local =  $_SESSION['payment']; 
$second_message = $currency.number_format($local);
$total_cost = $sum +$local;
$show_total= $currency.number_format($total_cost); 
if(isset($_POST['delivery'])){
  mysqli_query($con, "insert into total(total, email) VALUES('$local', '$email')");
mysqli_query($con, "UPDATE total SET final_total ='$total_cost' WHERE email = '$email'");
}   

if($local > 0){
$third_message = "Delivered between"."&nbsp;".$start."&nbsp; and ".$till;
    }else{
    $third_message = "Ready for pickup by ".$pick;
    }
    //get location
    $user_location = "";
    $query = mysqli_query($con, "SELECT location FROM address WHERE email='$email'");
    $user_location = mysqli_fetch_assoc($query);
//update delivery location
    //intialize variables
    $change_location_status = $delivery_location= $delivery_location_error = "";
    if(isset($_POST['change_location'])){
     $delivery_location = mysqli_real_escape_string($con, $_POST['user_location']);
     if(!preg_match("/^[a-zA-Z ]*/", $delivery_location)){
         $delivery_location_error = "please enter a correct location";
     }
     if(empty($delivery_location_error)){
      $sql = "UPDATE address SET location ='$delivery_location' WHERE email='$email'";
      $execute = mysqli_query($con, $sql);
      if(mysqli_affected_rows($con)>0){
        $change_location_status ="<div class='alert alert-success alert-dismissible fade show'role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Delivery Address has been changed successfuly! <br> reload the page to see saved changes.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
      }else{
                $change_location_status ="<div class='alert alert-success alert-dismissible fade show'role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong>oops, something went wrong, please try again!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
      }
     }
    }
        //get vochar 
$notif = "";
if(isset($_REQUEST['userVochar'])){
$vochar = htmlspecialchars($_POST['userVochar']);
if(!empty(trim($vochar))){
 $stmt = $conn->prepare("SELECT price FROM vochar WHERE vochar =?");
 $stmt->bind_param("s", $param_vochar);
 $param_vochar = $vochar;
 $stmt->execute();
 $result = $stmt->get_result();
 $vochar_price = $result->fetch_assoc();
 $deducted_amount = $vochar_price['price'];
 $get_final_total = mysqli_query($con, "SELECT final_total FROM total WHERE email = '$email'");
 $got_total = mysqli_fetch_assoc($get_final_total);
 $perevious_total = $got_total['final_total'];
 $show = $perevious_total - $deducted_amount;
 //update
 $notification = $notif= "";
 mysqli_query($con, "UPDATE total SET final_total = '$show' WHERE email='$email'");
 if(empty($vochar_price)){
 	 	$notif = "The Vochar code that you applied is not valid/does not exist. Please try another code";
 	 }else{
 $notif = "UGX: $deducted_amount has been deducted. NEW TOTAL: $show";
}
mysqli_query($con, "UPDATE total SET notification = '$notif' WHERE email ='$email'"); 
mysqli_query($con, "DELETE FROM vochar WHERE vochar ='$vochar'");
}
}
$get_notif = mysqli_query($con, "SELECT notification FROM total WHERE email='$email'");
$no = mysqli_fetch_assoc($get_notif);
$notification = $no['notification'];
?>