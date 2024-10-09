<?php
session_start();
require '../../includes/conn.php'; 

$reg_id = $_GET['reg_id'];

if(isset($_POST['submit'])) {
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

  $select_user = mysqli_query($conn, "SELECT * FROM tbl_users WHERE username = '$username'");

  $check = mysqli_num_rows($select_user);

  if ($check == 0) {
    $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
    $insert_reg = mysqli_query($conn, "INSERT INTO tbl_users
    (firstname, middlename, lastname, role_id, contact, email, username, password, gender_id)
    VALUES
    ('$firstname', '$middlename', '$lastname',  '$role', '$contact', '$email', '$username', '$hashed_pass', '$gender')");

    $update_query = mysqli_query($conn, "UPDATE tbl_registrations SET status = 'Approved' WHERE reg_id = '$reg_id'");

    // $_SESSION['success_admit'] = true;
    // header("location: ../../email/approved.user.acc.php?reg_id=". $reg_id."&username=". $username);
    echo 2;

} else {
    echo 1;
    $_SESSION['username_exist'] = true;
    header("location: ../list.registration.php?reg_id=". $reg_id);
}
  
}

?>