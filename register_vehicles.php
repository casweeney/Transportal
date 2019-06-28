<?php
    if(!defined('register_vehicles')){
        exit('STOP DOING THAT');
    }
?>            
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-4">                        
                        
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <br>
                            <h4 class="text-center text-info">Register Vehicle</h4>
                            <?php
                              echo isset($error_msg) ? "<span class='text-danger'>{$error_msg}</span>" : "";
                              echo isset($success_msg) ? "<span class='text-success'>{$success_msg}</span>" : "";
                            ?>
                            <div class="card-body">
                            <form action="" method="post">
                                  <div class="form-group">
                                    <select name="vehicle_type" id="vehicle_type" class="form-control">
                                      <option>Type of Vehicle</option>
                                      <option>Truck</option>
                                      <option>Trailer</option>
                                      <option>Lorry</option>
                                      <option>Tipper</option>
                                      <option>Bus</option>
                                      <option>Mini Bus</option>
                                      <option>Shuttle</option>
                                      <option>Van</option>
                                      <option>Car</option>
                                      <option>Tricycle</option>
                                      <option>Motocycle</option>
                                    </select>
                                  </div>
                                  <div class="input-group">
                                    <input type="text" placeholder="Make" class="form-control" name="vehicle_make" id="vehicle_make">
                                    <input type="text" placeholder="Model" class="form-control" name="vehicle_model" id="vehicle_model">
                                  </div>
                                  <br>

                                  <div class="input-group">
                                    <input type="text" placeholder="Vehicle Colour" class="form-control" name="vehicle_colour" id="vehicle_colour">
                                    <input type="text" placeholder="Vehicle Age" class="form-control" name="vehicle_age" id="vehicle_age">
                                  </div>
                                  <br>

                                  <div class="form-group">
                                    <input type="text" placeholder="Vehicle Registration Number" name="vehicle_reg_num" class="form-control" id="vehicle_reg_no">
                                  </div>

                                  <div class="form-group">
                                    <input type="text" placeholder="Chasis Number" name="chasis_number" class="form-control" id="chasis_number">
                                  </div>

                                  <div class="form-group">
                                    <input type="text" placeholder="State Trans Number" name="state_trans_number" class="form-control" id="state_trans_number">
                                  </div>

                                  <div class="form-group">
                                    <input type="text" placeholder="Route Plied" name="route_plied" class="form-control" id="routePlied">
                                  </div>
                                  <center><button type="submit" name="veh_reg_btn" class="btn btn-info" style="padding-right: 20%; padding-left: 20%; border-radius: 2px;">Register Vehicle</button></center>
                                </form>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>