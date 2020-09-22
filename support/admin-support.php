<?php session_start(); require_once'config.php';
$admin_file = $user_file = $admin_name =""; $file_ex = ".txt";
$get_admin_file = [];
  $user_name = $_SESSION['start_chat'];
 $stmt = $conn->prepare("SELECT response_file, inquirer, username FROM admin WHERE username =?");
 //bind
$stmt->bind_param("s", $param_admin);
//set
$param_admin = $user_name;
//execute
$stmt->execute();
//fetch
$result = $stmt->get_result();
 $get_admin_file = $result->fetch_assoc();
$admin_file =$get_admin_file['response_file'];
$user_file = $get_admin_file['inquirer'].$file_ex;
$admin_name = $get_admin_file['username'];

if(isset($_REQUEST['start_chat'])){ 
$file_name = $admin_file;
$lines = array();    
$read_file = fopen("$file_name", 'r');
   while(!feof($read_file)){
           $all_lines = fgets($read_file);
               array_push($lines, $all_lines);
               }
        $data = $lines;
           echo "<p class='name'>$admin_name</p>";
        foreach($data as $last) {
           echo "<p class='admin-chat'> $last</p><br>";
        }
    fclose($read_file);   

}

if(isset($_REQUEST['read_user'])){  
    $stmt = $conn->prepare("SELECT status, name FROM user WHERE status = ?");
    $stmt->bind_param("s", $param_status);
    $param_status = "online";
    $stmt->execute();
    $result = $stmt->get_result();
    $fetch = $result->fetch_assoc();
    $name = $fetch['name'];
    if(!empty($fetch)) {
$file_name = $user_file;
    $lines = array();
    $read_file = fopen("$file_name", 'r');
   while(!feof($read_file)){
           $all_lines = fgets($read_file);
               array_push($lines, $all_lines);
               }
        $data = $lines;
        echo "<p class='name'>$name</p>";
        foreach($data as $last) {
            echo "<p class='user-chat'> $last</p><br>";
        }
    fclose($read_file);
    } else{
        echo "<p class='user-chat'>User Has Left Chat</p>";
    }

}

if(isset($_REQUEST["admin_response"])){
    $file_name = $admin_file;
  $file = fopen("$file_name", 'a+');
$query = $_POST['query'];
    $date = date("D H:i:s")."\n";
 $space = "&nbsp; &nbsp;&nbsp; &nbsp;";
 fwrite($file, $query.$space.$date);
fclose($file);  
    }
