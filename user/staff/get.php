<?php require_once 'config.php'; require_once 'db.php'; $currency = "UGX ";
//get total number of orders
if(isset($_REQUEST['no_order'])){
	$stmt = $conn->prepare("SELECT count(id) FROM ordered");
	$stmt->execute();
	$result = $stmt->get_result();
	$orders = $result->fetch_assoc();
	$no_of_orders = $orders['count(id)'];
	echo $no_of_orders;
}
//get current orders
if(isset($_REQUEST['current_order'])){
	$stmt = $conn->prepare("SELECT count(id) FROM ordered WHERE status = ?");
	//bind
	$stmt->bind_param("s", $param_curent);
	//set
	$current = "Order Received";
	$param_curent = $current;
	$stmt->execute();
	$result = $stmt->get_result();
	$orders = $result->fetch_assoc();
	$current_orders = $orders['count(id)'];
	echo $current_orders;
}
//get delivered orders
if(isset($_REQUEST['delivered_order'])){
	$stmt = $conn->prepare("SELECT count(id) FROM ordered WHERE status = ?");
	//bind
	$stmt->bind_param("s", $param_curent);
	//set
	$current = "Order Delivered";
	$param_curent = $current;
	$stmt->execute();
	$result = $stmt->get_result();
	$orders = $result->fetch_assoc();
	$delivered_orders = $orders['count(id)'];
	echo $delivered_orders;
}
//get canceled orders
if(isset($_REQUEST['cancelled_order'])){
	$stmt = $conn->prepare("SELECT count(id) FROM ordered WHERE status = ?");
	//bind
	$stmt->bind_param("s", $param_curent);
	//set
	$current = "Order Cancelled";
	$param_curent = $current;
	$stmt->execute();
	$result = $stmt->get_result();
	$orders = $result->fetch_assoc();
	$cancelled_orders = $orders['count(id)'];
	echo $cancelled_orders;
	$stmt->close();
}
if(isset($_REQUEST['all'])) {
     $sql = "select image, name, quantity, price, it_total_price, ordered.order_ID, shipping, payment, total_cost, ordered_at, firstname, lastname, contact, location from all_cart inner join ordered on all_cart.order_ID = ordered.order_ID inner join users on ordered.email = users.email INNER JOIN address ON users.email = address.email order by ordered_at desc";
$results = mysqli_query($con, $sql);
echo "
        <table cellpadding='10' class='table table-dark table-striped' id='myTable'>
        <tr class='fixed'>
            <th>IMAGE</th>
            <th>PRODUCT NAME</th>
            <th>QUANTITY</th>
            <th>PRICE</th>
            <th>SUB TOTAL</th>
            <th>SHIPPING</th>
            <th>PAYMENT METHOD</th>
            <th>ORDER NUMBER</th>
            </tr> ";
while($row = mysqli_fetch_assoc($results)){
       echo" <tr class='cont'>";
        echo"    <td><img src='".$row['image']."' width='100' height='100' /></td> ";
          echo"<td>".$row['name']."</td>";
         echo"<td>".$row['quantity']."</td>";
        echo"<td>".$currency.number_format($row['price'])."</td>";
         echo"<td>".$currency.number_format($row['it_total_price'])."</td>";
         echo "<td>".$row['shipping']."</td>";
         echo"<td>".$row['payment']."</td>";
         echo"<td>".$row['order_ID']."</td>";
      echo"</tr> ";
       echo"<tr>";
        echo"<th class='text-success'>"."TOTAL COST: ".$currency.number_format($row['total_cost'])."</th>";
        echo"<th colspan='2' class='text-success'>"."ORDERD BY: ".$row['firstname']."&nbsp;".$row['lastname']."</th>";
         echo"<th colspan='2' class='text-success'>"."CONTACT: ".$row['contact']."</th>"; 
        echo"<th colspan='2' class='text-success'>"."ADDRESS: ".$row['location']."</th>";
    echo"<th colspan='2' class='text-success'>"."ORDERD AT: ".$row['ordered_at']."</th>";
        echo"</tr>";
}
echo "</table>";
}
if(isset($_REQUEST['current'])) {
	    $sql = "select image, name, quantity, price, it_total_price, ordered.order_ID, shipping, payment, total_cost, status, ordered_at, firstname, lastname, contact, location from all_cart inner join ordered on all_cart.order_ID = ordered.order_ID inner join users on ordered.email = users.email INNER JOIN address on users.email = address.email where ordered.status='Order Received' order by ordered_at desc";
$results = mysqli_query($con, $sql);
    if(mysqli_num_rows($results)>0){
echo"
        <table cellpadding='10' class='table table-dark table-striped' id='myTable'>
        <tr>
            <th>IMAGE</th>
            <th>PRODUCT NAME</th>
            <th>QUANTITY</th>
            <th>PRICE</th>
            <th>SUB TOTAL</th>
            <th>SHIPPING</th>
            <th>PAYMENT METHOD</th>
            <th>ORDER NUMEMBER</th>
            </tr> ";
while($row = mysqli_fetch_assoc($results)){
       echo" <tr>";
        echo"    <td><img src='".$row['image']."' width='100' height='100' /></td> ";
          echo"<td>".$row['name']."</td>";
         echo"<td>".$row['quantity']."</td>";
        echo"<td>".$currency.number_format($row['price'])."</td>";
         echo"<td>".$currency.number_format($row['it_total_price'])."</td>";
         echo "<td>".$row['shipping']."</td>";
         echo"<td>".$row['payment']."</td>";
         echo"<td>".$row['order_ID']."</td>";
      echo"</tr> ";
       echo"<tr>";
        echo"<th class='text-success'>"."TOTAL COST: ".$currency.number_format($row['total_cost'])."</th>";
        echo"<th colspan='2' class='text-success'>"."ORDERD BY: ".$row['firstname']."&nbsp;".$row['lastname']."</th>";
         echo"<th colspan='2' class='text-success'>"."CONTACT: ".$row['contact']."</th>"; 
        echo"<th colspan='2' class='text-success'>"."ADDRESS: ".$row['location']."</th>";
    echo"<th colspan='2' class='text-success'>"."ORDERD AT: ".$row['ordered_at']."</th>";
        echo"</tr>";
}
echo "</table>";
    }else{
        echo "No Orders Available";
    }
}
//update order status
$orderError = $statusError = "";
if(isset($_REQUEST['update'])){
  $order_No = mysqli_real_escape_string($con, $_POST['number']);
$status = mysqli_real_escape_string($con, $_POST['status']);
if(empty(trim($order_No))){
    $orderError = "the order numner field is required";
    echo "the order numner field is required";
} 
if(empty(trim($status))){
    $statusError = "status field is required";
    echo "status field is required";
} 
    if(empty($orderError && $statusError)){
        $update = mysqli_query($con, "UPDATE ordered set status ='$status' where order_ID = '$order_No'");
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
