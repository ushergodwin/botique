<?php session_start(); include_once('db.php'); require('products-logic.php');
if(!isset($_SESSION['admin']) && $_SESSION['loggedin'] != true){
header("location: user-login"); exit; } ?> <html> <head> <!-- Global site tag
(gtag.js) - Google Analytics --> <script async
src="https://www.googletagmanager.com/gtag/js?id=UA-174043292-1"></script>
<script> window.dataLayer = window.dataLayer || []; function
gtag(){dataLayer.push(arguments);} gtag('js', new Date());

  gtag('config', 'UA-174043292-1'); </script> <meta charset="utf-8"> <meta
name="description" content="Gemasglam Home is a Fashion clothing and
accessories ladies’ boutique. We take pride in supplying great quality items
to all our customers at pocket friendly prices. We are located in Kampala
Uganda."> <meta name="keywords" content="boutique, Uganda, Kampala, women
clothes, bags, shoes, beauty products, blazers, skirts, Namugema Bridget,
gemasglam GemasGlamHome, quality, accessories, ladies Fashion"> <meta
name="author" content="Tumuhimbise Usher Godwin"> <meta name="viewport"
content="width=device-width, initial-scale=1.0"> <title>GemasGlamHome | ADMIN
PANNEL </title> <meta name="viewport" content="width=device-width,
initial-scale=1.0"> <link rel="icon" href="imgs/gemasglam.ico"> <link
rel='stylesheet' href='css/custom.css' type='text/css' media='all' /> <link
rel='stylesheet' href='css/admin.css'> <link rel="stylesheet"
href="css/header.css"> <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> <script
src="js/header.js"></script> <script src="js/purejs.js"></script> <script>    
$(function(){ $(".open_admin").click(function(){ $("#admin_bar").toggle(); });
}); </script>
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
</head> <body class="bg-secondary"> <nav class="navbar navbar-light
bg-dark sticky-top"> <div class="navbar nav-item" id="item"> <a
href="all_products.php" class="btn btn-outline-light btn-sm active">ALL
PRODUCTS</a> &nbsp; <a href="admin-products.php" class="btn btn-outline-light
btn-sm">ADD PRODUCTS</a> &nbsp; <a href="admin-products.php" class="btn
btn-outline-light btn-sm">DELETE PRODUCTS</a> &nbsp; <a href="admin-products.php"
class="btn btn-outline-light btn-sm">UPDATE PRODUCTS</a>
                
            </div>  <div class="navbar nav-item"><input type='text'
id='myProduct' class='form-control' onkeyup="productFunction();"
placeholder="search products by name" style="width: 400"></div> <div class="navbar nav-item">
<small style="color: white">Loggedin as: <?php echo $username; ?></small>
&nbsp; <a href="logout.php" class="btn btn-warning btn-sm" id="log">LOGOUT</a>
    </div>       </nav> <br> <div class="container-fluid"> <?php $sql =
"select name, code, price, image,  description, status, category from blazers 
UNION select name, code, price, image,  description, status, category from
accessories  UNION select name, code, price, image,  description, status,
category from skirts  UNION select name, code, price, image,  description,
status, category from shoes  UNION select name, code, price, image, 
description, status, category from bags UNION select name, code, price, image,
 description, status, category from tops  UNION select name, code, price,
image,  description, status, category from trousers  UNION select name, code,
price, image,  description, status, category from dresses  UNION select name,
code, price, image,  description, status, category from beauty"; $results =
mysqli_query($con, $sql); echo"<div class='table-responsive'> <table
cellpadding='10' class='table table-light table-striped' id='productTable'>
<tr> <th>IMAGE</th> <th>PRODUCT NAME</th> <th>PRODUCT CODE</th> <th>PRODUCT
PRICE</th> <th>PRODUCT DESCRIPTION</th> <th>PRODUCT STATUS</th> </tr> ";
while($row = mysqli_fetch_assoc($results)){ echo" <tr>"; echo"<td><img
src='".$row['image']."' width='100' height='100' /></td> ";
echo"<td>".$row['name']."</td>"; echo"<td>".$row['code']."</td>";
echo"<td>".$currency.number_format($row['price'])."</td>";
echo"<td>".$row['description']."</td>"; echo"<td>".$row['status']."</td>";
echo"</tr> "; } echo "</table>"; echo"</div>"; mysqli_close($con); ?> 
    
        </div> <a href="#top" class="tops"><i class="fas
fa-arrow-circle-up"></i></a> <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> <script src="js/purejs.js"></script> </body>
</html>