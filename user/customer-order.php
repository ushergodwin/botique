<?php include('db.php');  require 'messages.php'; require_once 'vochar.php';
if(!isset($_SESSION['username'])){
header("location: checkout-login.php");
    die();
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
    <title>GemasGlamHome | DELIVERY METHOD</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="imgs/gemasglam.ico">
        <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/custom.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
       <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script defer src="js/jquery.js"></script>
        <script defer src="js/purejs.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#change").on("click", function(){
                $(".location").css({"border": '3px solid green', "borderTop": 'none', "borderLeft": 'none', "borderRight": 'none'});
                $("#save_button").toggle();
                });
            });
        </script>
        <style type="text/css">.location:focus{outline: none;}#save_button{display: none;}</style>
    </head>
    <body class="bg-dark">
     <a name="top"></a> 
  <!-- navigation bar for desktop -->
<nav class="navbar navbar-expand-md sticky-top" id="top_nav"><a href="index.php" class="navbar-brand"><img src="imgs/gemasglam.jpg" height="70" width="150" style="border-radius: 5px;"></a> <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse"><div class="navbar-nav"></div><a href="tel:+256709655944" class="btn btn-outline-warning btn-sm" id="help">HELP?</a> </div></nav>
<nav class="navbar navbar-expand-md sticky-top" id="tablets_nav"><a href="index.php" class="navbar-brand"><img src="imgs/gemasglam.jpg" height="70" width="150" style="border-radius: 5px;"></a> <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse"><div class="navbar-nav"></div><a href="tel:+256709655944" class="btn btn-outline-warning btn-sm" id="help">HELP?</a> </div></nav> 
<nav class="navbar navbar-expand-md sticky-top" id="mobile_nav"><a href="index.php" class="navbar-brand"><img src="imgs/gemasglam.jpg" height="70" width="150" style="border-radius: 5px;"></a> <a href="tel:+256709655944" class="btn btn-outline-warning btn-sm" id="help">HELP?</a> <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse"><div class="navbar-nav"></div></div></nav>   
<div class="container-fluid">  
<div class="row justify-content-between">
    <div class="col-md-6 col-lg-6">
    <div class="jumbotron py-1 mt-2">
        <h4>CHECKOUT</h4>
        </div>
       <?php echo $change_location_status; ?> 
    <div class="card mt-2">
        <p class="card-header"><i class="fas fa-check-circle text-success"></i> 1. ADDRESS DETAILS &nbsp; &nbsp;<b style="color: orange;">CHANGE <button type="button" id="change" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button></b></p>
        <div class="card-body">
        <p> <?php echo $info['firstname']."&nbsp;".$info['lastname']; ?> </p>
        <form action="" method="post">
            <div class="input-group">
            <p> <input type="text" name="user_location" value="<?php echo $user_location['location']; ?>"style="border: none;" class="location" list="location"> <button type="submit" class="btn btn-outline-success btn-sm" id="save_button" name="change_location">SAVE</button></p>
        </div>
    </form>
            <p> <?php echo $info['contact']; ?> </p>
        </div>
        </div> <br> 
    <div class="card mt-2">
        <p class="card-header"> <i class="fas fa-check-circle text-muted"></i> 2. DELIVERY METHOD (choose)</p>
        <script>function delChecked(){
if(document.getElementById("cas").checked){
    return true;
}else if(document.getElementById("mobile").checked){
    return true;
}else{
     alert("Please Select a delivery method and continue");
    return false;
}
}</script>
        <div class="card-body">
        <p>How do you want your order deliverd?</p>
         <form action="" method="post" class="deliv">
             <div class="form-group">
             <input type="radio" name="delivery" id="cas" value="5000" <?php if(isset($_POST['delivery']) && $_POST['delivery'] == 5000)  echo ' checked="checked"';?>>
              Standard Shipping <br>
                <small class="text-muted" id="d1">    Delivered between <?php echo $start; ?> and <?php echo $till; ?> for UGX <?php echo number_format($_SESSION['payment']); ?> </small>
                 <div class="d1info">
                   <small class="text-danger"><i class="fa fa-info"></i> *Please make sure entered your home address, not your office so that we can diliver your order successfully  </small> <br>
                     <small>*Items may be shipped and attempted <span class="text-primary">SEPARATELY</span> for deliveries as they become availabe</small>
                 </div>
                 <br>
                 <hr>
                 <input type="radio" name="delivery" id="mobile" value="0" <?php if(isset($_POST['delivery']) && $_POST['delivery'] == 0)  echo ' checked="checked"';?>>
                 Pick up Station (our office)
                 <br>
                <small class="text-muted" id="d1">Ready for pick up by <?php echo $pick ?> with cheaper Local Delivery Fees  </small>
             </div>
            </form>    
        </div>
        </div>
        <div class="card mt-2">
        <p class="card-header py-1">SHIPPMENT DETAILS</p>
         <div class="card-body">
  <small>Shippment 1 of 1</small> <br>
             <?php $ship = mysqli_query($con, "select name from cart where email ='$email'"); while($ship_info = mysqli_fetch_assoc($ship)){ 
             echo $ship_info['name'].", &nbsp;";} ?> <br>
             <small class="text-muted" id="d1"> <?php echo $message;?> </small>
            </div> 
            <b class="text-muted">You will be able to appy a vouchar on the next step</b>
        <div class="card-footer py-1S">
                <a href="payment.php" class="btn btn-success" onclick="return delChecked();" name="local_cost">PROCEED TO THE NEXT STEP</a>
            </div>    
        </div> <br>
        <div class="card mt-2">
        <p class="card-header"> <i class="fas fa-check-circle text-muted"></i> PAYMENT METHOD
        </p>
        </div>
    </div>
    
    <div class="col-md-6 col-lg-6">
   <div class="card mt-2">  
    <h4 class="jumbotron py-1">ORDER SUMMERY</h4> 
    <div class="card-body">  
    <?php	
$get = "select * from cart where email = '$email'";
$ex = mysqli_query($con, $get);
while($product = mysqli_fetch_assoc($ex)){
 echo"   <div class='order'>
  <div><a href='#'><img src='".$product['image']."' width='45' height='45' /> </a></div>
    <div>".$product['name']."</div>
    <div>"."QTY: ".$product['quantity']."</div>
    <div>"."SIZE: ".$product['size']."</div>
      <div>".$currency.number_format($product['it_total_price'])."</div>      
    </div> "; 
     }
    ?>
       </div>
<div class="card-footer py-2">      
  <p style="clear:both;"> 
    <?php echo "SUB TOTAL: ".$currency.number_format($sum);
      ?> <br>
      <small>Local Delivery FEE: &nbsp;<?php echo $second_message; echo"<br>"; ?> </small>
            <small class='text-muted' id='d1'> <?php echo $message; ?> </small> <br> <hr>
            <?php echo "TOTAL COST: ".$show_total; ?>
       <div class="row">
           <div class="col-md-6 col-lg-6">
       <p class="text-left">
           <a href="cart.php" class="btn btn-secondary btn-sm">MODIFY CART</a> </p>
           </div> 
           <div class="col-md-6 col-lg-6">
           <a href="payment.php" class="btn btn-success" onclick="return delChecked();" name="local_cost">PROCEED TO THE NEXT STEP</a>
               <?php
               //close the connection
               mysqli_close($con);
               ?>
           </div>
        </div>
        </div>
    </div>
    </div>  
    </div>
    </div>
       <datalist id="location">
    <option>Abayita Ababiri</option><option>Airport Area</option><option>Banga</option><option>Bugonga</option><option>Busambaga</option><option>Bwebajja</option><option>Entebbe Market Area</option><option>Entebbe Town</option><option>Bakuli</option><option>Bukasa</option><option>Bukoto</option><option>Bulange</option><option>Bunamwaya</option><option>Banda</option><option>Butabika</option><option>Bukesa</option><option>Buwate</option><option>Buziga</option><option>Bbungo</option><option>Bwaise</option><option>Bweyogerere</option><option>Central Business District</option><option>Bugolobi</option><option>Gayaza</option><option>Ggaba</option><option>Industrial Area</option><option>Kabalagala</option><option>Kabowa</option><option>Katabi</option><option>Kigungu</option>  <option>Kabusu</option><option>Kalerwe</option><option>Kamwokya</option><option>Kansanga</option><option>Kanyanya</option><option>Kasubi</option><option>Katwe</option><option>Kawaala</option><option>Kawempe Kazo</option><option>Kawempe Mbogo</option><option>Kawempe Tula</option><option>Kawuku</option><option>Kibuli</option><option>Kibuye</option><option>Kisubi</option><option>Kitoro</option><option>Kitubulu</option><option>Kifafu</option><option>Kigowa</option><option>Kikaaya</option><option>Kikoni</option><option>Kinawatata</option><option>Kira Town</option><option>Kireka</option><option>Kirinya</option><option>Kisasi</option><option>Kisementi</option><option>Kisugu</option><option>Kitante</option><option>Kitebi</option><option>Kitintale</option><option>Kiwaatule</option><option>Kiwafu</option><option>Kololo</option><option>Konge</option><option>Kulambiro</option><option>Kungu</option><option>Kyaliwajjala</option><option>Kyambogo</option><option>Kanja</option><option>Kebando</option><option>Lubiri</option><option>Lubowa</option><option>Lugogo</option><option>Lukuli</option><option>Lungujja</option><option>Lunyo</option><option>Lyamutundwe</option><option>Luzila</option><option>Makerere</option><option>Makindye</option><option>Mbalwa</option><option>Mbuya</option><option>Mengo</option><option>Manyago</option><option>Mayanzi</option><option>Mpererwe</option><option>Mulago</option><option>Munyonyo</option><option>Mutundwe</option><option>Mutungo</option><option>Muyenga</option><option>Nalya</option><option>Nagulu</option><option>Najjanankumbi</option><option>Najjera 1</option><option>Najjera 2</option><option>Nakasero</option><option>Nakawa</option><option>Nakiwogo</option><option>Nakivubo</option><option>Nakulabye</option><option>Nalukolongo</option><option>Namanve</option><option>Namasuba</option><option>Namirembe</option><option>Namugongo</option><option>Namungona</option><option>Namuwongo</option><option>Ndeeba</option><option>Nkumbo</option><option>Nsamizi</option><option>Nsamya</option><option>Ntinda</option><option>Ntinda Industrial Area</option><option>Nyanama</option><option>Old Kampala</option><option>Rubaga</option><option>Saalama</option><option>Wakaliga</option><option>Wandegeya</option><option>Wankulukuku</option><option>Zana</option></datalist>
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
                          <br/><small class="text-muted">The above are store hours. GemasglamHome works 24/7</small> <br/>
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
                          <?php mysqli_close($con); ?>
                      </div>
                  </div>
              </div>
              <form action="" method="post" name="myLike">
              <input type="hidden" name="like" value="like">
              </form>
              <div class="col-md-6 col-lg-6">
                  <div class="card mt-3">
                      <div class="card-body">
                       <h4 class="text-muted">Contact Infor</h4> 
                       <div>
                      <p style="font-size: 20pt;"> <a href="tel:+256784007560"> <i class="fas fa-phone-square-alt"></i> +256784007560 &nbsp;</a></p>
                       <p style="font-size: 20pt;"><a href ="mailto:sales@gemasglam.com"><i class="fas fa-envelope"></i> sales@gemasglam.com</a></p>  
                           <p style="font-size: 20pt;" class="text-muted"><a href="https://wa.me/+256709655944" style="font-size: 30pt;"><i class="fab fa-whatsapp-square text-success"></i></a><small>Live Chart</small></p><br><br> 
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
                    <a href="tel:+256709655944" class="text-light">Help Center <img src="imgs/office-phone.png" width="30" height="30" style="border-radius: 50%;"></a>
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
        <div class="modal-content" id="message_body">
            <div class="modal-header">
                <h5 class="modal-title text-muted">CUSTOMER REVIEW</h5>                
            </div>
            <div class="modal-body">
<?php echo $review_status;?>
                <p class="text-secondary">Hello <?php echo $got['firstname']; ?>, Please share your review with us. <br>
                  <small class="text-success">Thank you for choosing GemasGlamHome</small> <i class="fa fa-heart text-danger"></i></p>
            </div>
            <form method="POST" action="">
              <div class="form-group">
                <input type="text" name="reviewer" placeholder="enter your name" class="form-control" required="required"> <span><?php echo $name_error; ?></span>
              </div>
              <textarea class="form-control" placeholder="type your review here" required="required" cols="10" rows="5" name="comment" id="textarea"></textarea> <span><?php echo $comment_error; ?></span>
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
         <h5 class="text-muted">Delivery dates for all clothing items and other items ordered through the website are typically the same day or 1-2days for stock items. We can 'RUSH' orders if you need a quick delivery. We are fairly flexible and hope to accommodate as many orders as possible. To rush an order please contact us on WhatsApp <a href="https://wa.me/+256709655944" style="font-size: 30pt;"><i class="fab fa-whatsapp-square text-success"></i></a><small>click to whatsapp</small> or give a phone call &nbsp;<a href="tel:+256709655944" style="font-size: 30pt;"><i class="fas fa-phone"></i></a><small>click to call</small><br>Thank You<b class="text-primary"> <?php echo $got['firstname']; ?></b> for choosing Gemasglam Home <i class="fas fa-heart text-danger"></i></h5>
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
         <h5 class="text-muted">We apparently accept <b>Cash on Develivery</b> and <b>MTN Mobile Money</b> payments</h5>  <h5 class="text-muted">In case you choose Mobile Money, please follow the steps that will guide you to complete your payment.<br>Thank You <b class="text-primary"><?php echo $got['firstname']; ?></b> for choosing  Gemasglam Home <i class="fas fa-heart text-danger"></i></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
    <script src="js/purejs.js"></script>
    </body>    
</html>