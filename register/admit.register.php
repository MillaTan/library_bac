<?php
require '../includes/conn.php';
// require '../includes/session.php';
$reg_id = $_GET['reg_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Validation Form</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php require '../includes/navbar.php'; ?>
</body>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Library System</span>
    </a>

    <!-- Sidebar -->
    <?php require '../includes/sidebar.php'; ?>
</body>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

                <!-- Default box -->
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">User Info</h3>
                            </div>
                            <form class="form" enctype="multipart/form-data" method="POST" action="userData/ctrl.admit.register.php?reg_id=<?php echo $reg_id?>">
                            <?php
                    $info = mysqli_query($conn, "SELECT * FROM tbl_registrations WHERE reg_id = '$reg_id'");
                    while ($row = mysqli_fetch_array($info)) {
                    ?>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="firstname">First Name</label>
                                            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $row['firstname']?>"
                                                placeholder="First Name" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="middlename">Middle Name</label>
                                            <input type="text" class="form-control" id="middlename" name="middlename" value="<?php echo $row['middlename']?>"
                                                placeholder="Middle Name">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="lastname">Last Name</label>
                                            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $row['lastname']?>"
                                                placeholder="Last Name" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-4">
                                        <label for="role">Role</label>
                                                <select required class="form-control select2" id="role" name="role">
                                                    <?php
                                                    $select_role = mysqli_query($conn, "SELECT * FROM tbl_roles WHERE role_id = '$row[role_id]'");
                                                    while ($row1 = mysqli_fetch_array($select_role)) {
                                                        ?>
                                                        <option value="<?php echo $row1['role_id'] ?>">
                                                            <?php echo $row1['role'] ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    $select_role = mysqli_query($conn, "SELECT * FROM tbl_roles WHERE NOT role_id = '$row[role_id]'");
                                                    while ($row1 = mysqli_fetch_array($select_role)) {
                                                        ?>
                                                        <option value="<?php echo $row1['role_id'] ?>">
                                                            <?php echo $row1['role'] ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                        <label for="gender">Gender</label>
                                                <select required class="form-control select2" id="gender" name="gender">
                                                    <?php
                                                    $select_gender = mysqli_query($conn, "SELECT * FROM tbl_gender WHERE gender_id = '$row[gender_id]'");
                                                    while ($row1 = mysqli_fetch_array($select_gender)) {
                                                        ?>
                                                        <option value="<?php echo $row1['gender_id'] ?>">
                                                            <?php echo $row1['gender'] ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    $select_gender = mysqli_query($conn, "SELECT * FROM tbl_gender WHERE NOT gender_id = '$row[gender_id]'");
                                                    while ($row1 = mysqli_fetch_array($select_gender)) {
                                                        ?>
                                                        <option value="<?php echo $row1['gender_id'] ?>">
                                                            <?php echo $row1['gender'] ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="email">Email address</label>
                                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']?>"
                                                placeholder="Enter email" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="contact">Contact Number</label>
                                            <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $row['contact']?>"
                                                placeholder="Contact Number" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                placeholder="Username" required autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Password" required autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Admit</button>
                                </div>
                                <?php
                        }
                        ?>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card-footer-->
        </div>
        <!-- /.card -->
        </section>
        <!-- /.content -->
        <!-- /.content
     /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a valid email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
</body>
</html>
