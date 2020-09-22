<?php
include("db.php"); require_once('config.php');
$get_email = $message = $subject = $email_error = $subject_error = $message_error = $message_status = $single_status ="";
$errors = array();
  if(isset($_POST["send"])){
   $get_email = mysqli_real_escape_string($con, $_POST['email']);
$message =  mysqli_real_escape_string($con, $_POST['message']); 
 $subject =  mysqli_real_escape_string($con, $_POST['subject']); 
      if(!filter_var($get_email, FILTER_VALIDATE_EMAIL)){
        $email_error = "Invalid Email Adrress";
      }
      if(empty(trim($subject))){
     $subject_error = "Please Enter Your message subject";
      }
       if(empty(trim($message))){
     $message_error = "Please Enter Your message";
      }
      if(strlen($message) >100){
        $message_error = "Message too long";
        return false;
      }
      
      if(empty($email_errer) && empty($subject_error) && empty($email_errer)){
          $sql = "INSERT INTO messages(email, subject, message) VALUES('$get_email', '$subject', '$message')";
          $query = mysqli_query($con, $sql);
          
          if($query){
              $message_status = "<div class='alert alert-success alert-dismissible fade show'>
    <strong><i class='fas fa-check-circle'></i></strong> Your message has been sent successfully. Thank You for contacting GemasglamHome.
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
</div>"; $single_status = "Your message has been sent successfully. Thank You for contacting GemasglamHome.";
          } else{
             $message_status = "<div class='alert alert-danger alert-dismissible fade show'>
    <strong><i class='fas fa-exclamation-triangle'></i></strong> Oops, Message Not Sent, Please try again later!
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
</div>"; $single_status = "Oops, Message Not Sent, Please try again later!";
          }
      }
  }

  //receive user reviews
  $name = $name_error = $comment_error = $comment = $review_status = "";
  if(isset($_POST["review"])){
   $name = mysqli_real_escape_string($con, $_POST['reviewer']);
$comment =  mysqli_real_escape_string($con, $_POST['comment']); 
 
      if(empty(trim($name))){
        $name_error = "Invalid Name";
      }
      if(empty(trim($comment))){
     $comment_error = "Please Enter Your Review";
      }
      if(strlen($comment) >100){
        $comment_error = "Review too long";
        return false;
      }
      
      if(empty($name_error) && empty($comment_error)){
          $sql = "INSERT INTO review(name, comment) VALUES('$name', '$comment')";
          $query = mysqli_query($con, $sql);
          
          if($query){
              $review_status = "<div class='alert alert-success alert-dismissible fade show'>
    <strong><i class='fas fa-check-circle'></i></strong> Your Review has been posted successfully. Thank You for contacting GemasglamHome.
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
</div>"; $single_status = "Your Message has Been Sent";
          } else{
             $review_status = "<div class='alert alert-danger alert-dismissible fade show'>
    <strong><i class='fas fa-exclamation-triangle'></i></strong> Oops, Review Not Posted, Please try again later!
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
</div>"; $single_status = "Message Not Sent, please try agan later";
          }
      }
  }
  //fetch reviews
  $stmt = $conn->prepare("SELECT name, comment FROM review");
  $stmt->execute();
  $result = $stmt->get_result();
  $reviews = $result->fetch_all(MYSQLI_ASSOC);

?>