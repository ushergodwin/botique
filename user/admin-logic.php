<?php require_once('db.php');
$currency = "UGX ";
$email = $_SESSION['staff'];
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
?>