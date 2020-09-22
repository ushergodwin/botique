<?php session_start(); require_once 'db.php';
//initialize variables to empty strings
$firstname = $lastname = $contact = $address = $current = $new = $conf_new = $update ="";
$firstname_error = $lastname_error = $contact_error = $address_error = $current_error = $conf_new_error = $new_error= "";
$email = $_SESSION['staff'];
if(isset($_POST['saveprofile'])){
$firstname = mysqli_real_escape_string($con, $_POST['firstname']);
$lastname = mysqli_real_escape_string($con, $_POST['lastname']);
$contact = mysqli_real_escape_string($con, $_POST['contact']);
    if(empty(trim($firstname))){
       $firstname_error = "the first name is required"; 
       echo "<b>the first name is required</b>"; 
    }
    if(empty(trim($lastname))){
        $lastname_error = "<b>last name is required!</b>";
        echo "last name is required!";
    }
    if(empty(trim($contact))){
        $contact_error = "phone number is required";
        echo "<b>phone number is required</b>";
    }
    if(empty($firstname_error) && empty($lastname_error) && empty($contact_error)){
        $sql = "UPDATE users set firstname = '$firstname', lastname ='$lastname', contact = '$contact' where email='$email'";
        $execute = mysqli_query($con, $sql);
        if($execute){
           echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Profile Updated successfully!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
        }else{
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
        echo "<b>address is required!</b>";
    }
    if(empty($address_error)){
        $sql = "UPDATE users set address = '$address' where email='$email'";
        mysqli_query($con, "update address set location = '$address' where email='$email'");
        $execute = mysqli_query($con, $sql);
        if($execute){
                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Profile (address) Updated successfully!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            
        }else{
                     echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
        echo "<b>your current password is required!</b>";
    }
    if(empty(trim($new))){
        $new_error = "please create a new password!";
        echo "<b>please create a new password!</b>";
    }
    if(empty(trim($conf_new))){
        $conf_new_error = "please confirm your new password";
        echo "<b>please confirm your new password</b>";
    }
    if($conf_new != $new){
        $conf_new_error = "password does not much!";
        echo "<b>password does not much!</b>"; 
    }
    $get_current = mysqli_query($con, "SELECT email, password from users where email='$email'");
    $fetch_current = mysqli_fetch_assoc($get_current);
    $fetched_current = $fetch_current['password'];
    $verify = password_verify($current, $fetched_current);
    if(!$verify){
        $current_error = "Invalid current password!!";
        echo "<b>Invalid current password!!</b>";
    }else{
        $hash = password_hash($new, PASSWORD_DEFAULT);
        $sql = "UPDATE users set password = '$hash' where email='$email'";
        $execute = mysqli_query($con, $sql);
        if($execute){
            unset($_SESSION['admin']);
            $_SESSION['admin'] = $fetch_current['email'];
             echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Password Updated successfully!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
        }else{
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
        }
    }
}
