<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    </style>
</head>
<body>
    <?php
    session_start();
    // $errors = $_SESSION['errors'] ;
    $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
    // die(json_encode($_SESSION['errors'])); 
    // foreach($_SESSION['errors'] as $key => $error) {
    //     die($key);
    // }
    ?>

  
    <div class="container">
    <div class="wrapper">
        <div class="card card-info">
            <div class="card-header" >
                <h3 class="card-title" >Registration</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" id="registrationForm" action="registrationPH.php" method="post"> 
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputName3" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10 ">
                            <input type="text" class="form-control" id="inputName3" name="username" placeholder="Name" >
                            <small class="error-message"><?php echo isset($errors['username']) ? htmlspecialchars($errors['username']) : ''; ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email">
                            <small class="error-message"><?php echo isset($errors['email']) ? htmlspecialchars($errors['email']) : ''; ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10 ">
                            <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
                            <small class="error-message"><?php echo isset($errors['password']) ? htmlspecialchars($errors['password']) : ''; ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <p class="info">Already registered? <a href="loginForm.php">Log in</a>.</p>
                            
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info" >Register</button>
                    <!-- <button type="submit" class="btn btn-default float-right" style="background-color: blueviolet;border-color: blueviolet;color: white;">Login</button> -->
                </div>
                <!-- /.card-footer -->

            </form>
            <?php
            if (isset($_SESSION['status']) && isset($_SESSION['message'])) {
                echo "<p class='{$_SESSION['status']}'>" . htmlspecialchars($_SESSION['message']) . "</p>";
                // Clear the message from the session
                unset($_SESSION['status']);
                unset($_SESSION['message']);
            }
            ?>
          </div>
    </div>
</div>
<script>

        <?php if (!empty($errors)) { ?>
            <?php unset($_SESSION['errors']); ?>
        <?php } ?>
</script>


<!-- <script src="validate.js"></script> -->
    
</body>
</html>