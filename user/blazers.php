<?php
require_once("db.php"); require('categories-logic.php'); require('messages.php'); require 'cart-logic.php';
$currency = "UGX ";
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories/Blazers</title>
    <link rel="icon" href="imgs/gemasglam.ico">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/custom.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.1/css/all.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script><script defer src="js/jquery.js"></script><script defer src="js/purejs.js"></script><script src="live.js"></script>
    <script type="text/javascript">$(document).ready(function(){$('[data-toggle=tooltip]').tooltip();})</script>
    <style type="text/css">#top_nav{background-color: rgba(0,0,0,1);} #top_nav a{color: aliceblue} #top_nav a:hover{text-decoration-color: orange; text-decoration: underline} #mobile_nav{background-color: rgba(0,0,0,1);} #mobile_nav a{color: aliceblue} #mobile_nav a:hover{text-decoration-color: orange; text-decoration: underline} #card{width: 350px;} #cart_count{border: 2px solid orange; border-radius: 50%; background-color: orange; color: white; position: absolute;
    width: 18px;
    height: 13px;
    padding-bottom: 20px;
    padding-right: 20px; top: 5px; margin-left: 10px; font-size: 15px; text-align: center;} #dropdown-link a{color: black} #mobile_nav{width: 100%} #card-call a:hover{text-decoration: none}.fa-phone-alt{background-color: orange; color: aliceblue; font-size: 20pt; border: 2px solid orange; border-radius: 50%;} #card-call a{font-weight: 600} .fa-money-check-alt{font-size: 20pt; background-color: orange; color: aliceblue; border: 2px solid orange; border-radius: 5px;} .fa-check-circle{background-color: orange; color: green; font-size: 20pt;border: 2px solid orange; border-radius: 50%;} #dropdown-link a:hover{text-decoration: none}
        #tablets_nav a{color: aliceblue} #tablets_nav a:hover{text-decoration-color: orange; text-decoration: underline} #tablets_nav{background-color: rgba(0,0,0,1);}
        /* Extra small devices (phones, 600px and down) */
        @media only screen and (max-width: 600px) { #top_nav{display: none}#desktop_view{display: none} #tablets_nav{display: none} }
        /* Small devices (portrait tablets and large phones, 600px and up) */
        @media only screen and (min-width: 600px) { #top_nav{display: none}#desktop_view{display: none} #tablets_nav{display: none}  }
        /* Medium devices (landscape tablets, 768px and up) */
        @media only screen and (min-width: 768px) {#tablets_nav{display: inline-flex; width: 100%}  #mobile_nav{display: none}#desktop_view{display: none}#top_nav{display: none} }
        /* Large devices (laptops/desktops, 992px and up) */
        @media only screen and (min-width: 992px) {#tablets_nav{display: none} #mobile_nav{display: none}#top_nav{display: inline-flex; width: 100%}#desktop_view{display: inline-flex} #mobile_view{display: none}   }
        /* Extra large devices (large laptops and desktops, 1200px and up) */
        @media only screen and (min-width: 1200px) {#mobile_nav{display: none} #top_nav{display: inline-flex; width: 100%} #desktop_view{display: inline-flex} #mobile_view{display: none} #tablets_nav{display: none} }.description:hover{cursor: pointer;}.card-size{max-width: 250px;} #login{color: orange} #dropdown2-link a{color: orange}
        .product-status{text-decoration: line-through;}
#mobileSearch{border-radius: 50px; border-top-right-radius: 1px; border-bottom-right-radius: 1px;}</style>
</head>
<body> <a name="top"></a> 
  <!-- navigation bar for desktop -->
<nav class="navbar navbar-expand-md sticky-top" id="top_nav"><a href="index.php" class="navbar-brand"><img src="imgs/gemasglam.jpg" height="50" width="100" style="border-radius: 5px;"></a><div class="collapse navbar-collapse justify-content-between" id="navbarCollapse"><div class="navbar-nav"><div class="nav-item dropdown"> <a href="#" class="nav-link dropdown-toggle"
data-toggle="dropdown"><h5>Categories</h5></a> <div class="dropdown-menu" id="dropdown-link"> <a href="accessories.php"
class="dropdown-item"><img src="imgs/watch.PNG" width="40" height="40" style="border-radius: 50%"> Accessories</a> <a
href="blazers.php" class="dropdown-item"><img src="imgs/suit.jpg" width="40" height="40" style="border-radius: 50%">
Blazers</a> <a href="bags.php" class="dropdown-item"><img src="imgs/bag.PNG" width="40" height="40" style="border-radius:
50%">Bags</a> <a href="shoes.php" class="dropdown-item"> <img src="imgs/shoeswomen.PNG" width="40" height="40" style="border-radius: 50%">Shoes</a>
<a href="skirts.php" class="dropdown-item"> <img src="imgs/skirt.PNG" width="40" height="40" style="border-radius: 50%">
Skirts</a> <a href="trousers.php" class="dropdown-item"> <img src="imgs/trouser.PNG" width="40" height="40"
style="border-radius: 50%">Trousers</a> <a href="tops.php" class="dropdown-item"><img src="imgs/top.PNG" width="40"
height="40" style="border-radius: 50%"> Tops/Brouse</a> <a href="dresses.php" class="dropdown-item"> <img
src="imgs/dress.PNG" width="40" height="40" style="border-radius: 50%"> Dresses</a> <a href="beauty-products.php"
class="dropdown-item"> <img src="imgs/beauty.PNG" width="40" height="40" style="border-radius: 50%">Beauty Products</a>
</div> </div></div>  <form action="catalog.php" method="get" class="form-inline"><div class="input-group"><div class="search-box"> <input type="search" class="form-control here" placeholder="Search for products" id="search" name="term" style="width: 450" autocomplete="off" required="required"/> <div class="result"></div></div><div class="input-group-append"><button type="submit" class="btn btn-light"><i class="fa fa-search text-primary"></i></button></div></div></form>  <div class="nav-item dropdown" id="dropdown2-link"><a href="#" class="dropdown-toggle text-light" data-toggle="dropdown"><h5 class="text-warning">Hi, <?php echo $got['firstname']; ?></h5></a><div class="dropdown-menu" id="dropdown-link"> <a href="user-account.php" class="dropdown-item"><i class="fas fa-user-check text-primary"></i> My Account</a> <a href="user-account.php" class="dropdown-item"><i class="fas fa-cog text-primary"></i>  Settings</a> <hr><a href="logout.php" class="dropdown-item"><button class="btn btn-outline-warning btn-sm">Logout</button></a></div></div> <a href="cart.php"><h4><i class="fas fa-shopping-cart text-light"></i></h4><span id="cart_count">&nbsp;<?php echo $cart_count; ?></span></a> <a href="tel:+256709655944" class="btn btn-outline-warning btn-sm" id="help">HELP?</a> </div></nav>
    <!-- navigation bar for potrait tablets -->
<nav class="navbar navbar-expand-md sticky-top" id="tablets_nav"><a href="index.php" class="navbar-brand"><img src="imgs/gemasglam.jpg" height="50" width="100" style="border-radius: 5px;"></a><div class="collapse navbar-collapse justify-content-between" id="navbarCollapse"><div class="navbar-nav"></div><div class="nav-item dropdown"> <a href="#" class="nav-link dropdown-toggle"
data-toggle="dropdown"><h5>Categories</h5></a> <div class="dropdown-menu" id="dropdown2-link"> <a href="accessories.php"
class="dropdown-item"><img src="imgs/watch.PNG" width="40" height="40" style="border-radius: 50%"> Accessories</a> <a
href="blazers.php" class="dropdown-item"><img src="imgs/suit.jpg" width="40" height="40" style="border-radius: 50%">
Blazers</a> <a href="bags.php" class="dropdown-item"><img src="imgs/bag.PNG" width="40" height="40" style="border-radius:
50%">Bags</a> <a href="shoes.php" class="dropdown-item"> <img src="imgs/shoeswomen.PNG" width="40" height="40" style="border-radius: 50%">Shoes</a>
<a href="skirts.php" class="dropdown-item"> <img src="imgs/skirt.PNG" width="40" height="40" style="border-radius: 50%">
Skirts</a> <a href="trousers.php" class="dropdown-item"> <img src="imgs/trouser.PNG" width="40" height="40"
style="border-radius: 50%">Trousers</a> <a href="tops.php" class="dropdown-item"><img src="imgs/top.PNG" width="40"
height="40" style="border-radius: 50%"> Tops/Brouse</a> <a href="dresses.php" class="dropdown-item"> <img
src="imgs/dress.png" width="40" height="40" style="border-radius: 50%"> Dresses</a> <a href="beauty-products.php"
class="dropdown-item"> <img src="imgs/beauty.PNG" width="40" height="40" style="border-radius: 50%">Beauty Products</a>
</div> </div> &nbsp; <form action="catalog.php" method="get" class="form-inline"><div class="input-group"><div class="search-box"> <input type="search" class="form-control here" placeholder="Search for products" id="search" name="term" style="width: 200" autocomplete="off" required="required"/> <div class="result"></div></div><div class="input-group-append"><button type="submit" class="btn btn-light"><i class="fa fa-search text-primary"></i></button></div></div></form>&nbsp; <div class="nav-item dropdown" id="dropdown2-link"><a href="#" class="dropdown-toggle text-light" data-toggle="dropdown"><h5 class="text-warning">Hi, <?php echo $got['firstname']; ?></h5></a><div class="dropdown-menu" id="dropdown-link"> <a href="user-account.php" class="dropdown-item"><i class="fas fa-user-check text-primary"></i> My Account</a> <a href="user-account.php" class="dropdown-item"><i class="fas fa-cog text-primary"></i>  Settings</a> <hr><a href="logout.php" class="dropdown-item"><button class="btn btn-outline-warning btn-sm">Logout</button></a></div></div>  <a href="cart.php"><span id="cart_count">&nbsp;<?php echo $cart_count; ?></span><h4><i class="fas fa-shopping-cart text-light"></i></h4></a>&nbsp;&nbsp; <a href="tel:+256709655944" class="btn btn-outline-warning btn-sm" id="help">HELP?</a> </div></nav> <!-- end of  -->
    
<!--navigation bar for mobile    -->
    <nav class="navbar navbar-expand-md sticky-top" id="mobile_nav"><a href="#" class="open"><h3><i class="fa fa-bars text-light" id="bar_icon"></i></h3></a><a href="index.php" class="navbar-brand"><img src="imgs/gemasglam.jpg" height="50" width="100" style="border-radius: 5px;"></a><a href="user-account.php"><h3><i class="fas fa-user-check text-light"></i> </h3></a><a href="cart.php"><h4><i class="fas fa-shopping-cart text-light"></i></h4><small id="cart_count">&nbsp;<?php echo $cart_count; ?></small></a>  <div class="mobileSearch">
      <form action="catalog.php" method="get" class="form-inline"> <div class="input-group">
  <div
class="search-box"> <input type="search" class="form-control here" placeholder="Search for products"
id="mobileSearch" name="term" style="width: 250" autocomplete="off" required="required"/> <div class="result"></div> </div>
<div class="input-group-append"> <button type="submit" class="btn btn-light"><i class="fa fa-search
    text-primary"></i></button> </div> </div> </form> </div><div class="collapse navbar-collapse justify-content-between" id="navbarCollapse"><div class="navbar-nav"></div> </div></nav>    
<!-- side bar -->
    <div class="container-fluid"><div id="hidden" class="bg-light"> <nav class="sidebar bg-light" id="sidebar"><div class="nav-item"><div class="jumbotron text-center py-1"><h2 class="text-warning">Blazers</h2></div> <div class="card"><div class="card-header py-1"><h4>Categories</h4></div> <div class="card-body"><ul><li><a href="blazers.php" class="dropdown-item"> <img src="imgs/suit.jpg" width="40" height="40" style="border-radius: 50%"> Blazers</a></li> <li><a href="bags.php" class="dropdown-item"> <img src="imgs/watch.PNG" width="40" height="40" style="border-radius: 50%">Accessories</a><li><li><a href="shoes.php" class="dropdown-item"> <img src="imgs/shoeswomen.PNG" width="40" height="40" style="border-radius: 50%">Shoes</a></li><li><a href="skirts.php" class="dropdown-item"> <img src="imgs/skirt.PNG" width="40" height="40" style="border-radius: 50%"> Skirts</a></li><li> <a href="trousers.php" class="dropdown-item"> <img src="imgs/trouser.PNG" width="40" height="40" style="border-radius: 50%">Trousers</a></li><li>  <a href="tops.php" class="dropdown-item"><img src="imgs/top.PNG" width="40" height="40" style="border-radius: 50%"> Tops/Brouse</a></li><li>  <a href="dresses.php" class="dropdown-item"> <img src="imgs/dress.PNG" width="40" height="40" style="border-radius: 50%"> Dresses</a></li><li><a href="beauty-products.php" class="dropdown-item"> <img src="imgs/beauty.PNG" width="40" height="40" style="border-radius: 50%">Beauty Products</a></li> </ul></div> </div></div></nav></div></div>   
    <div class="container">
    <div class="container">
        <?php echo $status; ?>
        <div class="row">
        <?php foreach($blazers as $key => $row):?>
        <div class="col-sm-12 col-md-6 col-lg-3">
                <form action="" method="post">
               <div class="card card-body card-size mt-3">
                <div class='card-img-top text-center'><a class="description" data-toggle="tooltip" title="<?php echo $row['description'];?>"><img src="<?php echo $row['image'];?>" width='150' height='120' /></a></div> 
            <input type='hidden' name='code' value="<?php echo $row['code'];?>" />
              <input type='hidden' name='category' value="<?php echo $row['category'];?>" />
                <p class="text-muted"><?php echo $row['name'];?></p> 
                <p class="text-muted">UGX: <?php echo number_format($row['price']);?></p>
                <p class="text-info product-status">UGX: <?php echo $row['status'];?><hr> 
                   <p class="text-muted d-inline-block text-truncate" style="max-width: 550pt;"><?php echo $row['description'];?></p><a class="description text-primary" data-toggle="tooltip" title="<?php echo $row['description'];?>">Read More</a>
                   <div class='card-footer text-center'>
			  <button type='submit' class='btn btn-warning' name='add_to_cart'>Add to Cart</button>
              </div> 
                </div>
            </form>
                </div>
         <?php endforeach ?>
            </div>
            </div> 
    </div>
<div class=" bg-secondary">  
  <div class="card mt-3" style="border: none;">
      <div class="card-body bg-secondary">
          <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="card mt-3" id="message_box">
                    <div class="card-body" id="message_body">
                        <?php echo $message_status; ?>
               <h4 class="text-secondary" style="text-decoration: underline;">Contact Us</h4>
               <form action="" method="post">
                <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="type your email here" autocomplete="off" required="required">
                <small class="text-danger"><?php echo $email_error; ?></small>
            </div>
              <div class="form-group">
                <input type="text" name="subject" class="form-control" placeholder="type the message subject here" required="required">
                <small class="text-danger"><?php echo $subject_error; ?></small>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="message" placeholder="type your message here" cols="5" rows="5" id="textarea"></textarea>
                <small class="text-danger"><?php echo $message_error; ?></small>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-warning" name="send">SEND MESSAGE</button>
            </div>
               </form>
               <small class="text-muted">You information is not shared with anyone!</small>
               </div>
               </div>   
              </div>
              <div class="col-md-6 col-lg-6">
                  <div class="card mt-3">
                      <div class="card-body">
                          <h4 class="text-secondary" style="text-decoration: underline;">Working Days And Hours</h4>
                          <div class="row">
                            <p class="col-lg-6 col-md-6 text-muted">Sunday</p>
                            <p class="col-md-6  col-lg-6 text-primary">08:00 AM - 03:00 PM</p>
                          </div>
                          <div class="row">
                            <p class="col-lg-6 col-md-6 text-muted">Monday</p>
                            <p class="col-md-6  col-lg-6 text-primary">08:00 AM - 06:00 PM</p>
                          </div>
                          <div class="row">
                            <p class="col-lg-6 col-md-6 text-muted">Tuesday</p>
                            <p class="col-md-6  col-lg-6 text-primary">08:00 AM - 06:00 PM</p>
                          </div>
                          <div class="row">
                            <p class="col-lg-6 col-md-6 text-muted">Wednesday</p>
                            <p class="col-md-6  col-lg-6 text-primary">08:00 AM - 06:00 PM</p>
                          </div>
                          <div class="row">
                            <p class="col-lg-6 col-md-6 text-muted">Thursday</p>
                            <p class="col-md-6  col-lg-6 text-primary">08:00 AM - 06:00 PM</p>
                          </div>
                          <div class="row">
                            <p class="col-lg-6 col-md-6 text-muted">Friday</p>
                            <p class="col-md-6  col-lg-6 text-primary">08:00 AM - 06:00 PM</p>
                          </div>
                          <div class="row">
                            <p class="col-lg-6 col-md-6 text-muted">Satarday</p>
                            <p class="col-md-6  col-lg-6 text-primary">08:00 AM - 06:00 PM</p>
                          </div>
                          <br/><br><small class="text-muted">The above are store hours. GemasglamHome works 24/7</small> <br/>
                      </div>
                  </div>

              </div>
          </div>
          <div class="row">
              <div class="col-md-6 col-lg-6">
                  <div class="card mt-3" style="height: 300px; overflow: scroll;"> 
                     <a href="#myModal" class="btn btn-sm btn-warning sticky-top" data-toggle="modal">POST YOUR REVIEW</a>
                      <div class="card-body">
                       <h4 class="text-muted">Customer Reviews</h4> 
                       <?php foreach ($reviews as $key => $value):
                       ?> 
                       <div class="input-group">
                      <h1><i class="fas fa-user-circle text-primary"></i></h1>
                      <b class="text-secondary"> <?php echo $value['name'];?></b>
                    </div>
                    <div class="">
                      <b class="text-muted"> <?php echo $value['comment'];?></b>
                    </div>
                    <?php endforeach?>
                      </div>
                  </div>
              </div>
              <div class="col-md-6 col-lg-6">
                  <div class="card mt-3">
                      <div class="card-body">
                       <h4 class="text-muted">Contact Information</h4> 
                       <div>
                      <p style="font-size: 20pt;"> <a href="tel:+256709655944"> <i class="fas fa-phone-alt"></i> +256709655944 &nbsp;</a></p>
                       <p style="font-size: 20pt;"><a href ="mailto:wecare@gemasglam.com"><i class="fas fa-envelope"></i> wecare@gemasglam.com</a></p>  
                           <p style="font-size: 20pt;" class="text-muted"><a href="https://wa.me/+256709655944" style="font-size: 30pt;"><i class="fab fa-whatsapp-square text-success"></i></a><small>Live Chat</small></p><br><br> 
                       </div>  
                      </div>
                  </div>
              </div>
          </div>
                <div class="row">
                    <div class="col-md-4 col-lg-4">
                        <div class="card bg-secondary mt-3" style="border: none;">
                         <div class="card-body">   
                        <h6 class="text-light" style="text-decoration: underline;">LET US HELP YOU </h6>
                            <p class="text-muted">
                    <a href="tel:+256709655944" class="text-light">Help Center <img src="imgs/call-center.PNG" width="70" height="70" style="border-radius: 50%;"></a>
                    </p>
                        <p>
                    <a href="how-to-buy.php" class="text-light">How to buy on Gemasglam</a>
                    </p>
                        <p>
                          <a href="#paymentmethod" class="text-light" data-toggle="modal">Payment Methods</a>
                    </p>
                        <p>
                          <a href="#delivery-timeline" class="text-light" data-toggle="modal">Delivery Timeline</a>
                    </p>
                    <p><a href="faqs.php" class="text-light">FAQs</a></p>
                    </div>
                </div>
                    </div>
                       <div class="col-md-4 col-lg-4">
                        <div class="card bg-secondary mt-3" style="border: none;">
                         <div class="card-body">   
                        <h6 class="text-light" style="text-decoration: underline;">About GemasglamHome</h6>
                            <p class="text-muted">
                    <a href="about.php" class="text-light">About Us</a>
                    </p>
                        <p>
                    <a href="terms&conditions.php" class="text-light">Terms & Coditions</a>
                    </p>
                        <p>
                    <a href="privacy.php" class="text-light">Privacy Policy</a>
                    </p>
                        <p>
                    <a href="shipping-policy.php" class="text-light">Shipping Policy</a>
                    </p>
                          <p>
                    <a href="return-policy.php" class="text-light">Return Policy</a>
                    </p>
                    </div>
                </div>
                    </div>
                       <div class="col-md-4 col-lg-4">
                        <div class="card bg-secondary mt-3" style="border: none;">
                         <div class="card-body">   
                        <h6 class="text-light" style="text-decoration: underline;">FOLLOW US </h6>
                            <p class="text-muted">
                    <a href="https://www.facebook.com/gemasglamhome/" class="text-light" style="font-size: 18pt;"><i class="fab fa-facebook"></i> </a>
                    </p>
                        <p>
                    <a href="https://www.instagram.com/invites/contact/?i=15weuew9rnlhg&utm_content=i1du1qd" class="text-light" style="font-size: 18pt;"><i class="fab fa-instagram"></i></a>
                    </p>
                        <p>
                    <a href="" class="text-light"><i class="fab fa-twitter"></i></a>
                    </p>
                        <p>
                    <a href="https://www.linkedin.com/company/gemas-glam-home" class="text-light" style="font-size: 18pt;"><i class="fab fa-linkedin"></i></a>
                    </p>
                    </div>
                </div>
                    </div>
                </div>
              <div class="row">
                  <div class="col-md-12 col-lg-12 d-flex justify-content-center">
                 <p class="text-light">&copy; GemasglamHome <?php echo date("Y"); ?> All Rights Reserved</p>     
                  </div>
              </div>
          
        </div>
      </div>

  </div>
<div class="modal fade" tabindex="-1" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-muted">CUSTOMER REVIEW</h5>                
            </div>
            <div class="modal-body">
<?php echo $review_status;?>
                <p class="text-secondary">Hello Dear User, Please share your review with us. <br>
                  <small class="text-success">Thank you for choosing GemasGlamHome</small> <i class="fa fa-heart text-danger"></i></p>
            </div>
            <form method="POST" action="">
              <div class="form-group">
                <input type="text" name="reviewer" placeholder="enter your name" class="form-control" required="required"> <span><?php echo $name_error; ?></span>
              </div>
              <textarea class="form-control" placeholder="type your review here" required="required" cols="10" rows="5" name="comment"></textarea> <span><?php echo $comment_error; ?></span>
              <div class="row">
               <div class="col-lg-6 col-md-6 text-center">
                <button type="submit" class="btn btn-primary btn-sm" name="review">POST REVIEW <i class="fas fa-arrow-circle-up"></i></button>
              </div>
              </div>
            </form>
            <div class="modal-footer justify-content-center">
                <button  class="btn btn-secondary" data-dismiss="modal">REVIEW LATER</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal HTML FOR DELIVERY TIMELINE -->
<div id="delivery-timeline" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delivery Timeline Notification <i class="fas fa-bell"></i></h5>
            </div>
            <div class="modal-body">
         <h5 class="text-muted">Delivery dates for all clothing items and other items ordered through the website are typically the same day or 1-2days for stock items. We can 'RUSH' orders if you need a quick delivery. We are fairly flexible and hope to accommodate as many orders as possible. To rush an order please contact us on WhatsApp <a href="https://wa.me/+256709655944" style="font-size: 30pt;"><i class="fab fa-whatsapp-square text-success"></i></a><small>click to whatsapp</small> or give a phone call &nbsp;<a href="tel:+256709655944" style="font-size: 30pt;"><i class="fas fa-phone-alt"></i></a><small>click to call</small><br>Thank You for choosing Gemasglam Home <i class="fas fa-heart text-danger"></i></h5>
            </div>
            <div class="modal-footer">
                <button  class="btn btn-secondary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal HTML FOR PAYMENT METHODS -->
<div id="paymentmethod" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Payment Method Notification <i class="fas fa-bell"></i></h5>
            </div>
            <div class="modal-body">
         <h5 class="text-muted">We apparently accept <b>Cash on Develivery</b> and <b>Airtel Money</b> payments</h5>  <h5 class="text-muted">In case you choose Mobile Money, please follow the steps that will guide you to complete your payment.<br>Thank You for choosing  Gemasglam Home <i class="fas fa-heart text-danger"></i></h5>
            </div>
            <div class="modal-footer">
                <button  class="btn btn-secondary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<a href="#top" class="tops"><i class="fas fa-arrow-circle-up"></i></a>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/purejs.js"></script>   
    </body>
</html>