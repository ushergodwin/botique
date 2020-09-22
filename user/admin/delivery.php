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
<style type="text/css">
  .loading{
    height: 100%;
    position: fixed;
  }
</style>
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
  <a href="#vouchar" class="w3-bar-item w3-button" data-toggle="tooltip" title="click to go to add vouchar">ADD VOUCHAR</a>
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
        <form class="form-inline ml-auto">
            <input type="text" class="form-control mr-sm-2" placeholder="Search">
            <button type="submit" class="btn btn-outline-light">Search</button>
        </form>
          <div class="navbar-nav">
            <a href="messages" class="nav-item nav-link"><small><span class="badge badge-light" id="top-badge"><?php echo $messages_count; ?></span></small><h4><i class="fas fa-envelope"></i></h4></a>
            <a href="#" class="nav-item nav-link"><small><span class="badge badge-light messages" id="top-badge">5</span></small><h4><i class="fas fa-bell"></i></h4></a>
             <a href="#" class="nav-item nav-link"><h4><i class="fas fa-cog"></i></h4></a>
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Admin</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="help" class="dropdown-item">Help?</a>
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
font-weight-bold">Loggedin as: <?php echo $firstname; ?></span>&nbsp;<span id="time" class="text-light"></span></h5> &nbsp; &nbsp; <a href="#" class="text-light">Home /<small class="text-warning">Admin</small> / <small class="text-secondary">Delivery Prices/</small> </a> </div><a href="#hide-bottom-bar.asp" class="nav-item nav-link d-flex flex-column
text-sm-right" id="bottom-bar"><h4 lass=""><i class="fas fa-eye-slash text-light" id="eye"></i></h4></a>
 </div>
     </div>
<div class="w3-container">  
<div class="card mt-3 bg-dark"> <h5 class="card-header text-muted"><i class="fas
fa-dollar-sign"></i> LOCATION DELIVERY COST</h5>  
<div class="card-body"> 
  <div class="table-responsive"> 
  <table class="table table-dark table-striped" border="2">
   <thead> 
    <tr>
         <th>LOCATION</th>
          <th>DELIVERY COST</th>
    </tr> 
    </thead> 
    <tbody> 
      <tr> 
        <?php
foreach ($all_prices as $key => $price): ?>
  <td>
    <?php echo $price['location'] ?>
      
    </td> 
    <td>
      <?php echo number_format($price['price']) ?>
        
      </td>
      </tr> 
      </tbody>
       <?php endforeach ?> 
     </table>
      </div> 
    </div> 
  </div>
    

<div class="card mt-3 bg-dark text-light"> <h5 class="card-header text-muted">ADD LOCATION DELIVERY
COSTS</h5> <div class="card-body">
<div class="row"> <div class="col-md-12 col-lg-12"> <form action=""
method="post" id="deliveryForm"> <div class="input-group"> <label
for="location">Location</label> <input type="text" name="location"
class="form-control" list="location" style="border-radius: 50px;"> &nbsp;
&nbsp; <label for="cost">Cost</label> <input type="number" name="cost"
class="form-control" style="border-radius: 50px;"> &nbsp; &nbsp; &nbsp;
<input type="hidden" name="add_delivery_cost" value="add_delivery_cost">
<button type="submit" class="btn btn-success btn-sm"
data-toggle="tooltip" title="click to add delivery cost"><i class="fas
fa-arrow-circle-up"></i></button> &nbsp; &nbsp; </div> </form> <div class="deliveryRespose"></div> </div> </div> </div> </div> 

<div class="card mt-3 bg-dark text-light"> <h5 class="card-header text-muted">UPDATE LOCATION DELIVERY
COSTS</h5> <div class="card-body">
<div class="row"> <div class="col-md-12 col-lg-12"> <form action=""
method="post" id="updateDeliveryForm"> <div class="input-group"> <label
for="location">Location</label> <input type="text" name="location"
class="form-control" list="location" style="border-radius: 50px;"> &nbsp;
&nbsp; <label for="cost">New Cost</label> <input type="number" name="cost"
class="form-control" style="border-radius: 50px;"> &nbsp; &nbsp; &nbsp;
<input type="hidden" name="update_delivery_cost" value="update_delivery_cost">
<button type="submit" class="btn btn-success btn-sm"
data-toggle="tooltip" title="click to update delivery cost"><i class="fas
fa-arrow-circle-up"></i></button> &nbsp; &nbsp; </div> </form> <div class="updateDeliveryRespose"></div> </div> </div> </div> </div> 

<div class="card mt-3 bg-dark text-light"> 
  <a name="vouchar"></a><h5
class="text-muted">ADD VOUCHARS</h5> <div class="card-body">  <div class="row"> <div class="col-md-12 col-lg-12"> <form
action="" method="post" id="voucharForm"> <div class="input-group"> <label
for="location">Vouchar Code</label> <input type="text" name="vouchar_code"
class="form-control" placeholder="both letters and numbers(6)" maxlength="6"
style="border-radius: 50px;" required="required"> &nbsp; <label for="cost">Vouchar Cost</label> <input
type="number" name="vouchar_cost" class="form-control" style="border-radius:
50px;" required="required"> &nbsp;
<input type="hidden" name="add_vouchar" value="add_vouchar">
<button type="submit" class="btn btn-success btn-sm"
 data-toggle="tooltip" title="click to add vouchar"><i class="fas
fa-arrow-circle-up"></i></button> &nbsp; &nbsp; </div> </form> <div class="voucharResponse"></div> </div> </div>
</div> </div> <div class="card mt-3 bg-dark text-light"> <h5 class="text-muted card-header">CURRENT VOUCHARS
IN THE SYSTEM (<small class="text-info">Each Vouchar is automatically deleted
once used</small>)</h5> <div class="card-body"> <div class="row"> <div
class="col-md-12 col-lg-12"> <div class="table-responsive"> <table
class="table table-dark"> <thead> <tr> <th>VOUCHAER CODE</th> <th>VOUCHER
PRICE</th> <td></td> </tr> </thead> <tbody> <tr> <?php foreach ($vouchar as
$key => $value): ?>  <td><?php echo $value['vochar'] ?></td> <td><?php echo
number_format($value['price']) ?></td> </tr> </tbody> <?php endforeach ?>
</table> </div> </div> </div> </div> <datalist id="location">
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
        </div>

</div>
   
</div>
<div class="loading"></div>
 <a href="#show-bottom-bar.asp" class="open-bottom-bar"><h3><i class="fas fa-eye text-primary"></i> </h3></a>
 <div class="rounded-circle bg-secondary div-top">  
 <a href="#top.asp" class="top"><h3><i class="fas fa-angle-up text-light"></i> </h3></a>
 </div> 
           <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   
</body>
</html>
