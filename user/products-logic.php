<?php require_once('config.php'); require_once('db.php');
//copy of staff pages
$currency = "UGX ";
$product_category = "";
$email = $_SESSION['admin'];
$get_username = mysqli_query($con, "select firstname from users where email='$email'");
$fetch_username = mysqli_fetch_assoc($get_username);
$username = $fetch_username['firstname'];
 
$current = $delivered =$canceled ="";
$sql = mysqli_query($con, "select count(status) from ordered where status ='Order Received'");
$received = mysqli_fetch_assoc($sql);
$current = $received['count(status)'];
$sql_2 = mysqli_query($con, "select count(status) from ordered where status ='Order Delivered'");
$deliv = mysqli_fetch_assoc($sql_2);
$delivered = $deliv['count(status)'];
$sql_3 = mysqli_query($con, "select count(status) from ordered where status ='Order Cancelled'"); 
$cancel = mysqli_fetch_assoc($sql_3);
$canceled = $cancel['count(status)'];

$order_No = $status = $odererror = $statuserror = $update_status= "";
if(isset($_POST['update'])){
  $order_No = mysqli_real_escape_string($con, $_POST['number']);
$status = mysqli_real_escape_string($con, $_POST['status']);
if(empty(trim($email))){
    $odererror = "the order numner field is required";
} 
if(empty(trim($status))){
    $statuserror = "status field is required";
} 
    if(empty($odererror && $statuserror)){
        $update = mysqli_query($con, "update ordered set status ='$status' where order_ID = '$order_No'");
        if($update){
            $update_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Order Status has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
        }else{
            $update_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>"; 
        }
    }
    
}
//declare and initailze variables to empty strings
$category = $product_name = $product_code =$product_price = $product_desc = $product_image = "";
$category_error = $product_name_error = $product_code_error = $product_price_error = $product_desc_error = $product_image_error = "";
$status = ""; $folder = "product-images/";
if(isset($_POST['add_product'])){
    //receive user input and escape it
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    if(empty(trim($category))){
        //check whether the category is empty
        $category_error = "please select the product category";
    }
    if(!empty(trim($category))){
         //receive all user inputs and remove empty spaces
         $product_name = trim($_POST['product_name']);
         $product_code = trim($_POST['product_code']);
         $product_price = trim($_POST['product_price']);
         $product_desc = trim($_POST['product_description']);
         $product_image = trim($_POST['product_image']);
         $product_stat = trim($_POST['product_status']);
         // decare filter variables
         $name = $code = $price = $desc = $image= $p_stat ="";
         //santize inputs
         $name = filter_var($product_name, FILTER_SANITIZE_STRING);
         $code = filter_var($product_code, FILTER_SANITIZE_STRING);
         $price = filter_var($product_price, FILTER_SANITIZE_STRING);
         $desc = filter_var($product_desc, FILTER_SANITIZE_STRING);
         $image = filter_var($product_image, FILTER_SANITIZE_STRING);
         $p_stat = filter_var($product_stat, FILTER_SANITIZE_STRING);
         
         ///check for errors
         if(empty($name)){
             $product_name_error = "product name is required";
         }
         if(empty($code)){
             $product_code_error = "product code is required";
         }
         if(empty($price)){
             $product_price_error = "product price is required";
         }
         if($price <= 0){
             $product_price_error = "product price can not be less or equal to zero";
         }
         if(empty($desc)){
             $product_desc_error = "product description is required";
         }
         if(empty($image)){
             $product_image_error = "product photo is required";
         }
          if(empty($p_stat)){
             $product_image_error = "product status is required";
         }
         
         //if the error variables are empty
         if(empty($product_name_error) && empty($product_code_error) && empty($product_price_error) && empty($product_desc_error) && empty($product_image_error)){
            if($category == "Accessories"){ 
                $product_category = "accessories";
         //parepare an sql statement
         $stmt = $conn->prepare("INSERT INTO accessories(name, code, price, description, image, status, category) VALUES (?, ?, ?, ?, ?, ?,?)");
         //bind the parameters
         $stmt->bind_param("ssissss", $param_name, $param_code, $param_price, $param_desc, $param_image, $param_p_stat, $param_category);
         //set parameters
         $param_name = $name;
             $param_code = $code;
             $param_price = $price;
             $param_desc = $desc;
             $param_image = $folder.$image;
             $param_category = $product_category;
             $param_p_stat = $p_stat;
             //execute the prepared statement
             $execute = $stmt->execute();
             //check for success of failer
             if($execute){
                 $status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been added successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
             }else{
                 $status ="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>"; 
             }
         }
             
             // check for another category
                         if($category == "Shoes"){ 
                            $product_category = "shoes";
         //parepare an sql statement
         $stmt = $conn->prepare("INSERT INTO shoes(name, code, price, description, image, status, category) VALUES (?, ?, ?, ?, ?, ?,?)");
         //bind the parameters
         $stmt->bind_param("ssissss", $param_name, $param_code, $param_price, $param_desc, $param_image, $param_p_stat, $param_category);
         //set parameters
         $param_name = $name;
             $param_code = $code;
             $param_price = $price;
             $param_desc = $desc;
             $param_image = $folder.$image;
             $param_category = $product_category;
             $param_p_stat = $p_stat;
             //execute the prepared statement
             $execute = $stmt->execute();
             //check for success of failer
             if($execute){
                 $status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been added successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
             }else{
                 $status ="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>"; 
             }
         }
             
                         
             // check for another category
                         if($category == "Bags"){ 
                            $product_category = "bags";
         //parepare an sql statement
         $stmt = $conn->prepare("INSERT INTO bags(name, code, price, description, image,status, category) VALUES (?, ?, ?, ?, ?, ?,?)");
         //bind the parameters
         $stmt->bind_param("ssissss", $param_name, $param_code, $param_price, $param_desc, $param_image, $param_p_stat, $param_category);
         //set parameters
         $param_name = $name;
             $param_code = $code;
             $param_price = $price;
             $param_desc = $desc;
             $param_image = $folder.$image;
             $param_category = $product_category;
             $param_p_stat = $p_stat;
             //execute the prepared statement
             $execute = $stmt->execute();
             //check for success of failer
             if($execute){
                 $status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been added successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
             }else{
                 $status ="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>"; 
             }
         }
             
                         
             // check for another category
                         if($category == "Beauty Products"){ 
                            $product_category = "beauty";
         //parepare an sql statement
         $stmt = $conn->prepare("INSERT INTO beauty(name, code, price, description, image, status, category) VALUES (?, ?, ?, ?, ?, ?,?)");
         //bind the parameters
         $stmt->bind_param("ssissss", $param_name, $param_code, $param_price, $param_desc, $param_image, $param_p_stat, $param_category);
         //set parameters
         $param_name = $name;
             $param_code = $code;
             $param_price = $price;
             $param_desc = $desc;
             $param_image = $folder.$image;
             $param_category = $product_category;
             $param_p_stat = $p_stat;
             //execute the prepared statement
             $execute = $stmt->execute();
             //check for success of failer
             if($execute){
                 $status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been added successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
             }else{
                 $status ="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>"; 
             }
         }
                        
             // check for another category
                         if($category == "Blazers"){ 
                            $product_category = "blazers";
         //parepare an sql statement
         $stmt = $conn->prepare("INSERT INTO blazers(name, code, price, description, image, status, category) VALUES (?, ?, ?, ?, ?, ?,?)");
         //bind the parameters
         $stmt->bind_param("ssissss", $param_name, $param_code, $param_price, $param_desc, $param_image, $param_p_stat, $param_category);
         //set parameters
         $param_name = $name;
             $param_code = $code;
             $param_price = $price;
             $param_desc = $desc;
            $param_image = $folder.$image;  
            $param_category = $product_category; 
            $param_p_stat = $p_stat;            
             //execute the prepared statement
             $execute = $stmt->execute();
             //check for success of failer
             if($execute){
                 $status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been added successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
             }else{
                 $status ="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>"; 
             }
         } 
         
                         
             // check for another category
                         if($category == "Dresses"){ 
                            $product_category ="dresses";
         //parepare an sql statement
         $stmt = $conn->prepare("INSERT INTO dresses(name, code, price, description, image, status, category) VALUES (?, ?, ?, ?, ?, ?,?)");
         //bind the parameters
         $stmt->bind_param("ssissss", $param_name, $param_code, $param_price, $param_desc, $param_image, $param_p_stat, $param_category);
         //set parameters
         $param_name = $name;
             $param_code = $code;
             $param_price = $price;
             $param_desc = $desc;
             $param_image = $folder.$image;
             $param_category = $product_category;
             $param_p_stat = $p_stat;
             //execute the prepared statement
             $execute = $stmt->execute();
             //check for success of failer
             if($execute){
                 $status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been added successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
             }else{
                 $status ="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>"; 
             }
         }
             
                         
             // check for another category
                         if($category == "Skirts"){
                         $product_category = "skirts"; 
         //parepare an sql statement
         $stmt = $conn->prepare("INSERT INTO skirts(name, code, price, description, image, status, category) VALUES (?, ?, ?, ?, ?, ?,?)");
         //bind the parameters
         $stmt->bind_param("ssissss", $param_name, $param_code, $param_price, $param_desc, $param_image, $param_p_stat, $param_category);
         //set parameters
         $param_name = $name;
             $param_code = $code;
             $param_price = $price;
             $param_desc = $desc;
             $param_image = $folder.$image;
             $param_category = $product_category;
             $param_p_stat = $p_stat;
             //execute the prepared statement
             $execute = $stmt->execute();
             //check for success of failer
             if($execute){
                 $status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been added successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
             }else{
                 $status ="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>"; 
             }
         }
             
                       
             // check for another category
                         if($category == "Trousers"){ 
                            $product_category = "trousers";
         //parepare an sql statement
         $stmt = $conn->prepare("INSERT INTO trousers(name, code, price, description, image, status, category) VALUES (?, ?, ?, ?, ?, ?,?)");
         //bind the parameters
         $stmt->bind_param("ssissss", $param_name, $param_code, $param_price, $param_desc, $param_image, $param_p_stat, $param_category);
         //set parameters
         $param_name = $name;
             $param_code = $code;
             $param_price = $price;
             $param_desc = $desc;
             $param_image = $folder.$image;
             $param_category = $product_category;
             $param_p_stat = $p_stat;
             //execute the prepared statement
             $execute = $stmt->execute();
             //check for success of failer
             if($execute){
                 $status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been added successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
             }else{
                 $status ="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>"; 
             }
         }
             
                         
             // check for another category
                         if($category == "Tops/Brouse"){ 
                            $product_category = "tops";
         //parepare an sql statement
         $stmt = $conn->prepare("INSERT INTO tops(name, code, price, description, image, status, category) VALUES (?, ?, ?, ?, ?, ?,?)");
         //bind the parameters
         $stmt->bind_param("ssissss", $param_name, $param_code, $param_price, $param_desc, $param_image, $param_p_stat, $param_category);
         //set parameters
         $param_name = $name;
             $param_code = $code;
             $param_price = $price;
             $param_desc = $desc;
             $param_image = $folder.$image;
             $param_category = $product_category;
             $param_p_stat = $p_stat;
             //execute the prepared statement
             $execute = $stmt->execute();
             //check for success of failer
             if($execute){
                 $status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been added successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
             }else{
                 $status ="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>"; 
             }
         }
             
     } 
           
    }
}
//perform detelet

//declare and intialize variables to empty strings
 $delete_category_error = $delete_product_code_error = $delete_status = $product_update_status="";
if(isset($_POST['delete_product'])){
    //receive the input
    $product_code = trim($_POST['product_code']);
    $category = trim($_POST['category']);
    //check if the category input is empty
    if(empty($category)){
        $delete_category_error = "please select the product category";
    }
    if(empty($product_code)){
        $delete_product_code_error = "please enter the product code";
    }
    //check if the error variables are empty
    if(empty($delete_category_error) && empty($delete_product_code_error)){
        //sanitize inputs
        $code = filter_var($product_code, FILTER_SANITIZE_STRING);
        $clean_category = filter_var($category, FILTER_SANITIZE_STRING);
        //make a delete as per the category
        if($clean_category == "Accessories"){
            //prepare a delete statement
            $stmt = $conn->prepare("delete from accessories where code = ?");
            //bind parameters
            $stmt->bind_param("s", $param_code);
            //set parameters
            $param_code = $code;
            $exectue = $stmt->execute();
            if($exectue){
                $delete_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }else{
               $delete_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }
        }
        
          if($clean_category == "Shoes"){
            //prepare a delete statement
            $stmt = $conn->prepare("delete from shoes where code = ?");
            //bind parameters
            $stmt->bind_param("s", $param_code);
            //set parameters
            $param_code = $code;
            $exectue = $stmt->execute();
            if($exectue){
                $delete_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }else{
               $delete_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }
        }
        
          if($clean_category == "Bags"){
            //prepare a delete statement
            $stmt = $conn->prepare("delete from bags where code = ?");
            //bind parameters
            $stmt->bind_param("s", $param_code);
            //set parameters
            $param_code = $code;
            $exectue = $stmt->execute();
            if($exectue){
                $delete_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }else{
               $delete_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }
        }
          if($clean_category == "Skirts"){
            //prepare a delete statement
            $stmt = $conn->prepare("delete from skirts where code = ?");
            //bind parameters
            $stmt->bind_param("s", $param_code);
            //set parameters
            $param_code = $code;
            $exectue = $stmt->execute();
            if($exectue){
                $delete_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }else{
               $delete_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }
        }
         if($clean_category == "Beauty"){
            //prepare a delete statement
            $stmt = $conn->prepare("delete from beauty where code = ?");
            //bind parameters
            $stmt->bind_param("s", $param_code);
            //set parameters
            $param_code = $code;
            $exectue = $stmt->execute();
            if($exectue){
                $delete_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }else{
               $delete_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }
        }
          if($clean_category == "Blazers"){
            //prepare a delete statement
            $stmt = $conn->prepare("delete from blazers where code = ?");
            //bind parameters
            $stmt->bind_param("s", $param_code);
            //set parameters
            $param_code = $code;
            $exectue = $stmt->execute();
            if($exectue){
                $delete_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }else{
               $delete_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }
        }
          if($clean_category == "Trousers"){
            //prepare a delete statement
            $stmt = $conn->prepare("delete from trousers where code = ?");
            //bind parameters
            $stmt->bind_param("s", $param_code);
            //set parameters
            $param_code = $code;
            $exectue = $stmt->execute();
            if($exectue){
                $delete_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }else{
               $delete_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }
        }
          if($clean_category == "Tops/Brouse"){
            //prepare a delete statement
            $stmt = $conn->prepare("delete from tops where code = ?");
            //bind parameters
            $stmt->bind_param("s", $param_code);
            //set parameters
            $param_code = $code;
            $exectue = $stmt->execute();
            if($exectue){
                $delete_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }else{
               $delete_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }
        }
          if($clean_category == "Dresses"){
            //prepare a delete statement
            $stmt = $conn->prepare("delete from dresses where code = ?");
            //bind parameters
            $stmt->bind_param("s", $param_code);
            //set parameters
            $param_code = $code;
            $exectue = $stmt->execute();
            if($exectue){
                $delete_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }else{
               $delete_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }
        }
        
    }
    
}
//truncate tables
//initialize variables
$delete_all_status="";
if(isset($_POST['delete_all'])){
    //receive the input
    $category = trim($_POST['category']);
    //check if the category input is empty
    if(empty($category)){
        $delete_category_error = "please select the product category";
    }
    //check if the error variables are empty
    if(empty($delete_category_error)){
        //sanitize inputs
        $clean_category = filter_var($category, FILTER_SANITIZE_STRING);
        //make a delete as per the category
        if($clean_category == "Accessories"){
            //prepare a delete statement
            $stmt = $conn->prepare("TRUNCATE table accessories");
            $stmt->execute();
            //prepare a select statement
            $stmt = $conn->prepare("select * from accessories limit 1");
            $stmt->execute();
            $results = $stmt->get_result();
            $fetch_result = $results->fetch_all(MYSQLI_ASSOC);
            if(empty($fetch_result)){
                $delete_all_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> All Products from the Accessories Category have been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }else{
               $delete_all_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }
        }
        
          if($clean_category == "Shoes"){
            //prepare a delete statement
            $stmt = $conn->prepare("TRUNCATE table shoes");
            $stmt->execute();
            //prepare a select statement
            $stmt = $conn->prepare("select * from shoes limit 1");
            $stmt->execute();
            $results = $stmt->get_result();
            $fetch_result = $results->fetch_all(MYSQLI_ASSOC);
            if(empty($fetch_result)){
                $delete_all_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> All Products from the Shoes Category have been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";} else{
               $delete_all_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }
        }
        
         if($clean_category == "Bags"){
            //prepare a delete statement
            $stmt = $conn->prepare("TRUNCATE table bags");
            $stmt->execute();
            //prepare a select statement
            $stmt = $conn->prepare("select * from bags limit 1");
            $stmt->execute();
            $results = $stmt->get_result();
            $fetch_result = $results->fetch_all(MYSQLI_ASSOC);
            if(empty($fetch_result)){
                $delete_all_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> All Products from the Bags Category have been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";}else{
               $delete_all_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }
        }
       if($clean_category == "Skirts"){
            //prepare a delete statement
            $stmt = $conn->prepare("TRUNCATE table skirts");
            $stmt->execute();
            //prepare a select statement
            $stmt = $conn->prepare("select * from skirts limit 1");
            $stmt->execute();
            $results = $stmt->get_result();
            $fetch_result = $results->fetch_all(MYSQLI_ASSOC);
            if(empty($fetch_result)){
                $delete_all_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> All Products from the Skirts Category have been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";}else{
               $delete_all_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }
        }
        
       if($clean_category == "Beauty Products"){
            //prepare a delete statement
            $stmt = $conn->prepare("TRUNCATE table beauty");
            $stmt->execute();
            //prepare a select statement
            $stmt = $conn->prepare("select * from beauty limit 1");
            $stmt->execute();
            $results = $stmt->get_result();
            $fetch_result = $results->fetch_all(MYSQLI_ASSOC);
            if(empty($fetch_result)){
                $delete_all_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> All Products from the Beauty Products Category have been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";}else{
               $delete_all_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }
        }
          if($clean_category == "Blazers"){
            //prepare a delete statement
            $stmt = $conn->prepare("TRUNCATE table blazers");
            $stmt->execute();
            //prepare a select statement
            $stmt = $conn->prepare("select * from blazers limit 1");
            $stmt->execute();
            $results = $stmt->get_result();
            $fetch_result = $results->fetch_all(MYSQLI_ASSOC);
            if(empty($fetch_result)){
                $delete_all_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> All Products from the Shoes Category have been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";}else{
               $delete_all_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }
        }
          if($clean_category == "Trousers"){
           //prepare a delete statement
            $stmt = $conn->prepare("TRUNCATE table trousers");
            $stmt->execute();
            //prepare a select statement
            $stmt = $conn->prepare("select * from tourses limit 1");
            $stmt->execute();
            $results = $stmt->get_result();
            $fetch_result = $results->fetch_all(MYSQLI_ASSOC);
            if(empty($fetch_result)){
                $delete_all_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> All Products from the Trousers Category have been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";}else{
               $delete_all_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }
        }
          if($clean_category == "Tops/Brouse"){
    //prepare a delete statement
            $stmt = $conn->prepare("TRUNCATE table tops");
            $stmt->execute();
            //prepare a select statement
            $stmt = $conn->prepare("select * from tops limit 1");
            $stmt->execute();
            $results = $stmt->get_result();
            $fetch_result = $results->fetch_all(MYSQLI_ASSOC);
            if(empty($fetch_result)){
                $delete_all_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> All Products from the Tops/Brouse Category have been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";}else{
               $delete_all_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }
        }
          if($clean_category == "Dresses"){
           //prepare a delete statement
            $stmt = $conn->prepare("TRUNCATE table dresses");
            $stmt->execute();
            //prepare a select statement
            $stmt = $conn->prepare("select * from dresses limit 1");
            $stmt->execute();
            $results = $stmt->get_result();
            $fetch_result = $results->fetch_all(MYSQLI_ASSOC);
            if(empty($fetch_result)){
                $delete_all_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> All Products from the Dresses Category have been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";}else{
               $delete_all_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }
        }
        
    }
    
}

//update product prices
//initialize variables
$update_price_status = $update_category_error = $update_price_error = $update_code_error ="";
if(isset($_POST['update_price'])){
    $category = trim($_POST['category']);
    $product_price = trim($_POST['product_price']);
    $product_code = trim($_POST['product_code']);
    
    //check for empty inputs
    if(empty($category)){
        $update_category_error = "please select product category";
    }
      if(empty($product_price)){
        $update_price_error = "please enter the new product price";
    }
      if(empty($product_code)){
        $update_code_error = "please enter the product code";
    }
    if(empty($update_category_error) && empty($update_price_error) && empty($update_code_error)){
        //sanitize inputs
        $clean_category = filter_var($category, FILTER_SANITIZE_STRING);
        $price = filter_var($product_price, FILTER_SANITIZE_STRING);
        $code = filter_var($product_code, FILTER_SANITIZE_STRING);
        //check for the category
        //initialize a very variable;
        $query="";
        if(isset($_POST['update_price']) && $_POST['category'] == "Accessories"){
            //set the query to be executed
            $query = "update accessories SET price = ? where code = ?";
                //prepare update statement
            $stmt = $conn->prepare($query);
            //bind parameters
            $stmt->bind_param("is", $param_price, $param_code);
            //set vparameters
            $param_price = $price;
            $param_code = $code;
            //execute the statement
            $stmt->execute();
            //check for affected rows
            if($stmt->affected_rows > 0){
                $update_price_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product price has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            $update_price_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";      
            }
        }
        
        
        if(isset($_POST['update_price']) && $_POST['category'] == "Blazers"){
            //set the query
            $query = "update blazers SET price = ? where code =?";
                //prepare update statement
            $stmt = $conn->prepare($query);
            //bind parameters
            $stmt->bind_param("is", $param_price, $param_code);
            //set vparameters
            $param_price = $price;
            $param_code = $code;
            //execute the statement
            $stmt->execute();
            //check for affected rows
            if($stmt->affected_rows > 0){
                $update_price_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product price has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            $update_price_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again later!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";      
            }
        }
        
        if(isset($_POST['update_price']) && $_POST['category'] == "Bags"){
            //set query
            $query = "update bags SET price = ? where code = ?";
                //prepare update statement
            $stmt = $conn->prepare($query);
            //bind parameters
            $stmt->bind_param("is", $param_price, $param_code);
            //set vparameters
            $param_price = $price;
            $param_code = $code;
            //execute the statement
            $stmt->execute();
            //check for affected rows
            if($stmt->affected_rows > 0){
                $update_price_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product price has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            $update_price_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";      
            }
        }
        
        if(isset($_POST['update_price']) && $_POST['category'] == "Shoes"){
            //set query
            $query = "update shoes SET price = ? where code =?";
                //prepare update statement
            $stmt = $conn->prepare($query);
            //bind parameters
            $stmt->bind_param("is", $param_price, $param_code);
            //set vparameters
            $param_price = $price;
            $param_code = $code;
            //execute the statement
            $stmt->execute();
            //check for affected rows
            if($stmt->affected_rows > 0){
                $update_price_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product price has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            $update_price_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";      
            }
        }
        
        
        if(isset($_POST['update_price']) && $_POST['category'] == "Beauty Products"){
            $query = "update beauty SET price = ? where code = ?";
                //prepare update statement
            $stmt = $conn->prepare($query);
            //bind parameters
            $stmt->bind_param("is", $param_price, $param_code);
            //set vparameters
            $param_price = $price;
            $param_code = $code;
            //execute the statement
            $stmt->execute();
            //check for affected rows
            if($stmt->affected_rows > 0){
                $update_price_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product price has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            $update_price_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";      
            }
        }
        
        if(isset($_POST['update_price']) && $_POST['category'] == "Trousers"){
            $query = "update trousers SET price =? where code =?";
                //prepare update statement
            $stmt = $conn->prepare($query);
            //bind parameters
            $stmt->bind_param("is", $param_price, $param_code);
            //set vparameters
            $param_price = $price;
            $param_code = $code;
            //execute the statement
            $stmt->execute();
            //check for affected rows
            if($stmt->affected_rows > 0){
                $update_price_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product price has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            $update_price_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";      
            }
        }
        
        if(isset($_POST['update_price']) && $_POST['category'] == "Dresses"){
            $query = "update dresses SET price =? where code=?";
                //prepare update statement
            $stmt = $conn->prepare($query);
            //bind parameters
            $stmt->bind_param("is", $param_price, $param_code);
            //set vparameters
            $param_price = $price;
            $param_code = $code;
            //execute the statement
            $stmt->execute();
            //check for affected rows
            if($stmt->affected_rows > 0){
                $update_price_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product price has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            $update_price_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!! $query;
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";      
            }
        }
        
        if(isset($_POST['update_price']) && $_POST['category'] == "Tops/Brouse"){
            $query = "update tops SET price =? where code =?";
                //prepare update statement
            $stmt = $conn->prepare($query);
            //bind parameters
            $stmt->bind_param("is", $param_price, $param_code);
            //set vparameters
            $param_price = $price;
            $param_code = $code;
            //execute the statement
            $stmt->execute();
            //check for affected rows
            if($stmt->affected_rows > 0){
                $update_price_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product price has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            $update_price_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";      
            }
        }
        
        if(isset($_POST['update_price']) && $_POST['category'] =="Skirts"){
            $query = "update skirts SET price =? where code =?";
                //prepare update statement
            $stmt = $conn->prepare($query);
            //bind parameters
            $stmt->bind_param("is", $param_price, $param_code);
            //set vparameters
            $param_price = $price;
            $param_code = $code;
            //execute the statement
            $stmt->execute();
            //check for affected rows
            if($stmt->affected_rows > 0){
                $update_price_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product price has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            $update_price_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";      
            }
        }
        
      
    }
}

//update product status
//initialize variables
$update_productstatus_status = $update_status_category_error = $update_product_status_error = $update_status_code_error ="";
if(isset($_POST['update_status'])){
    $category = trim($_POST['category']);
    $product_status = trim($_POST['product_status']);
    $product_code = trim($_POST['product_code']);
    //check for empty inputs
    if(empty($category)){
        $update_status_category_error = "please select product category";
    }
      if(empty($product_status)){
        $update_product_status_error = "please select the new product status";
    }
      if(empty($product_code)){
$update_status_code_error = "please enter the product code";
    }
    if(empty($update_status_category_error) && empty($update_status_code_error) && empty($update_product_status_error)){
        //sanitize inputs
        $clean_category = filter_var($category, FILTER_SANITIZE_STRING);
        $status = filter_var($product_status, FILTER_SANITIZE_STRING);
        $code = filter_var($product_code, FILTER_SANITIZE_STRING);
        //check for the category
        //initialize a very variable;
        $status_query="";
        
        if(isset($_POST['update_status']) && $_POST['category'] == "Blazers"){
            //set the query
            $status_query = "update blazers SET status = ? where code =?";
                //prepare update statement
            $stmt = $conn->prepare($status_query);
            //bind parameters
            $stmt->bind_param("ss", $param_status, $param_code);
            //set vparameters
           $param_status = $status;
            $param_code = $code;
            //execute the statement
           $stmt->execute();
            if($stmt->affected_rows > 0){
                $update_productstatus_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product status has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            $update_productstatus_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again later!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";      
            }
        } 
        
       
}
    //update accessories
if(isset($_POST['update_status']) && $_POST['category'] == "Accessories"){
            //set the query
    $status_query = "update accessories SET status = ? where code =?";
                //prepare update statement
            $stmt = $conn->prepare($status_query);
            //bind parameters
            $stmt->bind_param("ss", $param_status, $param_code);
            //set vparameters
           $param_status = $status;
            $param_code = $code;
            //execute the statement
           $stmt->execute();
            if($stmt->affected_rows > 0){
                $update_productstatus_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product status has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            $update_productstatus_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again later!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";      
            }
     
}
    //update shoes table
    if(isset($_POST['update_status']) && $_POST['category'] == "Shoes"){
            //set the query
            $status_query = "update shoes SET status = ? where code =?";
                //prepare update statement
            $stmt = $conn->prepare($status_query);
            //bind parameters
            $stmt->bind_param("ss", $param_status, $param_code);
            //set vparameters
           $param_status = $status;
            $param_code = $code;
            //execute the statement
           $stmt->execute();
            if($stmt->affected_rows > 0){
                $update_productstatus_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product status has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            $update_productstatus_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again later!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";      
            }
     
}
 
    //update bags
    if(isset($_POST['update_status']) && $_POST['category'] == "Bags"){
            //set the query
            $status_query = "update bags SET status = ? where code =?";
                //prepare update statement
            $stmt = $conn->prepare($status_query);
            //bind parameters
            $stmt->bind_param("ss", $param_status, $param_code);
            //set vparameters
           $param_status = $status;
            $param_code = $code;
            //execute the statement
           $stmt->execute();
            if($stmt->affected_rows > 0){
                $update_productstatus_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product status has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            $update_productstatus_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again later!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";      
            }
     
}
 
    
    //update skirts
    if(isset($_POST['update_status']) && $_POST['category'] == "Skirts"){
            //set the query
            $status_query = "update skirts SET status = ? where code =?";
                //prepare update statement
            $stmt = $conn->prepare($status_query);
            //bind parameters
            $stmt->bind_param("ss", $param_status, $param_code);
            //set vparameters
           $param_status = $status;
            $param_code = $code;
            //execute the statement
           $stmt->execute();
            if($stmt->affected_rows > 0){
                $update_productstatus_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product status has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            $update_productstatus_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again later!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";      
            }
     
}
    
    //update tops/brouse
    if(isset($_POST['update_status']) && $_POST['category'] == "Tops/Brouse"){
            //set the query
            $status_query = "update tops SET status = ? where code =?";
                //prepare update statement
            $stmt = $conn->prepare($status_query);
            //bind parameters
            $stmt->bind_param("ss", $param_status, $param_code);
            //set vparameters
           $param_status = $status;
            $param_code = $code;
            //execute the statement
           $stmt->execute();
            if($stmt->affected_rows > 0){
                $update_productstatus_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product status has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            $update_productstatus_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again later!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";      
            }
     
}
    
    //update trousers
    if(isset($_POST['update_status']) && $_POST['category'] == "Trousers"){
            //set the query
            $status_query = "update trousers SET status = ? where code =?";
                //prepare update statement
            $stmt = $conn->prepare($status_query);
            //bind parameters
            $stmt->bind_param("ss", $param_status, $param_code);
            //set vparameters
           $param_status = $status;
            $param_code = $code;
            //execute the statement
           $stmt->execute();
            if($stmt->affected_rows > 0){
                $update_productstatus_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product status has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            $update_productstatus_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again later!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";      
            }
     
}
    
    //update dresses
    if(isset($_POST['update_status']) && $_POST['category'] == "Dresses"){
            //set the query
            $status_query = "update dresses SET status = ? where code =?";
                //prepare update statement
            $stmt = $conn->prepare($status_query);
            //bind parameters
            $stmt->bind_param("ss", $param_status, $param_code);
            //set vparameters
           $param_status = $status;
            $param_code = $code;
            //execute the statement
           $stmt->execute();
            if($stmt->affected_rows > 0){
                $update_productstatus_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product status has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            $update_productstatus_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again later!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";      
            }
     
}
    
    //update beauty products
    
    if(isset($_POST['update_status']) && $_POST['category'] == "Beauty Products"){
            //set the query
            $status_query = "update beauty SET status = ? where code =?";
                //prepare update statement
            $stmt = $conn->prepare($status_query);
            //bind parameters
            $stmt->bind_param("ss", $param_status, $param_code);
            //set vparameters
           $param_status = $status;
            $param_code = $code;
            //execute the statement
           $stmt->execute();
            if($stmt->affected_rows > 0){
                $update_productstatus_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product status has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            $update_productstatus_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again later!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";      
            }
     
}
    
}

//get messages
$messages_query = ""; $message_num = 0;
$messages_query = "SELECT count(id) from messages";
$stmt = $conn->prepare($messages_query);
$stmt->execute();
$results = $stmt->get_result();
$messages = $results->fetch_assoc();
$message_num = $messages['count(id)'];

//get all messages
$get_messages_query = "SELECT id, email, subject, message from messages";
$stmt = $conn->prepare($get_messages_query);
$stmt->execute();
$result = $stmt->get_result();
$all_messages = $result->fetch_all(MYSQLI_ASSOC);
//delete messages
$delete_message_status = "";
if(isset($_POST['delete_message']) && $_POST['message_id'] !=""){
    //initailize varaiables
    $message_id = "";
    //get the id
    $message_id = $_POST['message_id'];
   //prepare query
    $stmt = $conn->prepare("DELETE FROM messages where id =?");
    //bind parameters
    $stmt->bind_param("i", $param_id);
    //set parameters
    $param_id = $message_id;
    //execute
   if($stmt->execute()){
    $delete_message_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Message Deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
   }else{
    $delete_message_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again later!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>"; 
   }

}
//fetch all delivery costs
$stmt = $conn->prepare("SELECT id, location, price FROM deliveryprices");
$stmt->execute();
$get_prices = $stmt->get_result();
$all_prices = $get_prices->fetch_all(MYSQLI_ASSOC);
//update location delivery costs
//initialize variable
$update_location_status = $update_location_error = "";
if(isset($_POST['update_location']) && $_POST['location_id'] !=""){
  //get user input
    $location_id = trim($_POST['location_id']);
    $location_price = trim($_POST['location_price']);
        if(empty($location_price )){
        $update_location_error = "Delivery Cost Can Not be Empty";
    }
    if($location_price <= 0){
        $update_location_error = "Delivery Cost Can Not be Zero";
    }
    //sanitize
    $update_location_price = filter_var($location_price, FILTER_SANITIZE_STRING);
    //check whether there are no error
    if(empty($update_location_error)){
     //prepare update statemrnt
        $stmt = $conn->prepare("UPDATE deliveryprices SET price = ? where id =?");
        //bind parameters
        $stmt->bind_param("ii", $param_location_price, $param_location_id);
        //set parameters
        $param_location_price = $update_location_price;
        $param_location_id = $location_id;
        //execute statement
        $stmt->execute();
        if($stmt->affected_rows >0){
           $update_location_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Delivery Cost Updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>"; 
        }else{
          $update_location_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again later!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>"; 
        }

    }
}

//insert delivery costs
$delivery_location_status = $delivery_location_error = $location_cost_error= "";
if(isset($_POST['add_delivery_cost'])){
  //get user input
    $location_name = trim($_POST['location']);
    $location_price = trim($_POST['cost']);
    if(empty($location_name)){
        $delivery_location_error = "Location Filed is required";
    }
        if(empty($location_price )){
        $location_cost_error = "Delivery Cost Can Not be Empty";
    }
    if($location_price <= 0){
        $location_cost_error = "Delivery Cost Can Not be Zero";
    }
    //sanitize
    $delivery_location_price = filter_var($location_price, FILTER_SANITIZE_STRING);
    $delivery_location_name = filter_var($location_name, FILTER_SANITIZE_STRING);
    //check whether there are no error
    if(empty($delivery_location_error) && empty($location_cost_error)){
     //prepare update statemrnt
        $stmt = $conn->prepare("INSERT INTO deliveryprices(location, price) VALUES (?, ?)");
        //bind parameters
        $stmt->bind_param("si", $param_location_name, $param_location_price);
        //set parameters
        $param_location_price = $delivery_location_price;
        $param_location_name = $delivery_location_name;
        //execute statement
        $stmt->execute();
        if($conn->insert_id >0){
           $delivery_location_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Delivery Cost set successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>"; 
        }else{
          $delivery_location_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again later!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>"; 
        }

    }
}
#change user account type
$change_status = $user_type_error ="";
if(isset($_POST['user']) && $_POST['user_type'] != ""){
    $user_type = trim($_POST['user_type']);
    $user_id = trim($_POST['user_id']);
    if(empty($user_type)){
        $user_type_error = "account type is required";
    }
    if(empty($user_type_error)){
        $account_type = filter_var($user_type, FILTER_SANITIZE_STRING);
        $stmt = $conn->prepare("UPDATE users SET account_type = ? WHERE email = ?");
        $stmt->bind_param("ss", $param_acount_type, $param_account_id);
        //set parameters
        $param_acount_type = $account_type;
        $param_account_id = $user_id;
        //execute
        $stmt->execute();
        if($stmt->affected_rows > 0){
            $change_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>User account type changed to ($user_type) successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
        }else{
            $change_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again later!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>"; 
        }
    }
  
}
//add vouchars
$vouchar_status = $vouchar_code_error = $vouchar_cost_error = "";
if(isset($_POST['add_vouchar'])){
    $vouchar_code = htmlspecialchars(trim($_POST['vouchar_code']));
    $vouchar_cost = htmlspecialchars(trim($_POST['vouchar_cost']));
    if(empty($vouchar_code)){
        $vouchar_code_error = "Required field";
    }
    if(strlen($vouchar_code) >6){
        $vouchar_code_error = "Vouchar Code should contain only 6 characters";
    }
    if(empty($vouchar_cost)){
        $vouchar_cost_error = "Required field";
    }
    $stmt = $conn->prepare("INSERT INTO vochar(vochar, price) VALUES (?, ?)");
    $stmt->bind_param("si", $param_vouchar_code, $param_vouchar_cost);
    $param_vouchar_code = $vouchar_code;
    $param_vouchar_cost = $vouchar_cost;
    if($stmt->execute()){
        $vouchar_status ="<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Vouchar Code Added successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
    }else{
        $vouchar_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again later!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>"; 
    }
}
//fetch vouchars from the database
$stmt = $conn->prepare("SELECT vochar, price FROM vochar");
$stmt->execute();
$result = $stmt->get_result();
$vouchar = $result->fetch_all(MYSQLI_ASSOC);
?>