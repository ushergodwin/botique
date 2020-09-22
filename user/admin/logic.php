<?php require_once('config.php'); require_once('db.php');
//copy of staff pages
$currency = "UGX ";
$product_category = "";
$order_No = $odererror = $statuserror = $update_status= ""; 
if(isset($_POST['update'])){
  $order_No = mysqli_real_escape_string($con, $_POST['number']);
$status = mysqli_real_escape_string($con, $_POST['status']);
if(empty(trim($email))){
    $odererror = "the order numner field is required";
} 
if(empty(trim($status))){
    $statuserror = "status field is required";
    echo "status field is required";
} 
    if(empty($odererror && $statuserror)){
        $update = mysqli_query($con, "update ordered set status ='$status' where order_ID = '$order_No'");
        if($update){
           echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Order Status has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
        }else{
          echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
 $folder = "product-images/";
if(isset($_REQUEST['add_product'])){
    //receive user input and escape it
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    if(empty(trim($category))){
        //check whether the category is empty
        $category_error = "please select the product category";
        echo "<b>please select the product category</b>";
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
             echo "<b>product name is required</b>";
         }
         if(empty($code)){
             $product_code_error = "product code is required";
             echo "<b>product code is required</b>";
         }
         if(empty($price)){
             $product_price_error = "product price is required";
             echo "<b>product price is required</b>";
         }
         if($price <= 0){
             $product_price_error = "product price can not be less or equal to zero";
             echo "product price can not be less or equal to zero";
         }
         if(empty($desc)){
             $product_desc_error = "product description is required";
             echo "<b>product description is required</b>";
         }
         if(empty($image)){
             $product_image_error = "product photo is required";
             echo "<b>product photo is required</b>";
         }
          if(empty($p_stat)){
             $product_image_error = "product status is required";
             echo "<b>product status is required</b>";
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
                 echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been added successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
             }else{
                 echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been added successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
             }else{
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
                 echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been added successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
             }else{
                 echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
              echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been added successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
             }else{
                 echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been added successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
             }else{
                 echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
               echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been added successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
             }else{
                 echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
                 echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been added successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
             }else{
                 echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been added successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
             }else{
                 echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
               echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been added successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
             }else{
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
 $delete_category_error = $delete_product_code_error ="";
if(isset($_POST['delete_product'])){
    //receive the input
    $product_code = trim($_POST['product_code']);
    $category = trim($_POST['category']);
    //check if the category input is empty
    if(empty($category)){
        $delete_category_error = "please select the product category";
        echo "<b>please select the product category</b>";
    }
    if(empty($product_code)){
        $delete_product_code_error = "please enter the product code";
        echo "<b>please enter the product code</b>";
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
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }else{
               echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }else{
               echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
              echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }else{
               echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }else{
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
                echo  "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }else{
               echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
               echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }else{
               echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
             echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }else{
               echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
               echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }else{
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
               echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> Product has been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }else{
               echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> All Products from the Accessories Category have been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
            }else{
             echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
               echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> All Products from the Shoes Category have been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";} else{
               echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
              echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> All Products from the Bags Category have been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";}else{
               echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
               echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> All Products from the Skirts Category have been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";}else{
              echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> All Products from the Beauty Products Category have been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";}else{
               echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
               echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> All Products from the Shoes Category have been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";}else{
               echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
                echo  "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> All Products from the Trousers Category have been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";}else{
               echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
               echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> All Products from the Tops/Brouse Category have been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";}else{
             echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong> All Products from the Dresses Category have been deleted successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";}else{
               echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
$update_category_error = $update_price_error = $update_code_error ="";
if(isset($_POST['update_price'])){
    $category = trim($_POST['category']);
    $product_price = trim($_POST['product_price']);
    $product_code = trim($_POST['product_code']);
    
    //check for empty inputs
    if(empty($category)){
        $update_category_error = "please select product category";
        echo "<b>please select product category</b>";
    }
      if(empty($product_price)){
        $update_price_error = "please enter the new product price";
        echo "<b>please enter the new product price</b>";
    }
      if(empty($product_code)){
        $update_code_error = "please enter the product code";
        echo "<b>please enter the product code</b>";
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
               echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product price has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
                echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product price has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
               echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product price has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            echo  "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product price has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product price has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
               echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product price has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product price has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
           echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product price has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product price has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
 $update_status_category_error = $update_product_status_error = $update_status_code_error ="";
if(isset($_POST['update_status'])){
    $category = trim($_POST['category']);
    $product_status = trim($_POST['product_status']);
    $product_code = trim($_POST['product_code']);
    //check for empty inputs
    if(empty($category)){
        $update_status_category_error = "please select product category";
        echo "<b>please select product category</b>";
    }
      if(empty($product_status)){
        $update_product_status_error = "please select the new product status";
        echo "<b>please select the new product status</b>";
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
               echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product status has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
               echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product status has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
               echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product status has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
          echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product status has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product status has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
              echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product status has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
               echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product status has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product status has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Product status has been updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            echo  "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again later!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";      
            }
     
}
    
}

//insert delivery costs
$delivery_location_error = $location_cost_error= "";
if(isset($_POST['add_delivery_cost'])){
  //get user input
    $location_name = trim($_POST['location']);
    $location_price = trim($_POST['cost']);
    if(empty($location_name)){
        $delivery_location_error = "Location Filed is required";
        echo "<br>Location Filed is required</b>";
    }
        if(empty($location_price )){
        $location_cost_error = "Delivery Cost Can Not be Empty";
        echo "<br>Delivery Cost Can Not be Empty</b>";
    }
    if($location_price <= 0){
        $location_cost_error = "Delivery Cost Can Not be Zero";
        echo "<b>Delivery Cost Can Not be Zero</b>";
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
           echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Delivery Cost for $delivery_location_name set successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>"; 
        }else{
          echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again later!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>"; 
        }

    }
}

//update delivery cost
$update_location_error = $update_location_cost_error= "";
if(isset($_POST['update_delivery_cost'])){
  //get user input
    $location_name = trim($_POST['location']);
    $location_price = trim($_POST['cost']);
    if(empty($location_name)){
        $update_location_error = "Location Filed is required";
        echo "<br>Location Filed is required</b>";
    }
        if(empty($location_price )){
        $update_location_cost_error = "Delivery Cost Can Not be Empty";
        echo "<br>Delivery Cost Can Not be Empty</b>";
    }
    if($location_price <= 0){
        $update_location_cost_error = "Delivery Cost Can Not be Zero";
        echo "<b>Delivery Cost Can Not be Zero</b>";
    }
    //sanitize
    $delivery_location_price = filter_var($location_price, FILTER_SANITIZE_STRING);
    $delivery_location_name = filter_var($location_name, FILTER_SANITIZE_STRING);
    //check whether there are no error
    if(empty($delivery_location_error) && empty($delivery_location_cost_error)){
     //prepare update statemrnt
        $stmt = $conn->prepare("UPDATE deliveryprices SET price = ? WHERE location = ?");
        //bind parameters
        $stmt->bind_param("is",  $param_location_price, $param_location_name,);
        //set parameters
        $param_location_price = $delivery_location_price;
        $param_location_name = $delivery_location_name;
        //execute statement
        $stmt->execute();
        if($stmt->affected_rows >0){
           echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Delivery Cost for $delivery_location_name updated successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>"; 
        }else{
          echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
        echo "<b>Required field</b>";
    }
    if(strlen($vouchar_code) >6){
        $vouchar_code_error = "Vouchar Code should contain only 6 characters";
        echo "<br>Vouchar Code should contain only 6 characters<br>";
    }
    if(empty($vouchar_cost)){
        $vouchar_cost_error = "Required field";
        echo "<br>Required field<br>";
    }
    $stmt = $conn->prepare("INSERT INTO vochar(vochar, price) VALUES (?, ?)");
    $stmt->bind_param("si", $param_vouchar_code, $param_vouchar_cost);
    $param_vouchar_code = $vouchar_code;
    $param_vouchar_cost = $vouchar_cost;
    if($stmt->execute()){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Vouchar Code ($vouchar_code) Worth $vouchar_cost Added successfuly!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";  
    }else{
        echo  "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again later!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>"; 
    }
}
//send message to admin
   if(isset($_POST['contactAdmin'])){
           $email = trim($_POST['email']);
           $subject = trim($_POST['message']);
            //send email to admin@gemasglam.com
           $to = "admin@gemasglam.com";
           $headers = "From: wecare@gemasglam.com\r\n";
           $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
           $subject = "<h5 class='text-success'>SENT BY</h5>: ".$email."<br>"."<h5 class='text-secondary'>$subject</h5>";
            if(mail($to, $subject, $headers)){
               echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>Message successfuly sent! <br> Resposnse will be directed to $email
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
            }else{
            echo  "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-exclamation-triangle text-danger'></i></strong> OOPs, something went wrong, please try again!!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";      
            }
        }
        $conn->close();
