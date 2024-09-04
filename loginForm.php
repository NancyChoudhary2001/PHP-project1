<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="ext.css">
    <style>
        .btn:hover {
            opacity: 0.5;
            transition: opacity 0.3s;
        }
        .error-message {
            visibility:visible;
            color: red;
            font-size: 0.875em;
            margin-top: 0.39em;
        }
        .alert-warning {
            margin-top: 5px;
            margin-left: 5px !important;
            margin-right: 5px !important;
            background-color: rgb(226, 216, 236);
            border-color: rgb(210, 192, 226);
            position: absolute;
            visibility: hidden;
        }


    </style>
</head>
<body>
<?php
    session_start();
    // // $errors = $_SESSION['errors'] ;
    $errors1 = isset($_SESSION['errors1']) ? $_SESSION['errors1'] : [];
    // die(json_encode($_SESSION['errors'])); 
    $msg = isset($_SESSION['msg']) ? $_SESSION['msg'] : [];

    ?>
    <div class="container" >
    <div class="wrapper">
        
    
        <div class="card card-info">
            <div class="card-header" >
                <h3 class="card-title" >LOGIN</h3>
            </div>
            <div class="alert alert-warning alert-dismissible fade show error-alert" role="alert" name= "msg">
                <strong>Warning!</strong><?php echo isset($msg['msg']) ? htmlspecialchars($msg['msg']) : ''; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="close-alert">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" id="loginForm" action="login.php" method="post">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3"  name="email1" placeholder="Email" >
                        
                            <small class="error-message"><?php echo isset($errors1['email1']) ? htmlspecialchars($errors1['email1']) : ''; ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" name="password1" placeholder="Password" >
                            
                            <small class="error-message"><?php echo isset($errors1['password1']) ? htmlspecialchars($errors1['password1']) : ''; ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <a href="password_form.php">Forget Password</a>
                            
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info" >Log in</button>
                    <!-- <button type="submit" class="btn btn-default float-right" style="background-color: blueviolet;border-color: blueviolet;color: white;">Login</button> -->
                </div>
                <!-- /.card-footer -->
            </form>
            <?php
            if (isset($_SESSION['status']) && isset($_SESSION['message'])) {
                echo "<p class='{$_SESSION['status']}'>" . htmlspecialchars($_SESSION['message']) . "</p>";
                unset($_SESSION['status']);
                unset($_SESSION['message']);
            }
            ?>
            
          </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        <?php if (!empty($msg)) { ?>
            var alertElement = document.querySelector('.alert-warning');
            alertElement.style.visibility = 'visible';
            alertElement.style.position = 'relative';

            var closeButton = document.getElementById('close-alert');
            closeButton.addEventListener('click', function() {
                alertElement.style.display = 'none';
                alertElement.style.position = 'absolute';
            });
        <?php } ?>

        <?php unset($_SESSION['errors1']); ?>
        <?php unset($_SESSION['msg']); ?>
    });
</script>



<!-- <script src="validateLogin.js"></script> -->
    
</body>
</html>