<?php session_start();  require('products-logic.php');
include_once('db.php');
if(!isset($_SESSION['admin']) && $_SESSION['loggedin'] != true){
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
    <title>GemasGlamHome | ADMIN PANNEL </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="imgs/gemasglam.ico">
    <link rel='stylesheet' href='css/custom.css' type='text/css' media='all' />
    <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
       <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <style type="text/css">.sidebar{display: none;}</style>
    <script src="js/header.js"></script>
    <script src="js/purejs.js"></script>
    <script>   $(document).ready(function(){
        $('[data-goggle = "tooltip"]').tooltip();
        $("#delete_product").on("click", function(){
          $("#add_product, #delete_product").toggleClass("active");  
        });
        $("#update_product").on("click", function(){
           $("#add_product,#update_product").toggleClass("active"); 
        });
              $("#edit_user").on("click", function(){
           $("#edit_user,#add_product").toggleClass("active"); 
        });

        $(".location").css({"border": '3px solid green', "borderTop": 'none', "borderLeft": 'none', "borderRight": 'none'}); 
        $(function(){ $("#customFile").on("change", function(){
          var file = $("#customFile").val(); $("#selectedFile").text(file);});   
    }); 
    });
        function confirmChange(){
            var conf = confirm("Change User account? This will give previlages for (Staff) account type to view Staff pages, (Adim) account type to view Admin pages and (user) to see customer pages. If you wish to (suspend) an account, save the acount type as (suspended)");
            if(!conf){
                return false;
            }
        }
    </script>
    <style type="text/css">.location:focus{outline: none;}.location{border: none;}
        @media only screen and (max-width: 600px) {#desktop_view{display: none}} @media only screen and (min-width: 600px) {#desktop_view{display: none}}
        @media only screen and (min-width: 992px) {#mobile_view{display: none} #desktop_view{display: block}} @media only screen and (min-width: 1200px) {#mobile_view{display: none} #desktop_view{display: block}} </style>
    </head>
    <body>
        <nav class="navbar navbar-light bg-dark sticky-top">
            <div class="navbar nav-item" id="item"> &nbsp; 
                <a href="all_products.php" class="btn btn-outline-light btn-sm" id="all">ALL PRODUCTS</a>
                &nbsp;
                <a href="#add" class="btn btn-outline-light btn-sm active" data-goggle="tooltip" title="click to go to add products section" id="add_product">ADD PRODUCTS</a>
                 &nbsp;
                <a href="#delete" class="btn btn-outline-light btn-sm" data-goggle="tooltip" title="click to go to delete products section" id="delete_product">DELETE PRODUCTS</a>
                    &nbsp;
                <a href="#update" class="btn btn-outline-light btn-sm" data-goggle="tooltip" title="click to go to update products section" id="update_product">UPDATE PRODUCTS</a>
                    &nbsp;
                <a href="delivery-prices" class="btn btn-outline-light btn-sm" data-goggle="tooltip" title="click to add/update delivery costs">DELIVERY PRICES</a>
                    &nbsp;
                <a href="user-messages.php" class="btn btn-outline-light btn-sm">MESSAGES <span style="border-radius: 5px; border: 2px solid green;"><?php echo $message_num; ?></span></a>
                       &nbsp;
                <a href="#edit_users" class="btn btn-outline-light btn-sm" data-goggle="tooltip" title="make a user staff or admin" id="edit_user"><i class="fas fa-user-edit"></i></a>
            </div>  
          
                    <div class="navbar nav-item">
                        <small style="color: white">Loggedin as: <?php echo $username; ?></small> &nbsp; &nbsp;
    <a href="logout.php" class="btn btn-warning btn-sm" id="log" onclick="return confirm('LOGOUT OF YOUR ACCOUNT?');">LOGOUT</a>    
    </div>     
    </nav>
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
    <div class="card mt-2">
    <a name="add"></a>
        <h3 class="text-muted text-center card-header py-1">PRODUCTS OPERATIONS</h3>
        <div class="card-body">
        <div class="row">
            <div class="col-md-12 col-lg-6" id="desktop_view">
            <div class="card mt-3" id="message_box">
                <b class="card-header py-1 text-muted text-center">ADD PRODUCTS</b>
                <div class="card-body" id="message_body"><?php echo $status;?>
                
                <form action="" method="post" name="add-product" onsubmit="return confirm('Add Product? This product will be up on display for sell once added to the system.')">
                    <div class="input-group">
                <label for="category" class="control-label">Product category</label> &nbsp;
                        <input type="text" name="category" class="form-control" list="category" placeholder="select the product category" required>
                    </div><span class="text-danger"><?php echo $category_error ?></span> <br>
                    <div class="input-group">
                    <label for="product_name" class="control-lable">Product Name</label> &nbsp;
                        <input type="text" name="product_name" class="form-control" placeholder="enter the product name" required>
                    </div> <span class="text-danger"><?php echo $product_name_error ?></span><br>
                    <div class="input-group">
                    <label for="product_code" class="control-lable">Product Code</label> &nbsp;
                        <input type="text" name="product_code" class="form-control" placeholder="enter the product code(must be unique)" required>
                    </div><span class="text-danger"><?php echo $product_code_error ?></span> <br>
                    <div class="input-group">
                    <label for="product_price" class="control-lable">Product Price</label> &nbsp;
                        <input type="number" name="product_price" class="form-control" placeholder="enter the product price (in UGX)" required>
                    </div><span class="text-danger"><?php echo $product_price_error ?> </span>
                    <br>
                     <div class="input-group">
                    <label for="product_status" class="custom-control-lable">Product Satus</label> &nbsp;
                         <input type="text" name="product_status" class="form-control" style="border-radius: 50px;" list="status" required> 
                         <small class="text-muted">Fill in the initial price of the item. this price will appear crossed out like this eg <small style="text-decoration: line-through;">60000</small></small>
                         <datalist id="status">
                             <option>sold out</option>
                        </datalist>
                    </div><br>
                    <div class="form-group">
                    <label for="product_description" class="control-lable">Product Description</label>
                        <textarea name="product_description" class="form-control" placeholder="enter the product description (in less than 200 words)" cols="5" rows="7" id="textarea" required> </textarea>
                    </div><span class="text-danger"><?php echo $product_desc_error ?></span>
                    <br>
                    <div class="input-group">
                        <label for="product_image" class="control-lable">Product Image</label>
            <input type="file" class="custom-file-input" id="customFile" name="product_image">
            <span id="selectedFile"></span>
            <label class="custom-file-label" for="customFile">Choose file</label>
             
            <small class="help-block text-danger">please make sure that you select the right image since there is no image preview</small>
                    </div><span class="text-danger"><?php echo $product_image_error ?></span> <br>
                    <div class="input-group justify-content-between">
                    <button type="submit"  name="add_product" class="btn btn-primary btn-sm">ADD PRODUCT</button>
                        <button type="reset" class="btn btn-danger btn-sm" data-toggle="tooltip" title="all form data will be cleared">RESET FROM</button>
                    </div>
                </form>
            </div>
                </div>
            </div>
            <!-- mobile-->
                        <div class="col-md-12 col-lg-6" id="mobile_view">
            <div class="card mt-3" id="message_box">
                <b class="card-header py-1 text-muted text-center">ADD PRODUCTS</b>
                <div class="card-body" id="message_body"><?php echo $status;?>
                
                <form action="" method="post" name="add-product" onsubmit="return confirm('Add Product? This product will be up on display for sell once added to the system.')">
                    <div class="form-group">
                <label for="category" class="control-label">Product category</label> &nbsp;
                        <input type="text" name="category" class="form-control" list="category" placeholder="select the product category" required>
                    </div><span class="text-danger"><?php echo $category_error ?></span> <br>
                    <div class="form-group">
                    <label for="product_name" class="control-lable">Product Name</label> &nbsp;
                        <input type="text" name="product_name" class="form-control" placeholder="enter the product name" required>
                    </div> <span class="text-danger"><?php echo $product_name_error ?></span><br>
                    <div class="form-group">
                    <label for="product_code" class="control-lable">Product Code</label> &nbsp;
                        <input type="text" name="product_code" class="form-control" placeholder="enter the product code(must be unique)" required>
                    </div><span class="text-danger"><?php echo $product_code_error ?></span> <br>
                    <div class="form-group">
                    <label for="product_price" class="control-lable">Product Price</label> &nbsp;
                        <input type="number" name="product_price" class="form-control" placeholder="enter the product price (in UGX)" required>
                    </div><span class="text-danger"><?php echo $product_price_error ?> </span>
                    
                     <div class="form-group">
                    <label for="product_status" class="custom-control-lable">Product Satus</label> &nbsp;
                         <input type="text" name="product_status" class="form-control" style="border-radius: 50px;" list="status" required> 
                         <small class="text-muted">Fill in the initial price of the item. this price will appear crossed out like this eg <small style="text-decoration: line-through;">60000</small></small>
                         <datalist id="status">
                             <option>sold out</option>
                        </datalist>
                    </div>
                    <div class="form-group">
                    <label for="product_description" class="control-lable">Product Description</label> &nbsp;
                        <textarea name="product_description" class="form-control" placeholder="enter the product description (in less than 200 words)" maxlength="200" cols="5" rows="7" id="textarea" required> </textarea>
                    </div><span class="text-danger"><?php echo $product_desc_error ?></span>
            
                    <div class="form-group">
                        <label for="product_image" class="control-lable">Product Image</label>
            <input type="file" class="file-control" name="product_image"> <br>
            <small class="help-block text-danger">please make sure that you select the right image since there is no image preview</small>
                    </div><span class="text-danger"><?php echo $product_image_error ?></span> <br>
                    <div class="input-group justify-content-between">
                    <button type="submit"  name="add_product" class="btn btn-primary btn-sm">ADD PRODUCT</button>
                        <button type="reset" class="btn btn-danger btn-sm" data-toggle="tooltip" title="all form data will be cleared">RESET FROM</button>
                    </div>
                </form>
            </div>
                </div>
            </div>
            
            <div class="col-md-12 col-lg-6">
            <div class="card mt-3" id="message_box"><a name="delete"></a>
                <b class="card-header py-1 text-muted text-center">DELETE PRODUCTS</b>
                <div class="card-body" id="message_body">
                <em class="jumbotron py-1"> <i class="fa fa-info text-primary"></i> To delete a product from display, please enter the product code and then press delete. You can go to "all products" and search with the product name to get its product code if you don't know it!</em> <hr><?php echo $delete_status;?> 
                    <form action="" method="post" name="delete" onsubmit="return confirm('Delete Product? Action can not be undone!!')"> <br>
                           <div class="form-group">
                <label for="category" class="control-label">Product category</label> &nbsp;
                        <input type="text" name="category" class="form-control" list="category" placeholder="select the product category" required>
                    </div> <br>
                    <div class="form-group">
                        <label for="product_code">Product Code</label>
                        <input type="text" name="product_code" class="form-control" placeholder="enter the product code" required>
                        </div>
                        <div class="form-group text-center">
                        <button type="submit" name="delete_product" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> DELETE</button>
                        </div>
                    </form><br><br><br><br><br>
                    <div class="card">
                    <h5 class="card-header py-1"><i class="fas fa-exclamation-triangle text-danger"></i> DELETE ALL PRODUCTS</h5>
                        <?php echo $delete_all_status ?>
                    <form action="" method="post" onsubmit="return confirm('Delete All Products? This action will delete all products from the selected category and they will be off from the display!! This action can not be undone!!')">
                                    <div class="form-group">
                <label for="category" class="control-label">Product category</label> &nbsp;
                        <input type="text" name="category" class="form-control" list="category" placeholder="select the product category" required>
                    </div> <small class="help-block text-danger">this action will delete all products from the selected category!!</small> <br>
                        <div class="form-group text-center"><button type="submit" name="delete_all" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> DELETE</button></div>
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
    
   <div class="row">
       <div class="col-md-12 col-lg-12">
    <div class="card mt-4" id="message_box">
    <h4 class="card-header text-muted text-center py-1">UPDATE PRODUCTS</h4>
        <div class="card-body">
        <div class="row">
            <div class="col-md-6 col-lg-6">
            <div class="card mt-3">
                <h5 class="card-header text-muted text-center py-1">UPDATE PRODUCT PRICE</h5>
                <?php echo $update_price_status; ?>
                <div class="card-body" id="message_body"> <a name="update"></a>
                  <form action="" method="post" name="update_price" onsubmit="return confirm('Update Product Price? This will change the price displayed for clients from the previous cost to the new one!!')"> <br>
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
                        <button type="submit" name="update_price" class="btn btn-success btn-sm"><i class="fas fa-cloud-upload-alt"></i> UPDATE PRICE</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
            <div class="card mt-3">
                <h5 class="card-header text-muted text-center py-1">UPDATE PRODUCT STATUS</h5>
                <?php echo $update_productstatus_status; ?>
                <div class="card-body" id="message_body">
                <form action="" method="post" name="update_price" onsubmit="return confirm('Update Product Price? This will change the price displayed for clients from the previous cost to the new one!!')"> <br>
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
                        <button type="submit" name="update_status" class="btn btn-success btn-sm"><i class="fas fa-cloud-upload-alt"></i>UPDATE STATUS</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
       </div>
    </div>   
    <div class="card mt-3">
    <h5 class="card-header py-1">EDIT USERS <i class="fas fa-user"></i></h5>
        <a name="edit_users"></a>
    <div class="card-body">
        <?php echo $change_status; ?>
         <?php 
    $sql = "select email, firstname, lastname, contact, address, account_type from users";
$results = mysqli_query($con, $sql);
    if(mysqli_num_rows($results)>0){
echo"<div class='table-responsive'>
        <table cellpadding='10' class='table table-light table-striped' id='myTable'>
        <tr>
            <th>FIRST NAME</th>
            <th>LAST NAME</th>
            <th>PHONE NUMBER</th>
            <th>ADDRESS</th>
            <th>ACCOUNT TYPE</th>
            </tr> ";
while($row = mysqli_fetch_assoc($results)){
       echo" <tr>";
          echo"<td>".$row['firstname']."</td>";
        echo"<th>".$row['lastname']."</th>";
     echo"<th>".$row['contact']."</th>"; 
         echo"<th>".$row['address']."</th>";
   echo" <th>
    <form action='' method='post'>
    <input type='hidden' name='user_id' value='".$row['email']."'>
    <input type='input' name='user_type' value='".$row['account_type']."' class='location' required>
    <button type='submit' name='user' class='btn btn-success btn-sm' id='save_button' onclick='return confirmChange();'><i class='fas fa-save'></i>SAVE</button>
        </form>
        </th> ";
      echo"</tr> ";
}
echo "</table>";
    }else{
        echo "No Users Available Yet";
    }
echo"</div>";
    mysqli_close($con);
    ?>
        </div>    
    </div>
        </div>
    <a href="#top" class="tops" style="color: green;"><i class="fas fa-arrow-circle-up"></i></a>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/purejs.js"></script>
    </body>
</html>