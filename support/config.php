<?php
define("SERVER_NAME", "localhost");
define("USER_NAME", "root");
define("PASSWORD", "gema");
define("DB_NAME", "gemaholt_botique");
$conn = new mysqli(SERVER_NAME, USER_NAME, PASSWORD, DB_NAME);
if($conn->connect_error){
    die();
}