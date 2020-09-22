<?php
$servername = "localhost";
$username = "root";
$password = "gema";
$dbname = "gemaholt_botique";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    echo"Opps, Connection failed";
    die();
}
?>