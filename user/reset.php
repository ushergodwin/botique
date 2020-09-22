<?php session_start(); require_once 'config.php'; $password_error = $user_email =""; $notification = "";
if(!isset($_SESSION['email'])){
  header("location: reset-password.php");
  exit();
}
  $user_email = $_SESSION['email'];
 if(isset($_POST['reset_password'])){
   $new_password = trim($_POST['new_password']);
   $conf_password = trim($_POST['conf_password']);
   if(empty($new_password) && empty($conf_password)){
    $password_error = "all fields are required";
   }
   if(strlen($new_password) < 8){
  $password_error = "Password should be at least 8 characters long";
   }
   if($conf_password != $new_password){
    $password_error = "Passwords do not match";
   }
   if(empty($password_error)){
    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email =?");
    $hash = password_hash($new_password, PASSWORD_DEFAULT);
    //bind
    $stmt->bind_param("ss", $param_password, $param_email);
    //set param
    $param_password = $hash;
    $param_email = $user_email;
    $stmt->execute();
    if($stmt->affected_rows >0){
      $_SESSION['message'] = "Your Password Has been reset Successfuly, Please login using Your New password";
      $stmt = $conn->prepare("DELETE FROM verify WHERE email = ?");
      $stmt->bind_param("s", $param_delete_code);
      $param_delete_code = $user_email;
      if($stmt->execute()){
      unset($_SESSION['username']);
      $_SESSION['username'] = $user_email;
      header("location: user-login.php");
      }else{
          $notification = "Opps, something went wrong, please try again later";
      }
    }
   }
 }
?>
<html>
<head>
	<meta charset="utf-8">
	<title>GemasGlamHome ACTIVATE</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="imgs/gemasglam.ico">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/custom.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.1/css/all.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<style type="text/css">input[type=password]{border-radius: 50px;}span{color: red}</style>
</head>
<body class="bg-dark">
<main class="container-fluid">
	<div class="row justify-content-center">
    <div class="col-md-8 col-lg-8 col-sm-12">
    <div class="card mt-2">
      <div class="card-body">
          <div class="jumbotron py-1 mt-2">
      <h3 class="text-warning" style='text-decoration: underline'>FINAL STEP</h3><br>
      <h5 class="text-muted">
        <form action="reset.php" method="post">
          <div class="form-group">
            <small class="text-muted">*Password should contain al leate 8 charcters with a combination of Uper case letters, lower case latters and digits or non alpher numeric characters like @*!#?/&$%</small> <br>
            <input type="password" name="new_password" class="form-control" placeholder="enter a new password" required="required">
            <span><?php echo $password_error;?></span>
          </div>
           <div class="form-group">

            <input type="password" name="conf_password" class="form-control" placeholder="re-type your new password" id="conf_reset" required="required">
          </div>
          <span id="reset_note"></span>
           <div class="form-group">
            <button type="submit" name="reset_password" class="btn btn-warning">RESET PASSWORD</button>
          </div>
        </form>

      </h5>
      <span><?php echo $notification;?></span>
    </div>
      </div>
    </div>  
    </div>
	</div>
</main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/purejs.js"></script>
</body>
</html>