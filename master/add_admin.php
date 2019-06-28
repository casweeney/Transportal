<?php
    if(!defined('add_admin')){
        exit('STOP DOING THAT');
    }
?>
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?dashboard">Home</a></li>
              <li class="breadcrumb-item active">New Admin</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <?php
              echo isset($success_msg) ? "<p class='text-success text-center'>{$success_msg}</p>": "";
              echo isset($error_msg) ? "<p class='text-danger text-center'>{$error_msg}</p>": "";
            ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Admin</h3>
              </div>
              <form role="form" method="POST" action="">
                <div class="card-body">
                  <div class="form-group">
                    <input type="text" name="fullname" class="form-control" id="exampleInputEmail1" placeholder="Fullname">
                  </div>

                  <div class="form-group">
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                  </div>

                  <div class="form-group">
                    <input type="phone" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Phone">
                  </div>

                  <div class="form-group">
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>

                  <div class="form-group">
                    <input type="password" name="cpassword" class="form-control" id="exampleInputPassword1" placeholder="Retype Password">
                  </div>

                  <button type="submit" name="add_admin_btn" class="btn btn-primary btn-block">Add</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-3"></div>
        </div>
      </div>
    </div>