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
<body>
<div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left bg-dark text-light font-weight-bold" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
  <div class="jumbotron py-1 bg-dark text-center p-3"><h4><a href="dashboard" class="text-light"> GemasGlamHome</a></h4><h5 class="text-warning">WELCOME</h5></div><hr>
  <a href="all-products" class="w3-bar-item w3-button">ALL PRODUCTS &nbsp;<span class="badge badge-light"><?php echo $total_no_of_products; ?></span></a><hr>
  <a href="#products.asp" class="w3-bar-item w3-button" id="open-product-links"><i class="fab fa-product-hunt text-secondary"></i> PRODUCTS &nbsp;<i class="fas fa-angle-down" id="product-angle"></i> </a>
  <ul class="show-product-links">
   <a href="#add-product" class="w3-bar-item w3-button">ADD PRODUCTS</a>
   <a href="#" class="w3-bar-item w3-button">DELETE PRODUCTS</a>
   <a href="#" class="w3-bar-item w3-button">UPDATE PRODUCTS</a> 
  </ul>
  <hr>
  <a href="#users.asp" class="w3-bar-item w3-button" id="open-user-links"><i class="fas fa-user text-secondary"></i> USERS&nbsp;<small><span class="badge badge-light messages"><?php echo $users_count; ?></span></small> &nbsp;  &nbsp;<i class="fas fa-angle-down" id="user-angle"></i> </a>
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
font-weight-bold">Loggedin as: <?php echo $firstname; ?></span>&nbsp;<span id="time" class="text-light"></span></h5> &nbsp; &nbsp; <a href="#" class="text-light">Home /<small class="text-warning">Admin</small> / <small class="text-secondary">Add Products</small> </a> </div><a href="#hide-bottom-bar.asp" class="nav-item nav-link d-flex flex-column
text-sm-right" id="bottom-bar"><h4 lass=""><i class="fas fa-eye-slash text-light" id="eye"></i></h4></a>
 </div>
     </div>
<div class="w3-container">
<div class="container-fluid">
<datalist id="category">
    <option>Accessories</option>
    <option>Shoes</option>
    <option>Bags</option>
    <option>Beauty Products</option>
    <option>Blazers</option>
    <option>Dresses</option>
    <option>Skirts</option>
    <option>Trousers</option>
    <option>Tops/Brouse</option>
    </datalist>    
<div class="row">
    <div class="col-md-12 col-lg-12">
    <div class="card mt-2 bg-dark text-light">
    <a name="add"></a>
        <h3 class="text-light text-center card-header py-1">PRODUCTS OPERATIONS</h3>
        <div class="card-body">
        <div class="row">
            <div class="col-md-12 col-lg-6" id="desktop_view">
            <div class="card mt-3 bg-dark" id="message_box">
                <b class="card-header py-1 text-muted text-center">ADD PRODUCTS</b>
                <div class="card-body" id="message_body">
                
                <form action="" method="post" name="add-product" class="addProductForm" id="addProductForm">
                    <div class="from-group">
                <label for="category" class="control-label">Product category</label> &nbsp;
                        <input type="text" name="category" class="form-control" list="category" placeholder="select the product category" required>
                    </div> <br>
                    <div class="form-group">
                    <label for="product_name" class="control-lable">Product Name</label> &nbsp;
                        <input type="text" name="product_name" class="form-control" placeholder="enter the product name" required>
                    </div><br>
                    <div class="from-group">
                    <label for="product_code" class="control-lable">Product Code</label> &nbsp;
                        <input type="text" name="product_code" class="form-control" placeholder="enter the product code(must be unique)" required>
                    </div><br>
                    <div class="from-group">
                    <label for="product_price" class="control-lable">Product Price</label> &nbsp;
                        <input type="number" name="product_price" class="form-control" placeholder="enter the product price (in UGX)" required>
                    </div>
                    <br>
                     <div class="form-group">
                    <label for="product_status" class="custom-control-lable">Product Satus</label> &nbsp;
                         <input type="text" name="product_status" class="form-control" style="border-radius: 50px;" list="status" required> 
                         <small class="text-muted">Fill in the initial price of the item. this price will appear crossed out like this eg <small style="text-decoration: line-through;">60000</small></small>
                         <datalist id="status">
                             <option>sold out</option>
                        </datalist>
                    </div><br>
                    <div class="form-group">
                    <label for="product_description" class="control-lable">Product Description</label>
                        <textarea name="product_description" class="form-control" cols="5" rows="7" id="textarea" placeholder=" type the product description here" required></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="product_image" class="control-lable">Product Image</label>
                      <div class="input-group">
                         <div class="custom-file">
    <input type="file" class="custom-file-input" id="destopFile"  accept="image/*" name="product_image">
    <label class="custom-file-label" for="destopFile">Choose file</label>
  </div> &nbsp;  <img  id="previewFile" width="60" height="50" alt="preview">
  </div>
                    </div><br>
                    <div class="input-group justify-content-between">
                      <input type="hidden" name="add_product" value="add_product">
                    <button type="submit" class="btn btn-primary btn-sm">ADD PRODUCT</button>
                        <button type="reset" class="btn btn-danger btn-sm" data-toggle="tooltip" title="all form data will be cleared">RESET FROM</button>
                    </div>
                </form>
            </div>
                </div>
            </div>

                  
            <div class="col-md-12 col-lg-6">
            <div class="card mt-3 bg-dark text-light" id="message_box"><a name="delete"></a>
                <b class="card-header py-1 text-muted text-center">DELETE PRODUCTS</b>
                <div class="card-body" id="message_body">
                <em class="jumbotron py-1 bg-warning text-dark"> <i class="fa fa-info text-primary"></i> To delete a product from display, please enter the product code and then press delete. You can go to "all products" and search with the product name to get its product code if you don't know it!</em> <hr>
                    <form action="" method="post" name="delete" onsubmit="return confirm('Delete Product? Action can not be undone!!')" id="deleteProductForm"> <br>
                           <div class="form-group">
                <label for="category" class="control-label">Product category</label> &nbsp;
                        <input type="text" name="category" class="form-control" list="category" placeholder="select the product category" required>
                    </div> <br>
                    <div class="form-group">
                        <label for="product_code">Product Code</label>
                        <input type="text" name="product_code" class="form-control" placeholder="enter the product code" required>
                        </div>
                        <div class="form-group text-center">
                          <input type="hidden" name="delete_product" value="delete_product">
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> DELETE</button>
                        </div>
                    </form><br><br><div class="deleteResponse"></div><br><br><br>
                    <div class="card bg-dark text-light">
                    <h5 class="card-header py-1"><i class="fas fa-exclamation-triangle text-danger"></i> DELETE ALL PRODUCTS</h5>
                  
                    <form action="" method="post" onsubmit="return confirm('Delete All Products? This action will delete all products from the selected category and they will be off from the display!! This action can not be undone!!')" id="deleteAllProductsForm">
                                    <div class="form-group">
                <label for="category" class="control-label">Product category</label> &nbsp;
                        <input type="text" name="category" class="form-control" list="category" placeholder="select the product category" required>
                    </div> <small class="help-block text-danger">this action will delete all products from the selected category!!</small> <br>
                        <div class="form-group text-center">
                          <input type="hidden" name="delete_all" value="delete_all">
                          <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> DELETE</button></div>
                        </form>    
                    </div>
                </div>

                <div class="card bg-success mt-3">
                  <h4 class="card-header text-light font-weight-bold">Response</h4>
                  <div class="card-body">
                       <div class="addRespose">
                         <h5 class="text-light">The response for add products and delete all products will appear here</h5>
                       </div>
                      <div class="deleteAllResponse"></div>
                       <br> <br> <br> <br>
                  </div>
                </div>
                </div>
            </div>
            </div>
            </div>
            
            
        </div>
        </div>
    
    </div>
    
   <div class="row">
       <div class="col-md-12 col-lg-12">
    <div class="card mt-4 bg-dark text-light" id="message_box">
    <h4 class="card-header text-light text-center py-1">UPDATE PRODUCTS</h4>
        <div class="card-body">
        <div class="row">
            <div class="col-md-6 col-lg-6">
            <div class="card mt-3 bg-dark">
                <h5 class="card-header text-muted text-center py-1">UPDATE PRODUCT PRICE</h5>
            
                <div class="card-body" id="message_body"> <a name="update"></a>
                  <form action="" method="post" id="updatePriceForm"> <br>
                           <div class="form-group">
                <label for="category" class="control-label">Product category</label> &nbsp;
                        <input type="text" name="category" class="form-control" list="category" placeholder="select the product category" required>
                    </div> <br>
                    <div class="form-group">
                        <label for="product_code">Product Code</label>
                        <input type="text" name="product_code" class="form-control" placeholder="enter the product code" required>
                        </div>
                       <br>
                    <div class="form-group">
                        <label for="product_code">Product New Price</label>
                        <input type="number" name="product_price" class="form-control" placeholder="enter the product's new price" required>
                        </div>
                        <div class="form-group text-center">
                          <input type="hidden" name="update_price" value="update_price">
                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-cloud-upload-alt"></i> UPDATE PRICE</button>
                        </div>
                    </form>
                    <div class="updatePriceResponse"></div>
                </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
            <div class="card mt-3 bg-dark">
                <h5 class="card-header text-muted text-center py-1">UPDATE PRODUCT STATUS</h5>
        
                <div class="card-body" id="message_body">
                <form action="" method="post" id="updateStatusForm"> <br>
                           <div class="form-group">
                <label for="category" class="control-label">Product category</label> &nbsp;
                        <input type="text" name="category" class="form-control" list="category" placeholder="select the product category" required>
                    </div> <br>
                    <div class="form-group">
                        <label for="product_code">Product Code</label>
                        <input type="text" name="product_code" class="form-control" placeholder="enter the product code" required>
                        </div>
                       <br>
                   <div class="input-group">
                    <label for="product_status" class="custom-control-lable">Product Satus</label> &nbsp;
                         <input type="text" name="product_status" class="form-control" style="border-radius: 50px;" list="status" required> 
                         <datalist id="status">
                             <option>sold out</option>
                        </datalist>
                    </div><br>
                        <div class="form-group text-center">
                          <input type="hidden"  name="update_status" value="update_status">
                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-cloud-upload-alt"></i>UPDATE STATUS</button>
                        </div>
                    </form>
                    <div class="updateStatusResponse"></div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
       </div>
    </div>   
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
