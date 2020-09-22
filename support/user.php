<?php require 'create-chat.php'?>
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
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <style type="text/css">
        .form-control{
            border-radius: 50px;
        }
    </style>
    </head>
    <body>
        <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                <div class="card mt-3">
                    <div class="card-header bg-dark text-light"><h4>Fill in the fields bellow and start chat</h4></div>
        <div class="card-body">       
        <form action="" method="post" autocomplete="off">
            <div class="form-group">
            <input type="text" name="username" placeholder="username" class="form-control" required="required">
            </div>
            <div class="form-group">
            <input type="text" name="name" placeholder="full name" class="form-control" required="required">
            </div>
            <div class="form-group">
            <input type="email" name="email" placeholder="email" class="form-control" required="required">
            </div>
            <input type="checkbox" name="consent" id="consent" class="custom-checkbox" required><span class="text-secondary font-weight-bold">By using this service, you provide explicit consent for GemasGlam Home to collect and process the personal data you submit and/or any other personal data that may be necessary to support helping you with your request(s). You also agree to our <a href="#">Privacy Policy</a>, <a href="#">Terms of Service</a> and any related policies.</span>
            <div algin="right">
            <button type="submit" name="create_chat" class="btn btn-primary">Start Chat</button>
            </div>
            </form>
                </div>
                </div>
            <?php echo $error; ?>
            </div>
        </div>
        </div>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>