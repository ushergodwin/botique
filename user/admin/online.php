<?php require_once 'config.php';
if(isset($_SESSION['username'])){
    $email = $_SESSION['username'];
    $stmt = $conn->prepare("SELECT * FROM online WHERE email = ?");
    $stmt->bind_param("s", $param_email);
    $param_email = $email;
    $stmt->execute();
    $result = $stmt->get_result();
    $record = $result->fetch_assoc();
    if(!empty($record)){
     $stmt = $conn->prepare("UPDATE online SET status = ? WHERE email = ?");
    $stmt->bind_param("ss", $param_status, $param_email);
    $param_email = $email;
    $param_status = "online";
    $stmt->execute();
    }else{
        $stmt = $conn->prepare("SELECT firstname, lastname from users where email = ?");
        $stmt->bind_param("s", $param_email);
        $param_email = $email;
        $stmt->execute();
        $result = $stmt->get_result();
        $recods = $result->fetch_assoc();
        $firstname = $recods['firstname'];
        $lastname = $recods['lastname'];
    $stmt = $conn->prepare("INSERT INTO online(email, firstname, lastname, status) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $param_email, $param_fname, $param_lname, $param_status);
    $param_email = $email;
    $param_fname = $firstname;
    $param_lname = $lastname;
    $param_status = "online";
    $stmt->execute();
}
}
if(isset($_SESSION['admin'])){
    $email = $_SESSION['admin'];
    $stmt = $conn->prepare("SELECT * FROM online WHERE email = ?");
    $stmt->bind_param("s", $param_email);
    $param_email = $email;
    $stmt->execute();
    $result = $stmt->get_result();
    $record = $result->fetch_assoc();
    if(!empty($record)){
     $stmt = $conn->prepare("UPDATE online SET status = ? WHERE email = ?");
    $stmt->bind_param("ss", $param_status, $param_email);
    $param_email = $email;
    $param_status = "online";
    $stmt->execute();
    }else{
        $stmt = $conn->prepare("SELECT firstname, lastname from users where email = ?");
        $stmt->bind_param("s", $param_email);
        $param_email = $email;
        $stmt->execute();
        $result = $stmt->get_result();
        $recods = $result->fetch_assoc();
        $firstname = $recods['firstname'];
        $lastname = $recods['lastname'];
    $stmt = $conn->prepare("INSERT INTO online(email, firstname, lastname, status) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $param_email, $param_fname, $param_lname, $param_status);
    $param_email = $email;
    $param_fname = $firstname;
    $param_lname = $lastname;
    $param_status = "online";
    $stmt->execute();
}
}
if(isset($_SESSION['staff'])){
    $email = $_SESSION['staff'];
    $stmt = $conn->prepare("SELECT * FROM online WHERE email = ?");
    $stmt->bind_param("s", $param_email);
    $param_email = $email;
    $stmt->execute();
    $result = $stmt->get_result();
    $record = $result->fetch_assoc();
    if(!empty($record)){
     $stmt = $conn->prepare("UPDATE online SET status = ? WHERE email = ?");
    $stmt->bind_param("ss", $param_status, $param_email);
    $param_email = $email;
    $param_status = "online";
    $stmt->execute();
    }else{
        $stmt = $conn->prepare("SELECT firstname, lastname from users where email = ?");
        $stmt->bind_param("s", $param_email);
        $param_email = $email;
        $stmt->execute();
        $result = $stmt->get_result();
        $recods = $result->fetch_assoc();
        $firstname = $recods['firstname'];
        $lastname = $recods['lastname'];
    $stmt = $conn->prepare("INSERT INTO online(email, firstname, lastname, status) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $param_email, $param_fname, $param_lname, $param_status);
    $param_email = $email;
    $param_fname = $firstname;
    $param_lname = $lastname;
    $param_status = "online";
    $stmt->execute();
}
}