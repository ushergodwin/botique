<?php
// Initialize the session
session_start();
//update online users
require_once 'config.php';
if(isset($_SESSION['username'])){
    $email = $_SESSION['username'];
    $stmt = $conn->prepare("UPDATE online SET status = ? WHERE email = ?");
    $stmt->bind_param("ss", $param_status, $param_email);
    $param_email = $email;
    $param_status = "offline";
    $stmt->execute();
}
if(isset($_SESSION['admin'])){
    $email = $_SESSION['admin'];
    $stmt = $conn->prepare("UPDATE online SET status = ? WHERE email = ?");
    $stmt->bind_param("ss", $param_status, $param_email);
    $param_email = $email;
    $param_status = "offline";
    $stmt->execute();
}
if(isset($_SESSION['staff'])){
    $email = $_SESSION['staff'];
    $stmt = $conn->prepare("UPDATE online SET status = ? WHERE email = ?");
    $stmt->bind_param("ss", $param_status, $param_email);
    $param_email = $email;
    $param_status = "offline";
    $stmt->execute();
}
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to index page
header("Location: https://gemasglam.com/");
exit;
?>
