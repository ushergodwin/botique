<?php include_once 'count.php'; include_once 'online.php' ?>
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
<script src="js/dashboard.js"></script>
<script src="js/javascript.js"></script>
<style type="text/css">
  #load-stat{display: none;}
</style>
<body>

<div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left bg-dark text-light font-weight-bold" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
  <div class="jumbotron py-1 bg-dark text-center p-3"><h4 class="text-light">GemasGlamHome</h4><h5 class="text-warning">WELCOME</h5></div><hr>
  <a href="all-products" class="w3-bar-item w3-button">ALL PRODUCTS &nbsp;<span class="badge badge-light"><?php echo $total_no_of_products; ?></span></a><hr>
  <a href="#" class="w3-bar-item w3-button" id="open-product-links"><i class="fab fa-product-hunt text-secondary"></i> PRODUCTS &nbsp;<i class="fas fa-angle-down" id="product-angle"></i> </a>
  <ul class="show-product-links">
   <a href="add-products" class="w3-bar-item w3-button">ADD PRODUCTS</a>
   <a href="add-products" class="w3-bar-item w3-button">DELETE PRODUCTS</a>
   <a href="add-products" class="w3-bar-item w3-button">UPDATE PRODUCTS</a> 
  </ul>
  <hr>
  <a href="#" class="w3-bar-item w3-button" id="open-user-links"><i class="fas fa-user text-secondary"></i> USERS&nbsp; <small><span class="badge badge-light messages"><?php echo $users_count; ?></span></small>&nbsp; &nbsp;<i class="fas fa-angle-down" id="user-angle"></i> </a>
  <ul class="show-user-links">
   <a href="clients" class="w3-bar-item w3-button">UPATE USERS</a>
   <a href="clients" class="w3-bar-item w3-button">DELETE USERS</a>
  </ul> 
<hr>
  <a href="delivery" class="w3-bar-item w3-button"><i class="fas fa-money-check-alt text-secondary"></i> DELIVERY PRICES</a>
  <hr>
  <a href="delivery" class="w3-bar-item w3-button">ADD VOUCHAR</a>
  <hr>
  <a href="messages" class="w3-bar-item w3-button"><i class="fas fa-envelope text-secondary messages"></i> MESSAGES  <span class="badge badge-light"><?php echo $messages_count; ?></span></a>
  <a href="https://www.gemasglam.com/support/admin" class="w3-bar-item w3-button"  data-toggle="tooltip" title="click to login in the support system"><i class="fas fa-question-circle text-secondary messages"></i> SUPPORT  <span class="badge badge-light" id="current"></span></a>
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
            <a href="clients" class="nav-item nav-link"><i class="fas fa-user"></i> Users <small><span class="badge badge-light messages" id="top-badge"><?php echo $users_count; ?></span></small></a> &nbsp;
            <a href="settings" class="nav-item nav-link"><i class="fas fa-cog"></i> Settings</a> &nbsp;
            <a href="https://gemasglam.com/webmail" class="nav-item nav-link" target="_blank"><i class="fas fa-mail-bulk"></i> Webmail</a>&nbsp;
            <a href="help" class="nav-item nav-link"><i class="fas fa-question-circle"></i></a> &nbsp;
             <a href="#online-users.asp" class="dropdown-toggle active" data-toggle="dropdown"><i class="fas fa-user-circle text-primary"></i>Online<small><span class="badge badge-light messages" id="top-badge"><?php echo usersonline(); ?></span></small></a>
             <div class="dropdown" id="online">
               <div class="dropdown-menu">
                <div id="online-list" class="text-danger" style="text-align: center;"><span class="spinner-border spinner-border-sm"></span>loading...</div>
                <div class="dropdown-divider"></div>
                <a href="#"class="dropdown-item">Guest users'names are not known</a>
            </div>
             </div>

              
        </div>
        <form class="form-inline ml-auto">
            <input type="text" class="form-control mr-sm-2" placeholder="Search">
            <button type="submit" class="btn btn-outline-light">Search</button>
        </form>
          <div class="navbar-nav">
            <a href="messages" class="nav-item nav-link"><small><span class="badge badge-light messages" id="top-badge"><?php echo $messages_count; ?></span></small><h4><i class="fas fa-envelope"></i></h4></a>
            <a href="#" class="nav-item nav-link"><small><span class="badge badge-light messages" id="top-badge">5</span></small><h4><i class="fas fa-bell"></i></h4></a>
             <a href="settings" class="nav-item nav-link"><h4><i class="fas fa-cog"></i></h4></a>
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
font-weight-bold">Loggedin as: <?php echo $firstname; ?></span>&nbsp;<span id="time" class="text-light"></span></h5> &nbsp; &nbsp; <a href="#" class="text-light">Home /<small class="text-warning">Admin</small> / <small class="text-secondary">Dashboard</small> </a> </div><a href="#hide-bottom-bar.asp" class="nav-item nav-link d-flex flex-column
text-sm-right" id="bottom-bar"><h4 lass=""><i class="fas fa-eye-slash text-light" id="eye"></i></h4></a>
 </div>
     </div>
<div class="w3-container">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mt-2 bg-dark">
      <h4 class="card-header text-light">Orders </h4>
      <div class="card-body">
        <div class="row">
            <div class="col-md-4 col-lg-3 col-xl-3">
      <div class="card card-body bg-info text-light mt-2">
        <h4>No of Orders &nbsp;<span class="badge badge-light" id="no_of_orders"><span class="spinner-border spinner-border-sm"></span>
    Loading... <small id="timer"></small></span></h4>
        <h5><small class="text-secondary"><a href="#" class="btn btn-outline-light btn-sm">More Details</a></small></h5>
 <a href="#loading-data.asp" class="text-light loading-data"><span class="spinner-border spinner-border-sm"></span>
    Loading...</a>
      </div>
    </div>
    <div class="col-md-4 col-lg-4 col-xl-3">
      <div class="card card-body bg-secondary text-light mt-2">
        <h4>Current Orders &nbsp;<span class="badge badge-light" id="current_orders"><span class="spinner-border spinner-border-sm"></span>
    Loading... <small id="timer2"></small></span></h4>
        <h5><small class="text-secondary"><a href="#" class="btn btn-outline-light btn-sm">More Details</a></small></h5>
    <a href="#loading-data.asp" class="text-light loading-data"><span class="spinner-border spinner-border-sm"></span>
    Loading...</a>
      </div>
    </div>
    <div class="col-md-4 col-lg-3 col-xl-3">
      <div class="card card-body bg-success text-light mt-2">
        <h4>Delivered &nbsp;<span class="badge badge-light" id="delivered_orders"><span class="spinner-border spinner-border-sm"></span>
    Loading... <small id="timer3"></small></span></h4>
        <h5><small class="text-secondary"><a href="#" class="btn btn-outline-light btn-sm">More Details</a></small></h5>
    <a href="#loading-data.asp" class="text-light loading-data"><span class="spinner-border spinner-border-sm"></span>
    Loading...</a>
      </div>
    </div>
      <div class="col-md-4 col-lg-3 col-xl-3">
      <div class="card card-body bg-danger text-light mt-2">
        <h4>Canceled &nbsp;<span class="badge badge-light" id="cancelled_orders"><span class="spinner-border spinner-border-sm"></span>
    Loading... <small id="timer4"></small></span></h4>
        <h5>&nbsp; &nbsp; <small class="text-secondary"><a href="#" class="btn btn-outline-light btn-sm">More Details</a></small></h5>
     <a href="#loading-data.asp" class="text-light loading-data"><span class="spinner-border spinner-border-sm"></span>
    Loading...</a>
      </div>
    </div>
  </div>
  </div>
</div>
</div>
  </div>
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mt-2 bg-dark">
      <h4 class="card-header text-light">Product Categories</h4>
      <div class="card-body">
          <div class="row">
    <div class="col-md-4 col-lg-3 col-xl-3">
      <div class="card card-body bg-primary text-light mt-2">
        <h4>Acessories &nbsp;<span class="badge badge-light"><?php echo $accessories_count; ?></span></h4>
      </div>
    </div>
    <div class="col-md-4 col-lg-3 col-xl-3">
      <div class="card card-body bg-info text-light mt-2">
        <h4>Blazers &nbsp;<span class="badge badge-light"><?php echo $blazers_count ?></span></h4>
      </div>
    </div>
    <div class="col-md-4 col-lg-4 col-xl-3">
      <div class="card card-body bg-secondary text-light mt-2">
        <h4>Skirts &nbsp;<span class="badge badge-light"><?php echo $skirts_count; ?></span></h4>
      </div>
    </div>
    <div class="col-md-4 col-lg-3 col-xl-3">
      <div class="card card-body bg-success text-light mt-2">
        <h4>Dresses &nbsp;<span class="badge badge-light"><?php echo $dresses_count; ?></span></h4>
      </div>
    </div>
  </div>
       <div class="row">
    <div class="col-md-4 col-lg-3 col-xl-3">
      <div class="card card-body bg-primary text-light mt-2">
        <h4>Shoes &nbsp;<span class="badge badge-light"><?php echo $shoes_count; ?></span></h4>
      </div>
    </div>
    <div class="col-md-4 col-lg-3 col-xl-3">
      <div class="card card-body bg-info text-light mt-2">
        <h4>Bags &nbsp;<span class="badge badge-light"><?php echo $bags_count; ?></span></h4>
      </div>
    </div>
    <div class="col-md-4 col-lg-4 col-xl-3">
      <div class="card card-body bg-secondary text-light mt-2">
        <h4>Trousers &nbsp;<span class="badge badge-light"><?php echo $trousers_count; ?></span></h4>
      </div>
    </div>
    <div class="col-md-4 col-lg-3 col-xl-3">
      <div class="card card-body bg-success text-light mt-2">
        <h4>Tops &nbsp;<span class="badge badge-light"><?php echo $tops_count; ?></span></h4>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12">
      <div class="card card-body badge-light text-dark mt-2">
        <h4>Beauty Products &nbsp;<span class="badge badge-primary"><?php echo $beauty_count; ?></span></h4>
      </div>
    </div>
  </div>
      </div>
    </div>
  </div>
  </div>
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
      <div class="card mt-2 bg-dark">
        <div class="card-header text-light" style="display: inline-flex;">
        <h4>Monthly Total Sales (UGX) for &nbsp; <span id="selectedYear"><?php echo date("Y"); ?></span> &nbsp; &nbsp;<i class="fas fa-chart-pie"></i> &nbsp; &nbsp;<select class="custom-select" style="width: 150px;" id="year" onchange="statOfYear()"><option>2020</option><option>2021</option><option>2022</option><option>2023</option><option>2024</option><option>2025</option><option>2026</option><option>2027</option><option>2028</option><option>2029</option><option>2030</option></select></h4> &nbsp; &nbsp; <h5 id="load-stat"><span class="spinner-border spinner-border-sm spinener-light"></span> Loading... </h5></div>
        <div class="card-body">
         <div class="table-responsive">
           
              <div id="sales_table"></div>
         </div>
         <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        </div>
      </div>
      <div class="card bg-dark mt-2">
        <h5 class="card-header text-light">CALCULATOR</h5>
        <div class="card-body">
          <div class="row justify-content-center">
            <div class="col-md-12 col-lg-8 col-xl-8">
              <div class="card card-body">
                <div class="input-group">
                  <h4 id="value1"></h4> &nbsp;&nbsp;<h4 id="optionValue"></h4>&nbsp;&nbsp; <h4 id="value2"></h4>&nbsp;&nbsp; <h4 id="asgin"></h4>&nbsp;&nbsp;<h4 id="answer"></h4> <h4 id="error"></h4>
                </div>
                <br> <br> <br>
                <form>
                <div class="input-group">
               <input type="number" id="input1" class="form-control" placeholder="value1" onkeyup="getInput()">
               <select class="custom-select" id="option" onchange="operator()">
                 <option>select</option><option>+</option><option>-</option><option>*</option><option>/ </option>
               </select>
               <input type="number" id="input2" class="form-control" placeholder="input2" onkeyup="getNum()">  
                 </div><br>
                 <div align="right"><button type="reset" class="btn btn-danger ben-sm" id="reset" onclick="resetButton()">Clear</button> </div>
               </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
</div>
 <a href="#show-bottom-bar.asp" class="open-bottom-bar"><h3><i class="fas fa-eye text-primary"></i> </h3></a>
 <div class="rounded-circle bg-secondary div-top">  
 <a href="#top.asp" class="top"><h3><i class="fas fa-angle-up text-light"></i> </h3></a>
 </div> 
 <script>
   function resetButton() {
      document.getElementById('value1').innerHTML = '';
      document.getElementById('value2').innerHTML = '';
      document.getElementById('optionValue').innerHTML = '';
      document.getElementById('asgin').innerHTML = '';
      document.getElementById('error').innerHTML = '';
      document.getElementById('answer').innerHTML = '';
     }

    function statOfYear() {
      var year = document.getElementById('year').value;
      var request = new XMLHttpRequest();
      request.open("GET", 'get?year='+year, true);
      request.onreadystatechange = function(){
        if(this.readyState === 4 && this.status === 200) {
          document.getElementById('sales_table').innerHTML = this.responseText;
         document.getElementById('selectedYear').innerHTML = year;
         document.getElementById('load-stat').style.display = 'none';
        }
      }
      document.getElementById('load-stat').style.display = 'inline-flex';
      request.send();
     }
 </script>
<script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
  theme: "light2",
  animationEnabled: true,
  title: {
    text: "Monthly Sale chart"
  },
  data: [{
    type: "pie",
    indexLabel: "{y}",
    yValueFormatString: "#,##0.00\"%\"",
    indexLabelPlacement: "inside",
    indexLabelFontColor: "#36454F",
    indexLabelFontSize: 18,
    indexLabelFontWeight: "bolder",
    showInLegend: true,
    legendText: "{label}",
    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();

var online = setInterval( function() {
        var request = new XMLHttpRequest();
          request.open("GET", 'get?inquirey=users', true);
              request.onreadystatechange = function() {
                 if(this.readyState === 4 && this.status === 200) {
                   document.getElementById('current').innerHTML = this.responseText;
                    }
                }
                request.send();
             
            }, 3000);
       
}
</script>
<script>
  $(document).ready( () => {
    var count = 60;
    var timer =  setInterval( () => {
    if(count == 0){
      clearInterval(timer);
    }else{
      count--;
      document.getElementById('timer').innerHTML = count;
      document.getElementById('timer2').innerHTML = count;
      document.getElementById('timer3').innerHTML = count;
      document.getElementById('timer4').innerHTML = count;
    }
  }, 1000)
  });
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   
</body>
</html>
