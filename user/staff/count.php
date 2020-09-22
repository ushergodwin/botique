<?php session_start(); require_once 'config.php';
//count products from each category
//initialize variables
if(!isset($_SESSION['staff'])){
  header("location: https://gemasglam.com/user/user-login");
  exit();
}
$messages_count = $users_count = ""; $total_no_of_products = 0;
class Products {
  public $total;
  public function __construct($total) {
    $this->count = $total;
  }
}
//Accessories
class Accessories extends Products {
    public function get_accessories() {
    return $this->count;
  }
}
class Blazers extends Products {
  public function get_blazers() {
    return $this->count;
  }
}
class Skirts extends Products {
  public function get_skirst() {
    return $this->count;
  }
}
class Bags extends Products {
  public function get_bags() {
    return $this->count;
  }
}
class Beauty extends Products {
  public function get_beauty()
  {
    return $this->count;
  }
}
class Trousers extends Products {
  public function get_trousers() {
    return $this->count;
  }
}
class Tops extends Products {
  public function get_tops() {
    return $this->count;
  }
}
class Dresses extends Products {
  public function get_dresses() {
    return $this->count;
  }
}
class Shoes extends Products {
  public function get_shoes() {
    return $this->count;
  }
}
class Orders {
  public $total;
  public function __construct($total) {
    $this->total = $total;
  }
}
class All extends Orders {
    public function get_total() {
    return $this->total;
  }
}
class Delivered extends Orders{
  public function get_delivered() {
    return $this->total;
  }
}
class Cancelled extends Orders{
  public function get_cancelled() {
    return $this->total;
  }
}
class User {
  public $firstname;
  public $lastname;
  public $address;
  public $contact;
  public $email;
  public function __construct($firstname, $lastname, $address, $contact, $email) {
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $this->address = $address;
    $this->contact = $contact;
    $this->email = $email;
  }
  public function get_firstName() {
    return $this->firstname;
  }
  public function get_lastName() {
    return $this->lastname;
  }
  public function get_address() {
    return $this->address;
  }
  public function get_contact() {
    return $this->contact;
  }
  public function get_email() {
    return $this->email;
  }
}
$user_email = $_SESSION['staff'];
//get users user
$firstname = $lastname = $address = $contact =$email= "";
$stmt = $conn->prepare("SELECT email, firstname, lastname, address, contact FROM users WHERE email = ?");
$stmt->bind_param("s", $param_user_email);
$param_user_email = $user_email;
$stmt->execute();
$results = $stmt->get_result();
$user_details = $results->fetch_assoc();
$firstname = $user_details['firstname'];
$lastname = $user_details['lastname'];
$address = $user_details['address'];
$contact = $user_details['contact'];
$email = $user_details['email'];
$user = new User($firstname, $lastname, $address, $contact, $email);

$stmt = $conn->prepare("SELECT count(id) FROM accessories");
$stmt->execute();
$result = $stmt->get_result();
$aResult = $result->fetch_assoc();
$accessories_count =$aResult['count(id)'];
$acc_total = new Accessories($accessories_count);
$stmt->close();
//blazers
$stmt = $conn->prepare("SELECT count(id) FROM blazers");
$stmt->execute();
$result = $stmt->get_result();
$bResult = $result->fetch_assoc();
$blazers_count = $bResult['count(id)'];
$blazers_total = new Blazers($blazers_count);
$stmt->close();
//skirts
$stmt = $conn->prepare("SELECT count(id) FROM skirts");
$stmt->execute();
$result = $stmt->get_result();
$skResult = $result->fetch_assoc();
$skirts_count = $skResult['count(id)'];
$skirts_total = new Skirts($skirts_count);
$stmt->close();
//bags
$stmt = $conn->prepare("SELECT count(id) FROM bags");
$stmt->execute();
$result = $stmt->get_result();
$bgResult = $result->fetch_assoc();
$bags_count = $bgResult['count(id)'];
$bags_total = new Bags($bags_count);
$stmt->close();
//beauty products
$stmt = $conn->prepare("SELECT count(id) FROM beauty");
$stmt->execute();
$result = $stmt->get_result();
$bbResult = $result->fetch_assoc();
$beauty_count = $bbResult['count(id)'];
$beauty_total = new Beauty($beauty_count);
$stmt->close();
//trousers
$stmt = $conn->prepare("SELECT count(id) FROM trousers");
$stmt->execute();
$result = $stmt->get_result();
$tResult = $result->fetch_assoc();
$trousers_count = $tResult['count(id)'];
$trousers_total = new Trousers($trousers_count);
$stmt->close();
// tops
$stmt = $conn->prepare("SELECT count(id) FROM tops");
$stmt->execute();
$result = $stmt->get_result();
$tsResult = $result->fetch_assoc();
$tops_count = $tsResult['count(id)'];
$tops_total = new Tops($tops_count);
$stmt->close();
//dresses
$stmt = $conn->prepare("SELECT count(id) FROM dresses");
$stmt->execute();
$result = $stmt->get_result();
$dResult = $result->fetch_assoc();
$dresses_count = $dResult['count(id)'];
$dresses_total = new Dresses($dresses_count);
$stmt->close();
//shoes
$stmt = $conn->prepare("SELECT count(id) FROM shoes");
$stmt->execute();
$result = $stmt->get_result();
$sResult = $result->fetch_assoc();
$shoes_count = $sResult['count(id)'];
$shoes_total = new Shoes($shoes_count);
$stmt->close();
//cout messages
$stmt = $conn->prepare("SELECT count(id) FROM messages");
$stmt->execute();
$result = $stmt->get_result();
$mResult = $result->fetch_assoc();
$messages_count = $mResult['count(id)'];
$stmt->close();
//count users
$stmt = $conn->prepare("SELECT count(email) FROM users");
$stmt->execute();
$result = $stmt->get_result();
$uResult = $result->fetch_assoc();
$users_count = $uResult['count(email)'];
$stmt->close();
//add all products
$tottal = $accessories_count +  $blazers_count + $shoes_count + $trousers_count + $bags_count + $beauty_count + $tops_count + $skirts_count + $dresses_count;
$total_no_of_products += $tottal;

	$stmt = $conn->prepare("SELECT SUM(total_cost) FROM ordered WHERE ordered_at LIKE ?");
$stmt->bind_param("s", $param_month);
$month = "08";
$param_month = "%".$month."%";
$stmt->execute();
$result = $stmt->get_result();
$monthResult = $result->fetch_assoc();
$month_total = $monthResult['SUM(total_cost)'];
$stmt->close();
//fetch vouchars from the database
$stmt = $conn->prepare("SELECT vochar, price FROM vochar");
$stmt->execute();
$result = $stmt->get_result();
$vouchar = $result->fetch_all(MYSQLI_ASSOC);
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
//delete user
$delete_status = "";
if(isset($_POST['delete_user'])){
    $user_id = trim($_POST['user_id']);
        $stmt = $conn->prepare("DELETE FROM users WHERE email = ?");
        $stmt->bind_param("s", $param_account_id);
        //set parameters
        $param_account_id = $user_id;
        //execute
        $stmt->execute();
        if($stmt->affected_rows > 0){
            $delete_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong><i class='fas fa-check-circle text-success'></i></strong>User account Deleted successfuly!
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
//get all orders
$stmt = $conn->prepare("SELECT count(id) FROM ordered");
$stmt->execute();
$result = $stmt->get_result();
$fetch_no_of_orders = $result->fetch_assoc();
$no_of_orders = 0;
$no_of_orders = $fetch_no_of_orders['count(id)'];
$order = new All($no_of_orders);
//get number of delivered orders
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
  $delivered = new Delivered($delivered_orders);
  //get cancelled orders
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
  $cancelled = new Cancelled($cancelled_orders);

