<?php
    if(!defined('all_users')){
        exit('STOP DOING THAT');
    }
?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="text-center">All Users</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All Users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
          <div class="card">
                <!-- /.card-header -->
                <div class="card-body p-0">
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                      <thead>
                      <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Reg Date</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                        foreach($all_users as $user){
                          $id = $user->id;
                          $firstname = $user->firstname;
                          $lastname = $user->lastname;
                          $email = $user->email;
                          $phone = $user->phone;
                          $reg_date = $user->reg_date;

                          echo"
                            <tr>
                              <td>{$user_id_prefix}{$id}</td>
                              <td>{$firstname} {$lastname}</td>
                              <td>{$email}</td>
                              <td>{$phone}</td>
                              <td>{$reg_date}</td>
                              <td>
                                  <a href='index.php?details={$id}' class='btn btn-info btn-sm'>Details</a>
                                  <!--<a href='index.php?del={$id}' class='btn btn-danger btn-sm'>Delete</a>-->
                              </td>
                            </tr>
                          ";
                        }
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.card-footer -->
              </div>
          </div>
        </div>
      </div>
    </section>