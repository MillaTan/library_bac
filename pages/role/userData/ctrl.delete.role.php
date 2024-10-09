<?php
require '../../../includes/conn.php';
// require '../../../includes/session.php';
$role_id = $_GET['role_id'];

$select_user = mysqli_query($conn, "SELECT * FROM tbl_roles WHERE role_id = '$role_id'");
$row = mysqli_fetch_array($select_user);
$delete_role = mysqli_query($conn, "DELETE FROM tbl_roles WHERE role_id = '$role_id'");

$_SESSION['deleted'] = true;
header("location: ../list.role.php");


?>