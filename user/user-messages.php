<?php session_start();  require('products-logic.php'); require_once 'messages.php';
include_once('db.php');
if(!isset($_SESSION['admin']) && $_SESSION['loggedin'] != true){
    header("location: user-login.php");
    exit;
}
?>
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
    <title>GemasGlamHome | ADMIN PANNEL </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="imgs/gemasglam.ico">
    <link rel='stylesheet' href='css/custom.css' type='text/css' media='all' />
    <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.0.0/css/all.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
       <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <style type="text/css">.sidebar{display: none;}</style>
    <script src="js/purejs.js"></script>
    <script type="text/javascript">$(document).ready(function(){$('[data-toggle = "tooltip"]').tooltip(); $("#show").click(function(){$("#hide").slideToggle(1000); }); }); </script>
    <script> function hide(){document.getElementById('hide').style.display = "none"; }</script>
    <style type="text/css">#message_box{border: 5px solid yellow} input[type=email], input[type=text]{border: 3px solid green; border-radius: 50px;} #textarea{border: 3px solid green} #message_body{background-image: radial-gradient(grey,white, gray)}#small{background-image: radial-gradient(grey,gray, white)} #message_card{border: none;} #hide{display: none} @media only screen and (min-width: 600px) {.desktop_view{display: none;}} @media only screen and (max-width: 600px) {.desktop_view{display: none;}} @media only screen and (min-width: 768px) {.desktop_view{display: none;} } @media only screen and (min-width: 992px) {.desktop_view{display: block;} #welcome{display: none}} @media only screen and (min-width: 1200px) {.desktop_view{display: block;} #welcome{display: none}}    </style>
    </head>
    <body>
        <nav class="navbar navbar-light bg-dark sticky-top">
            <div class="navbar nav-item" id="item">
                <a href="all_products.php" class="btn btn-outline-light btn-sm">ALL PRODUCTS</a>
                &nbsp;
                <a href="admin-products.php" class="btn btn-outline-light btn-sm">ADD PRODUCTS</a>
                 &nbsp;
                <a href="admin-products.php" class="btn btn-outline-light btn-sm">DELETE PRODUCTS</a>
                    &nbsp;
                <a href="admin-products.php" class="btn btn-outline-light btn-sm">UPDATE PRODUCTS</a>
                    &nbsp;
                <a href="delivery-prices.php" class="btn btn-outline-light btn-sm">DELIVERY PRICES</a>
                    &nbsp;
                <a href="user-messages.php" class="btn btn-outline-light btn-sm active">MESSAGES <span style="border-radius: 5px; border: 2px solid green;"><?php echo $message_num; ?></span></a>
            </div>
                    <div class="navbar nav-item">
                        <small style="color: white">Loggedin as: <?php echo $username; ?></small> &nbsp;
    <a href="logout.php" class="btn btn-warning btn-sm" id="log">LOGOUT</a>    
    </div>       
    </nav>
<div class="container-fluid">
    <div class="desktop_view">
    <div class="card mt-3">
        <h5 class="card-header text-muted"><i class="fas fa-envelope"></i> CLIENTS' MESSAGES</h5> <span><?php echo $delete_message_status;?></span>
        <div class="card-body">
   <div class="table-responsive">
       <table class="table table-dark">
          <thead>
              <tr>
                  <th>Message ID</th>
                  <th>SENT BY</th>
                  <th>SUBJECT</th>
                  <th>MESSAGE</th>
                  <th>ACTION</th>
              </tr>
          </thead>
          <tbody>
            <tr>
            <?php foreach ($all_messages as $key => $message): ?>
             <td><?php echo $message['id'] ?></td> 
             <td><?php echo $message['email'] ?></td>
             <td><?php echo $message['subject'] ?></td>
             <td><?php echo $message['message'] ?></td>
             <form action="" method="post">
              <input type="hidden" name="message_id" value="<?php echo htmlspecialchars($message['id']); ?>">  
             <td><button class="btn btn-danger btn-sm" name="delete_message" onclick="return confirm('DELETE MESSAGE?');" data-toggle="tooltip" title="click to delete message"><i class="fa fa-trash"></i> </button></td>
         </form>
         </tr>
          </tbody>
      <?php endforeach; ?>
       </table>
   </div>
</div>
</div>
  <div class="row">
  <div class="col-sm-12 col-md-12 col-lg-12">
<div class="card mt-3">
  <h4 class="card-header text-muted">Reply to Messages <?php echo $sent_status; ?></h4>
  <div class="card-body">
  <div class="card" id="message_box">
    <div class="card-body" id="message_body">
      <form method="post" action="">
        <div class="input-group">
          <label for="receiver" class="control-label font-weight-bold">TO</label> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
          <input type="email" name="receiver" class="form-control" placeholder="enter the recepient's email" required="required">
        </div> <span class="text-danger"><?php echo $receiver_email_error;?></span> <br>
        <div class="input-group">
          <label for="subject" class="control-label font-weight-bold">SUBJECT</label> &nbsp; &nbsp;
          <input type="text" name="subject" class="form-control" placeholder="enter the subject" required="required">
        </div><span class="text-danger"><?php echo $sender_subject_error;?></span><br>
         <div class="form-group">
          <label for="response" class="control-label font-weight-bold">RESPONSE</label> &nbsp; &nbsp;
          <textarea name="response" class="form-control" rows="10" cols="5" id="textarea" required></textarea>
          <span class="text-danger"><?php echo $response_error;?></span>
        </div>
        <div align="right">
          <button type="submit" name="reply" class="btn btn-warning btn-sm">REPLY</button>
        </div>
      </form>
    </div>
  </div>
</div>  
</div>
</div>
</div>
    </div>
    
    <!-- mobile view -->
    <div class="card card-body bg-warning mt-2" id="welcome">
    <h5 class="text-dark">Welcome <?php echo $username; ?> <i class="fas fa-heart text-danger"></i> , Messages are Hidded by default <button class="btn btn-outline-light" id="show">SHOW</button> </h5>
        <span><?php echo $delete_message_status;?></span>
        <?php echo $sent_status; ?>
    </div>
    <div id="hide">
    <div class="card mobile_view mt-3">
          <h5 class="card-header text-muted"><i class="fas fa-envelope"></i> CLIENTS' MESSAGES</h5>
    <div class="card-body">
        <?php foreach ($all_messages as $key => $message): ?>
        <div class="card mt-2">
            <div class="card-header text-dark bg-light py-1" id="message_card">
                 <div class="row d-flex justify-content-between"> <div class="d-flex"> <h4><button class="btn text-dark
font-weight-bold" onclick="history.back();"><i class="fas fa-arrow-left"></i></button></h4> </div> <div class="d-flex flex-column
text-sm-right">             <form action="" method="post">
              <input type="hidden" name="message_id" value="<?php echo htmlspecialchars($message['id']); ?>">  
             <td><button class="btn btn-danger btn-sm" name="delete_message" onclick="return confirm('DELETE MESSAGE?');"><i class="fa fa-trash"></i> </button></td>
         </form>
            </div> </div>
                <h5><?php echo $message['subject'] ?> &nbsp; <small class="text-second" id="small">Inbox</small>
                </h5> <h6><?php echo $message['email'] ?></h6></div>
        <div class="card-body">
            <p class="text-dark"> <?php echo $message['message'] ?></p>
            <form action="" method="post" id="replyForm">
                <input type="hidden" name="to" value="<?php echo $message['email']?>">
             <input type="hidden" name="sub" value="<?php echo $message['subject']?>">
            <p><button type="submit" class="btn text-dark" name="mob_reply" style="font-size: 18pt" onclick="hide();"><i class="fa fa-reply"></i> </button> </p>
            </form>
            </div>
        </div>
        <?php endforeach; ?>
        </div>
    </div>
    </div>
            <?php if(isset($_POST['mob_reply'])){ $to = $_POST['to']; $sub = $_POST['sub']; ?>

    <div class="row justify-content-center">
  <div class="col-sm-12 col-md-12">
<div class="card mt-3">
  <h4 class="card-header text-muted">Reply this Message</h4>
    <a name="reply"></a>
  <div class="card-body">
  <div class="card" id="message_box">
    <div class="card-body">
      <form method="post" action="">
        <div class="form-group">
          <label for="receiver" class="control-label font-weight-bold">TO</label> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
          <input type="email" name="receiver" class="form-control" placeholder="enter the recepient's email" value="<?php echo $to ?>" required="required">
        </div> <span class="text-danger"><?php echo $receiver_email_error;?></span>
        <div class="form-group">
          <label for="subject" class="control-label font-weight-bold">SUBJECT</label> &nbsp; &nbsp;
          <input type="text" name="subject" class="form-control" placeholder="enter the subject" value="<?php echo $sub ?>" required="required">
        </div><span class="text-danger"><?php echo $sender_subject_error;?></span>
         <div class="form-group">
          <label for="response" class="control-label font-weight-bold">RESPONSE</label> &nbsp; &nbsp;
          <textarea name="response" class="form-control" rows="10" cols="5" id="textarea" required></textarea>
          <span class="text-danger"><?php echo $response_error;?></span>
        </div>
        <div align="right">
          <button type="submit" name="reply" class="btn btn-warning btn-sm">REPLY</button>
        </div>
      </form>
    </div>
  </div>
</div>  
</div>
</div>
</div>  
        <?php } ?>
    <?php $conn->close(); ?> 
        </div>
       
    <a href="#top" class="tops text-secondary"><i class="fas fa-arrow-circle-up"></i></a>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/purejs.js"></script>
    </body>
</html>