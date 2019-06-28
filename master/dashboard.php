<?php
    if(!defined('dashboard')){
        exit('STOP DOING THAT');
    }
?>
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $number_of_users; ?></h3>

                <p>Total Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $number_of_reg_vehicles; ?></h3>

                <p>Registered Vehicles</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>Total Amount in the system</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>% charge per users</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
          <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title"><b>Recent Users</b></h3>

                  <div class="card-tools">
                    
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table id="myTable" class="table m-0">
                      <thead>
                      <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Reg Date</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                        foreach($recent_users as $user){
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
                              </tr>
                          ";
                        }
                      ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.card-footer -->
              </div>
          </div>
          </div>
        </div>
      </div>
    </section>