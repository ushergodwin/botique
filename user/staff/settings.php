<?php include_once 'count.php'; require_once 'db.php'; ?>
<html>
<title>sPanel</title>
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
<style type="text/css">#saveprofile, #saveaddress{display: none} .saving{display: none;} .hidePassword{display: none;}</style>
<body>
<div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left bg-dark text-light font-weight-bold" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
  <div class="jumbotron py-1 bg-dark text-center p-3"><h4><a href="dashboard" class="text-light"> GemasGlamHome</a></h4><h5 class="text-warning">WELCOME</h5></div><hr>
  <a href="all-orders" class="w3-bar-item w3-button">ALL ORDERS &nbsp;<span class="badge badge-light"><?php echo $order->get_total(); ?></span></a><hr>
  <a href="#products.asp" class="w3-bar-item w3-button" id="open-product-links"><i class="fab fa-product-hunt text-secondary"></i> ORDERS &nbsp;<i class="fas fa-angle-down" id="product-angle"></i> </a>
  <ul class="show-product-links">
   <a href="current" class="w3-bar-item w3-button">CURRENT</a>
   <a href="delivered" class="w3-bar-item w3-button">DELIVERED</a>
   <a href="cancelled" class="w3-bar-item w3-button">CANCELLED</a> 
   <a href="order-number" class="w3-bar-item w3-button">ORDER NO</a> 
  </ul>
  <hr>
  <a href="#users.asp" class="w3-bar-item w3-button" id="open-user-links"><i class="fas fa-user text-secondary"></i> USERS&nbsp;<small><span class="badge badge-light messages"><?php echo $users_count; ?></span></small> &nbsp;  &nbsp;<i class="fas fa-angle-down" id="user-angle"></i> </a>
  <ul class="show-user-links">
   <a href="clients" class="w3-bar-item w3-button" data-toggle="tooltip" title="change the user account type and click on save">ALL USERS</a>
  </ul> 
  <hr>
  <a href="order-status" class="w3-bar-item w3-button">UPDATE ORDER STATUS</a>
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
    <a href="dashboard" class="navbar-brand"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="clients" class="nav-item nav-link"><i class="fas fa-user"></i> Users<small><span class="badge badge-light messages" id="top-badge"><?php echo $users_count; ?></span></small></a> &nbsp;
            <a href="settings" class="nav-item nav-link"><i class="fas fa-cog"></i> Settings</a>
        </div>
        <form class="form-inline ml-auto">
            <input type="text" class="form-control mr-sm-2" placeholder="Search">
            <button type="submit" class="btn btn-outline-light">Search</button>
        </form>
          <div class="navbar-nav">
            <a href="#" class="nav-item nav-link"><small><span class="badge badge-light messages" id="top-badge">5</span></small><h4><i class="fas fa-bell"></i></h4></a>
             <a href="settings" class="nav-item nav-link"><h4><i class="fas fa-cog"></i></h4></a>
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
font-weight-bold">Loggedin as: <?php echo $user->get_firstName(); ?></span>&nbsp;<span id="time" class="text-light"></span></h5> &nbsp; &nbsp; <a href="#" class="text-light">Home /<small class="text-warning">Admin</small> / <small class="text-secondary">Setting</small> </a> </div><a href="#hide-bottom-bar.asp" class="nav-item nav-link d-flex flex-column
text-sm-right" id="bottom-bar"><h4 lass=""><i class="fas fa-eye-slash text-light" id="eye"></i></h4></a>
 </div>
     </div>
<div class="w3-container">  
    <div class="card mt-3 bg-dark text-light">
    <div class="card-body">
       <div class="row">
        <div class="col-sm-12 col-md-12">
        <div class="card bg-dark">
        <div class="card-body">
                 <h5 class="text-warning">Welocome, &nbsp;<?php echo $user->get_firstName() ."&nbsp;".$user->get_lastName(); ?></h5>     
                </div>           
            </div>    
        </div>
      </div>
        </div> 
            
    </div>
       <div class="card">
        <h4 class="card-header text-warning">Account Overview</h4>
        <div class="card-body">
        <div class="row"> 
        <div class="col-md-6 col-lg-4">       
         <div class="card mt-4">
             <a name="useranchar"></a>
             <div class="card-header text-warning"><h4>ACCOUNT DETAILS <a href="#" data-toggle="tooltip" title="edit" class="profile"><i class="fas fa-user-edit"></i></a> </h4>
             </div>
            <div class="card-body">
            <form action="" method="post" class="user">
                <input type="input" value="<?php echo htmlspecialchars($user->get_email()) ?>" style="width: 300" class="form-control" data-toggle="tooltip" title="email can not be changed" readonly>
                <div class="form-group row">
                <label class="col-dm-6">First Name:</label>
                <div class="col-md-6">
                <input type="text" value="<?php echo htmlspecialchars($user->get_firstName()) ?>" style="width: 200" class="text" name="firstname" id="name" required readonly>
                    </div>
                </div>
                <div class="form-group row">
                <label class="col-dm-6">Last Name:</label>
                <div class="col-md-6">    
                <input type="text" value="<?php echo htmlspecialchars($user->get_lastName()) ?>" style="width: 200" class="text" name="lastname" required readonly>
                    </div>
                </div>
                <div class="form-group row">
                <label class="col-dm-6">Phone Number:</label>
                <div class="col-md-6">
                    <input type="text" value="<?php echo htmlspecialchars($user->get_contact()) ?>" style="width: 200" class="text" name="contact" required readonly>
                    </div>
                </div>
                <br>
                <div align="right">
                  <input type="hidden" name="saveprofile" value="saveprofile">
                <button type="submit" class="btn btn-outline-primary btn-sm" id="saveprofile">SAVE</button>
                </div>
                </form> 
             </div>
            </div>
            </div>
            
            <div class="col-md-6 col-lg-4">      
         <div class="card mt-4">
             <div class="card-header text-warning"><h4>ADDRESS BOOK <a href="#" data-toggle="tooltip" title="edit" class="address"><i class="fas fa-edit"></i></a></h4></div>
            <div class="card-body">
                <a name="addressanchar"></a>
                <form action="" method="post" class="addressBook">
                <div class="form-group row">
                    <label class="col-dm-4">Address:</label>
                    <div class="col-md-6">
                     <input type="text" value="<?php echo htmlspecialchars($user->get_address()) ?>" list="location" style="width: 200" class="textaddress" name="address" id="address" required readonly>
                    </div>
                    </div>
                    <div align="right">
                      <input type="hidden" name="saveaddress" value="saveaddress">
                    <button type="submit" class="btn btn-outline-primary btn-sm" id="saveaddress">SAVE</button>
                    </div>
                </form>
                <div class="response"></div>
                <div class="saving"><h5><span class="spinner-border spinner-border-sm text-primary"></span><small>saving...</small></h5></div>
             </div>
            </div>
            </div>
            
            <div class="col-md-6 col-lg-4" id="password">      
         <div class="card mt-4">
             <div class="card-header text-warning"><h4><i class="fas fa-key"></i> CHANGE PASSWORD</h4></div>
            <div class="card-body">
              <div align="right">
                <a href="#showpassword.asp" class="text-primary showPassword" data-toggle="tooltip" title="show password"><h5><i class="fas fa-eye"></i> </h5></a>
                <a href="#hidepassword.asp" class="text-primary hidePassword" data-toggle="tooltip" title="hide password"><h5><i class="fas fa-eye-slash"></i> </h5></a>
              </div>
             <form action="" method="post" class="changePassword">
                <div class="form-group row">
                 <label class="col-md-4">Current Password</label>
                    <div class="col-md-6">
                    <input type="password" name="current" class="form-control" id="current" autofocus required>
                    </div>
                 </div>
                                 <div class="form-group row">
                 <label class="col-md-4">New Password</label>
                    <div class="col-md-6">
                    <input type="password" name="new" class="form-control" id="new" required>
                    </div>
                 </div>
                                 <div class="form-group row">
                 <label class="col-md-4">Retype Password</label>
                    <div class="col-md-6">
                    <input type="password" name="conf" class="form-control" id="conf" required>
                    </div>
                 </div>
                 <div align="right">
                  <input type="hidden" name="savepassword" value="savepassword">
                 <button type="submit" class="btn btn-outline-primary btn-sm" onclick="return confirm('Save Password?')">SAVE</button>
                 </div>
                </form>
             </div>
            </div>
            </div>
            
            </div>
        </div>
        
        </div>
        </div>

</div>
 <a href="#show-bottom-bar.asp" class="open-bottom-bar"><h3><i class="fas fa-eye text-primary"></i> </h3></a>
 <div class="rounded-circle bg-secondary div-top">  
 <a href="#top.asp" class="top"><h3><i class="fas fa-angle-up text-light"></i> </h3></a>
 </div> 
 <script type="text/javascript">
     $(document).ready( () => {
          //user settings
      $(".user").on("submit", (e) => {
       e.preventDefault();
       $.ajax({
        url: "update",
        type: "POST",
        data: $(".user").serializeArray(),
        beforeSend: () => {
          $(".saving").show();
        },
        success: (data) => {
          $(".response").html(data);
          $(".response").fadeOut(12 * 1000);
        },
        complete: () => {
          $(".saving").hide();
        }
       });
  } );

  $(".addressBook").on("submit", (e) => {
       e.preventDefault();
       $.ajax({
        url: "update",
        type: "POST",
        data: $(".addressBook").serializeArray(),
        beforeSend: () => {
          $(".saving").show();
        },
        success: (data) => {
          $(".response").html(data);
          $(".response").fadeOut(12 * 1000);
        },
        complete: () => {
          $(".saving").hide();
        }
       });
  } );

    $(".changePassword").on("submit", (e) => {
       e.preventDefault();
       $.ajax({
        url: "update",
        type: "POST",
        data: $(".changePassword").serializeArray(),
        beforeSend: () => {
          $(".saving").show();
        },
        success: (data) => {
          $(".response").html(data);
          $(".response").fadeOut(12 * 1000);
        },
        complete: () => {
          $(".saving").hide();
        }
       });
  } );
     });
 </script>

           <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   
</body>
</html>
