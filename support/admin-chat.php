<?php session_start(); require_once 'config.php';
$username = $typing = "";
$username = $_SESSION['start_chat'];
if(!isset($_SESSION['start_chat'])){
     header("location: admin");
    die();
}
if(isset($_REQUEST['end-chat'])){
    $stmt = $conn->prepare("UPDATE admin SET status = ? WHERE username = ?");
    $stmt->bind_param("ss", $param_status, $param_username);
    $param_status = "offline";
    $param_username = $username;
    $stmt->execute();
   session_unset();
    session_destroy();
    header("location: admin");
    exit();
}
?>
<html>
<head><title>Support</title>
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="gemasglam.ico">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.1/css/all.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="typing.js"></script>
    </head>
    <body>
         <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
        <div class="card mt-3">
            <div class="card-header y-1 bg-dark"> 
        <div class="row d-flex justify-content-between"> <div class="d-flex"> <h4><span class="text-warning
font-weight-bold"><?php
            echo "Welcome"."&nbsp;".$username; ?></span></h4> </div> <span id="time"></span> <div class="d-flex flex-column
text-sm-right"> <h5 class="mb-0"><a href="admin-chat?end-chat=1" class="btn btn-outline-light" onclick="return end()">End Chat</a></h5>
            </div> </div></div> 
            <div class="card-body" id="data">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <div id="adminResponse">  
                 </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">

               <div  id="userResponse"> </div>
              <p id="userTyping"></p>    
            </div>
            </div>  
            </div>     
            <div class="card-footer py-1"> 
               <form action="" method="post" id="chatForm">
                <div class="input-group">   
        <textarea name="query" id="adminQuery" class="form-control" rows="1" maxlength="100"></textarea>
        <input type="hidden" name="u" id="username" value="<?php echo $username; ?>">
        <input type="hidden" name="admin_response" id="trigger" value="trigger">           
                    <button type="submit" name="admin_response" class="btn btn-primary rounded-circle"><i class="fas fa-paper-plane"></i> </button>
                   </div>
        </form>
        </div>
        </div>
             </div>
        </div>
        </div>
 <script>
window.onload = function(){
 var read = setInterval( function(){
   var request = new XMLHttpRequest();
    request.open("GET", 'admin-support?start_chat=file', true); 
      request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200){
         document.getElementById('adminResponse').innerHTML = this.responseText;
     }
 } 
        if(document.getElementById('username').value == ""){
    clearInterval(read);
} 
request.send();}, 1000);
 var readUser = setInterval( function(){
    var userRequest = new XMLHttpRequest();
      userRequest.open("GET", 'admin-support?read_user=file', true);
        userRequest.onreadystatechange = function() {
         if(this.readyState === 4 && this.status === 200){
          document.getElementById('userResponse').innerHTML = this.responseText;
      } 
  } 
  if(document.getElementById('username').value == ""){
     clearInterval(readUser);
 } 
 userRequest.send();
  }, 1000);
   var clock = setInterval( function() {
     var time = new Date();
      var t = time.toLocaleTimeString();
         document.getElementById('time').innerHTML = t; 
           document.getElementById('time').style.color = "white";
            if(document.getElementById('username').value == ""){
                clearInterval(clock);
            } 
        }, 1000);
         var scroll =  window.setInterval(function() {
          var elem = document.getElementById('data');
           elem.scrollTop = elem.scrollHeight;
            if(document.getElementById('username').value == ""){
                clearInterval(scroll);
            }
        }, 5000);

         } 
         var form = document.getElementById('chatForm'); form.addEventListener("submit",function send(event) { event.preventDefault(); var query = document.getElementById('adminQuery').value; var trigger = document.getElementById('trigger').value; var sendRequest = new XMLHttpRequest(); sendRequest.open("POST", 'admin-support', true); sendRequest.setRequestHeader("Content-type", 'application/x-www-form-urlencoded'); sendRequest.send("query="+query+"&& admin_response="+trigger); sendRequest.onreadystatechange = function() {if(this.readyState === 2 && this.status === 200){ document.getElementById('adminQuery').value = ""; } } }); function end() { var conf = confirm("End Chat?");  if(!conf) { return false; }}
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>