<?php
    if(!defined('edit_profile')){
        exit('STOP DOING THAT');
    }
?>            
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-4">                        
                        
                    </div>
                    <div class="col-md-4">
                    <div style="border-radius: 0;" class="card" id="signup_card">
                            <br>
                            <h4 class="text-center text-info">Edit Profile</h4>
                            <div class="card-body">
                                <form action="/action_page.php">
                                  <div class="input-group">
                                    <input type="text" placeholder="Firstname" class="form-control" id="fname">
                                    <input type="text" placeholder="Lastname" class="form-control" id="lname">
                                  </div>
                                  <br>
                                  <div class="form-group">
                                    <input type="email" placeholder="Enter email address" class="form-control" id="email">
                                  </div>
                                  <div class="form-group">
                                    <input type="number" placeholder="Phone" class="form-control" id="cpwd">
                                  </div>
                                  <div class="form-group">
                                    <select class="form-control">
                                        <option>Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <textarea style="resize: none;" class="form-control" name="" id="" placeholder="Address"></textarea>
                                  </div>
                                  <div class="form-group">
                                    <select class="form-control">
                                        <option>Mode of Identification</option>
                                        <option>Voters Card</option>
                                        <option>National ID</option>
                                        <option>International Passport</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <input type="text" placeholder="Identification Number" class="form-control" id="id_number">
                                  </div>
                                  <center><button type="submit" class="btn btn-info" style="padding-right: 20%; padding-left: 20%; border-radius: 2px;">Update</button></center>
                                </form>
                            </div>
                        </div>
                        <br><br>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>