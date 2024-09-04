<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recover Password Page</title>
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
     $error2 = isset($_SESSION['error2']) ? $_SESSION['error2'] : [];
    
   
     ?>
    <div class="container">
    <div class="wrapper">
        
    
        <div class="card card-info">
            <div class="card-header" >
                <h3 class="card-title"  >RECOVER PASSWORD</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" id="passwordForm" action="forget-password.php" method="post">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" name="email2" placeholder="Email">
                            
                            <small class="error-message"><?php echo isset($error2['email2']) ? htmlspecialchars($error2['email2']) : ''; ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info" style="background-color: blueviolet;border-color: blueviolet;">Submit</button>
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
        
        <?php if (!empty($error2)) { ?>
            <?php unset($_SESSION['error2']); ?>
        <?php } ?>
</script> 


<!-- <script src="validatePassword.js"></script> -->
    
</body>
</html>