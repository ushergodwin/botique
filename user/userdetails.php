<?php
session_start(); include_once('db.php'); require('admin-logic.php');
if(!isset($_SESSION['admin']) && $_SESSION['loggedin'] != true){
    header("location: login.php");
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
        <link rel='stylesheet' href='css/admin.css' type='text/css' media='all' />
    <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
       <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/header.js"></script>
    <script src="js/purejs.js"></script>
    <script>     $(function(){$(".open_admin").click(function(){$("#hidden").toggle(); $("#bar_icon").toggleClass('fas fa-times-circle');$("#bar_icon").toggleClass('fas fa-bars'); }); $('[data-toggle="tooltip"]').tooltip();});
</script>
    </head>
    <body>
        <nav class="navbar navbar-light bg-dark sticky-top">
            <div class="navbar nav-item" id="item">
    <a href="#" class="open_admin" data-toggle="tooltip" title="click to open the side bar"><h3><i class="fa fa-bars text-light" id="bar_icon"></i></h3></a> &nbsp; &nbsp;        
    <a href="admin.php" class="btn btn-outline-light btn-sm">ALL ORDERS</a> &nbsp; &nbsp;        
                 <a href="current.php" class="btn btn-outline-light btn-sm">CURRENT ORDERS <span><?php echo"&nbsp;".$current."&nbsp;"; ?></span></a>&nbsp; &nbsp;     
                <a href="delivered.php" class="btn btn-outline-light btn-sm">DELIVERD ORDERS <span><?php echo"&nbsp;".$delivered."&nbsp;"; ?></span></a>&nbsp; &nbsp;     
                <a href="canceled.php" class="btn btn-outline-light btn-sm">CANCELED ORDERS  <span id="canc"><?php echo"&nbsp;".$canceled."&nbsp;"; ?></span></a> &nbsp; &nbsp;
                <a href="userdetails.php" class="btn btn-outline-light btn-sm active">USER DETAILS</a>
            </div>       
    <div class="navbar nav-item">
    <small style="color: white">Loggedin as: <?php echo $username; ?></small> &nbsp;     
    <a href="logout.php" class="btn btn-warning btn-sm" id="log">LOGOUT</a>    
    </div>
    </nav>
<div class="container-fluid">
    <div id="hidden">
    <nav class="sidebar bg-dark" id="admin_bar">
    <a href="order-status.php" class="btn btn-outline-light btn-sm">Update Order Status</a><br><br>
        <a href="order-number.php" class="btn btn-outline-light btn-sm">Check for Order NO</a><br><br>
        <a href="userdetails.php" class="btn btn-outline-light btn-sm">Clients Details</a>
    <div class="footer">
            <small style="color: white">Loggedin as: <?php echo $username; ?></small>
        </div>    
    </nav>
</div>
        <?php 
    $sql = "select email, firstname, lastname, contact, address from users where account_type='user' order by firstname asc";
$results = mysqli_query($con, $sql);
    if(mysqli_num_rows($results)>0){
echo"<div class='table-responsive'>
        <table cellpadding='10' class='table table-light table-striped' id='myTable'>
        <tr>
            <th>FIRST NAME</th>
            <th>LAST NAME</th>
            <th>PHONE NUMBER</th>
            <th>EMAIL</th>
            <th>ADDRESS</th>
            </tr> ";
while($row = mysqli_fetch_assoc($results)){
       echo" <tr>";
          echo"<td>".$row['firstname']."</td>";
        echo"<th>".$row['lastname']."</th>";
     echo"<th>".$row['contact']."</th>"; 
     echo"<th>".$row['email']."</th>"; 
         echo"<th>".$row['address']."</th>";
      echo"</tr> ";
}
echo "</table>";
    }else{
        echo "No Users Available Yet";
    }
echo"</div>";
    mysqli_close($con);
    ?>
        </div>
    
    <a href="#top" class="tops"><i class="fas fa-arrow-circle-up"></i></a>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/purejs.js"></script>
    </body>
</html>