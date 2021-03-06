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
<style type="text/css">.updating{display: none;}
input[type=number],input[type=text]{
  border-top: none; border-left: none; border-right: none; border-bottom-color: green;
}
input[type=number],input[type=text]:focus{
  outline: none;
}
</style>
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
        </div>
        <form class="form-inline ml-auto">
            <input type="text" class="form-control mr-sm-2" placeholder="Search">
            <button type="submit" class="btn btn-outline-light">Search</button>
        </form>
          <div class="navbar-nav">
            <a href="#" class="nav-item nav-link"><small><span class="badge badge-light messages" id="top-badge">5</span></small><h4><i class="fas fa-bell"></i></h4></a>
             <a href="#" class="nav-item nav-link"><h4><i class="fas fa-cog"></i></h4></a>
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Admin</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item">Help?</a>
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
font-weight-bold">Loggedin as: <?php echo $user->get_firstName(); ?></span>&nbsp;<span id="time" class="text-light"></span></h5> &nbsp; &nbsp; <a href="#" class="text-light">Home /<small class="text-warning">Admin</small> / <small class="text-secondary">Clients</small> &nbsp; &nbsp;</a> </div><a href="#hide-bottom-bar.asp" class="nav-item nav-link d-flex flex-column
text-sm-right" id="bottom-bar"><h4 lass=""><i class="fas fa-eye-slash text-light" id="eye"></i></h4></a>
 </div>
     </div>
<div class="w3-container">  
    <div class="card mt-3 bg-light text-secondary">
    <h5 class="card-header py-1">UPDATE ORDER STATUS </h5>
    <div class="card-body">
          <div class="row">
        <div class="col-md-12 col-lg-12">
    <h4 class="updateResponse"></h4>
    <form class="form-inline upadeForm" method="post" action="">
        <input type="number" name="number" class="number" placeholder="enter order number" required>
    <input type="text" name="status" class="status" list="data-status" placeholder="Select order status" required>
    <input type="hidden" name="update" value="update" class="trigger">
        <button type="submit" class="btn btn-success btn-sm">UPDATE ORDER STATUS</button> &nbsp; &nbsp; &nbsp;
        <small class="updating tex-dark"><span class="spinner-border spinner-border-sm"></span> updatingStatus...</small>
    </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-6">
        <?php 
    $sql = "SELECT price, ordered_at, firstname, lastname, contact, location from all_cart inner join ordered on all_cart.order_ID = ordered.order_ID inner join users on ordered.email = users.email inner join address on users.email = address.email order by ordered_at desc";
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
    </div>
        </div>

</div>
   
</div>
 <a href="#show-bottom-bar.asp" class="open-bottom-bar"><h3><i class="fas fa-eye text-primary"></i> </h3></a>
 <div class="rounded-circle bg-secondary div-top">  
 <a href="#top.asp" class="top"><h3><i class="fas fa-angle-up text-light"></i> </h3></a>
 </div> 
 <script type="text/javascript">
   $(document).ready(()=> {
    var current = setInterval( () => {
      $.ajax({
        url: "get",
        type: "GET",
        data: {current_order:"orders"},
        success: (data) => {
          $(".current").html(data);
        }
      });
            var d = new Date();
   var h = d.getHours();
   if(h === 20 || h=== 21 || h=== 22 || h === 23 || h === 0 || h === 1 || h === 2 || h === 3 || h === 4 || h === 5 || h === 6){
    clearInterval(current);
   }
    }, 10 * 1000);
    $(".upadeForm").on("submit", (e) => {
      e.preventDefault();
    var orderNo = $(".number").val();
    var statusValue = $(".status").val();
    var trigger = $(".trigger").val();
    $.ajax({
        url: "get",
        type: "POST",
        data: {number:orderNo, status:statusValue, update:trigger},
        beforeSend: () => {
          $(".updating").show();
        },
        success: (data) => {
          $(".updateResponse").html(data);
          $(".updateResponse").fadeOut(7000);
        },
        complete: () => {
          $(".updating").hide();
        }
      });
  });

   });
   function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
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
    function searchFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myOrder");
  filter = input.value.toUpperCase();
  table = document.getElementById("myOrderTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
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
         <datalist id="data-status">
            <option>Order Shipped</option>
            <option>Order In Route</option>
            <option>Order Delivered</option>
            <option>Order Cancelled</option>
        </datalist>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   
</body>
</html>
