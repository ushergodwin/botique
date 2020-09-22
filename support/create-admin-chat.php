<?php session_start();
$error = "";
require_once 'config.php';
if(isset($_POST['create_chat'])){
    $username = $_POST['adminname'];
    $name = $_POST['name'];
    $inquirer = $_POST['username'];
    $status ="online";
    $file_extension = ".txt";
    //select first
    $stmt = $conn->prepare("SELECT username FROM admin WHERE username = ?");
    $stmt->bind_param("s", $param_username);
    $param_username = $username;
    $stmt->execute();
    $result = $stmt->get_result();
    $fetch = $result->fetch_assoc();
    if(!empty($fetch)){
    $file_name = $username."-".$inquirer.$file_extension; 
    $chat_file = fopen("$file_name", 'a+');
    fclose($chat_file);
     if($chat_file){
        $stmt = $conn->prepare("UPDATE admin SET inquirer = ?, response_file = ?, status = ? WHERE username = ?");
        $stmt->bind_param("ssss", $param_inquirer, $param_response_file, $param_status, $param_username);
        $param_inquirer = $inquirer;
        $param_response_file = $file_name;
        $param_username = $username;
        $param_status = $status;
        $stmt->execute();
        if($stmt->affected_rows > 0){
            $_SESSION['start_chat'] = $username;
            header("location: admin-chat");
        }else{
            $error = "Nope".$conn->error;
        }
         
     }
    }else{ 
     //create file
    $file_name = $username."-".$inquirer.$file_extension; 
    $chat_file = fopen("$file_name", 'a');
    fclose($chat_file);
    if($chat_file){
    $stmt = $conn->prepare("INSERT INTO admin(username, name, inquirer, response_file, status) VALUES(?, ?, ?, ?, ?)");
        //bind param
        $stmt->bind_param("sssss", $param_username, $param_name, $param_inquirer, $param_file, $param_status);
        //set param
        $param_username = $username;
        $param_name = $name;
        $param_inquirer = $inquirer;
        $param_file = $file_name;
        $param_status = $status;
        if($stmt->execute()){
            $_SESSION['start_chat'] = $username;
            header("location: admin-chat");
        }else{
            $error = "Connection to the chat system aborted";
        }
    }else{
        $error = "Connection could not be established. Please try again later";
    }
}
    
}
