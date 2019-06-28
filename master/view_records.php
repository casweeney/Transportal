<?php
    if(!defined('view_records')){
        exit('STOP DOING THAT');
    }
?>    
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="text-center">Vehicle Registration Records</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admindashboard.html">Home</a></li>
              <li class="breadcrumb-item active">View Records</li>
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
                  <table id="myTable" class="table table-bordered m-0">
                    <thead>
                    <tr>
                      <th>User ID</th>
                      <th>Vehicle type</th>
                      <th>Vehicle model</th>
                      <th>Vehicle registration number</th>
                      <th>Registration date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                      foreach($records as $record){
                        $user_id = $record->user_id;
                        $vehicle_type = $record->vehicle_type;
                        $vehicle_model = $record->vehicle_model;
                        $vehicle_reg_number = $record->vehicle_reg_number;
                        $reg_date = $record->reg_date;

                        echo"
                          <tr>
                            <td>{$user_id_prefix}{$user_id}</td>
                            <td>{$vehicle_type}</td>
                            <td>{$vehicle_model}</td>
                            <td>{$vehicle_reg_number}</td>
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
          </div>
        </div>
      </div>
    </section>