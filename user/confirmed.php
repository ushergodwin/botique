<?php session_start(); include_once('db.php'); $user_email =
$_SESSION['username']; $currency = "UGX "; $status = "Order Received";
require 'messages.php'; $conf_status = ""; $total = $shipping =
$payment= $rondom= ""; if(!isset($_SESSION['username'])){header("location:
HOME"); die();} if(!isset($_POST['order'])){echo "<h3> ERROR 403 Forbidden: Access Denied</h3>"; die();} if(isset($_POST['order'])){ $payment =
mysqli_real_escape_string($con, $_POST['method']);  if($payment ==
'cash on delivery'){     if($_POST['shipping'] == '5000'){ $shipping =
"Standard Shipping";     }else{ $shipping = "Pick Up from office"; } 
$date = date("Y-m-d H:i:sa"); //generate a unque alphernumeric code
$permitted_chars =
'09182736455463728190aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ';
$unique = substr(str_shuffle($permitted_chars), 0, 4);
                    //generate an order number
                    $order_number = mt_rand(0, 1000000000);
                    $total =
mysqli_real_escape_string($con, $_POST['total']);     $check ="insert
into ordered(order_ID, shipping, payment, total_cost, status, email, ordered_at,
order_code) VALUES ('$order_number', '$shipping', '$payment', '$total', '$status',
'$user_email', '$date', '$unique')"; $order =mysqli_query($con,
$check); if(!$order){ echo
"error".$check."".mysqli_connect_error($con); }  $get_order_id =
mysqli_query($con, "select order_ID from ordered where order_code
='$unique' AND email ='$user_email'");  $fetch_id =
mysqli_fetch_assoc($get_order_id);      $id = $fetch_id['order_ID'];  
    mysqli_query($con, "update all_cart set order_ID = '$id' where
email='$user_email' AND order_ID ='0'");          if($order){
$conf_status = " <div class='container-fluid px-md-4'>    <div
class='row'> <div class='col-md-6 col-lg-6 col-xl-6'> <h4
class='bg-light'><i class='fas fa-check-circle text-success'></i>
<small class='text-success' id='success'>Thank You for shopping with
GemasGlamHome <i class='fas fa-heart text-danger'></i></small> <br>
<small id='od_no'>Order NO: <small
class='text-success'>$id</small></small> </h4> <div class='alert
alert-success alert-dismissible fade show' role='alert'>
<strong>Congratulations! </strong> Your order has been successfuly
received! <button type='button' class='close' data-dismiss='alert'
aria-label='Close'> <span aria-hidden='true'>&times;</span> </button>
</div> </div> </div> </div>  "; $delete = mysqli_query($con, "DELETE
from cart where email='$user_email'"); //delete records from total 
mysqli_query($con, "delete from total where email ='$user_email'"); }
}else{ $conf_status = "<script> alert('mobile money is till under
development')</script> <script>history.back();</script>"; }     } ?>
<html> <head> <!-- Global site tag (gtag.js) - Google Analytics -->
<script async
src="https://www.googletagmanager.com/gtag/js?id=UA-174043292-1"></script>
<script> window.dataLayer = window.dataLayer || []; function
gtag(){dataLayer.push(arguments);} gtag('js', new Date());

  gtag('config', 'UA-174043292-1'); </script> <meta charset="utf-8">
<meta name="description" content="Gemasglam Home is a Fashion clothing
and accessories ladies’ boutique. We take pride in supplying great
quality items to all our customers at pocket friendly prices. We are
located in Kampala Uganda."> <meta name="keywords" content="boutique,
Uganda, Kampala, women clothes, bags, shoes, beauty products, blazers,
skirts, Namugema Bridget, gemasglam GemasGlamHome, quality,
accessories, ladies Fashion"> <meta name="author" content="Tumuhimbise
Usher Godwin"> <meta name="viewport" content="width=device-width,
initial-scale=1.0"> <title>GemasGlamHome | Order Received</title>
<link rel="icon" href="imgs/gemasglam.ico"> <link rel='stylesheet'
href='css/custom.css' type='text/css' media='all' /> <link
rel="stylesheet" href="css/header.css"> <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
    <link rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script  src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script defer src="js/jquery.js"></script> <script
src="live.js"></script> </head> <body class="bg-dark"> <a
name="top"></a> <?php $firstname = $_SESSION['username']; $detail =
mysqli_query($con, "select firstname from users where email =
'$firstname'"); $got = mysqli_fetch_assoc($detail); $delete_cart =
mysqli_query($con, "DELETE FROM cart WHERE email = '$firstname'"); ?>
<div class="container-fluid">   <a name="top"></a>  <nav class="navbar
navbar-expand-md navbar-dark bg-dark sticky-top"> <a href="#"
class="open"><h3><i class="fa fa-bars text-light"
id="bar_icon"></i></h3></a> &nbsp; &nbsp; <a href="index.php"
class="navbar-brand"><img src="imgs/gemasglam.jpg" height="50"
width="100" style="border-radius: 5px;"></a> <button
type="button" class="navbar-toggler" data-toggle="collapse"
data-target="#navbarCollapse"> <span
class="navbar-toggler-icon"></span> </button>

    <div class="collapse navbar-collapse justify-content-between"
    id="navbarCollapse"> <div class="navbar-nav"> <a href="index.php"
    class="nav-item nav-link active"><h5>Home</h5></a> <a href="about.php"
    class="nav-item nav-link"><h5>About Us</h5></a> <div
    class="nav-item dropdown"> <a href="#" class="nav-link
    dropdown-toggle" data-toggle="dropdown"><h5>Categories</h5></a>
    <div class="dropdown-menu"> <a href="accessories.php"
    class="dropdown-item"><img src="imgs/watch.PNG" width="40"
    height="40" style="border-radius: 50%"> Accessories</a> <a
    href="blazers.php" class="dropdown-item"><img src="imgs/suit.jpg"
    width="40" height="40" style="border-radius: 50%"> Blazers</a> <a
    href="bags.php" class="dropdown-item"><img src="imgs/bag.PNG"
    width="40" height="40" style="border-radius: 50%">Bags</a> <a
    href="shoes.php" class="dropdown-item"> <img src="imgs/shoesmen.PNG"
    width="40" height="40" style="border-radius: 50%"> <img
    src="imgs/shoeswomen.PNG" width="40" height="40"
    style="border-radius: 50%">Shoes</a> <a href="skirts.php"
    class="dropdown-item"> <img src="imgs/skirt.PNG" width="40"
    height="40" style="border-radius: 50%"> Skirts</a> <a
    href="trousers.php" class="dropdown-item"> <img src="imgs/trouser.PNG"
    width="40" height="40" style="border-radius: 50%">Trousers</a> <a
    href="tops.php" class="dropdown-item"><img src="imgs/top.PNG"
    width="40" height="40" style="border-radius: 50%"> Tops/Brouse</a>
    <a href="dresses.php" class="dropdown-item"> <img src="imgs/dress.PNG"
    width="40" height="40" style="border-radius: 50%"> Dresses</a> <a
    href="beauty-products.php" class="dropdown-item"> <img src="imgs/beauty.PNG"
    width="40" height="40" style="border-radius: 50%">Beauty
    Products</a> </div> </div> </div> <form action="catalog.php"
    method="get" class="form-inline"> <div class="input-group">  <div
    class="search-box">                    <input type="search"
    class="form-control here" placeholder="Search for products"
    id="search" name="term" style="width: 350" autocomplete="off"
    required="required"/> <div class="result"></div> </div> <div
    class="input-group-append"> <button type="submit" class="btn
    btn-light"><i class="fa fa-search text-primary"></i></button>
    </div> </div> </form> 
               
                    <div class="nav-item dropdown"> <a href="#"
class="dropdown-toggle text-light" data-toggle="dropdown"><h5>Hi,
<?php echo $got['firstname']; ?></h5></a> <div class="dropdown-menu">
<a href="user-account.php" class="dropdown-item"><i class="fa
fa-user"></i> My Account</a> <a href="user-account.php"
class="dropdown-item"> <i class="fas fa-shopping-basket"></i>
Orders</a> <hr> <a href="logout.php" id="log"
class="dropdown-item"><button class="btn btn-outline-warning
btn-sm">LOGOUT</button></a> </div>            </div> <a href="tel:+256709655944"
class="btn btn-outline-light btn-sm" id="help">HELP?</a>  </div>
</nav> <div class="container-fluid">  <div id="hidden"
class="bg-light"> <nav class="sidebar bg-light" id="sidebar"> <div
class="nav-item">      <div class="card">
<div class="card-header py-1"><h4>Categories</h4></div>  <div
class="card-body"> <ul> <li>  <a href="accessories.php" class="dropdown-item"> <img
src="imgs/watch.PNG" width="40" height="40" style="border-radius:
50%"> Accessories</a></li> <li><a href="blazers.php" class="dropdown-item"> <img
src="imgs/suit.jpg" width="40" height="40" style="border-radius: 50%">
Blazers</a></li> <li><a href="bags.php" class="dropdown-item"> <img
src="imgs/bag.PNG" width="40" height="40" style="border-radius:
50%">Bags</a><li> <li><a href="shoes.php" class="dropdown-item"> <img
src="imgs/shoesmen.PNG" width="40" height="40" style="border-radius:
50%"> <img src="imgs/shoeswomen.PNG" width="40" height="40"
style="border-radius: 50%">Shoes</a></li> <li><a href="skirts.php"
class="dropdown-item"> <img src="imgs/skirt.PNG" width="40"
height="40" style="border-radius: 50%"> Skirts</a></li> <li> <a
href="trousers.php" class="dropdown-item"> <img src="imgs/trouser.PNG" width="40"
height="40" style="border-radius: 50%">Trousers</a></li> <li>  <a
href="tops.php" class="dropdown-item"><img src="imgs/top.png" width="40"
height="40" style="border-radius: 50%"> Tops/Brouse</a></li> <li>  <a
href="dresses.php" class="dropdown-item"> <img src="imgs/dress.png" width="40"
height="40" style="border-radius: 50%"> Dresses</a></li> <li><a
href="beauty-products.php" class="dropdown-item"> <img src="imgs/beauty.PNG" width="40"
height="40" style="border-radius: 50%">Beauty Products</a></li> </ul>
</div>  </div> </div> </nav> </div>      </div>       <?php echo
$conf_status;     ?>    <div class='container-fluid px-md-4'>     <div
class="container-fluid px-1 px-md-4 py-5 mx-auto"> <div class="card">
<h4 class="card-header text-muted">Next Steps</h4> <div
class="card-body"> <h4>1. Confirmation</h4> <h5>Congratulations! Your
order has been successfully received. A confirmation Email has been
send to you and our customer service will contact you soon to verify
your order</h5> <h4>2.Shipping</h4> <h5  class="text-muted">Your order
will be prepared for shipping once it is confirmed. You will receive
shipping updates soon<br> You can follow your order status in your
account >> "my orders" </h5> </div>      
          
        </div>   </div>     <div class="container-fluid px-1 px-md-4
">   <div class="card"> <h4 class="card-header text-muted">Track Your
Order</h4>     <div class="row d-flex justify-content-between px-3
top"> <div class="d-flex"> <h5><span class="text-primary
font-weight-bold"></span></h5> </div> <div class="d-flex flex-column
text-sm-right"> <p class="mb-0">Expected Arrival By: <span><?php echo $till; ?></span></p>
</div> </div> <!-- Add class 'active' to progress --> <div class="row
d-flex justify-content-center"> <div class="col-12"> <ul
id="progressbar" class="text-center"> <li class="active step0"></li>
<li class="step0"></li> <li class="step0"></li> <li
class="step0"></li> </ul> </div> </div> <div class="row
justify-content-between top"> <div class="row d-flex icon-content">
<img class="icon" src="https://i.imgur.com/9nnc9Et.png"> <div
class="d-flex flex-column"> <p
class="font-weight-bold">Order<br>Processed</p> </div> </div> <div
class="row d-flex icon-content"> <img class="icon"
src="https://i.imgur.com/u1AzR7w.png"> <div class="d-flex
flex-column"> <p class="font-weight-bold">Order<br>Shipped</p> </div>
</div> <div class="row d-flex icon-content"> <img class="icon"
src="https://i.imgur.com/TkPm63y.png"> <div class="d-flex
flex-column"> <p class="font-weight-bold">Order<br>IN Route</p> </div>
</div> <div class="row d-flex icon-content"> <img class="icon"
src="https://i.imgur.com/HdsziHP.png"> <div class="d-flex
flex-column"> <p class="font-weight-bold">Order<br>Arrived</p> </div>
</div> </div> <p class="text-center text-muted">You can track your
order in</p> <p class="text-center text-muted">My Account <i class="fa
fa-angle-right"></i> My Orders </p> <a href="user-account.php"
class="btn btn-warning btn-sm">Go To My Orders</a> <div
class="card-footer py-1"> <div class="row"> <div class="col-md-12
col-lg-12"> <a href="index.php" class="btn btn-warning btn-sm">CONTINUE
SHOPPING</a> </div> </div>  </div> </div> </div> <br> <div
class="container-fluid px-1 px-md-4 ">  <div class="card"> <h4
class="card-header text-muted">ORDER SUMMARY</h4> <div
class="card-body"> <?php $email = $_SESSION['username']; $customer_name = ""; $customer_name = $got['firstname'];
$total_cost =
0; $product_name = $product_quantinty = $product_size = $id = $product_name = $sub = ""; $max = mysqli_query($con, "SELECT max(order_ID) from ordered where
email='$email'"); $got_id = mysqli_fetch_assoc($max); $id =
$got_id['max(order_ID)'];	 $get = "SELECT name,quantity, total_cost,
image, size from all_cart INNER JOIN ordered ON all_cart.order_ID =
ordered.order_ID WHERE all_cart.email='$email' AND all_cart.order_ID
='$id'"; $ex = mysqli_query($con, $get); while($product =
mysqli_fetch_assoc($ex)){ echo"   <div class='order'> <div><a
href='#'><img src='".$product['image']."' width='45' height='45' />
</a></div> <div>".$product['name']."</div> <div>"."QTY:
".$product['quantity']."</div><div>"."SIZE:
".$product['size']."</div>
<div>".$currency.number_format($product['total_cost'])."</div>      
</div> ";  $total_cost = $product['total_cost']; $product_quantinty = $product['quantity']; $product_size = $product['size']; $product_name = $product['name']; } ?> <p
class="clear"></p>     <?php echo "SUB TOTAL:
".$currency.number_format($_SESSION['subtotal']); $sub =$_SESSION['subtotal']; ?> <br> <small>Local
Delivery FEE: <?php      $local = $_SESSION['payment']; echo
$currency.number_format($local); echo
"<br>".$_SESSION['notification']; ?></small> <br> <?php  echo "<hr>"; 
       echo "TOTAL COST: ".$currency.number_format($total_cost); ?> 
    <?php 
    $toEmail = "$user_email";
            $subject = "GemasGlamHome Received Order";
            $content = "<h1>Hello $customer_name</h1>, 
            <h2>Your Order, NO: $id has been successfuly received.</h2> <h1>ORDER SUMMERY</h1>
            ,<h3>Product Name: $product_name</h3><h3>Product Quantity: $product_quantinty </h3>> <h3>Product Size: $product_size </h3> <h3>Sub Total: $sub </h3> <h3>Local Delivery Fee: $local </h3> <h3>TOTAL COST: $total_cost </h3> <h4>Thank you for shopping with Gemasglam Home. </h4><br> <h5>Kind Regards, Namugema Bridget.</h4> 
            ";
            $headers = "From: wecare@gemasglam.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
mail($toEmail, $subject, $content, $headers);
    ?>
<!--    send mail notifying the order-->
    <?php 
    if($product_name !=""){
        $to = "bridgetnamugema@gmail.com";
        $subject = "NEW ORDER";
        $content = "<h2>A new order has been made just now </h2> <h3>Order Number: $id </h3> >h3>Ordered By: $customer_name.</h3> <h4>Please visit the staff panel and respond.</h4> <h4>Thank You.</h4> <br> <h5>Kind Regards, Gemasglam Notification Bot</h5>";
         $headers = "From: wecare@gemasglam.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        mail($to, $subject, $content, $headers);
    }
    ?>
    </div> </div> </div>
</div> 
<div class=" bg-secondary">   <div class="card mt-3"
style="border: none;"> <div class="card-body bg-secondary"> <div
class="row"> <div class="col-md-6 col-lg-6"> <div class="card mt-3"
id="message_box"> <div class="card-body" id="message_body"> <?php echo
$message_status; ?> <h4 class="text-secondary" style="text-decoration:
underline;">Contact Us</h4> <form action="" method="post"> <div
class="form-group"> <input type="email" name="email"
class="form-control" placeholder="type your email here"
autocomplete="off" required="required"> <small
class="text-danger"><?php echo $email_error; ?></small> </div> <div
class="form-group"> <input type="text" name="subject"
class="form-control" placeholder="type the message subject here"
required="required"> <small class="text-danger"><?php echo
$subject_error; ?></small> </div> <div class="form-group"> <textarea
class="form-control" name="message" placeholder="type your message
here" cols="5" rows="5" id="textarea"></textarea> <small
class="text-danger"><?php echo $message_error; ?></small> </div> <div
class="form-group"> <button type="submit" class="btn btn-warning"
name="send">SEND MESSAGE</button> </div> </form> <small
class="text-muted">You information is not shared with anyone!</small>
</div> </div>    </div> <div class="col-md-6 col-lg-6"> <div
class="card mt-3"> <div class="card-body"> <h4 class="text-secondary"
style="text-decoration: underline;">Working Days And Hours</h4> <div
class="row"> <p class="col-lg-6 col-md-6 text-muted">Sunday</p> <p
class="col-md-6  col-lg-6 text-primary">08:00 AM - 03:00 PM</p> </div>
<div class="row"> <p class="col-lg-6 col-md-6 text-muted">Monday</p>
<p class="col-md-6  col-lg-6 text-primary">08:00 AM - 06:00 PM</p>
</div> <div class="row"> <p class="col-lg-6 col-md-6
text-muted">Tuesday</p> <p class="col-md-6  col-lg-6
text-primary">08:00 AM - 06:00 PM</p> </div> <div class="row"> <p
class="col-lg-6 col-md-6 text-muted">Wednesday</p> <p class="col-md-6 
col-lg-6 text-primary">08:00 AM - 06:00 PM</p> </div> <div
class="row"> <p class="col-lg-6 col-md-6 text-muted">Thursday</p> <p
class="col-md-6  col-lg-6 text-primary">08:00 AM - 06:00 PM</p> </div>
<div class="row"> <p class="col-lg-6 col-md-6 text-muted">Friday</p>
<p class="col-md-6  col-lg-6 text-primary">08:00 AM - 06:00 PM</p>
</div> <div class="row"> <p class="col-lg-6 col-md-6
text-muted">Satarday</p> <p class="col-md-6  col-lg-6
text-primary">08:00 AM - 06:00 PM</p> </div> <br/><small
class="text-muted">The above are store hours. GemasglamHome works
24/7</small> <br/> </div> </div>

              </div> </div> <div class="row"> <div class="col-md-6
col-lg-6"> <div class="card mt-3" style="height: 300px; overflow:
scroll;">  <a href="#myModal" class="btn btn-sm btn-warning
sticky-top" data-toggle="modal">POST YOUR REVIEW</a> <div
class="card-body"> <h4 class="text-muted">Customer Reviews</h4>  <?php
foreach ($reviews as $key => $value): ?>  <div class="input-group">
<h1><i class="fas fa-user-circle text-primary"></i></h1> <b
class="text-secondary"> <?php echo $value['name'];?></b> </div> <div
class=""> <b class="text-muted"> <?php echo $value['comment'];?></b>
</div> <?php endforeach?> </div> </div> </div> <form action=""
method="post" name="myLike"> <input type="hidden" name="like"
value="like"> </form> <div class="col-md-6 col-lg-6"> <div class="card
mt-3"> <div class="card-body"> <h4 class="text-muted">Contact
Infor</h4>  <div> <p style="font-size: 20pt;"> <a
href="tel:+256784007560"> <i class="fas fa-phone-square-alt"></i>
+256784007560 &nbsp;</a></p> <p style="font-size: 20pt;"><a href
="mailto:sales@gemasglam.com"><i class="fas fa-envelope"></i>
sales@gemasglam.com</a></p>   <p style="font-size: 20pt;"
class="text-muted"><a href="https://wa.me/+256709655944"
style="font-size: 30pt;"><i class="fab fa-whatsapp-square
text-success"></i></a><small>Live Chart</small></p><br><br>  </div>  
</div> </div> </div> </div> <div class="row"> <div class="col-md-4
col-lg-4"> <div class="card bg-secondary mt-3" style="border: none;">
<div class="card-body">    <h6 class="text-light"
style="text-decoration: underline;">LET US HELP YOU </h6> <p
class="text-muted"> <a href="tel:+256709655944"
class="text-light">Help Center <img src="imgs/office-phone.png"
width="30" height="30" style="border-radius: 50%;"></a> </p> <p> <a
href="how-to-buy.php" class="text-light">How to buy on Gemasglam</a> </p>
<p> <a href="#paymentmethod" class="text-light"
data-toggle="modal">Payment Methods</a> </p> <p> <a
href="#delivery-timeline" class="text-light"
data-toggle="modal">Delivery Timeline</a> </p> <p><a href="faqs"
class="text-light">FAQs</a></p> </div> </div> </div> <div
class="col-md-4 col-lg-4"> <div class="card bg-secondary mt-3"
style="border: none;"> <div class="card-body">    <h6
class="text-light" style="text-decoration: underline;">About
GemasglamHome</h6> <p class="text-muted"> <a href="about.php"
class="text-light">About Us</a> </p> <p> <a href="terms&conditions.php"
class="text-light">Terms & Coditions</a> </p> <p> <a href="privacy"
class="text-light">Privacy Policy</a> </p> <p> <a
href="shipping-policy.php" class="text-light">Shipping Policy</a> </p> <p>
<a href="return-policy.php" class="text-light">Return Policy</a> </p>
</div> </div> </div> <div class="col-md-4 col-lg-4"> <div class="card
bg-secondary mt-3" style="border: none;"> <div class="card-body">   
<h6 class="text-light" style="text-decoration: underline;">FOLLOW US
</h6> <p class="text-muted"> <a
href="https://www.facebook.com/gemasglamhome/" class="text-light"
style="font-size: 18pt;"><i class="fab fa-facebook"></i> </a> </p> <p>
<a
href="https://www.instagram.com/invites/contact/?i=15weuew9rnlhg&utm_content=i1du1qd"
class="text-light" style="font-size: 18pt;"><i class="fab
fa-instagram"></i></a> </p> <p> <a href="" class="text-light"><i
class="fab fa-twitter"></i></a> </p> <p> <a
href="https://www.linkedin.com/company/gemas-glam-home"
class="text-light" style="font-size: 18pt;"><i class="fab
fa-linkedin"></i></a> </p> </div> </div> </div> </div> <div
class="row"> <div class="col-md-12 col-lg-12 d-flex
justify-content-center"> <p class="text-light">&copy; GemasglamHome
<?php echo date("Y"); ?> All Rights Reserved</p>      </div> </div>
          
        </div> </div>

  </div> <div class="modal fade" tabindex="-1" id="myModal"> <div
class="modal-dialog"> <div class="modal-content" id="message_body">
<div class="modal-header"> <h5 class="modal-title text-muted">CUSTOMER
REVIEW</h5>                 </div> <div class="modal-body"> <?php echo
$review_status;?> <p class="text-secondary">Hello <?php echo
$got['firstname']; ?>, Please share your review with us. <br> <small
class="text-success">Thank you for choosing GemasGlamHome</small> <i
class="fa fa-heart text-danger"></i></p> </div> <form method="POST"
action=""> <div class="form-group"> <input type="text" name="reviewer"
placeholder="enter your name" class="form-control"
required="required"> <span><?php echo $name_error; ?></span> </div>
<textarea class="form-control" placeholder="type your review here"
required="required" cols="10" rows="5" name="comment"
id="textarea"></textarea> <span><?php echo $comment_error; ?></span>
<div class="row"> <div class="col-lg-6 col-md-6 text-center"> <button
type="submit" class="btn btn-warning btn-sm" name="review">POST REVIEW
<i class="fas fa-arrow-circle-up"></i></button> </div> </div> </form>
<div class="modal-footer justify-content-center"> <button
type="button" class="btn btn-secondary" data-dismiss="modal">REVIEW
LATER</button> </div> </div> </div> </div>
    
<!-- Modal HTML FOR DELIVERY TIMELINE --> <div id="delivery-timeline"
class="modal fade"> <div class="modal-dialog"> <div
class="modal-content"> <div class="modal-header"> <h5
class="modal-title">Delivery Timeline Notification <i class="fas
fa-bell"></i></h5> </div> <div class="modal-body"> <h5
class="text-muted">Delivery dates for all clothing items and other
items ordered through the website are typically the same day or
1-2days for stock items. We can 'RUSH' orders if you need a quick
delivery. We are fairly flexible and hope to accommodate as many
orders as possible. To rush an order please contact us on WhatsApp <a
href="https://wa.me/+256709655944" style="font-size: 30pt;"><i
class="fab fa-whatsapp-square text-success"></i></a><small>click to
whatsapp</small> or give a phone call &nbsp;<a
href="tel:+256709655944" style="font-size: 30pt;"><i class="fas
fa-phone"></i></a><small>click to call</small><br>Thank You<b
class="text-primary"> <?php echo $got['firstname']; ?></b> for
choosing Gemasglam Home <i class="fas fa-heart text-danger"></i></h5>
</div> <div class="modal-footer"> <button type="button" class="btn
btn-secondary" data-dismiss="modal">OK</button> </div> </div> </div>
</div> <!-- Modal HTML FOR PAYMENT METHODS --> <div id="paymentmethod"
class="modal fade"> <div class="modal-dialog"> <div
class="modal-content"> <div class="modal-header"> <h5
class="modal-title">Payment Method Notification <i class="fas
fa-bell"></i></h5> </div> <div class="modal-body"> <h5
class="text-muted">We apparently accept <b>Cash on Develivery</b> and
<b>MTN Mobile Money</b> payments</h5>  <h5 class="text-muted">In case
you choose Mobile Money, please follow the steps that will guide you
to complete your payment.<br>Thank You <b class="text-primary"><?php
echo $got['firstname']; ?></b> for choosing  Gemasglam Home <i
class="fas fa-heart text-danger"></i></h5> </div> <div
class="modal-footer"> <button type="button" class="btn btn-secondary"
                              data-dismiss="modal">OK</button> </div> </div> </div> </div> </div><script
src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
crossorigin="anonymous"></script> <script
src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
crossorigin="anonymous"></script> <script src="js/purejs.js"></script>
</body>     
</html>