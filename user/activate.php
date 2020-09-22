<?php require 'server.php'?>
<html>
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-174043292-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-174043292-1');
</script>
  <meta charset="utf-8">
  <meta name="description" content="Gemasglam Home is a Fashion clothing and accessories ladies’ boutique. We take pride in supplying great quality items to all our customers at pocket friendly prices. We are located in Kampala Uganda.">
  <meta name="keywords" content="boutique, Uganda, Kampala, women clothes, bags, shoes, beauty products, blazers, skirts, Namugema Bridget, gemasglam GemasGlamHome, quality, accessories, ladies Fashion">
  <meta name="author" content="Tumuhimbise Usher Godwin">
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
<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body class="bg-dark">
<?php if(isset($_SESSION['activate']) && $_SESSION['activate'] == true){ ?>
<main class="container-fluid">
	<div class="row justify-content-center">
    <div class="col-md-8 col-lg-8 col-sm-12">
    <div class="card mt-2">
      <div class="card-body">
          <div class="jumbotron py-1 mt-2">
      <h3 class="text-warning">NOTIFICATION <i class="fas fa-bell"></i></h3>
      <h5 class="text-muted">Your account has been succefully created. Please Check your email for an activation link, to activate your account. Thank you</h5>
    </div>
      </div>
    </div>  
    </div>
	</div>
</main>
<?php }?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/purejs.js"></script>
</body>
</html>