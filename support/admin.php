<?php require 'create-admin-chat.php'?>
<html>
<head><title>Admin - Support</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="gemasglam.ico">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.1/css/all.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <style type="text/css"> .form-control{
            border-radius: 50px;
        }</style>
    </head>
    <body>
<div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-7 col-xl-7">
        <div class="card mt-3">
            <div class="card-header py-1 bg-dark text-light"><h4>Fill in the details bellow and start chat</h4></div>
        <div class="card-body">
        <form action="" method="post" autocomplete="off">
            <div class="form-group">
            <input type="text" name="adminname" placeholder="username" class="form-control">
            </div>
            <div class="form-group">
            <input type="text" name="name" placeholder="full name" class="form-control">
            </div>
            <div class="form-group">
            <input type="text" name="username" placeholder="enter name of the user to chat with" class="form-control">
            </div>
            <div class="form-group">
            <button type="submit" name="create_chat" class="btn btn-primary">Start Chat</button>
            </div>
            </form>
            <?php echo $error; ?>
        </div>
                </div>
        </div>
               <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5 text-danger"> 
               <div class="card mt-3">
            <div class="card-header bg-dark text-light py-1"><h4>Online Users For Inquiries</h4></div>
             <div class="card">
            <div id="current"> </div>
             </div>
            </div>
            </div>  

        </div>
        </div>
 <script>
        window.onload = function() {
            var online = setInterval( function() {
                var request = new XMLHttpRequest();
                request.open("GET", 'online?online=users', true);
                request.onreadystatechange = function() {
                    if(this.readyState === 4 && this.status === 200) {
                     document.getElementById('current').innerHTML = this.responseText;
                    }
                }
                request.send();
             
            }, 3000);
        }
        </script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>    
    </body>
</html>