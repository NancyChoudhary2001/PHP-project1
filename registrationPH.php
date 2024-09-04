<?php
require 'database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];
    $passwordErrors = [];

    if($_POST['username'] === ''){
        $errors['username'] = 'Username required';
    }
    if($_POST['email'] == ''){
        $errors['email'] = 'Email required';
    }
    if($_POST['password'] == ''){
        $errors['password'] = 'Password required';
    } else {
        $password = $_POST['password'];
        if (strlen($password) < 8) {
            $passwordErrors[] = 'At least 8 characters long';
        }
        if (!preg_match('/[A-Z]/', $password)) {
            $passwordErrors[] = 'one uppercase letter';
        }
        if (!preg_match('/[a-z]/', $password)) {
            $passwordErrors[] = 'one lowercase letter';
        }
        if (!preg_match('/[0-9]/', $password)) {
            $passwordErrors[] = 'one number';
        }
        if (!preg_match('/[\W]/', $password)) {
            $passwordErrors[] = 'one special character';
        }
        
        if (!empty($passwordErrors)) {
            $errors['password'] = 'Password must include : ' . implode(', ', $passwordErrors) . '.';
        }
    }

    if(empty($errors)){
        $conn = getdb();
        $username = $_POST['username'];
        $email = $_POST['email'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user_info (Name, email, password) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPassword);

            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['status'] = 'success';
                $_SESSION['message'] = "User registered successfully.";
                header("Location: test.php");
                exit();
            } else {
                // Check for duplicate entry error
                if (mysqli_errno($conn) == 1062) {
                    $errors['email'] = 'Email already registered';
                    echo(json_encode($_SERVER['errors']));
                } else {
                    $message = "Error: " . mysqli_stmt_error($stmt);
                    $status = "error";
                }
            }

            mysqli_stmt_close($stmt);
        } else {
            $message = "Error preparing statement: " . mysqli_error($conn);
            $status = "error";
        }

        mysqli_close($conn);

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header("Location: test.php");
            exit();
        } else {
            header("Location: test.php?status=$status&message=" . urlencode($message));
            exit();
        }
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: test.php");
        exit();
    }
}
?>
