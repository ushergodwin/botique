<?php session_start();
include('db.php'); require("updateuserdetails.php");
if(!isset($_SESSION['username']) && $_SESSION['loggedin'] != true){
header("location: user-login.php");
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
<title>GemasGlamHome | MY ACCOUNT </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="imgs/gemasglam.ico">
    <link rel='stylesheet' href='css/custom.css' type='text/css'/>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
    <link rel="stylesheet" href="    https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.2.0/css/all.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
       <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="live.js"></script>
    <script src="js/purejs.js"></script><script type="text/javascript">$(document).ready(function(){$('[data-toggle = "tooltip"]').tooltip();});</script>
    <style type="text/css">#top_nav{background-color: rgba(0,0,0,1);} #top_nav a{color: aliceblue} #top_nav a:hover{text-decoration-color: orange; text-decoration: underline} #mobile_nav{background-color: rgba(0,0,0,1);} #mobile_nav a{color: aliceblue} #mobile_nav a:hover{text-decoration-color: orange; text-decoration: underline} #card{width: 350px;} #cart_count{border: 2px solid orange; border-radius: 50%; background-color: orange; color: white; position: absolute;
    width: 18px;
    height: 13px;
    padding-bottom: 20px;
    padding-right: 20px; top: 5px; margin-left: 10px; font-size: 15px; text-align: center;} #dropdown-link a{color: black} #mobile_nav{width: 100%} #card-call a:hover{text-decoration: none}.fa-phone-alt{background-color: orange; color: aliceblue; font-size: 20pt; border: 2px solid orange; border-radius: 50%;} #card-call a{font-weight: 600} .fa-money-check-alt{font-size: 20pt; background-color: orange; color: aliceblue; border: 2px solid orange; border-radius: 5px;} .fa-check-circle{background-color: orange; color: green; font-size: 20pt;border: 2px solid orange; border-radius: 50%;} #dropdown-link a:hover{text-decoration: none}
        #tablets_nav a{color: aliceblue} #tablets_nav a:hover{text-decoration-color: orange; text-decoration: underline} #tablets_nav{background-color: rgba(0,0,0,1);}
        /* Extra small devices (phones, 600px and down) */
        @media only screen and (max-width: 600px) { #top_nav{display: none}#desktop_view{display: none} #tablets_nav{display: none}#search_pic_mobile{display: block;} #search_pic_desktop{display: none;}  }
        /* Small devices (portrait tablets and large phones, 600px and up) */
        @media only screen and (min-width: 600px) { #top_nav{display: none}#desktop_view{display: none} #tablets_nav{display: none}#search_pic_mobile{display: block;}#search_pic_desktop{display: none;}  }
        /* Medium devices (landscape tablets, 768px and up) */
        @media only screen and (min-width: 768px) {#tablets_nav{display: inline-flex; width: 100%}  #mobile_nav{display: none}#desktop_view{display: none}#top_nav{display: none}#search_pic_mobile{display: none;}#search_pic_desktop{display: none;} }
        /* Large devices (laptops/desktops, 992px and up) */
        @media only screen and (min-width: 992px) {#tablets_nav{display: none} #mobile_nav{display: none}#top_nav{display: inline-flex; width: 100%}#desktop_view{display: inline-flex} #mobile_view{display: none}#search_pic_mobile{display: none;}#search_pic_desktop{display: block;} #mobile_welcom{display: none;}   }
        /* Extra large devices (large laptops and desktops, 1200px and up) */
        @media only screen and (min-width: 1200px) {#mobile_nav{display: none} #top_nav{display: inline-flex; width: 100%} #desktop_view{display: inline-flex} #mobile_view{display: none} #tablets_nav{display: none} #search_pic_mobile{display: none;}#search_pic_desktop{display: block;} #mobile_welcom{display: none;}   }#description:hover{text-decoration: none}.card-size{max-width: 250px;} #login{color: orange} #dropdown2-link a{color: orange}
        </style>
</head>
<body> <a name="top"></a> 
 <!-- navigation bar for desktop -->
<nav class="navbar navbar-expand-md sticky-top" id="top_nav"><a href="index.php" class="navbar-brand"><img src="imgs/gemasglam.jpg" height="50" width="100" style="border-radius: 5px;"></a><div class="collapse navbar-collapse justify-content-between" id="navbarCollapse"><div class="navbar-nav"><a href="about.php" class="nav-item nav-link"><h5>About Us</h5></a></div>&nbsp;&nbsp;&nbsp;&nbsp; <form action="catalog" method="get" class="form-inline"><div class="input-group"><div class="search-box">                    <input type="search" class="form-control here" placeholder="Search for products" id="search" name="term" style="width: 450" autocomplete="off" required="required"/> <div class="result"></div></div><div class="input-group-append"><button type="submit" class="btn btn-light"><i class="fa fa-search text-primary"></i></button></div></div></form> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       <div class="nav-item dropdown" id="dropdown-link">
                        <a href="#" class="dropdown-toggle text-light" data-toggle="dropdown"><h5 class="text-warning">Hi, <?php echo $got['firstname']; ?></h5></a>
                <div class="dropdown-menu">
                    <a href="user-account.php" class="dropdown-item"><i class="fa fa-user"></i> My Account</a>
                    <a href="#order" class="dropdown-item"  id="openorders"> <i class="fas fa-shopping-basket"></i> My Orders</a>
                    <a href="#track" class="dropdown-item" id="opentrack"><i class="fas fa-route"></i> Track My Order</a>
                     <hr>
                    <a href="logout.php" id="log" class="dropdown-item"><button class="btn btn-outline-warning btn-sm">LOGOUT</button></a>
                </div>           
            </div> &nbsp;&nbsp;&nbsp;&nbsp; <a href="cart.php"><span id="cart_count">&nbsp;<?php echo $cart_count; ?></span><h4><i class="fas fa-shopping-cart text-light"></i></h4></a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="tel:+256709655944" class="btn btn-outline-warning btn-sm" id="help">HELP?</a> </div></nav>    
<!-- navigation bar for tablets -->
<nav class="navbar navbar-expand-md sticky-top" id="tablets_nav"><a href="index.php" class="navbar-brand"><img src="imgs/gemasglam.jpg" height="50" width="100" style="border-radius: 5px;"></a><div class="collapse navbar-collapse justify-content-between" id="navbarCollapse"><div class="navbar-nav"><a href="about.php" class="nav-item nav-link"><h5>About Us</h5></a></div>&nbsp;&nbsp;&nbsp;&nbsp; <form action="catalog" method="get" class="form-inline"><div class="input-group"><div class="search-box">                    <input type="search" class="form-control here" placeholder="Search for products" id="search" name="term" style="width: 200" autocomplete="off" required="required"/> <div class="result"></div></div><div class="input-group-append"><button type="submit" class="btn btn-light"><i class="fa fa-search text-primary"></i></button></div></div></form> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       <div class="nav-item dropdown" id="dropdown-link">
                        <a href="#" class="dropdown-toggle text-light" data-toggle="dropdown"><h5 class="text-warning">Hi, <?php echo $got['firstname']; ?></h5></a>
            </div> &nbsp;&nbsp;&nbsp;&nbsp; <a href="cart.php"> &nbsp;<span id="cart_count">&nbsp;<?php echo $cart_count; ?></span><h4><i class="fas fa-shopping-cart text-light"></i></h4></a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="tel:+256709655944" class="btn btn-outline-warning btn-sm" id="help">HELP?</a> </div></nav>    
        
<!--navigation bar for mobile    -->
    <nav class="navbar navbar-expand-md sticky-top" id="mobile_nav"><a href="#" class="open"><h3><i class="fa fa-bars text-light" id="bar_icon"></i></h3></a><a href="index.php" class="navbar-brand"><img src="imgs/gemasglam.jpg" height="50" width="100" style="border-radius: 5px;"></a><a href="user-account.php"><h3><i class="fas fa-user-check text-warning"></i> </h3></a><a href="cart.php"><h4><i class="fas fa-shopping-cart text-light"></i></h4><small id="cart_count">&nbsp;<?php echo $cart_count; ?></small></a>  <div class="mobileSearch">
      <form action="catalog.php" method="get" class="form-inline"> <div class="input-group">
  <div
class="search-box"> <input type="search" class="form-control here" placeholder="Search for products"
id="mobileSearch" name="term" style="width: 250" autocomplete="off" required="required"/> <div class="result"></div> </div>
<div class="input-group-append"> <button type="submit" class="btn btn-light"><i class="fa fa-search
    text-primary"></i></button> </div> </div> </form> </div><div class="collapse navbar-collapse justify-content-between" id="navbarCollapse"><div class="navbar-nav"></div> </div></nav> 
<!-- side bar -->
    <div class="container-fluid"><div id="hidden" class="bg-light"> <nav class="sidebar bg-light" id="sidebar"><div class="nav-item"><div class="jumbotron text-center py-1"><h2 class="text-warning">Blazers</h2></div> <div class="card"><div class="card-header py-1"><h4>Categories</h4></div> <div class="card-body"><ul><li><a href="blazers.php" class="dropdown-item"> <img src="imgs/suit.jpg" width="40" height="40" style="border-radius: 50%"> Blazers</a></li> <li><a href="bags.php" class="dropdown-item"> <img src="imgs/watch.PNG" width="40" height="40" style="border-radius: 50%">Accessories</a><li><li><a href="shoes.php" class="dropdown-item"> <img src="imgs/shoeswomen.PNG" width="40" height="40" style="border-radius: 50%">Shoes</a></li><li><a href="skirts.php" class="dropdown-item"> <img src="imgs/skirt.PNG" width="40" height="40" style="border-radius: 50%"> Skirts</a></li><li> <a href="trousers.php" class="dropdown-item"> <img src="imgs/trouser.PNG" width="40" height="40" style="border-radius: 50%">Trousers</a></li><li>  <a href="tops.php" class="dropdown-item"><img src="imgs/top.PNG" width="40" height="40" style="border-radius: 50%"> Tops/Brouse</a></li><li>  <a href="dresses.php" class="dropdown-item"> <img src="imgs/dress.PNG" width="40" height="40" style="border-radius: 50%"> Dresses</a></li><li><a href="beauty-products.php" class="dropdown-item"> <img src="imgs/beauty.PNG" width="40" height="40" style="border-radius: 50%">Beauty Products</a></li> </ul></div> </div></div></nav></div></div> 
<main class="container-fluid"> 
    <div class="row" id="mobile_welcome">
    <div class="col-sm-12 col-md-12">
        <div class="card">
        <h5 class="card-header bg-warning text-light">Welocome, &nbsp;<?php echo $got['firstname']; ?></h5>
        <div class="card-body" id="account-card">
                    <a href="#order" class="dropdown-item text-warning font-weight-bold"  id="openorder"> <i class="fas fa-shopping-basket"></i> My Orders</a>
                    <a href="#track" class="dropdown-item text-warning font-weight-bold" id="opentracks"><i class="fas fa-route"></i> Track My Order</a>              
                </div>           
            </div>    
        </div>
        </div>
    <div class="card-group px-md-4 mt-4">
    <div class="card">
        <h4 class="card-header text-warning">Account Overview</h4>
        <div class="card-body">
            <small style="color: red"><?php echo $firstname_error; echo $lastname_error; echo $contact_error;?></small> 
            <?php echo $update;?>
        <div class="row"> 
        <div class="col-md-6 col-lg-4">       
         <div class="card mt-4">
             <a name="useranchar"></a>
             <div class="card-header text-warning"><h4>ACCOUNT DETAILS <a href="#" data-toggle="tooltip" title="edit" class="profile"><i class="fas fa-user-edit"></i></a> </h4>
             </div>
            <div class="card-body">
            <form action="" method="post" name="user">
                <input type="input" value="<?php echo htmlspecialchars($email) ?>" style="width: 300" class="form-control" data-toggle="tooltip" title="email can not be changed" readonly>
                <div class="form-group row">
                <small class="col-dm-6">First Name</small>
                <div class="col-md-6">
                <input type="text" value="<?php echo htmlspecialchars($firstname) ?>" style="width: 200" class="text" name="firstname" id="name" required readonly>
                    </div>
                </div>
                <div class="form-group row">
                <small class="col-dm-6">Last Name</small>
                <div class="col-md-6">    
                <input type="text" value="<?php echo htmlspecialchars($lastname) ?>" style="width: 200" class="text" name="lastname" required readonly>
                    </div>
                </div>
                <div class="form-group row">
                <small class="col-dm-6">Phone Number</small>
                <div class="col-md-6">
                    <input type="text" value="<?php echo htmlspecialchars($contact) ?>" style="width: 200" class="text" name="contact" required readonly>
                    </div>
                </div>
                <br>
                <div align="right">
                <button type="submit" class="btn btn-outline-primary btn-sm" id="saveprofile" name="saveprofile">SAVE</button>
                </div>
                </form> 
             </div>
             <div class="card-footer">
             <button type="button" class="btn btn-warning" id="change">CHANGER PASSWORD</button>
             </div>
            </div>
            </div>
            
            <div class="col-md-6 col-lg-4">      
         <div class="card mt-4">
             <div class="card-header text-warning"><h4>ADDRESS BOOK <a href="#" data-toggle="tooltip" title="edit" class="address"><i class="fas fa-edit"></i></a></h4></div>
            <div class="card-body">
                <a name="addressanchar"></a>
                <form action="" method="post">
                <div class="form-group row">
                    <small class="col-dm-4">Address</small>
                    <div class="col-md-6">
                     <input type="text" value="<?php echo htmlspecialchars($address) ?>" list="location" style="width: 200" class="textaddress" name="address" id="address" required readonly>
                    </div>
                    </div>
                    <div align="right">
                    <button type="submit" class="btn btn-outline-primary btn-sm" name="saveaddress" id="saveaddress">SAVE</button>
                    </div>
                </form>
                <small style="color: red"><?php echo $address_error;?></small>
             </div>
            </div>
            </div>
            
            <div class="col-md-6 col-lg-4" id="password">      
         <div class="card mt-4">
             <div class="card-header text-warning"><h4><i class="fas fa-key"></i> CHANGE PASSWORD</h4></div>
            <div class="card-body">
             <form action="" method="post">
                <div class="form-group row">
                 <small class="col-md-4">Current Password</small>
                    <div class="col-md-6">
                    <input type="password" name="current" autofocus required>
                    </div>
                 </div>
                                 <div class="form-group row">
                 <small class="col-md-4">New Password</small>
                    <div class="col-md-6">
                    <input type="password" name="new" required>
                    </div>
                 </div>
                                 <div class="form-group row">
                 <small class="col-md-4">Retype Password</small>
                    <div class="col-md-6">
                    <input type="password" name="conf" required>
                    </div>
                 </div>
                 <div align="right">
                 <button type="submit" class="btn btn-outline-primary btn-sm" name="savepassword" onclick="return confirm('Save Password?')">SAVE</button>
                 </div>
                </form>
                <small style="color: red"><?php echo $new_error; echo $current_error; echo $conf_new_error; ?></small>
             </div>
            </div>
            </div>
            
            </div>
        </div>
        
        </div>
    
    </div>
    <a name="track"></a>
     <div class="container-fluid px-1 px-md-4 mt-4" id="track"> 
        <input type="hidden" id="status" value="<?php echo htmlspecialchars($status) ?>"> 
    <div class="card">
    <h4 class="card-header text-waring">Track Your Order, NO: <?php echo htmlspecialchars($maxorder); ?> <b id="notification"></b></h4>    
    <!-- Add class 'active' to progress -->
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <ul id="progressbar" class="text-center">
                    <li class="step0 active" id="step1"></li>
                    <li class="step0" id="step2"></li>
                    <li class="step0" id="step3"></li>
                    <li class="step0" id="step4"></li>
                </ul>
            </div>
        </div>
        <div class="row justify-content-between top">
            <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/9nnc9Et.png">
                <div class="d-flex flex-column">
                  <p class="font-weight-bold text-muted" id="success1">Order<br>Processed</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/u1AzR7w.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold text-muted" id="success2">Order<br>Shipped</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/TkPm63y.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold text-muted" id="success3">Order<br>IN Route</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/HdsziHP.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold text-muted" id="success4">Order<br>Arrived</p>
                </div>
            </div>
        </div>
        <div class="card-footer py-1">
        <div class="row">
            <div class="col-md-12 col-lg-12 d-flex justify-content-center">
                <a href="index.php" class="btn btn-primary btn-sm">CONTINUE SHOPPING</a>
            </div>
            </div> 
        </div>
    </div>
</div>
    <a name="order"></a>
    <div class="container-fluid px-1 px-md-4 mt-4" id="order">
    <div class="card">
        <div class="card-header py-1 text-muted">
        <h3 class="text-warning">Your Orders &nbsp; <b>(<?php echo $execute['count(email)']; ?>)</b> <b><span class="text-primary"><?php echo $pending; ?></span></b></h3>
        </div>
        <div class="card-body">
         <?php  //retrive all oderes of the user 
     $orders = mysqli_query($con, "select name, image, status, ordered_at from all_cart inner join ordered on all_cart.order_ID = ordered.order_ID where all_cart.email = '$email'");
        if(mysqli_num_rows($orders)>0){   
while($row = mysqli_fetch_assoc($orders)){
            echo"<div class='card mt-3'>";
          echo" <div class='card-body'>";
           echo"<div class='row'>";
            echo"<div class='col-md-6 col-lg-4'><img src='".$row['image']."' width='200' height='200'></div>";
             echo"<div class='col-md-6 col-lg-4'>";
            echo"<div>".$row['name']."</div>";
            echo"<div class='text-muted'>"."placed on ".$row['ordered_at']."</div>";
             echo"<div>"."status: ".$row['status']."</div>";
            echo"</div>
                </div>
            </div>
            </div>";
}
        }else{
            echo "You have'nt made any orders yet!";
        }
        ?>
        </div>
        </div>    
    </div>
    <div class="row">
    <div class="col-sm-12 col-md-12">
        <hr>
<a href="logout.php" id="mobile_welcome" onclick="return confirm('Logout of your Account?')"><button class="btn btn-warning" style="width: 100%">LOGOUT</button></a>-
        </div>
    </div>
    </main>
<div style="clear:both;"></div>
<a href="#top" class="tops"><i class="fas fa-arrow-circle-up"></i></a>

    <datalist id="location">
    <option>Abayita Ababiri</option><option>Airport Area</option><option>Banga</option><option>Bugonga</option><option>Busambaga</option><option>Bwebajja</option><option>Entebbe Market Area</option><option>Entebbe Town</option><option>Bakuli</option><option>Bukasa</option><option>Bukoto</option><option>Bulange</option><option>Bunamwaya</option><option>Banda</option><option>Butabika</option><option>Bukesa</option><option>Buwate</option><option>Buziga</option><option>Bbungo</option><option>Bwaise</option><option>Bweyogerere</option><option>Central Business District</option><option>Bugolobi</option><option>Gayaza</option><option>Ggaba</option><option>Industrial Area</option><option>Kabalagala</option><option>Kabowa</option><option>Katabi</option><option>Kigungu</option>  <option>Kabusu</option><option>Kalerwe</option><option>Kamwokya</option><option>Kansanga</option><option>Kanyanya</option><option>Kasubi</option><option>Katwe</option><option>Kawaala</option><option>Kawempe Kazo</option><option>Kawempe Mbogo</option><option>Kawempe Tula</option><option>Kawuku</option><option>Kibuli</option><option>Kibuye</option><option>Kisubi</option><option>Kitoro</option><option>Kitubulu</option><option>Kifafu</option><option>Kigowa</option><option>Kikaaya</option><option>Kikoni</option><option>Kinawatata</option><option>Kira Town</option><option>Kireka</option><option>Kirinya</option><option>Kisasi</option><option>Kisementi</option><option>Kisugu</option><option>Kitante</option><option>Kitebi</option><option>Kitintale</option><option>Kiwaatule</option><option>Kiwafu</option><option>Kololo</option><option>Konge</option><option>Kulambiro</option><option>Kungu</option><option>Kyaliwajjala</option><option>Kyambogo</option><option>Kanja</option><option>Kebando</option><option>Lubiri</option><option>Lubowa</option><option>Lugogo</option><option>Lukuli</option><option>Lungujja</option><option>Lunyo</option><option>Lyamutundwe</option><option>Luzila</option><option>Makerere</option><option>Makindye</option><option>Mbalwa</option><option>Mbuya</option><option>Mengo</option><option>Manyago</option><option>Mayanzi</option><option>Mpererwe</option><option>Mulago</option><option>Munyonyo</option><option>Mutundwe</option><option>Mutungo</option><option>Muyenga</option><option>Nalya</option><option>Nagulu</option><option>Najjanankumbi</option><option>Najjera 1</option><option>Najjera 2</option><option>Nakasero</option><option>Nakawa</option><option>Nakiwogo</option><option>Nakivubo</option><option>Nakulabye</option><option>Nalukolongo</option><option>Namanve</option><option>Namasuba</option><option>Namirembe</option><option>Namugongo</option><option>Namungona</option><option>Namuwongo</option><option>Ndeeba</option><option>Nkumbo</option><option>Nsamizi</option><option>Nsamya</option><option>Ntinda</option><option>Ntinda Industrial Area</option><option>Nyanama</option><option>Old Kampala</option><option>Rubaga</option><option>Saalama</option><option>Wakaliga</option><option>Wandegeya</option><option>Wankulukuku</option><option>Zana</option></datalist>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/purejs.js"></script>    
</body>
</html>