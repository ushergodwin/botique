<?php include('server.php');
if(isset($_SESSION['username']) && $_SESSION['loggedin'] == true){
    header("location: index.php");
}
if(isset($_SESSION['admin']) && $_SESSION['loggedin'] == true){
    header("location: admin/dashboard");
}
if(isset($_SESSION['staff']) && $_SESSION['loggedin'] == true){
    header("location: staff/dashboard");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>GemasGlamHome | LOGIN</title>
    <link rel="icon" href="imgs/gemasglam.ico">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="css/acount.css">
  <meta charset="utf-8">
     <meta name="description" content="Free Load Shedding schedules in Uganda">
    <meta name="author" content="Tumuhimbise Usher Godwin">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
             <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery.js"></script>    
    <style type="text/css"> body{background-image: url(imgs/IMG-20200727-WA0018.jpg)} .form-control{border-left: none; border-right: none; border-top: none;} #input:focus{outline: none;} .wait{display: none}</style>
</head>
<body>
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-sm-12 col-lg-8 col-xl-8">
                <div class="wait"><img src="imgs/Spinner-1s-200px.gif"> </div>
                <div class="card">
                    <div class="card-header bg-dark text-light">
  	<h2 style="text-align: center">Login To Your GemasGlamHome Account</h2>
    <?php if(isset($_SESSION['message'])): ?>
      <span class="text-success"><?php echo $_SESSION['message'] ?></span>
      <?php endif ?>
                    </div>
     <div class="card-body" style="background-image: url(imgs/header.jpg);">                  
  <form method="post" action="user-login.php">
  	<?php include('errors.php'); ?>
  		<label for="email" class="control-label">E-Mail</label><br>
  		<input type="email" name="email" class="form-control" id="input" value="<?php echo @$_COOKIE['cid'];?>" autocomplete="off" required><br>
  		<label for="password" class="control-label">Password</label><br>
  		<input type="password" name="password" class="form-control" id="password" required><br>
      <div class="input-group">
      <div class="custom-control custom-switch"> 
        <input type="checkbox" class="custom-control-input" id="customSwitch1">
      <label class="custom-control-label" for="customSwitch1">show password</label> 
    </div> &nbsp;&nbsp;&nbsp;&nbsp;
      <div class="custom-control custom-switch">
  <input type="radio" class="custom-control-input" id="defaultUnchecked" name="remember" value="me">
  <label class="custom-control-label text-light" for="defaultUnchecked">Remember My Email</label>
</div>
    </div>
<button type="submit" class="btn btn-warning" name="login_user">Login</button> 
        <div class="card-footer">
  		Have No Account Yet? <a href="Create-Account.php">Sign up</a>
        Forgot Password? <a href="reset-password.php">Reset</a>    
      </div>
  </form>
  </div>
  </div>
  </div>
    </div>
<?php if(isset($_SESSION['error'])): ?>
    <div class="row justify-content-center">
      <div class="col-md-6 col-sm-12 col-lg-8 col-xl-8">
    <div class="card mt-2">
      <h4 class="text-muted">ACCOUNT ERROR</h4>
     <div class="card-body">
      <p class="text-secondary"> Hello, Dear User, your account<b class="text-danger">(<?php echo $_SESSION['error'] ?>)</b> has been suspended. This maybe be due to violation of our privacy policies or terms and conditions of service. Please contact the admin <a href="mailto:wecare@gemasglam.com">wecare@gemasglam.com</a> to request for account activation. Thank You</p>
     </div> 
    </div>
  </div>
    </div>
<?php endif ?>
  </div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>