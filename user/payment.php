<?php include('db.php');require 'messages.php'; require_once 'vochar.php';
if(!isset($_SESSION['username'])){
header("location: user-login.php");
    die();
}
//select the cost
$_SESSION['payment'] = 0; $_SESSION['notification'] = "";
$query = mysqli_query($con, "select total from total where email='$email' LIMIT 1");
$get_lo = mysqli_fetch_assoc($query);
$local = $get_lo['total'];
$_SESSION['payment'] = $local;
$second_message = $currency.number_format($local);
$total_cost = $sum +$local;
$second_message = $currency.number_format($local);
//select
$get_final_total = mysqli_query($con, "SELECT final_total FROM total WHERE email = '$email' LIMIT 1");
 $got_total = mysqli_fetch_assoc($get_final_total);
 $perevious_total = $got_total['final_total'];
 $show_total = $perevious_total;
 $final_cost = $perevious_total;

//aply vochar
if($local > 0){
$payment_message = "Delivered between"."&nbsp;".$start."&nbsp; and ".$till;
    }else{
    $payment_message = "Ready for pickup by ".$pick;
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
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMMA SHOP | PAYMENT METHOD</title>    
        <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
        <link rel="icon" href="imgs/gemasglam.ico">
    <link rel="stylesheet" href="css/header.css" media="all">  
        <link rel="stylesheet" href="css/custom.css" media="all"> 
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
       <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script defer src="js/purejs.js"></script>
        <script defer src="js/jquery.js"></script> 
        <style type="text/css">.order{float: left; padding: 10px;} #quan{width: 50px; border: 2px solid grey; border-radius: 3px;} #d1,.d1info{margin-left: 20px; font-weight: bold} small{font-weight: bold} .d1info{border: 1px solid gray; border-radius: 3px;}</style>
<script type="text/javascript"> window.history.forward(); function noBack() {  window.history.forward(); } 
    </script> 
<script type="text/javascript">$(document).ready(function(){
  $("#vochar_btn").on("click", function(){
    var vocharValue = $("#vochar").val();
    $.post("vochar.php", {userVochar: vocharValue}, function(data){
      location.reload(true);
       $("#result").html(data);
    });
  })
})</script>
    </head>
    
<body class="bg-dark">
    <a name="top"></a>
<div class="container-fluid">  
<nav class="navbar navbar-expand-md sticky-top" id="top_nav"><a href="index.php" class="navbar-brand"><img src="imgs/gemasglam.jpg" height="70" width="150" style="border-radius: 5px;"></a> <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse"><div class="navbar-nav"></div><a href="tel:+256709655944" class="btn btn-outline-warning btn-sm" id="help">HELP?</a> </div></nav>
<nav class="navbar navbar-expand-md sticky-top" id="tablets_nav"><a href="index.php" class="navbar-brand"><img src="imgs/gemasglam.jpg" height="70" width="150" style="border-radius: 5px;"></a> <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse"><div class="navbar-nav"></div><a href="tel:+256709655944" class="btn btn-outline-warning btn-sm" id="help">HELP?</a> </div></nav> 
<nav class="navbar navbar-expand-md sticky-top" id="mobile_nav"><a href="index.php" class="navbar-brand"><img src="imgs/gemasglam.jpg" height="70" width="150" style="border-radius: 5px;"></a> <a href="tel:+256709655944" class="btn btn-outline-warning btn-sm" id="help">HELP?</a> <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse"><div class="navbar-nav"></div></div></nav> 
    </div>    
<div class="container-fluid">  
<div class="row justify-content-between">
    <div class="col-md-6 col-lg-6">
    <div class="jumbotron py-1 bg-light">
        <h4>PAYMENT METHOD</h4>
        </div>
    <div class="card">
        <p class="card-header"><i class="fas fa-check-circle text-success"></i> 1. ADDRESS DETAILS</p>
        <div class="card-body">
        <p> <?php echo $info['firstname']."&nbsp;".$info['lastname']; ?> </p>
            <p> <?php echo $location['location']; ?> </p>
            <p> <?php echo $info['contact']; ?> </p>
        </div>
        </div> <br> 
    <div class="card mt-2">
        <p class="card-header"> <i class="fas fa-check-circle text-success"></i> 2. DELIVERY METHOD</p>
        </div> 
        <input type="hidden" id="pay" value="<?php echo $_SESSION['payment']; ?>">
        <div class="card-body bg-light">
             <div class="form-group" id="standard">
              Standard Shipping <br>
                <small class="text-muted" id="d1">Delivered between <?php echo $start; ?> and <?php echo $till; ?> for UGX 5,000 </small>
             </div>
             <div class="form-group" id="office">
                 Pick up Station (our office)
                 <br>
                 <small class="text-muted" id="d1">Ready for pick up by <?php echo $pick ?> with cheaper Local Delivery Fees </small>
             </div>   
        </div>
        <div class="card mt-2">
        <p class="card-header py-1">SHIPPMENT DETAILS</p>
         <div class="card-body">
  <small>Shippment 1 of 1</small> <br>
             <?php $ship = mysqli_query($con, "select name from cart where email ='$email'"); while($ship_info = mysqli_fetch_assoc($ship)){ 
             echo $ship_info['name'].", &nbsp;";} ?> <br>
              <small class="text-muted" id="d1"> <?php echo $payment_message;?> </small>
            </div> 
        <div class="card-footer py-1S">  
            </div>    
        </div> <br>
        <div class="card">
        <p class="card-header">
        <i class="fas fa-check-circle text-muted"></i> PAYMENT METHOD (choose)
        </p>
        <div class="card-body">
            <small style="color: red" class="error"></small>
            <p>How do you want to pay for your order?</p>
             <form action="confirmed.php"  method="post" name="radiopay">
            <input type="hidden" name="shipping" value="<?php echo $local;?>">
            <p style="font-weight: bold">  
              <input type="radio" name="method" value="cash on delivery" id="cas"> &nbsp;<i class="fas fa-hand-holding-usd"></i> Cash on Delivery
                 </p>
                 <div class="d1info text-muted">
                     <ul>
                     <p class="text-sm"> Pay cash on delivery </p>
                         <li>Complete your order and pay cash when you receive your order</li>
                         <li>Please make sure to have the exact amount on you, since the delivery agent might not have change</li>
                     </ul>
                 </div> <br> <hr>
                 <p style="font-weight: bold"> 
                <input type="radio" name="method" value="mtn" id="mobile"> <img src="product-images/mtn.PNG" width="50" height="45">MTN MoMo - Eligible for Contactless Safe Delivery <br>
                    <small class="text-muted">Prepay With MTN Mobile Money</small> 
                 </p>
                 <label for="vochar" class="font-weight-bold">Do you have a Vouchar?</label>
                 <div class="input-group">
                <input type="text" name="vochar" class="form-control" id="vochar" autocomplete="off">
                <button type="button" class="btn btn-warning btn-sm" id="vochar_btn">Apply Vouchar</button>
            </div><span class="text-success"><?php echo $notification; $_SESSION['notification'] = $notification; ?></span>
                 <div class="discript bg-light text-secondary">
                 <p style="font-weight: bold" class="text-muted">Thank you for choosing MTN Mobile Money payment option.</p>
                    <small class="text-muted">Please follow the below steps to complete your payment:</small> 
                <ol>
                    <li>Fill in below your MTN mobile phone number. Please don't forget to add the country code number +256 (example: +256777777777)</li>
                    <li>Confirm your order by clicking on "Confirm Order". You will be redirected on payment confirmation page, please don't close the page.</li>
                    <li>You will receive a request on your phone, please confirm the payment by dialing *165*8*2# and enter your MTN Mobile Money secret PIN on your device.</li>
                    <li>If your payment is successful you will be redirected to the confirmation page and be given your order number.</li>
                     </ol>
                       <?php $number = mysqli_query($con, "select contact from users where email = '$email'");
                $user_number = mysqli_fetch_assoc($number); ?> 
                <p>Your MTN MoMo Number</p> 
                <input type="text" name="momo" value="<?php echo $user_number['contact']; ?>" class="form-control">     
                 </div> <hr>
            <div class="jumbotron py-2">
                 <?php echo "SUB TOTAL: ".$currency.number_format($sum);
      ?> <br>
        <small>Local Delivery FEE: <?php     
         echo $second_message; ?></small> <br>
            <?php 
        echo "<hr>";        
        echo "TOTAL COST: ".$currency."&nbsp;".number_format($show_total);
      ?>
                 </div>
                <input type="hidden" name="total" value="<?php echo $final_cost; ?>"> 
            <button type="submit" name="order" class="btn btn-warning" onclick="return checked();">CONFIRM ORDER</button>     
            </form>
            </div>
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
      $_SESSION['subtotal'] = $sum;
      ?> <br>
        <small>Local Delivery FEE: <?php     
          echo $currency.number_format($local); echo"<br>";?>
            <small class='text-muted' id='d1'> <?php echo $payment_message; ?> </small> </small> <br>
            <?php  echo"TOTAL COST: ".$currency.number_format($show_total);
       //close connection
      mysqli_close($con);
      ?>
        </p>
       </div>
       
           
       <p class="text-center">
           <a href="cart.php" class="btn btn-secondary btn-sm">MODIFY CART</a> </p>
        </div>
    <div style="clear: both"></div>
    </div>
    </div>  
    </div>
     <a href="#top" class="tops"><i class="fas fa-arrow-circle-up"></i></a>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
    </body>    
</html>