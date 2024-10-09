<?php
session_start();
require '../../includes/conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Library System | Online Registration</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
  <style>


    .login-page {
      background-image: url('../../dist/img/1.jpg');
      background-size: cover;
    }

    .card {
      background-image: url("../../dist/img/white.jpg");
      height: 460px;
      width: 500px;
      border-radius: 15px;
      overflow: auto;
      object-fit: fill;
    }

    .error {
      color: red;
    }

    .error input {
      border-color: red;
    }
  </style>
</head>

<body class="hold-transition login-page">
  <div class="register-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-danger">
      <div class="card-header text-center">
        <div class="sfac-logo">
          <img src="../../dist/img/sfac.png" alt="sfac" style="width:80px;height:80px;">
        </div>
        <a href="https://stfrancis.edu.ph/" style="color: black;">
          <h4><b>Saint Francis of Assisi College</b></h4>
        </a>
        <p>Online Library System</p>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Fill up this form to register.</p>

        <form action="userData/ctrl.add.register.php" method="post">
          <div class="row">
            <div class="col-md-4 form-group mb-3">
              <label>First Name</label>
              <input type="text" name="firstname" class="form-control">

            </div>
            <div class="col-md-4 form-group mb-3">
              <label>Middle Name</label>
              <input type="text" name="middlename" class="form-control">

            </div>
            <div class="col-md-4 form-group mb-3">
              <label>Last Name</label>
              <input type="text" name="lastname" class="form-control">

            </div>
          </div>
         
          <div class="row">
            <div class="col-md-8 form-group mb-3">
              <label>Email</label>
              <input type="email" name="email" class="form-control">

            </div>
            <div class="col-md-4 form-group mb-3">
              <label>Contact Number</label>
              <input type="text" name="contact" class="form-control">

            </div>
          </div>
          <div class="row mt-3">
            <div class="col">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" required>
                <label for="remember">
                  I agree that the data collected from this online registration shall be subjected to the school's <a class="text-primary">Data Privacy Policy</a>.
                </label>
              </div>
            </div>
          </div>
            <!-- /.col -->
          <div class="row mt-3 float-right">
            <div class="col-auto">
              <a href="../login/login.php" class="btn btn-danger">Log In</a>
              <button type="submit" name="submit" class="btn btn-primary">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
  <?php
  ?>
  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- Toastr -->
  <script src="../../plugins/toastr/toastr.min.js"></script>
  <script>
    <?php
      if ($_SESSION['success_register']) {
    ?>
    toastr.success('Registration Success!<p><strong> Please wait for the email.</strong></p>');
    <?php
      }

      unset($_SESSION['success_register']);
    ?>
  </script>
</body>

</html>