<?php 
session_start();
include("db.php");
//initailize variables to empty string
$firstname = "";
$password = "";
$password_2 = "";
$lastname = "";
$contact = "";
$address = "";
$email = "";
$account_type = "";
$errors = array();

//register user

if (isset($_POST['submit'])) {
	$firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
     $address = mysqli_real_escape_string($con, $_POST['address']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$password_2 = mysqli_real_escape_string($con, $_POST['password_2']);
    $account_type = mysqli_real_escape_string($con, $_POST['type']);
	if (empty(trim($firstname))) {
       array_push($errors, "please enter first Name");
	}
    if (empty(trim($lastname))) {
       array_push($errors, "please enter last Name");
	}
      if (empty(trim($contact))) {
       array_push($errors, "Please enter Contact.");
    }
        if (empty(trim($address))) {
       array_push($errors, "Please enter Adress.");
    }
        if (empty(trim($email))) {
       array_push($errors, "Please enter your email address.");
    }

	if (empty(trim($password))) {

		array_push($errors, "please create and enter a password");
	}

	if (empty(trim($password_2))) {
		array_push($errors, "please confirm your created password");
	}
     
     if ($password !== $password_2) {
             array_push($errors, "password does not match!!");
     }
    $sql = "SELECT * FROM users WHERE email = '$email' limit 1";   
    $results = mysqli_query($con, $sql);
    $user = mysqli_fetch_assoc($results);

    if ($user) {
    	if ($user['email'] == $email) {
        echo "<script> alert('EMAIL allredy registered!! If you did not register your email yet it is already in the system, please report the impersonation issue to your our email address wecare@gemasglam.com');</script>"; 
        echo"<script>history.back();</script>";    
    	}
    }


    if (count($errors) == 0) {
    	$hash = password_hash($password, PASSWORD_DEFAULT);

    	$sql = "INSERT INTO users(email, firstname, lastname, address, contact, account_type, password) VALUES ('$email', '$firstname', '$lastname', '$address', '$contact', '$account_type', '$hash')";

    	$query = mysqli_query($con, $sql);
        mysqli_query($con, "INSERT INTO address(location, email) VALUES('$address', '$email')");
        $code = md5(random_int(0,100000) ); // Generate random 32 character hash and assign it to a local variable
        mysqli_query($con, "INSERT INTO verify(email, code) VALUES ('$email', '$code')");
    	if($query){
         $actual_link = "http://$_SERVER[HTTP_HOST]/user/"."verify.php?id=" . $code;
            $toEmail = "$email";
            $subject = "Gemasglam User Accont Activation";
            $content = "<h1>Your Account was succefully created</h1><h3>Please Click on the link bellow to activate your account.</h3> <a href='$actual_link'>$actual_link</a> <br>Do Not Reply to this mail";
            $headers = "From: noreply@gemasglam.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


            if(mail($toEmail, $subject, $content, $headers)) {
               $_SESSION['activate'] = true;
               header("location: activate.php");
            }
    	}else{
            array_push($errors, "Oops, something went wrong, please try again later");
        }
    }

}

  // login user


    if (isset($_POST['login_user'])) {
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);


        if (empty(trim($email))) {
        	array_push($errors, "please enter your email");
        }
      
        if (empty(trim($password))) {
        	array_push($errors, "please enter your pasword");
        }

$token = [];
        if(count($errors) == 0){
        	$sql = "SELECT email, password, account_type FROM users where email = '$email'";

        	$results = mysqli_query($con, $sql);
            $verify = mysqli_fetch_assoc($results);
            if(!empty($verify)){
                if(isset($_POST['remember']) && $_POST['remember'] == "me"){
                    setcookie("cid",$verify['email'],time()+(86400 * 30), "/");
                }
             
            $true = password_verify($password, $verify['password']);
if (mysqli_num_rows($results) == 1 && $true && $verify['account_type'] == 'user'){
    session_start();
    $_SESSION['username'] = $verify['email'];
    $_SESSION['loggedin'] = true;
    header("location: index.php");
        	}else{
    array_push($errors, "Invalid email or password!!");
}
            
        if (mysqli_num_rows($results) == 1 && $true && $verify['account_type'] == 'admin'){
    $_SESSION['admin'] = $verify['email'];
    $_SESSION['loggedin'] = true;
    header("location: admin/dashboard");
        	}    
         
                if (mysqli_num_rows($results) == 1 && $true && $verify['account_type'] == 'staff'){
    $_SESSION['staff'] = $verify['email'];
    $_SESSION['loggedin'] = true;
    header("location: staff/dashboard");
        	} 
         if (mysqli_num_rows($results) == 1 && $true && $verify['account_type'] == 'suspended'){
    $_SESSION['error'] = $verify['email'];
    $_SESSION['loggedin'] = flase;
    header("location: user-login.php");
            }

}else{
    array_push($errors, "Oops, account does not exit! please <a href='Create-Account'>clikc here</a> to creat an account");
}
        }
        } 
        //login guest
         if (isset($_POST['checkout'])) {
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);


        if (empty(trim($email))) {
            array_push($errors, "please enter your email");
        }
      
        if (empty(trim($password))) {
            array_push($errors, "please enter your pasword");
        }

$token = [];
        if(count($errors) == 0){
            $sql = "SELECT email, password, account_type FROM users where email = '$email'";

            $results = mysqli_query($con, $sql);
            $verify = mysqli_fetch_assoc($results);
            if(!empty($verify)){
                if(isset($_POST['remember']) && $_POST['remember'] == "me"){
                    setcookie("cid",$verify['email'],time()+(86400 * 30), "/");
                }
             
            $true = password_verify($password, $verify['password']);
if (mysqli_num_rows($results) == 1 && $true && $verify['account_type'] == 'user'){
    $_SESSION['username'] = $verify['email'];
    $_SESSION['loggedin'] = true;
    header("location: customer-order.php");
            }else{
    array_push($errors, "Invalid email or password!!");
}

}else{
    array_push($errors, "Oops, account does not exit! please <a href='Create-Account'>clikc here</a> to creat an account");
}
        }
        } 

//close connection
mysqli_close($con);
?>