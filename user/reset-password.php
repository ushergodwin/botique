<?php require_once 'config.php'; $emai_error = $message = $error = $message_error ="";
if(isset($_POST['reset_request'])){
$email = trim($_POST['reset_email']);
$user_email = filter_var($email, FILTER_VALIDATE_EMAIL);
if(!$user_email){
  $emai_error = "Oops, Invalid Email";
}else{
  $code = md5(rand(0,10000000)); 
         $actual_link = "https://$_SERVER[HTTP_HOST]/user/"."verify.php?request=" . $code;
            $toEmail = "$user_email";
            $subject = "Gemasglam User Account Password Reset";
            $content = "<h1>A password Reset Rquest has been initiated for your account!</h1> <h3>Please Click on the link bellow to rest your account's password.</h3> <a href='$actual_link'>$actual_link</a> <br><h3> If you did not make this request, please ignore the request and delete this email.</h3><h4>Do Not Reply this mail</h4>";
            $headers = "From: noreply@gemasglam.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            if(mail($toEmail, $subject, $content, $headers)) {
        $stmt = $conn->prepare("INSERT INTO verify(email, code) VALUES (?,?)");
        $stmt->bind_param("ss", $param_email, $param_code);
        $param_email = $user_email;
        $param_code = $code;
        if($stmt->execute()){
          $message = "An Email to confirm this password rest request has been sent to $user_email. Please Check your email to rest your password.";
        }else{
          $message_error = "Oopps, Something went Wrong, Please try again later";
        }
            }else{
              $error = "Email not sent";
            }
}
}


?>

<html>
<head>
	<meta charset="utf-8">
	<title>GemasGlamHome RESET USER PASSWORD</title>
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
</head>
<body class="bg-dark">
<main class="container-fluid">
	<div class="row justify-content-center">
    <div class="col-md-8 col-lg-8 col-sm-12">
    <div class="card mt-2">
      <div class="card-body">
          <div class="jumbotron py-1 mt-2">
      <h3 class="text-warning">PASSWORD RESETE REQUEST <i class="fas fa-bell text-secondary"></i></h3> <br>
      <h5 class="text-muted">
        <form class="form-inline" method="post" action="">
          <div class="input-group">
            <i class="fas fa-envelope text-primary" style="font-size: 30pt;"></i> &nbsp;
            <input type="email" name="reset_email" class="form-control" placeholder="type your account's email here" style="border-radius: 50px; width: 350px;" autocomplete="off" required="required"> &nbsp; &nbsp;
            <button type="submit" class="btn btn-warning" name="reset_request">CONTINUE</button>  &nbsp; &nbsp; <a href="user-login">Return to Login</a>
          </div>
        </form>
        <span class="text-danger"> <?php echo $emai_error ?></span><br>
        <span class="text-danger"> <?php echo $message_error ?></span><br>
        <span class="text-danger"> <?php echo $error ?></span><br>
        <span class="text-success"><i class="fas fa-circle-check"></i> <?php echo $message; ?></span>
      </h5>
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