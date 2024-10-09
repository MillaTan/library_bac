<?php
ob_start();
session_start(); 
require '../../../includes/conn.php'; 

if (isset($_POST['signin'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $select_data = mysqli_query($conn, "SELECT * FROM tbl_users WHERE username = '$username'");
    $check = mysqli_num_rows($select_data);

    if ($check == 1) {
        $row = mysqli_fetch_assoc($select_data);
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $username;
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['user_role'] = $row['role']; 
            header("location: ../../dashboard/index.php");
        } else {
            $_SESSION['error'] = 'wrong_password';
            header("location: ../login.php");
        }
    } else {
        $_SESSION['error'] = 'wrong_username';
        header("location: ../login.php");
    }
}
?>
