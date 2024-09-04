<?php
require 'database.php';

session_start();


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $error2 = [];
    if (empty($_POST['email1'])) {
        $error2['email2'] = "Email Required";
    }

    if (empty($error2)) {
        $conn = getdb();
        $email = $_POST['email2'];

        $sql = 'SELECT email FROM user_info WHERE email= ?'; // Corrected 'emial' to 'email'
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $email);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) > 0) {
                    $_SESSION['status'] = 'success';
                    $_SESSION['message'] = "Sent Email, Check your mail!";
                    header("Location: password_form.php");
                    exit();
                } else {
                    $error2['email2'] = 'Email not found';
                    
                }
            } else {
                $error2['email2'] = 'Error executing query';
            }
            mysqli_stmt_close($stmt);
        } else {
            $message = "Error preparing statement: " . mysqli_error($conn);
            $status = "error";
        }

        mysqli_close($conn);
        if (!empty($error2)) {
            $_SESSION['error2'] = $error2;
            header("Location: password_form.php");
            exit();
        }
    } else {
        $_SESSION['error2'] = $error2;
        header("Location: password_form.php");
        exit();
    }
}
?>
