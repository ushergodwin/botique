<?php session_start(); require_once 'config.php';
if(isset($_REQUEST["id"])) {
		$code = trim($_GET['id']);
		$stmt = $conn->prepare("SELECT email FROM verify WHERE code = ?");
		$stmt->bind_param("s", $param_id);
		$param_id = $code;
		$stmt->execute();
		$result = $stmt->get_result();
		$email = $result->fetch_assoc();
		$user_email = $email['email'];
		//update account status
		$stmt = $conn->prepare("UPDATE users SET account_type = ? WHERE email = ?");
		$stmt->bind_param("ss", $param_status, $param_email);
		$param_status = "user";
		$param_email = $user_email;
		$stmt->execute();
		if($stmt->affected_rows >0){
			$_SESSION['verified'] = true;
			$stmt->prepare("DELETE FROM verify WHERE email =?");
			$stmt->bind_param("s", $param_email);
			$param_email = $user_email;
			$stmt->execute();
			header("location: user-login.php");

		}else{
			echo "The activation Link expired or your account is activated already";
		}
	}
	if(isset($_REQUEST['request'])){
       $reset_id = trim($_GET['request']);
       if(!empty($reset_id)){
       	$stmt = $conn->prepare("SELECT email FROM verify WHERE code = ?");
       	$stmt->bind_param("s", $param_reset_id);
       	$param_reset_id = $reset_id;
       	$stmt->execute();
       	$result = $stmt->get_result();
       	$fetched_email = $result->fetch_assoc();
       	$user_email = $fetched_email['email'];
       	if(!empty($user_email)){
       	$_SESSION['email'] = $user_email;	
       	 header("location: reset.php");
       	}else{
       		echo "Password Reset Request Not Confirmed";
       	}
	}else{
		echo "The request is invalid";
	}
}
if(!isset($_REQUEST['id']) || !isset($_REQUEST['request'])){
	echo "<h2>ERROR 403 Forbidden: Access Denied</h2>";
    die();
}
$conn->close();
?>