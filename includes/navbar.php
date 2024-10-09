<!-- Navbar -->

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../dashboard/index.php" class="nav-link">Home</a>
      </li>
    </ul>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <div class="dropdown-divider"></div>
        <div class="dropdown-item">
          <div class="media">
            <?php
            
            ?>
            <div class="media-body">
              <h3 class="dropdown-item-title">
                <b>
                  <?php echo $_SESSION['fullname']; ?>
                </b>
                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm"><?php echo $row['email'] ?></p>
              <p class="text-sm text-muted"><i class="far fa-user mr-1"></i><?php echo $row['username'] ?></p>
            </div>
          </div>
        </div>
        <div class="dropdown-divider"></div>
        <a href="../users/edit.users.php" class="dropdown-item">
          <i class="fas fa-user mr-2"></i> Edit Account
        </a>
        <div class="dropdown-divider"></div>
        <a href="../login/usersData/ctrl.logout.php" class="dropdown-item dropdown-footer"><b>Log Out</b></a>
      </div>
    <!-- Right navbar links -->

    <!-- Messages Dropdown Menu -->

  </nav>
  
