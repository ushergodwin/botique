<?php
//initialize variables to empty strings
$firstname = $lastname = $contact = $address = $current = $new = $conf_new = $update ="";
$firstname_error = $lastname_error = $contact_error = $address_error = $current_error = $conf_new_error = $new_error= "";
$email = $_SESSION['username'];
if(isset($_POST['saveprofile'])){
$firstname = mysqli_real_escape_string($con, $_POST['firstname']);
$lastname = mysqli_real_escape_string($con, $_POST['lastname']);
$contact = mysqli_real_escape_string($con, $_POST['contact']);
    if(empty(trim($firstname))){
       $firstname_error = "the first name is required"; 
    }
    if(empty(trim($lastname))){
        $lastname_error = "last name is required!";
    }
    if(empty(trim($contact))){
        $contact_error = "phone number is required";
    }
    if(empty($firstname_error) && empty($lastname_error) && empty($contact_error)){
        $sql = "update users set firstname = '$firstname', lastname ='$lastname', contact = '$contact' where email='$email'";
        $execute = mysqli_query($con, $sql);
        if($execute){
           $update = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Profile Updated successfully!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
        }else{
            $update = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
        }
    }
}

if(isset($_POST['saveaddress'])){
    $address = mysqli_real_escape_string($con, $_POST['address']);
    if(empty(trim($address))){
        $address_error = "address is required!";
    }
    if(empty($address_error)){
        $sql = "update users set address = '$address' where email='$email'";
        mysqli_query($con, "update address set location = '$address' where email='$email'");
        $execute = mysqli_query($con, $sql);
        if($execute){
                    $update = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Profile (address) Updated successfully!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            
        }else{
                      $update = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
        }
    }
}

if(isset($_POST['savepassword'])){
  $current = mysqli_real_escape_string($con, $_POST['current']);
  $new = mysqli_real_escape_string($con, $_POST['new']);
    $conf_new = mysqli_real_escape_string($con, $_POST['conf']);
    if(empty(trim($current))){
        $current_error = "your current password is required!";
    }
    if(empty(trim($new))){
        $new_error = "please create a new password!";
    }
    if(empty(trim($conf_new))){
        $conf_new_error = "please confirm your new password";
    }
    if($conf_new != $new){
        $conf_new_error = "password does not much!";
    }
    $get_current = mysqli_query($con, "select email, password from users where email='$email'");
    $fetch_current = mysqli_fetch_assoc($get_current);
    $fetched_current = $fetch_current['password'];
    $verify = password_verify($current, $fetched_current);
    if(!$verify){
        $current_error = "Invalid current password!!";
    }else{
        $hash = password_hash($new, PASSWORD_DEFAULT);
        $sql = "update users set password = '$hash' where email='$email'";
        $execute = mysqli_query($con, $sql);
        if($execute){
            unset($_SESSION['username']);
            $_SESSION['username'] = $fetch_current['email'];
            $_SESSION['loggedin'] = true;
             $update = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Password Updated successfully!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
        }else{
     $update = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
        }
    }
}

$status=""; $show = $all_details = $firstname = $lastname = $contact = $address= $maxorder = $number = "";
$email = $_SESSION['username'];//get the user email from the session
$detail = mysqli_query($con, "select firstname from users where email = '$email'");//query for the first name of the user
$got = mysqli_fetch_assoc($detail);//fetch the name and store it in a variable

$sql = mysqli_query($con, "select * from users where email='$email'");
$all_details = mysqli_fetch_assoc($sql);
$firstname = $all_details['firstname'];
$lastname = $all_details['lastname'];
$contact = $all_details['contact'];
$address = $all_details['address'];
//track order
 $maxsql = mysqli_query($con, "select max(order_ID) from ordered where email='$email'");
$max = mysqli_fetch_assoc($maxsql);
$maxorder = $max['max(order_ID)'];
if(empty($max)){
  $maxorder = 0;
}
$track = mysqli_query($con, "select status from ordered where email='$email' AND order_ID = '$maxorder'");
$trackdetails = mysqli_fetch_assoc($track);
$status = $trackdetails['status'];
$numberoforders = mysqli_query($con, "select count(email) from all_cart where email='$email'");
$execute = mysqli_fetch_assoc($numberoforders);
//ordered or pending
$pending_order = mysqli_query($con, "SELECT order_ID from all_cart WHERE email = '$email' LIMIT 1");
$get_pending = mysqli_fetch_assoc($pending_order);
//initialize a  variable
$pending = "";
if($get_pending['order_ID'] == 0){
$pending = "Pending...";
}
//cart count
$return = mysqli_query($con, "select count(email) from cart where email = '$email'"); 
$number = mysqli_fetch_assoc($return);
$num = $number['count(email)'];
$cart_count = "";   
$cart_count = $num; 
?>