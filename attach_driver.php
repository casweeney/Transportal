            <div class="container">
                <div class="row text-center">
                    <div class="col-md-4">                        
                        
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <br>
                            <h4 class="text-center text-info">Register Driver to a Vehicle</h4>
                            <?php
                              echo isset($error_msg) ? "<span class='text-danger'>{$error_msg}</span>" : "";
                              echo isset($success_msg) ? "<span class='text-success'>{$success_msg}</span>" : "";
                            ?>
                            <div class="card-body">
                            <form method="post" action=""  id="" enctype="multipart/form-data">
                                  <div class="input-group">
                                    <input type="text" placeholder="Firstname" class="form-control" name="fname" id="fname">
                                    <input type="text" placeholder="Lastname" class="form-control" name="lname" id="lname">
                                  </div>
                                  <br>
                                  <div class="form-group">
                                    <textarea style="resize: none;" class="form-control" name="address" id="address" placeholder="Address"></textarea>
                                  </div>
                                  <div class="form-group">
                                    <select class="form-control" name="state_of_origin" id="stateOfOrigin">
                                        <option>State of Origin</option>
                                        <?php
                                            $state_array = array("Abia", "Adamawa", "Akwa ibom", "Anambra", "Bauchi", "Bayelsa", "Benue", "Borno", "Cross River", "Delta", "Ebonyi", "Edo", "Ekiti", "Enugu", "Gombe", "Imo", "Jigawa", "Kaduna", "Kano", "Katsina", "Kebbi", "Kogi", "Kwara", "Lagos", "Nasarawa", "Niger", "Ogun", "Ondo", "Osun", "Oyo", "Plateau", "Rivers", "Sokoto", "Taraba", "Yobe", "Zamfara", "FCT Abuja");
                                            foreach($state_array as $state){
                                                echo "<option>{$state}</option><br>";
                                            }
                                        ?>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <input type="number" placeholder="Phone" class="form-control" name="phone" id="phone">
                                  </div>
                                  <div class="form-group">
                                    <select class="form-control" name="gender" id="gender">
                                        <option>Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <input type="text" placeholder="Next of Kin" class="form-control" name="next_of_kin" id="nextOfKin">
                                  </div>
                                  <div class="form-group">
                                    <select class="form-control" name="id_type" id="idMode">
                                        <option>Valid ID Type</option>
                                        <option>Voters Card</option>
                                        <option>National ID</option>
                                        <option>International Passport</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <input type="text" placeholder="Identification Number" class="form-control" name="id_number" id="idNumber">
                                  </div>
                                  <div class="form-group">
                                    <input type="text" placeholder="Guarantor's Name" class="form-control" name="guarantor_name" id="guarantorName">
                                  </div>
                                  <div class="form-group">
                                    <select class="form-control" name="guarantor_id_mode" id="idMode">
                                        <option>Guarantor ID Type</option>
                                        <option>Voters Card</option>
                                        <option>National ID</option>
                                        <option>International Passport</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <input type="text" placeholder="Guarantor Identification Number" class="form-control" name="guarantor_id_number" id="guarantorIdNumber">
                                  </div>
                                  <div class="form-group">
                                    <label for="">Guarantor's Image</label>
                                    <input type="file" placeholder="Guarantor photo" class="form-control" name="file" id="guarantorIdNumber">
                                  </div>
                                  <center><button name="add_driver_btn" type="submit" class="btn btn-info" style="padding-right: 20%; padding-left: 20%; border-radius: 2px;">Add Driver</button></center>
                            </form>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>