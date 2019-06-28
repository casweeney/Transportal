
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php?dashboard" class="brand-link text-center">
      <span class="brand-text font-weight-light"><b>Welcome</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../img/logo.jpeg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $fullname; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?dashboard" class="nav-link active">
                  <i class="fa fa-dashboard nav-icon"></i>
                  <p><b>Dashboard</b></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?all_users" class="nav-link">
                  <i class="fa fa-group nav-icon"></i>
                  <p>All Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?view_records" class="nav-link">
                  <i class="fa fa-th-list nav-icon"></i>
                  <p>Vehicle Records</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?add_admin" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?logout" class="nav-link">
                  <i class="fa fa-cog nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
      