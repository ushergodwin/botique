<?php
session_start(); include_once('db.php'); require('admin-logic.php');
if(!isset($_SESSION['admin']) && $_SESSION['loggedin'] != true){
    header("location: user-login.php");
    exit;
}
?>
<html>
<head>
    <title>GemasGlamHome | ADMIN PANNEL </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="imgs/gemasglam.ico">
    <link rel='stylesheet' href='css/custom.css' type='text/css' media='all' />
        <link rel='stylesheet' href='css/admin.css' type='text/css' media='all' />
    <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/header.js"></script>
    <script src="js/purejs.js"></script>
    <script>     $(function(){$(".open_admin").click(function(){$("#hidden").toggle(); $("#icon").toggleClass("fas fa-bars"); $("#icon").toggleClass("fas fa-times-circle");}); $('[data-toggle="tooltip"]').tooltip();});</script>
    </head>
    <body>
        <nav class="navbar navbar-light bg-dark sticky-top">
            <div class="navbar nav-item" id="item">
    <a href="#" class="open_admin" data-toggle="tooltip" title="click to open the side bar"><h3><i class="fa fa-bars text-light" id="icon"></i></h3></a> &nbsp; &nbsp;  <h3> <a href="order-number" class="text-light">GemasGlamHome/ <a href="order-number" class="active">ORDER NOs</a></a></h3>  &nbsp; &nbsp;        
    <a href="admin.php" class="btn btn-outline-light btn-sm">ALL ORDERS</a> &nbsp; &nbsp; 
                  <a href="current.php" class="btn btn-outline-light btn-sm">CURRENT ORDERS <span><?php echo"&nbsp;".$current."&nbsp;"; ?></span></a>&nbsp; &nbsp;     
                <a href="delivered.php" class="btn btn-outline-light btn-sm">DELIVERD ORDERS <span><?php echo"&nbsp;".$delivered."&nbsp;"; ?></span></a>&nbsp; &nbsp;     
                <a href="canceled.php" class="btn btn-outline-light btn-sm">CANCELED ORDERS  <span id="canc"><?php echo"&nbsp;".$canceled."&nbsp;"; ?></span></a>
            </div>       
    <div class="navbar nav-item">
    <a href="logout.php" class="btn btn-warning btn-sm" id="log">LOGOUT</a> 
    </div>
    </nav>
<div class="container-fluid">
    <div id="hidden">
    <nav class="sidebar bg-dark" id="admin_bar">
    <a href="order-status.php" class="btn btn-outline-light btn-sm">Update Order Status</a><br><br>
        <a href="order-number.php" class="btn btn-outline-light btn-sm active">Check for Order NO</a><br><br>
        <a href="userdetails.php" class="btn btn-outline-light btn-sm">Clients Details</a>
    </nav>
</div>
        <?php 
    $sql = "select order_ID, ordered_at, status, firstname, lastname, contact, address from ordered inner join users on ordered.email = users.email order by order_ID desc";
$results = mysqli_query($con, $sql);
echo"<div class='table-responsive'>
        <table cellpadding='10' class='table table-dark table-striped' id='myTable'>
        <tr>
            <th>ORDER ID</th>
            <th>ORDERD AT </th>
            <th>ORDERD BY</th>
            <th>CONTACT</th>
            <th>ADDRESS</th>
            <th>ORDER STATUS</th>
            </tr> ";
while($row = mysqli_fetch_assoc($results)){
       echo" <tr>";
        echo"    <td>".$row['order_ID']."</td> ";
          echo"<td>".$row['ordered_at']."</td>";
         echo"<td>".$row['firstname']."&nbsp;".$row['lastname']."</td>";
        echo"<td>".$row['contact']."</td>";
         echo "<td>".$row['address']."</td>";
         echo"<td>".$row['status']."</td>";
      echo"</tr> ";
}
echo "</table>";
echo"</div>";
    mysqli_close($con);
    ?>
        </div>
    
    <a href="#top" class="tops"><i class="fas fa-arrow-circle-up"></i></a>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="js/purejs.js"></script>
    </body>
</html>