<?php
require '../../includes/conn.php';
// require '../../includes/session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Librarian | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <?php require '../../includes/link.php'; ?>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <?php require '../../includes/navbar.php'; ?>
    <!-- /.navbar -->

    <!-- Sidebar -->
    <?php require '../../includes/sidebar.php'; ?>
    <!-- /.sidebar -->

    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Users List</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Users List</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Users List and Info</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form method="GET">
            <div class="row justify-content-center">
              <div class="form-group col-4">
                <input type="text" class="form-control" id="firstname" name="search"
                  placeholder="Search first name, last name, ...">
              </div>
              <div class="form-group-append">
                <span class="form-group-text"><button class="btn btn-primary">Search</button></span>
              </div>
            </div>
          </form>
        </div>
        
        <div class="card-body ">
          <table id="example1" class="table table-bordered">
            <thead>
              <tr>
                <th>Fullname</th>
                <th>Role</th>
                <th>Campus</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (isset($_GET['search'])) {
                $search = mysqli_real_escape_string($conn, $_GET['search']);

                $info = mysqli_query($conn, "SELECT *, CONCAT(tbl_users.lastname, ', ', tbl_users.firstname, ' ', tbl_users.middlename) AS fullname FROM tbl_users
                              LEFT JOIN tbl_roles ON tbl_roles.role_id = tbl_users.role_id
                                LEFT JOIN tbl_campus ON tbl_campus.campus_id = tbl_users.campus_id
                                        WHERE (lastname LIKE '%$search%'
                                        OR firstname LIKE '%$search%'
                                        OR middlename LIKE '%$search%'
                                        OR role LIKE '%$search%'
                                        OR campus LIKE '%$search%')");
                while ($row = mysqli_fetch_array($info)) {
                  ?>
                  <tr>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['role']; ?></td>
                    <td><?php echo $row['campus']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                    <td><a href="edit.users.php?user_id=<?php echo $row['user_id']; ?>" type="button"
                        class="btn my-1 btn-info">Update</a>
                      <?php if (($row['role'] == 'Librarian')) { ?>
                        <a href="../librarian/add.librarian.info.php?user_id=<?php echo $row['user_id'] ?>"
                          class="btn my-1 btn-info">Librarian Info</a>
                        <button type="button" class="btn my-1 btn-primary" data-toggle="modal"
                          data-target="#confirmModal<?php echo $row['user_id']; ?>">Send
                          Email</button>
                      <?php } ?>
                      <button type="button" class="btn my-1 btn-danger" data-toggle="modal"
                        data-target="#modal-default<?php echo $row['user_id']; ?>">Delete</a>
                    </td>
                  </tr>
                  <div class="modal fade" id="modal-default<?php echo $row['user_id']; ?>" tabindex="-1"
                    aria-labelledby="modal-defaultLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modal-defaultLabel">Confirm Delete</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"></span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p> Are you sure you want to delete
                            <b><?php echo $row['fullname'] ?></b>
                            account?
                          </p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                          <a href="userData/ctrl.delete.users.php?user_id=<?php echo $row['user_id']; ?>" type="button"
                            class="btn btn-danger">Delete</a>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <div class="modal fade" id="confirmModal<?php echo $row['user_id']; ?>" tabindex="-1"
                    aria-labelledby="confirmModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="confirmModalLabel">Confirm Send</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"></span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Are you sure you want to send <b><?php echo $row['email'] ?></b> an
                            email?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          <a href="../email/send.email.php?user_id=<?php echo $row['user_id']; ?>" type="button"
                            class="btn btn-info">Send</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                }
              }
              ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.content -->
    </div>
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


</body>

<?php require '../../includes/script.php'; ?>

</html>