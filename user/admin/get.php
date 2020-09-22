<?php require_once 'config.php';
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
//get staticts
if(isset($_REQUEST['q'])){
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
	$jan = number_format($fetch_jan['SUM(total_cost)']);
	$jan_cal = $fetch_jan['SUM(total_cost)'];
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
	$feb = number_format($fetch_feb['SUM(total_cost)']); 
	$feb_cal = $fetch_feb['SUM(total_cost)'];
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
	$march = number_format($fetch_march['SUM(total_cost)']); 
	$march_cal = $fetch_march['SUM(total_cost)'];
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
	$april = number_format($fetch_april['SUM(total_cost)']); 
	$april_cal = $fetch_april['SUM(total_cost)'];
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
	$may = number_format($fetch_may['SUM(total_cost)']); 
	$may_cal = $fetch_may['SUM(total_cost)'];
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
	$june = number_format($fetch_june['SUM(total_cost)']); 
	$june_cal = $fetch_june['SUM(total_cost)'];
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
	$july = number_format($fetch_july['SUM(total_cost)']); 
	$july_cal = $fetch_july['SUM(total_cost)'];
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
	$aug = number_format($fetch_aug['SUM(total_cost)']); 
	$aug_cal = $fetch_aug['SUM(total_cost)'];
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
	$sept = number_format($fetch_sept['SUM(total_cost)']);
	$sept_cal = $fetch_sept['SUM(total_cost)']; 
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
	$oct = number_format($fetch_oct['SUM(total_cost)']);
	$oct_cal = $fetch_oct['SUM(total_cost)']; 
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
	$nov = number_format($fetch_nov['SUM(total_cost)']); 
	$nov_cal = $fetch_nov['SUM(total_cost)'];
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
	$dec = number_format($fetch_dec['SUM(total_cost)']);
	$dec_cal = $fetch_dec['SUM(total_cost)']; 
	$stmt->close();
	 $total_sales = 0;
  $total_sales = $jan_cal+$feb_cal+$march_cal+$april_cal+$may_cal+$june_cal+$july_cal+$aug_cal+$sept_cal+$oct_cal+$nov_cal+$dec_cal;
  $formated_total_sale = number_format($total_sales);

	$stat_table = "
	<table class='table table-dark table-striped'>
            <tr>
              <th>JAN</th>
              <th>FEB</th>
              <th>MARCH</th>
              <th>APRIL</th>
              <th>MAY</th>
              <th>JUNE</th>
              <th>JULY</th>
              <th>AUG</th>
              <th>SEPT</th>
              <th>OCT</th>
              <th>NOV</th>
              <th>DEC</th>
            </tr>
     <tr>
      <td>$jan </td>
      <td> $feb </td>
      <td> $march </td>
      <td>$april</td>
      <td>$may</td>
      <td>$june</td>
      <td>$july </td>
      <td>$aug </td>
      <td>$sept </td>
      <td>$oct </td>
      <td>$nov </td>
      <td> $dec </td>
     </tr>
     <tr>
       <td colspan='12'> TOTAL SALES FOR A YEAR: $formated_total_sale </td>
     </tr>
     </table>
	";

	echo $stat_table;
}
if(isset($_REQUEST['online'])){
	$stmt = $conn->prepare("SELECT firstname, lastname FROM online WHERE status = ?");
	$stmt->bind_param("s", $param_status);
	$param_status = "online";
	$stmt->execute();
	$result = $stmt->get_result();
	$online_users = $result->fetch_all(MYSQLI_ASSOC);
	foreach ($online_users as $key => $value) {
		echo $value['firstname']."&nbsp;".$value['lastname']."<br>";
	}
}
//get stat for a given a year
//get staticts
if(isset($_REQUEST['year'])){
	$year = "";
	$year = $_GET['year'];
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
	$jan = number_format($fetch_jan['SUM(total_cost)']);
	$jan_cal = $fetch_jan['SUM(total_cost)'];
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
	$feb = number_format($fetch_feb['SUM(total_cost)']); 
	$feb_cal = $fetch_feb['SUM(total_cost)'];
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
	$march = number_format($fetch_march['SUM(total_cost)']); 
	$march_cal = $fetch_march['SUM(total_cost)'];
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
	$april = number_format($fetch_april['SUM(total_cost)']); 
	$april_cal = $fetch_april['SUM(total_cost)'];
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
	$may = number_format($fetch_may['SUM(total_cost)']); 
	$may_cal = $fetch_may['SUM(total_cost)'];
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
	$june = number_format($fetch_june['SUM(total_cost)']); 
	$june_cal = $fetch_june['SUM(total_cost)'];
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
	$july = number_format($fetch_july['SUM(total_cost)']); 
	$july_cal = $fetch_july['SUM(total_cost)'];
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
	$aug = number_format($fetch_aug['SUM(total_cost)']); 
	$aug_cal = $fetch_aug['SUM(total_cost)'];
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
	$sept = number_format($fetch_sept['SUM(total_cost)']);
	$sept_cal = $fetch_sept['SUM(total_cost)']; 
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
	$oct = number_format($fetch_oct['SUM(total_cost)']);
	$oct_cal = $fetch_oct['SUM(total_cost)']; 
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
	$nov = number_format($fetch_nov['SUM(total_cost)']); 
	$nov_cal = $fetch_nov['SUM(total_cost)'];
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
	$dec = number_format($fetch_dec['SUM(total_cost)']);
	$dec_cal = $fetch_dec['SUM(total_cost)']; 
	$stmt->close();
	 $total_sales = 0;
  $total_sales = $jan_cal+$feb_cal+$march_cal+$april_cal+$may_cal+$june_cal+$july_cal+$aug_cal+$sept_cal+$oct_cal+$nov_cal+$dec_cal;
  $formated_total_sale = number_format($total_sales);
if($total_sales !== 0) {
	$request_stat = "
	<table class='table table-dark table-striped'>
            <tr>
              <th>JAN</th>
              <th>FEB</th>
              <th>MARCH</th>
              <th>APRIL</th>
              <th>MAY</th>
              <th>JUNE</th>
              <th>JULY</th>
              <th>AUG</th>
              <th>SEPT</th>
              <th>OCT</th>
              <th>NOV</th>
              <th>DEC</th>
            </tr>
     <tr>
      <td>$jan </td>
      <td> $feb </td>
      <td> $march </td>
      <td>$april</td>
      <td>$may</td>
      <td>$june</td>
      <td>$july </td>
      <td>$aug </td>
      <td>$sept </td>
      <td>$oct </td>
      <td>$nov </td>
      <td> $dec </td>
     </tr>
     <tr>
       <td colspan='12'> TOTAL SALES FOR A YEAR: $formated_total_sale </td>
     </tr>
     </table>
	";

	echo $request_stat;
}else{
echo "<h5 class='text-danger font-weight-bold'>Oops, no statistics were found for YEAR $year !!</h5>";
}

}
//get users who need support
if(isset($_REQUEST['inquirey'])) {
 $stmt = $conn->prepare("SELECT count(username) FROM user WHERE status = ?");
$stmt->bind_param("s", $param_status);
$param_status = "online";
$stmt->execute();
$result = $stmt->get_result();
$fetch = $result->fetch_assoc();
echo $fetch['count(username)'];
    
}
$conn->close();
