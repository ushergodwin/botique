<?php include_once 'count.php'; require_once 'db.php'; require 'send.php';?>
<html>
<title>aPanel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/x-icon" href="imgs/favicon.ico">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.1/css/all.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/custom.css" media="all">
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="js/jquery.js"></script>
<script src="js/javascript.js"></script>
 <script type="text/javascript">$(document).ready(function(){$('[data-toggle = "tooltip"]').tooltip(); $("#show").click(function(){$("#hide").slideToggle(1000); }); }); </script>
    <script> function hide(){document.getElementById('hide').style.display = "none"; }</script>
    <style type="text/css">#message_box{border: 5px solid yellow} input[type=email], input[type=text]{border: 3px solid green; border-radius: 50px;} #textarea{border: 3px solid green} #message_body{background-image: radial-gradient(grey,white, gray)}#small{background-image: radial-gradient(grey,gray, white)} #message_card{border: none;} #hide{display: none} @media only screen and (min-width: 600px) {.desktop_view{display: none;}} @media only screen and (max-width: 600px) {.desktop_view{display: none;}} @media only screen and (min-width: 768px) {.desktop_view{display: none;} } @media only screen and (min-width: 992px) {.desktop_view{display: block;} #welcome{display: none}} @media only screen and (min-width: 1200px) {.desktop_view{display: block;} #welcome{display: none}}    </style>
<body>
<div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left bg-dark text-light font-weight-bold" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
  <div class="jumbotron py-1 bg-dark text-center p-3"><h4><a href="dashboard" class="text-light"> GemasGlamHome</a></h4><h5 class="text-warning">WELCOME</h5></div><hr>
  <a href="all-products" class="w3-bar-item w3-button">ALL PRODUCTS &nbsp;<span class="badge badge-light"><?php echo $total_no_of_products; ?></span></a><hr>
  <a href="#products.asp" class="w3-bar-item w3-button" id="open-product-links"><i class="fab fa-product-hunt text-secondary"></i> PRODUCTS &nbsp;<i class="fas fa-angle-down" id="product-angle"></i> </a>
  <ul class="show-product-links">
   <a href="add-products" class="w3-bar-item w3-button">ADD PRODUCTS</a>
   <a href="add-products" class="w3-bar-item w3-button">DELETE PRODUCTS</a>
   <a href="add-products" class="w3-bar-item w3-button">UPDATE PRODUCTS</a> 
  </ul>
  <hr>
  <a href="#users.asp" class="w3-bar-item w3-button" id="open-user-links"><i class="fas fa-user text-secondary"></i> USERS&nbsp;<small><span class="badge badge-light messages"><?php echo $users_count; ?></span></small> &nbsp;  &nbsp;<i class="fas fa-angle-down" id="user-angle"></i> </a>
  <ul class="show-user-links">
   <a href="clients" class="w3-bar-item w3-button" data-toggle="tooltip" title="change the user account type and click on save">UPATE USERS</a>
   <a href="clients" class="w3-bar-item w3-button" data-toggle="tooltip" title="click on the red button at extreme left of the table to delete a user">DELETE USERS</a>
  </ul> 
<hr>
  <a href="delivery" class="w3-bar-item w3-button"><i class="fas fa-money-check-alt text-secondary"></i> DELIVERY PRICES</a>
  <hr>
  <a href="delivery" class="w3-bar-item w3-button">ADD VOUCHAR</a>
  <hr>
  <a href="messages" class="w3-bar-item w3-button"><i class="fas fa-envelope text-secondary messages"></i> MESSAGES  <span class="badge badge-light"><?php echo $messages_count; ?></span></a>
</div>

<div class="w3-main">
<div class="w3-teal bg-dark">
  <button class="w3-button w3-teal w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</button>
  
</div>
   <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top p-3">
     <a href="#hide-side-bar.asp" class="nav-item nav-link text-secondary hide-side-bar"><h4><i class="fas fa-bars"></i> </h4> </a> 
     <a href="#show-side-bar.asp" class="nav-item nav-link text-secondary open-side-bar"><h4><i class="fas fa-bars"></i> </h4> </a> 
    <a href="#" class="navbar-brand"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="clients" class="nav-item nav-link"><i class="fas fa-user"></i> Users<small><span class="badge badge-light messages" id="top-badge"><?php echo $users_count; ?></span></small></a> &nbsp;
            <a href="settings" class="nav-item nav-link"><i class="fas fa-cog"></i> Settings</a>
        </div>
              <input type='text'
id='myProduct' class='form-control' onkeyup="productFunction();"
placeholder="search message by email address" style="width: 400">
          <div class="navbar-nav">
            <a href="messages" class="nav-item nav-link"><small><span class="badge badge-light" id="top-badge"><?php echo $messages_count; ?></span></small><h4><i class="fas fa-envelope"></i></h4></a>
            <a href="#" class="nav-item nav-link"><small><span class="badge badge-light messages" id="top-badge">5</span></small><h4><i class="fas fa-bell"></i></h4></a>
             <a href="#" class="nav-item nav-link"><h4><i class="fas fa-cog"></i></h4></a>
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Admin</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="help" class="dropdown-item">Help?</a>
                        <a href="settings" class="dropdown-item">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a href="logout"class="dropdown-item">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <div class="card card-body bg-dark py-1 fixed-bottom" id="card-next-to-nav">
       <div class="row d-flex justify-content-between"> <div class="d-flex"> <h5><span class="text-warning
font-weight-bold">Loggedin as: <?php echo $firstname; ?></span>&nbsp;<span id="time" class="text-light"></span></h5> &nbsp; &nbsp; <a href="#" class="text-light">Home /<small class="text-warning">Admin</small> / <small class="text-secondary">Messages</small> </a> </div><a href="#hide-bottom-bar.asp" class="nav-item nav-link d-flex flex-column
text-sm-right" id="bottom-bar"><h4 lass=""><i class="fas fa-eye-slash text-light" id="eye"></i></h4></a>
 </div>
     </div>
<div class="w3-container">  
<div class="desktop_view">
    <div class="card mt-3 bg-dark text-light">
        <h5 class="card-header text-light"><i class="fas fa-envelope"></i> CLIENTS' MESSAGES</h5> <span><?php echo $delete_message_status;?></span>
        <div class="card-body">
   <div class="table-responsive">
       <table class="table table-dark" id="messageTable">
          <thead>
              <tr>
                  <th>SENT BY</th>
                  <th>SUBJECT</th>
                  <th>MESSAGE</th>
                  <th>ACTION</th>
              </tr>
          </thead>
          <tbody>
            <tr>
            <?php foreach ($all_messages as $key => $message): ?>
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
<div class="card mt-3 bg-dark text-light">
  <h4 class="card-header text-light">Reply to Messages <?php echo $sent_status; ?></h4>
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
    <div class="card mobile_view mt-3 bg-dark">
          <h5 class="card-header text-light"><i class="fas fa-envelope"></i> CLIENTS' MESSAGES</h5>
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
            <form action="" method="post">
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
       
        </div>

</div>
   
</div>

 <a href="#show-bottom-bar.asp" class="open-bottom-bar"><h3><i class="fas fa-eye text-primary"></i> </h3></a>
 <div class="rounded-circle bg-secondary div-top">  
 <a href="#top.asp" class="top"><h3><i class="fas fa-angle-up text-light"></i> </h3></a>
 </div> 
  <script type="text/javascript"> function productFunction() {
 // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myProduct");
  filter = input.value.toUpperCase();
  table = document.getElementById("messageTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script> 
           <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   
</body>
</html>
