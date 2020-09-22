<?php require_once 'config.php';
    //get online users for inquiries
if(isset($_REQUEST['online'])) {
 $stmt = $conn->prepare("SELECT username FROM user WHERE status = ?");
$stmt->bind_param("s", $param_status);
$param_status = "online";
$stmt->execute();
$result = $stmt->get_result();
$fetch = $result->fetch_all(MYSQLI_ASSOC);
if(!empty($fetch)){
    foreach($fetch as $key => $users) {
    echo $users['username']."<br>";
}
}else{
    echo "No users availabel for inquiries";
}
    
}