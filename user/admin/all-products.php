<?php include_once 'count.php'; require_once 'db.php'; ?>
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
  <a href="#users.asp" class="w3-bar-item w3-button" id="open-user-links"><i class="fas fa-user text-secondary"></i> USERS&nbsp;<span class="badge badge-light messages"><?php echo $users_count; ?></span> &nbsp;  &nbsp;<i class="fas fa-angle-down" id="user-angle"></i> </a>
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
placeholder="search products by name" style="width: 400">
          <div class="navbar-nav">
            <a href="messages" class="nav-item nav-link"><small><span class="badge badge-light" id="top-badge"><?php echo $messages_count; ?></span></small><h4><i class="fas fa-envelope"></i></h4></a>
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
font-weight-bold">Loggedin as: <?php echo $firstname; ?></span>&nbsp;<span id="time" class="text-light"></span></h5> &nbsp; &nbsp; <a href="#" class="text-light">Home /<small class="text-warning">Admin</small> / <small class="text-secondary">All Products</small> </a> </div><a href="#hide-bottom-bar.asp" class="nav-item nav-link d-flex flex-column
text-sm-right" id="bottom-bar"><h4 lass=""><i class="fas fa-eye-slash text-light" id="eye"></i></h4></a>
 </div>
     </div>
<div class="w3-container">  
 <?php  $currency = "UGX ";
 $sql ="SELECT name, code, price, image,  description, status, category from blazers 
UNION select name, code, price, image,  description, status, category from
accessories  UNION select name, code, price, image,  description, status,
category from skirts  UNION select name, code, price, image,  description,
status, category from shoes  UNION select name, code, price, image, 
description, status, category from bags UNION select name, code, price, image,
 description, status, category from tops  UNION select name, code, price,
image,  description, status, category from trousers  UNION select name, code,
price, image,  description, status, category from dresses  UNION select name,
code, price, image,  description, status, category from beauty";
 $results = mysqli_query($con, $sql); 
 if(mysqli_num_rows($results) > 0){
 echo"<div class='table-responsive'> <table cellpadding='10' class='table table-light table-striped' id='productTable'>
<tr> 
<th>IMAGE</th>
 <th>PRODUCT NAME</th>
  <th>PRODUCT CODE</th>
   <th>PRODUCT
PRICE</th>
 <th>PRODUCT DESCRIPTION</th>
  <th>PRODUCT STATUS</th>
   </tr> ";
while($row = mysqli_fetch_assoc($results)){
 echo" <tr>"; echo"<td><img src='".$row['image']."' width='100' height='100' /></td> ";
echo"<td>".$row['name']."</td>"; echo"<td>".$row['code']."</td>";
echo"<td>".$currency.number_format($row['price'])."</td>";
echo"<td>".$row['description']."</td>"; echo"<td>".$row['status']."</td>";
echo"</tr> "; 
} 
echo "</table>";
 echo"</div>"; 
}else{
 echo "<h5 class='text-secondary'>All Products Categories are empty. If this is unusual, please contact the <a hre='help'>site admin</a> right away to fix the error </h5>";
}
 mysqli_close($con);
  ?> 
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
  table = document.getElementById("productTable");
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
           <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   
</body>
</html>
