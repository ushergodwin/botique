<?php session_start();  require('products-logic.php'); include_once('db.php');
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
rel="stylesheet" href="css/header.css"> <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> <style
type="text/css">.sidebar{display: none;}</style> <script
src="js/header.js"></script> <script src="js/purejs.js"></script> <script>    
$(function(){ $("#price_button").click(function(){ $(".price_input").toggle();
}); $(function(){$('[data-toggle = "tooltip"]').tooltip();}) }); </script>
<style type="text/css">.price_input{display: none;}</style> </head> <body
class="bg-secondary"> <nav class="navbar navbar-light bg-dark sticky-top">
<div class="navbar nav-item" id="item"> <a href="all_products.php" class="btn
btn-outline-light btn-sm">ALL PRODUCTS</a> &nbsp; <a href="admin-products.php"
class="btn btn-outline-light btn-sm">ADD PRODUCTS</a> &nbsp; <a
href="admin-products.php" class="btn btn-outline-light btn-sm">DELETE PRODUCTS</a>
&nbsp; <a href="admin-products.php" class="btn btn-outline-light btn-sm">UPDATE
PRODUCTS</a> &nbsp; <a href="delivery-prices" class="btn btn-outline-light
btn-sm active">DELIVERY PRICES</a> &nbsp; <a href="user-messages.php" class="btn
btn-outline-light btn-sm">MESSAGES <span style="border-radius: 5px; border:
2px solid green;"><?php echo $message_num; ?></span></a> </div> <div
class="navbar nav-item"> <small style="color: white">Loggedin as: <?php echo
$username; ?></small> &nbsp; <a href="logout.php" class="btn btn-warning
btn-sm" id="log">LOGOUT</a>     </div>        </nav> <div
class="container-fluid"> <div class="card mt-3"> <h5 class="card-header
text-muted"><i class="fas fa-dollar-sign"></i> LOCATION DELIVERY COST</h5>
<span><?php echo $update_location_status;?></span> <div class="card-body">
<div class="table-responsive"> <table class="table table-dark"> <thead> <tr>
<th>LOCATION</th> <th>DELIVERY COST</th> <td>UPDATE <button type="button"
class="btn btn-warning btn-sm" id="price_button"><i class="fas
fa-edit"></i></button></td> <td></td> </tr> </thead> <tbody> <tr> <?php
foreach ($all_prices as $key => $price): ?>  <td><?php echo $price['location']
?></td> <td><?php echo number_format($price['price']) ?></td> <td> <div
class="price_input"> <form action="" method="post"> <input type="hidden"
name="location_id" value="<?php echo htmlspecialchars($price['id']); ?>">
<input type="number" name="location_price" class="form-control" style="width:
150" placeholder="enter price" value="<?php echo $price['price'] ?>">

              <td><button class="btn btn-success btn-sm"
name="update_location" onclick="return confirm('Update Delivery Cost?');"
data-toggle="tooltip" title="click to update"><i class="fa
fa-arrow-right"></i></button></td> </form> </div> </tr> </tbody> <?php
endforeach ?> </table> </div> </div> </div>
    

<div class="card mt-3"> <h5 class="text-muted">ADD LOCATION DELIVERY
COSTS</h5> <div class="card-body"> <?php echo $delivery_location_status; ?>
<div class="row"> <div class="col-md-8 col-lg-8"> <form action=""
method="post"> <div class="input-group"> <label
for="location">Location</label> <input type="text" name="location"
class="form-control" list="location" style="border-radius: 50px;"> &nbsp;
&nbsp; <label for="cost">Cost</label> <input type="number" name="cost"
class="form-control" style="border-radius: 50px;"> &nbsp; &nbsp; &nbsp;
<button type="submit" class="btn btn-success btn-sm" name="add_delivery_cost"
data-toggle="tooltip" title="click to add"><i class="fas
fa-arrow-circle-up"></i></button> &nbsp; &nbsp; </div> <span
class="text-danger"><?php echo $delivery_location_error ?></span>&nbsp; &nbsp;
&nbsp;&nbsp; &nbsp;<span class="text-danger"><?php echo $location_cost_error
?></span> </form> </div> </div> </div> </div> <div class="card mt-3"> <h5
class="text-muted">ADD VOUCHARS</h5> <div class="card-body"> <?php  echo
$vouchar_status;?> <div class="row"> <div class="col-md-8 col-lg-8"> <form
action="" method="post"> <div class="input-group"> <label
for="location">Vouchar Code</label> <input type="text" name="vouchar_code"
class="form-control" placeholder="both letters and numbers(6)" maxlength="6"
style="border-radius: 50px;" required="required"> &nbsp;<?php echo
$vouchar_code_error;?> &nbsp; <label for="cost">Vouchar Cost</label> <input
type="number" name="vouchar_cost" class="form-control" style="border-radius:
50px;" required="required"> &nbsp; &nbsp; &nbsp; <?php echo
$vouchar_cost_error ?> <button type="submit" class="btn btn-success btn-sm"
name="add_vouchar" data-toggle="tooltip" title="click to add"><i class="fas
fa-arrow-circle-up"></i></button> &nbsp; &nbsp; </div> </form> </div> </div> </div> </div> <div
class="card mt-3"> <h5 class="text-muted">CURRENT VOUCHARS IN THE SYSTEM
(<small class="text-info">Each Vouchar is automatically deleted once
used</small>)</h5> <div class="card-body"> <div
class="row"> <div class="col-md-12 col-lg-12"> <div class="table-responsive">
<table class="table table-dark"> <thead> <tr> <th>VOUCHAER CODE</th>
<th>VOUCHER PRICE</th> <td></td> </tr> </thead> <tbody> <tr> <?php foreach
($vouchar as $key => $value): ?>  <td><?php echo $value['vochar'] ?></td>
<td><?php echo number_format($value['price']) ?></td> </tr> </tbody> <?php
endforeach ?> </table> </div> </div> </div> </div> <datalist id="location">
<option>Abayita Ababiri</option><option>Airport
Area</option><option>Banga</option><option>Bugonga</option><option>Busambaga</option><option>Bwebajja</option><option>Entebbe
Market Area</option><option>Entebbe Town</option>
<option>Bakuli</option><option>Bukasa</option><option>Bukoto</option><option>Bulange</option><option>Bunamwaya</option>
<option>Banda</option><option>Butabika</option><option>Bukesa</option><option>Buwate</option><option>Buziga</option>
<option>Bbungo</option><option>Bwaise</option><option>Bweyogerere</option><option>Central
Business District</option>
<option>Bugolobi</option><option>Gayaza</option><option>Ggaba</option><option>Industrial
Area</option><option>Kabalagala</option>
<option>Kabowa</option><option>Katabi</option><option>Kigungu</option> 
<option>Kabusu</option><option>Kalerwe</option><option>Kamwokya</option><option>Kansanga</option><option>Kanyanya</option><option>Kasubi</option><option>Katwe</option><option>Kawaala</option><option>Kawempe
Kazo</option><option>Kawempe Mbogo</option><option>Kawempe
Tula</option><option>Kawuku</option><option>Kibuli</option>
<option>Kibuye</option><option>Kisubi</option><option>Kitoro</option><option>Kitubulu</option><option>Kifafu</option><option>Kigowa</option><option>Kikaaya</option><option>Kikoni</option><option>Kinawatata</option><option>Kira
Town</option><option>Kireka</option><option>Kirinya</option><option>Kisasi</option><option>Kisementi</option><option>Kisugu</option><option>Kitante</option><option>Kitebi</option><option>Kitintale</option><option>Kiwaatule</option><option>Kiwafu</option><option>Kololo</option><option>Konge</option><option>Kulambiro</option><option>Kungu</option><option>Kyaliwajjala</option><option>Kyambogo</option><option>Kanja</option><option>Kebando</option><option>Lubiri</option><option>Lubowa</option><option>Lugogo</option><option>Lukuli</option><option>Lungujja</option><option>Lunyo</option><option>Lyamutundwe</option><option>Luzila</option><option>Makerere</option><option>Makindye</option><option>Mbalwa</option><option>Mbuya</option><option>Mengo</option><option>Manyago</option><option>Mayanzi</option><option>Mpererwe</option><option>Mulago</option><option>Munyonyo</option><option>Mutundwe</option><option>Mutungo</option><option>Muyenga</option><option>Nalya</option><option>Nagulu</option><option>Najjanankumbi</option><option>Najjera
1</option><option>Najjera
2</option><option>Nakasero</option><option>Nakawa</option><option>Nakiwogo</option><option>Nakivubo</option><option>Nakulabye</option><option>Nalukolongo</option><option>Namanve</option><option>Namasuba</option><option>Namirembe</option><option>Namugongo</option><option>Namungona</option><option>Namuwongo</option><option>Ndeeba</option><option>Nkumbo</option><option>Nsamizi</option><option>Nsamya</option><option>Ntinda</option><option>Ntinda
Industrial Area</option><option>Nyanama</option><option>Old
Kampala</option><option>Rubaga</option><option>Saalama</option><option>Wakaliga</option><option>Wandegeya</option><option>Wankulukuku</option><option>Zana</option>

  </datalist> <a href="#top" class="tops"><i class="fas
fa-arrow-circle-up"></i></a> <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> <script src="js/purejs.js"></script> </div>
</body> </html>