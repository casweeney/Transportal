
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-1">                        
                        
                    </div>
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h5 class="card-title text-white">User Info</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <td style="font-weight: bold;">Name:</td>
                                                    <td><?php echo $user_fname ." " .$user_lname; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">Address:</td>
                                                    <td><?php echo $user_address; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">Phone:</td>
                                                    <td><?php echo $user_phone; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">Mode of ID:</td>
                                                    <td><?php echo $user_mode_of_id; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <td style="font-weight: bold;">Gender:</td>
                                                    <td><?php echo $user_gender; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">State of Origin:</td>
                                                    <td><?php echo $user_soo; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">Next of Kin:</td>
                                                    <td><?php echo $user_nok; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">ID Number:</td>
                                                    <td><?php echo $user_id_no; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <h5 class="text-info">Registered Vehicles</h5>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Type</th>
                                                    <th>Make</th>
                                                    <th>Model</th>
                                                    <th>Colour</th>
                                                    <th>Age</th>
                                                    <th>Registration No</th>
                                                    <th>Chasis No</th>
                                                    <th>State Trans No</th>
                                                    <th>Route</th>
                                                </tr>
                                                <?php
                                                    $n=0;
                                                    foreach($all_vehicles as $vehicle){
                                                        $n++;
                                                        $veh_type = $vehicle->vehicle_type;
                                                        $veh_make = $vehicle->vehicle_make;
                                                        $veh_model = $vehicle->vehicle_model;
                                                        $veh_colour = $vehicle->vehicle_colour;
                                                        $veh_age = $vehicle->vehicle_age;
                                                        $veh_reg_no = $vehicle->vehicle_reg_number;
                                                        $veh_chasis_no = $vehicle->chasis_number;
                                                        $veh_stn = $vehicle->state_trans_number;
                                                        $veh_route = $vehicle->route_plied;
                                                        echo"
                                                        <tr>
                                                            <td>{$n}</td>
                                                            <td>{$veh_type}</td>
                                                            <td>{$veh_make}</td>
                                                            <td>{$veh_model}</td>
                                                            <td>{$veh_colour}</td>
                                                            <td>{$veh_age}</td>
                                                            <td>{$veh_reg_no}</td>
                                                            <td>{$veh_chasis_no}</td>
                                                            <td>{$veh_stn}</td>
                                                            <td>{$veh_route}</td>
                                                        </tr>
                                                        ";
                                                    }
                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <h5 class="text-info">Drivers Details</h5>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Driver Name</th>
                                                    <th>Driver ID Type</th>
                                                    <th>Driver ID Number</th>
                                                    <th>Driver Phone</th>
                                                </tr>
                                                <?php
                                                    $i=0;
                                                    foreach($all_drivers as $driver){
                                                        $i++;
                                                        $vehicle_id = $driver->vehicle_id;
                                                        $driver_fname = $driver->firstname;
                                                        $driver_lname = $driver->lastname;
                                                        $driver_valid_id_type = $driver->valid_id_type;
                                                        $driver_id_no = $driver->id_number;
                                                        $driver_phone = $driver->phone;

                                                        echo"
                                                        <tr>
                                                            <td>{$i}</td>
                                                            <td>{$driver_fname} {$driver_lname}</td>
                                                            <td>{$driver_valid_id_type}</td>
                                                            <td>{$driver_id_no}</td>
                                                            <td>{$driver_phone}</td>
                                                        </tr>
                                                        ";
                                                    }
                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="index.php?all_users" class="btn btn-info btn-sm"> <i class="fa fa-arrow-left"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        
                    </div>
                </div>
            </div>