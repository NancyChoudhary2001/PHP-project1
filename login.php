<?php
require 'database.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors1 = [];
    $msg = [];

    if (empty($_POST['email1'])) {
        $errors1['email1'] = 'Email required';
    }
    if (empty($_POST['password1'])) {
        $errors1['password1'] = 'Password required';
    }

    if (empty($errors1)) {
        $conn = getdb();

        $email = $_POST['email1'];
        $password = $_POST['password1'];

        $sql = 'SELECT password FROM user_info WHERE email = ?';
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $email);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_bind_result($stmt, $storedHashedPassword);
                $st = mysqli_stmt_fetch($stmt);

                if ($st && password_verify($password, $storedHashedPassword)) {
                    $_SESSION['status'] = 'success';
                    $_SESSION['message'] = "Login successful.";
                    header("Location: loginForm.php");
                    exit();
                } else {
                    $msg['msg'] = 'Invalid email or password';
                    
                }
            } else {
                $msg['msg'] = "Error: " . mysqli_stmt_error($stmt);
            }

            mysqli_stmt_close($stmt);
        } else {
            $msg['msg'] = "Error preparing statement: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    } 

    if (!empty($errors1)) {
        $_SESSION['errors1'] = $errors1;
    }

    if (!empty($msg)) {
        $_SESSION['msg'] = $msg;
       
    }

    header("Location: loginForm.php");
    exit();
}
?>
