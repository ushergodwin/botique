<?php session_start(); require_once 'config.php';
if(!isset($_SESSION['admin'])){
  header("location: https://gemasglam.com/user/user-login");
  exit();
}
$user_email = $_SESSION['admin'];
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

//taly number of users on site
function usersonline() {
 $sessionfiles = session_save_path() . "/sess_*";
  $usersonline = count(glob($sessionfiles));
   return $usersonline;
    }
//count products from each category
//initialize variables
$accessories_count = $blazers_count = $shoes_count = $bags_count = $beauty_count = $trousers_count = $skirts_count = $tops_count = $dresses_count = $messages_count = $users_count = ""; $total_no_of_products = 0;
//Accessories
$stmt = $conn->prepare("SELECT count(id) FROM accessories");
$stmt->execute();
$result = $stmt->get_result();
$aResult = $result->fetch_assoc();
$accessories_count =$aResult['count(id)'];
$stmt->close();
//blazers
$stmt = $conn->prepare("SELECT count(id) FROM blazers");
$stmt->execute();
$result = $stmt->get_result();
$bResult = $result->fetch_assoc();
$blazers_count = $bResult['count(id)'];
$stmt->close();
//skirts
$stmt = $conn->prepare("SELECT count(id) FROM skirts");
$stmt->execute();
$result = $stmt->get_result();
$skResult = $result->fetch_assoc();
$skirts_count = $skResult['count(id)'];
$stmt->close();
//bags
$stmt = $conn->prepare("SELECT count(id) FROM bags");
$stmt->execute();
$result = $stmt->get_result();
$bgResult = $result->fetch_assoc();
$bags_count = $bgResult['count(id)'];
$stmt->close();
//beauty products
$stmt = $conn->prepare("SELECT count(id) FROM beauty");
$stmt->execute();
$result = $stmt->get_result();
$bbResult = $result->fetch_assoc();
$beauty_count = $bbResult['count(id)'];
$stmt->close();
//trousers
$stmt = $conn->prepare("SELECT count(id) FROM trousers");
$stmt->execute();
$result = $stmt->get_result();
$tResult = $result->fetch_assoc();
$trousers_count = $tResult['count(id)'];
$stmt->close();
// tops
$stmt = $conn->prepare("SELECT count(id) FROM tops");
$stmt->execute();
$result = $stmt->get_result();
$tsResult = $result->fetch_assoc();
$tops_count = $tsResult['count(id)'];
$stmt->close();
//dresses
$stmt = $conn->prepare("SELECT count(id) FROM dresses");
$stmt->execute();
$result = $stmt->get_result();
$dResult = $result->fetch_assoc();
$dresses_count = $dResult['count(id)'];
$stmt->close();
//shoes
$stmt = $conn->prepare("SELECT count(id) FROM shoes");
$stmt->execute();
$result = $stmt->get_result();
$sResult = $result->fetch_assoc();
$shoes_count = $sResult['count(id)'];
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
//data for charts
$year = date("Y");
  $jan = $feb = $march = $april = $may = $june = $july = $aug = $sept = $nov = $dec = 0;
  //fetch for jan
  $stmt = $conn->prepare("SELECT SUM(total_cost) FROM ordered WHERE ordered_at LIKE ?");
  //bind
  $stmt->bind_param("s", $param_jan);
  //set
  $for_jan = $year."-01";
  $param_jan = "%".$for_jan."%";
  //execute
  $stmt->execute();
  //get result
  $result = $stmt->get_result();
  //fetch
  $fetch_jan = $result->fetch_assoc();
  $jan = $fetch_jan['SUM(total_cost)'];
     $stmt->close();

  //fecth for feb
  $stmt = $conn->prepare("SELECT SUM(total_cost) FROM ordered WHERE ordered_at LIKE ?");
  //bind
  $stmt->bind_param("s", $param_feb);
  //set
  $for_feb = $year. "-02";
  $param_feb= "%".$for_feb."%";
  //execute
  $stmt->execute();
  //get result
  $result = $stmt->get_result();
  //fetch
  $fetch_feb = $result->fetch_assoc();
  $feb = $fetch_feb['SUM(total_cost)']; 
    $stmt->close();

  //fetch for march
  $stmt = $conn->prepare("SELECT SUM(total_cost) FROM ordered WHERE ordered_at LIKE ?");
  //bind
  $stmt->bind_param("s", $param_march);
  //set
  $for_march = $year. "-03";
  $param_march = "%".$for_march."%";
  //execute
  $stmt->execute();
  //get result
  $result = $stmt->get_result();
  //fetch
  $fetch_march = $result->fetch_assoc();
  $march = $fetch_march['SUM(total_cost)']; 
  $stmt->close();

  //ftech april
  $stmt = $conn->prepare("SELECT SUM(total_cost) FROM ordered WHERE ordered_at LIKE ?");
  //bind
  $stmt->bind_param("s", $param_april);
  //set
  $for_april = $year. "-04";
  $param_april = "%".$for_april."%";
  //execute
  $stmt->execute();
  //get result
  $result = $stmt->get_result();
  //fetch
  $fetch_april = $result->fetch_assoc();
  $april = $fetch_april['SUM(total_cost)']; 
  $stmt->close();

  //fetch may
  $stmt = $conn->prepare("SELECT SUM(total_cost) FROM ordered WHERE ordered_at LIKE ?");
  //bind
  $stmt->bind_param("s", $param_may);
  //set
  $for_may = $year. "-05";
  $param_may = "%".$for_april."%";
  //execute
  $stmt->execute();
  //get result
  $result = $stmt->get_result();
  //fetch
  $fetch_may = $result->fetch_assoc();
  $may = $fetch_may['SUM(total_cost)']; 
  $stmt->close();

  //fetch june
  $stmt = $conn->prepare("SELECT SUM(total_cost) FROM ordered WHERE ordered_at LIKE ?");
  //bind
  $stmt->bind_param("s", $param_june);
  //set
  $for_june = $year. "-06";
  $param_june = "%".$for_april."%";
  //execute
  $stmt->execute();
  //get result
  $result = $stmt->get_result();
  //fetch
  $fetch_june = $result->fetch_assoc();
  $june = $fetch_june['SUM(total_cost)']; 
  $stmt->close();

  //fetch july
  $stmt = $conn->prepare("SELECT SUM(total_cost) FROM ordered WHERE ordered_at LIKE ?");
  //bind
  $stmt->bind_param("s", $param_july);
  //set
  $for_july = $year. "-07";
  $param_july = "%".$for_april."%";
  //execute
  $stmt->execute();
  //get result
  $result = $stmt->get_result();
  //fetch
  $fetch_july = $result->fetch_assoc();
  $july = $fetch_july['SUM(total_cost)']; 
  $stmt->close();

  //fech august
  $stmt = $conn->prepare("SELECT SUM(total_cost) FROM ordered WHERE ordered_at LIKE ?");
  //bind
  $stmt->bind_param("s", $param_aug);
  //set
  $for_aug = $year. "-08";
  $param_aug = "%".$for_aug."%";
  //execute
  $stmt->execute();
  //get result
  $result = $stmt->get_result();
  //fetch
  $fetch_aug = $result->fetch_assoc();
  $aug = $fetch_aug['SUM(total_cost)']; 
  $stmt->close();

  //fetch sept
  $stmt = $conn->prepare("SELECT SUM(total_cost) FROM ordered WHERE ordered_at LIKE ?");
  //bind
  $stmt->bind_param("s", $param_sept);
  //set
  $for_sept = $year. "-09";
  $param_sept = "%".$for_sept."%";
  //execute
  $stmt->execute();
  //get result
  $result = $stmt->get_result();
  //fetch
  $fetch_sept = $result->fetch_assoc();
  $sept = $fetch_sept['SUM(total_cost)']; 
  $stmt->close();

//fech oct
  $stmt = $conn->prepare("SELECT SUM(total_cost) FROM ordered WHERE ordered_at LIKE ?");
  //bind
  $stmt->bind_param("s", $param_oct);
  //set
  $for_oct = $year. "-10";
  $param_oct = "%".$for_oct."%";
  //execute
  $stmt->execute();
  //get result
  $result = $stmt->get_result();
  //fetch
  $fetch_oct = $result->fetch_assoc();
  $oct = $fetch_oct['SUM(total_cost)']; 
  $stmt->close();

  //fetch nov
  $stmt = $conn->prepare("SELECT SUM(total_cost) FROM ordered WHERE ordered_at LIKE ?");
  //bind
  $stmt->bind_param("s", $param_nov);
  //set
  $for_nov = $year. "-11";
  $param_nov = "%".$for_nov."%";
  //execute
  $stmt->execute();
  //get result
  $result = $stmt->get_result();
  //fetch
  $fetch_nov = $result->fetch_assoc();
  $nov = $fetch_nov['SUM(total_cost)']; 
  $stmt->close();

  //fetch dec
  $stmt = $conn->prepare("SELECT SUM(total_cost) FROM ordered WHERE ordered_at LIKE ?");
  //bind
  $stmt->bind_param("s", $param_dec);
  //set
  $for_dec =  $year."-12";
  $param_dec = "%".$for_dec."%";
  //execute
  $stmt->execute();
  //get result
  $result = $stmt->get_result();
  //fetch
  $fetch_dec = $result->fetch_assoc();
  $dec = $fetch_dec['SUM(total_cost)']; 
  $stmt->close();
  //calc total sales
   $total_sales = 0;
  $total_sales = $jan+$feb+$march+$april+$may+$june+$july+$aug+$sept+$oct+$nov+$dec;
  //define contact percentage
  define('percentage', 100);
  //calculate percentage of each month
  //jan
  $jan_per = $jan/$total_sales*percentage;
  //feb
  $feb_per = $feb/$total_sales*percentage;
  //march
  $march_per = $march/$total_sales*percentage;
  //april
  $april_per = $april/$total_sales*percentage;
  //may
  $may_per = $may/$total_sales*percentage;
  //june
  $june_per = $june/$total_sales*percentage;
  //july
  $july_per = $july/$total_sales*percentage;
  //august
  $aug_per = $aug/$total_sales*percentage;
  //sept
  $sept_per = $sept/$total_sales*percentage;
  //oct
  $oct_per = $oct/$total_sales*percentage;
  //nov
  $nov_per = $nov/$total_sales*percentage;
  //dec
  $dec_per = $dec/$total_sales*percentage;
  //chart datapoints
  $dataPoints = array( 
  array("label"=>"Jan", "y"=> $jan_per),
  array("label"=>"Feb", "y"=> $feb_per),
  array("label"=>"March", "y"=> $march_per),
  array("label"=>"April", "y"=> $april_per),
  array("label"=>"May", "y"=>  $may_per),
  array("label"=>"June", "y"=> $june_per),
  array("label"=>"July", "y"=> $july_per),
  array("label"=>"Aug", "y"=> $aug_per),
  array("label"=>"Sept", "y"=> $sept_per),
  array("label"=>"Oct", "y"=> $oct_per),
  array("label"=>"Nov", "y"=> $nov_per),
  array("label"=>"Dec", "y"=> $dec_per),
);
