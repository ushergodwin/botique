<?php require 'messages.php'; require_once 'cart-logic.php'; ?>
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
	<title>GemasGlamHome Return Plicy</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</head>
<body> <a name="top"></a> 
  <!-- navigation bar for desktop -->
<nav class="navbar navbar-expand-md sticky-top" id="top_nav"><a href="index.php" class="navbar-brand"><img src="imgs/gemasglam.jpg" height="50" width="100" style="border-radius: 5px;"></a><div class="collapse navbar-collapse justify-content-between" id="navbarCollapse"><div class="navbar-nav"></div>&nbsp;&nbsp;<div class="nav-item dropdown"> <a href="#" class="nav-link dropdown-toggle"
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
</div> </div> &nbsp;&nbsp; <form action="catalog.php" method="get" class="form-inline"><div class="input-group"><div class="search-box"> <input type="search" class="form-control here" placeholder="Search for products" id="search" name="term" style="width: 450" autocomplete="off" required="required"/> <div class="result"></div></div><div class="input-group-append"><button type="submit" class="btn btn-light"><i class="fa fa-search text-primary"></i></button></div></div></form> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <div class="nav-item dropdown"><a href="#" class="dropdown-toggle text-light" data-toggle="dropdown"><h5><i class="fas fa-user"></i> Login</h5></a><div class="dropdown-menu"> <a href="user/user-login.php" class="dropdown-item"><button class="btn btn-warning btn-sm" style="width: 100%">LOGIN</button></a> <hr><a href="user/Create-Account.php" class="dropdown-item"><button class="btn btn-outline-warning btn-sm">CREATE ACCOUNT</button></a></div></div> &nbsp;&nbsp;&nbsp;&nbsp; <a href="cart.php"><span id="cart_count">&nbsp;<?php echo $cart_count; ?></span><h4><i class="fas fa-shopping-cart text-light"></i></h4></a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="tel:+256709655944" class="btn btn-outline-warning btn-sm" id="help">HELP?</a> </div></nav>
<!-- navigation bar for potrait tablets -->
<nav class="navbar navbar-expand-md sticky-top" id="tablets_nav"><a href="index.php" class="navbar-brand"><img src="imgs/gemasglam.jpg" height="50" width="100" style="border-radius: 5px;"></a><div class="collapse navbar-collapse justify-content-between" id="navbarCollapse"><div class="navbar-nav"><a href="about.php" class="nav-item nav-link"><h5>About Us</h5></a></div>&nbsp;&nbsp;<div class="nav-item dropdown"> <a href="#" class="nav-link dropdown-toggle"
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
</div> </div> &nbsp;&nbsp; <form action="catalog.php" method="get" class="form-inline"><div class="input-group"><div class="search-box"> <input type="search" class="form-control here" placeholder="Search for products" id="search" name="term" style="width: 250" autocomplete="off" required="required"/> <div class="result"></div></div><div class="input-group-append"><button type="submit" class="btn btn-light"><i class="fa fa-search text-primary"></i></button></div></div></form> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <div class="nav-item dropdown"><a href="#" class="dropdown-toggle text-light" data-toggle="dropdown"><h5 id="login"><i class="fas fa-user"></i> Login</h5></a><div class="dropdown-menu"> <a href="user/user-login.php" class="dropdown-item"><button class="btn btn-warning btn-sm" style="width: 100%">LOGIN</button></a> <hr><a href="user/Create-Account.php" class="dropdown-item"><button class="btn btn-outline-warning btn-sm">CREATE ACCOUNT</button></a></div></div> &nbsp;&nbsp;&nbsp;&nbsp; <a href="cart.php">&nbsp;<span id="cart_count"><?php echo $cart_count; ?></span><h4><i class="fas fa-shopping-cart text-light"></i></h4></a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="tel:+256709655944" class="btn btn-outline-warning btn-sm" id="help">HELP?</a> </div></nav> <!-- end of  -->
        
<!--navigation bar for mobile    -->
    <nav class="navbar navbar-expand-md sticky-top" id="mobile_nav"><a href="#" class="open"><h3><i class="fa fa-bars text-light" id="bar_icon"></i></h3></a><a href="index.php" class="navbar-brand"><img src="imgs/gemasglam.jpg" height="50" width="100" style="border-radius: 5px;"></a><a href="user/user-login.php"><h3><i class="fas fa-user-circle text-light"></i> </h3></a><a href="cart.php"><h4><i class="fas fa-shopping-cart text-light"></i></h4><small id="cart_count">&nbsp;<?php echo $cart_count; ?></small></a>  <div class="mobileSearch">
      <form action="catalog.php" method="get" class="form-inline"> <div class="input-group">
  <div
class="search-box"> <input type="search" class="form-control here" placeholder="Search for products"
id="mobileSearch" name="term" style="width: 250" autocomplete="off" required="required"/> <div class="result"></div> </div>
<div class="input-group-append"> <button type="submit" class="btn btn-light"><i class="fa fa-search
    text-primary"></i></button> </div> </div> </form> </div><div class="collapse navbar-collapse justify-content-between" id="navbarCollapse"><div class="navbar-nav"></div> </div></nav>    
<!-- side bar -->
    <div class="container-fluid"><div id="hidden" class="bg-light"> <nav class="sidebar bg-light" id="sidebar"><div class="nav-item"><div class="jumbotron text-center py-1"><h2 class="text-warning">Return Policy</h2></div> <div class="card"><div class="card-header py-1"><h4>Categories</h4></div> <div class="card-body"><ul><li><a href="blazers.php" class="dropdown-item"> <img src="imgs/suit.jpg" width="40" height="40" style="border-radius: 50%"> Blazers</a></li> <li><a href="accessories.php" class="dropdown-item"> <img src="imgs/watch.PNG" width="40" height="40" style="border-radius: 50%">Accessories</a><li><li><a href="shoes.php" class="dropdown-item"> <img src="imgs/shoeswomen.PNG" width="40" height="40" style="border-radius: 50%">Shoes</a></li><li><a href="skirts.php" class="dropdown-item"> <img src="imgs/skirt.PNG" width="40" height="40" style="border-radius: 50%"> Skirts</a></li><li> <a href="trousers.php" class="dropdown-item"> <img src="imgs/trouser.PNG" width="40" height="40" style="border-radius: 50%">Trousers</a></li><li>  <a href="tops.php" class="dropdown-item"><img src="imgs/top.PNG" width="40" height="40" style="border-radius: 50%"> Tops/Brouse</a></li><li>  <a href="dresses.php" class="dropdown-item"> <img src="imgs/dress.PNG" width="40" height="40" style="border-radius: 50%"> Dresses</a></li><li><a href="beauty-products.php" class="dropdown-item"> <img src="imgs/beauty.PNG" width="40" height="40" style="border-radius: 50%">Beauty Products</a></li> </ul></div> </div></div></nav></div></div> 
<main class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-8 col-lg-8 col-sm-12">
		<div class="jumbotron py-1 mt-2">
			<h3 class="text-warning">GEMASGLAM HOME RETURN POLICY</h3>
		</div>	
		</div>
	</div>
<div class="row">
<div class="col-md-12 col-lg-12 col-sm-12">

	<div class="card">
		<div class="card-body">
			<h5 class="text-muted">Our policy lasts <b> 14 days</b>. If 14 days have gone by since your order was delivered, unfortunately, we can’t offer you a refund or exchange. We ONLY offer store credit within the 14-day time frame (starting the day package was received).<br><br>To be eligible for a return, your item must be <b>unused and in the same condition as you received it</b>. It must also be in the original packaging.<br> <b>RETURN SHIPPING</b> is the responsibility of the customer. <br> <h4 class="text-light bg-dark">Non-refundable items:</h4></h5> <h5 class="text-muted">Items using discounted promo codes, All Lingerie is a FINAL sale, WHITE clothing is a FINAL sale, Bodysuits are a FINAL sale, ACCESSORIES are FINAL sale.All items on SALE are FINAL sale.Gift cards.<br>To complete your return, we require a<b> receipt or proof</b> of purchase. Please do not <b>send</b> your purchase back to the manufacturer.</h5><h4 style="text-decoration: underline;">There are certain situations where only partial refunds are granted (if applicable)</h4><h5 class="text-muted">Damaged clothing or broken accessories, Any item not in its original condition is damaged or missing parts for reasons not due to our error, Any item that is returned more than 14 days after delivery</h5><h4 class="text-light bg-dark">Refunds (if applicable)</h4><h5 class="text-muted">Once your return is received and inspected, we will send you an email to notify you that we have received your returned item. We will also notify you of the approval or rejection of your refund.If you are approved, then your refund will be processed, and a store credit will automatically be applied and emailed to you.</h5><h4 style="text-decoration: underline;">Sale items (if applicable)</h4><h5 class="text-muted">Only regular priced items may be refunded for store credit, unfortunately, sale items cannot be refunded.</h5><h4 style="text-decoration: underline;">Exchanges (if applicable)</h4><h5 class="text-muted">We only replace items if they are defective or damaged. If you need to exchange it for the same item, send us an email at<a href="mailto:wecare@gemasglam.com"> wecare@gemasglam.com</a> or call<a href="tel:+256709655944"> +256709655944</a> and send your item to the Boutique.</h5><h4 style="text-decoration: underline;">Gifts</h4><h5 class="text-muted">If the item was marked as a gift when purchased and shipped directly to you, you’ll receive a gift credit for the value of your return. Once the returned item is received, a gift certificate will be emailed to you.<br>If the item wasn’t marked as a gift when purchased, or the gift giver had the order shipped to themselves to give to you later, we will send a refund to the gift giver and he/she will find out about your return.</h5><h4 style="text-decoration: underline;">SHIPPING</h4><h5 class="text-muted">To return your product, you should mail your product to Gemasglam Home.<br>If you receive a refund, the cost of return shipping will be deducted from your refund.<br>Depending on where you live, the time it may take for your exchanged product to reach you may vary.<br>If you are shipping an item over<b> UGX 500000/=,</b> you should consider using a trackable shipping service or purchasing shipping insurance. We don’t guarantee that we will receive your returned item.</h5>
	</div>
</div>	
</div>
</div>
</main>
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
              <form action="" method="post" name="myLike">
              <input type="hidden" name="like" value="like">
              </form>
              <div class="col-md-6 col-lg-6">
                  <div class="card mt-3">
                      <div class="card-body">
                       <h4 class="text-muted">Contact Information</h4> 
                       <div>
                      <p style="font-size: 20pt;"> <a href="tel:+256709655944"> <i class="fas fa-phone-square-alt"></i> +256709655944 &nbsp;</a></p>
                       <p style="font-size: 20pt;"><a href ="mailto:wecare@gemasglam.com"><i class="fas fa-envelope"></i> wecare@gemasglam.com</a></p>  
                           <p style="font-size: 20pt;" class="text-muted"><a href="https://wa.me/+256709655944" style="font-size: 30pt;"><i class="fab fa-whatsapp-square text-success"></i></a><small>Live Chat</small></p> <br> <br>
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
                <button type="submit" class="btn btn-warning btn-sm" name="review">POST REVIEW <i class="fas fa-arrow-circle-up"></i></button>
              </div>
              </div>
            </form>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">REVIEW LATER</button>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
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