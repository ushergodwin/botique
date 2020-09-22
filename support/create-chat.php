<?php session_start();
$error = "";
require_once 'config.php';
if(isset($_POST['create_chat'])){
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $file_extension = ".txt";
    $status = "online";
    $file_name = $username.$file_extension; 
    $chat_file = fopen("$file_name", 'a');
    fclose($chat_file);
    if($chat_file){
        $stmt = $conn->prepare("SELECT username FROM user WHERE username = ?");
        $stmt->bind_param("s", $param_username);
        $param_username = $username;
        $stmt->execute();
        $result = $stmt->get_result();
        $fetch = $result->fetch_assoc();
        if(!empty($fetch)){
            $stmt = $conn->prepare("UPDATE user SET status = ? WHERE username = ?");
            $stmt->bind_param("ss", $param_status, $param_username);
            $param_status = $status;
            $param_username = $username;
            $stmt->execute();
            $_SESSION['chat'] = $fetch['username'];
            header("location: chat");
        }else{
            
    $stmt = $conn->prepare("INSERT INTO user(username, name, email, query_file, status) VALUES(?, ?, ?, ?, ?)");
        //bind param
        $stmt->bind_param("sssss", $param_username, $param_name, $param_email, $param_file, $param_status);
        //set param
        $param_username = $username;
        $param_name = $name;
        $param_email = $email;
        $param_file = $file_name;
        $param_status = $status;    
        if($stmt->execute()){
            $_SESSION['chat'] = $username;
            header("location: chat");
        }else{
            $error = "Connection to the chat system aborted".$conn->error;
        }
    }
    }else{
        $error = "Connection could not be established. Please try again later";
    }
    
}
