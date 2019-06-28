
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-1">                        
                        
                    </div>
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h5 class="card-title text-white">Driver's Info</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <td style="font-weight: bold;">Name:</td>
                                                    <td><?php echo $driver_fname ." " .$driver_lname; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">Address:</td>
                                                    <td><?php echo $driver_address; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">Phone:</td>
                                                    <td><?php echo $driver_phone; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">Valid ID Type:</td>
                                                    <td><?php echo $driver_id_type; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <td style="font-weight: bold;">Gender:</td>
                                                    <td><?php echo $driver_gender; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">State of Origin:</td>
                                                    <td><?php echo $driver_soo; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">Next of Kin:</td>
                                                    <td><?php echo $driver_nok; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">ID Number:</td>
                                                    <td><?php echo $driver_id_no; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h5 class="text-info">Guarantor's Details</h5>
                                <div class="row">
                                    <div class="col-md-2">
                                        <img class="img-fluid" src="<?php echo $guarantor_image; ?>" alt="">
                                    </div>
                                    <div class="col-md-10">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <th>Guarantor's Name</th>
                                                    <th>Guarantor ID Type</th>
                                                    <th>Guarantor ID Number</th>
                                                </tr>
                                                <tr>
                                                    <td><?php echo $guarantor_name; ?></td>
                                                    <td><?php echo $guarantor_id_type; ?></td>
                                                    <td><?php echo $guarantor_id_number; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="access_granted.php?view_records" class="btn btn-info btn-sm"> <i class="fa fa-arrow-left"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        
                    </div>
                </div>
            </div>