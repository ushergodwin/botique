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
<style type="text/css">#loading{display: none;}</style>
<body>
<div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left bg-dark text-light font-weight-bold" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
  <div class="jumbotron py-1 bg-dark text-center p-3"><h4><a href="dashboard" class="text-light"> GemasGlamHome</a></h4><h5 class="text-warning">WELCOME</h5></div><hr>
  <a href="all-products" class="w3-bar-item w3-button">ALL ORDERS &nbsp;<span class="badge badge-light"><?php echo $order->get_total(); ?></span></a><hr>
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
   <a href="clients" class="w3-bar-item w3-button" data-toggle="tooltip" title="change the user account type and click on save">USERS / CLIENTS</a>
  </ul> 
<hr>
  <a href="order-status" class="w3-bar-item w3-button"> UPDATE ORDER STATUS</a>
  <hr>
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
            <a href="settings" class="nav-item nav-link"><i class="fas fa-cog"></i> Settings</a>&nbsp;
            <a href="delivered" class="nav-item nav-link"><i class="fas fa-shopping-basket"></i> Delivered Orders <small><span class="badge badge-light current" id="top-badge"><?php echo $delivered->get_delivered(); ?></span></small></a>
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
font-weight-bold">Loggedin as: <?php echo $user->get_firstName(); ?></span>&nbsp;<span id="time" class="text-light"></span></h5> &nbsp; &nbsp; <a href="#" class="text-light">Home /<small class="text-warning">Admin</small> / <small class="text-secondary">Clients</small> &nbsp; &nbsp; </a> </div><a href="#hide-bottom-bar.asp" class="nav-item nav-link d-flex flex-column
text-sm-right" id="bottom-bar"><h4 lass=""><i class="fas fa-eye-slash text-light" id="eye"></i></h4></a>
 </div>
     </div>
<div class="w3-container">  
    <div class="card mt-3 bg-dark text-light">
    <h5 class="card-header py-1"> <i class="fas fa-shopping-basket"></i> DELIVERED ORDERS <small><span class="badge badge-light current"><?php echo $delivered->get_delivered(); ?></span></small></h5>
    <div class="card-body">
      <div class="table-responsive">
       <?php $currency = "UGX ";
    $sql = "SELECT image, name, quantity, price, it_total_price, ordered.order_ID, shipping, payment, total_cost, status, ordered_at, firstname, lastname, contact, location from all_cart inner join ordered on all_cart.order_ID = ordered.order_ID inner join users on ordered.email = users.email INNER JOIN address ON users.email = address.email where ordered.status='Order Delivered' order by ordered_at desc";
$results = mysqli_query($con, $sql);
    if(mysqli_num_rows($results)>0){
echo"<div class='table-responsive'>
        <table cellpadding='10' class='table table-dark table-striped' id='myTable'>
        <tr>
            <th>IMAGE</th>
            <th>PRODUCT NAME</th>
            <th>QUANTITY</th>
            <th>PRICE</th>
            <th>SUB TOTAL</th>
            <th>SHIPPING</th>
            <th>PAYMENT METHOD</th>
            <th>ORDER NUMBER</th>
            </tr> ";
while($row = mysqli_fetch_assoc($results)){
       echo" <tr>";
        echo"    <td><img src='".$row['image']."' width='100' height='100' /></td> ";
          echo"<td>".$row['name']."</td>";
         echo"<td>".$row['quantity']."</td>";
        echo"<td>".$currency.number_format($row['price'])."</td>";
         echo"<td>".$currency.number_format($row['it_total_price'])."</td>";
         echo "<td>".$row['shipping']."</td>";
         echo"<td>".$row['payment']."</td>";
         echo"<td>".$row['order_ID']."</td>";
      echo"</tr> ";
       echo"<tr>";
        echo"<th class='text-success'>"."TOTAL COST: ".$currency.number_format($row['total_cost'])."</th>";
        echo"<th colspan='2' class='text-success'>"."ORDERD BY: ".$row['firstname']."&nbsp;".$row['lastname']."</th>";
         echo"<th colspan='2' class='text-success'>"."CONTACT: ".$row['contact']."</th>"; 
        echo"<th colspan='2' class='text-success'>"."ADDRESS: ".$row['location']."</th>";
    echo"<th colspan='2' class='text-success'>"."ORDERD AT: ".$row['ordered_at']."</th>";
        echo"</tr>";
}
echo "</table>";
    }else{
        echo "<h4 class='text-light'>No Orders Delivered Yet!</h4>";
    }
echo"</div>";
    mysqli_close($con);
    ?>
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
           <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   
</body>
</html>
