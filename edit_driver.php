            <div class="container">
                <div class="row text-center">
                    <div class="col-md-4">                        
                        
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <br>
                            <h4 class="text-center text-info">Edit Driver's Details</h4>
                            <?php
                              echo isset($error_msg) ? "<span class='text-danger'>{$error_msg}</span>" : "";
                              echo isset($success_msg) ? "<span class='text-success'>{$success_msg}</span>" : "";
                            ?>
                            <div class="card-body">
                            <form method="post" action=""  id="">
                                  <div class="input-group">
                                    <input type="text" placeholder="Firstname" class="form-control" name="update_fname" value="<?php echo $driver_fname; ?>" id="fname">
                                    <input type="text" placeholder="Lastname" class="form-control" name="update_lname" value="<?php echo $driver_lname; ?>" id="lname">
                                  </div>
                                  <br>
                                  <div class="form-group">
                                    <textarea style="resize: none;" class="form-control" name="update_address" id="address" placeholder="Address"><?php echo $driver_address; ?></textarea>
                                  </div>
                                  <div class="form-group">
                                    <select class="form-control" name="update_state_of_origin" id="stateOfOrigin">
                                        <option selected><?php echo $driver_soo; ?></option>
                                        <option>State of Origin</option>
                                        <option>Abia</option>
                                        <option>Anambra</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <input type="number" placeholder="Phone" class="form-control" name="update_phone" value="<?php echo $driver_phone; ?>" id="phone">
                                  </div>
                                  <div class="form-group">
                                    <select class="form-control" name="update_gender" id="gender">
                                        <option selected><?php echo $driver_gender; ?></option>
                                        <option>Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <input type="text" placeholder="Next of Kin" class="form-control" name="update_next_of_kin" value="<?php echo $driver_nok; ?>" id="nextOfKin">
                                  </div>
                                  <div class="form-group">
                                    <select class="form-control" name="update_id_type" id="idMode">
                                        <option selected><?php echo $driver_id_type; ?></option>
                                        <option>Valid ID Type</option>
                                        <option>Voters Card</option>
                                        <option>National ID</option>
                                        <option>International Passport</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <input type="text" placeholder="Identification Number" class="form-control" name="update_id_number" value="<?php echo $driver_id_no; ?>" id="idNumber">
                                  </div>
                                  <div class="form-group">
                                    <input type="text" placeholder="Guarantor's Name" class="form-control" name="update_guarantor_name" value="<?php echo $guarantor_name; ?>" id="guarantorName">
                                  </div>
                                  <div class="form-group">
                                    <select class="form-control" name="update_guarantor_id_mode" id="idMode">
                                        <option selected><?php echo $guarantor_id_type; ?></option>
                                        <option>Guarantor ID Type</option>
                                        <option>Voters Card</option>
                                        <option>National ID</option>
                                        <option>International Passport</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <input type="text" placeholder="Guarantor Identification Number" class="form-control" name="update_guarantor_id_number" value="<?php echo $guarantor_id_number; ?>" id="guarantorIdNumber">
                                  </div>
                                  <center><button name="edit_driver_btn" type="submit" class="btn btn-info" style="padding-right: 20%; padding-left: 20%; border-radius: 2px;">Update Details</button></center>
                            </form>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>