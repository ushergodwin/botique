<?php
session_start(); include_once('db.php'); require('admin-logic.php');
if(!isset($_SESSION['admin']) && $_SESSION['loggedin'] != true){
    header("location: user-login.php");
    exit;
}
?>
<html>
<head>
    <title>GemasGlamHome | STAFF PANNEL </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="imgs/gemasglam.ico">
    <link rel='stylesheet' href='css/custom.css' type='text/css' media='all' />
        <link rel='stylesheet' href='css/admin.css'/>
    <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
       <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/purejs.js"></script>
 <script>     $(function(){
         $(".open_admin").click(function(){
             $("#hidden").toggle(); $("#icon").toggleClass("fas fa-bars"); $("#icon").toggleClass("fas fa-times-circle"); }); $('[data-toggle="tooltip"]').tooltip();});
         </script>
    </head>
    <body>
        <nav class="navbar navbar-light bg-dark sticky-top">

            <div class="navbar nav-item" id="item">
    <a href="#" class="open_admin" data-toggle="tooltip" title="click to open the side bar"><h3><i class="fa fa-bars text-light" id="icon"></i></h3></a>&nbsp; &nbsp;  <h3> <a href="order-status.php" class="text-light">GemasGlamHome</a></h3>&nbsp; &nbsp;     
    <a href="admin.php" class="btn btn-outline-light btn-sm">ALL ORDERS</a> &nbsp; &nbsp;
                <a href="current.php" class="btn btn-outline-light btn-sm">CURRENT ORDERS <span><?php echo"&nbsp;".$current."&nbsp;"; ?></span></a>&nbsp; &nbsp;     
                <a href="delivered.php" class="btn btn-outline-light btn-sm">DELIVERD ORDERS <span><?php echo"&nbsp;".$delivered."&nbsp;"; ?></span></a>&nbsp; &nbsp;     
                <a href="canceled.php" class="btn btn-outline-light btn-sm">CANCELED ORDERS  <span id="canc"><?php echo"&nbsp;".$canceled."&nbsp;"; ?></span></a>&nbsp; &nbsp;
            </div>       
    <div class="navbar nav-item">
        <small style="color: white">Loggedin as: <?php echo $username; ?></small> &nbsp; 
    <a href="logout.php" class="btn btn-warning btn-sm" id="log">LOGOUT</a> 
    </div>
    </nav>
<div class="container-fluid">
    <div id="hidden">
    <nav class="sidebar bg-dark" id="admin_bar">
    <a href="order-status.php" class="btn btn-outline-light btn-sm active">Update Order Status</a><br><br>
        <a href="order-number.php" class="btn btn-outline-light btn-sm">Check for Order NO</a><br><br>
        <a href="userdetails.php" class="btn btn-outline-light btn-sm">Clients Details</a>
    </nav>
</div>
    <div class="row">
        <div class="col-md-12 col-lg-12">
        <?php echo $update_status; ?>    
    <h4>Update status</h4>
    <form class="form-inline" method="post" action="" id="mystatus">
        <input type="number" name="number" class="email" placeholder="enter order number" required>
    <input type="text" name="status" class="status" list="data-status" placeholder="Select order status" required>
        <button type="submit" class="btn btn-success btn-sm" name="update">UPDATE ORDER STATUS</button>
    </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-6">
        <?php 
    $sql = "select price, ordered_at, firstname, lastname, contact, location from all_cart inner join ordered on all_cart.order_ID = ordered.order_ID inner join users on ordered.email = users.email inner join address on users.email = address.email order by ordered_at desc";
$results = mysqli_query($con, $sql);
echo"<div class='table-responsive'>
<input type='search' placeholder='Search for a customer by name' onkeyup='myFunction()' id='myInput' class='form-control'>
        <table cellpadding='10' class='table table-dark table-striped' id='myTable'>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            </tr> ";
while($row = mysqli_fetch_assoc($results)){
        echo"<td colspan='2' class='statusColor'>"."ORDERD BY: ".$row['firstname']."&nbsp;".$row['lastname']."</td>";
         echo"<td colspan='2'>"."CONTACT: ".$row['contact']."</td>"; 
        echo"<td colspan='2'>"."ADDRESS: ".$row['location']."</td>";
    echo"<td colspan='2'>"."ORDERD AT: ".$row['ordered_at']."</td>";
        echo"</tr>";
}
echo "</table>";
echo"</div>";
    ?>
        </div>
        
        <div class="col-md-6 col-lg-6">
        <?php 
            $status = mysqli_query($con, "select email, ordered_at, status, order_ID from ordered order by ordered_at desc");
             echo"<div class='table-responsive'>
           <input type='search' placeholder='Search by time when order was placed' onkeyup='searchFunction()' id='myOrder' class='form-control'>  
        <table cellpadding='10' class='table table-dark table-striped' id='myOrderTable'>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            </tr> ";
while($row = mysqli_fetch_assoc($status)){
        echo"<td colspan='2'>"."EMAIL: ".$row['email']."</td>"; 
    echo"<td colspan='2'>"."ORDERD AT: ".$row['ordered_at']."</td>";
    echo"<td colspan='2' class='statusColor'>"."ORDER STATUS: ".$row['status']."</td>";
      echo"<td colspan='2' class='statusColor'>"."ORDER NO: ".$row['order_ID']."</td>";
   echo"<input type='hidden' class='stat' value='".$row['status']."'>";
        echo"</tr>";
}
echo "</table>";
echo"</div>";
            mysqli_close($con);
            ?>
        </div>
    </div>
        </div>
        <datalist id="data-status">
            <option>Order Shipped</option>
            <option>Order In Route</option>
            <option>Order Delivered</option>
            <option>Order Cancelled</option>
        </datalist>
    
    <a href="#top" class="tops"><i class="fas fa-arrow-circle-up"></i></a>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/purejs.js"></script>
    </body>
</html>