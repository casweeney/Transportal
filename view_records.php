<?php
    if(!defined('view_records')){
        exit('STOP DOING THAT');
    }
?>
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12">
                        <div class="card">
                            <br>
                            <h4 class="text-center text-info">Vehicle Registration Records</h4>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="myTable" class="table tabel-striped">
                                        <thead>
                                            <tr>
                                                <th>Vehicle type</th>
                                                <th>Vehicle model</th>
                                                <th>Vehicle registration number</th>
                                                <th>Registration date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                <?php
                                    foreach($records as $record){
                                        $vehicle_id = $record->id;
                                        $vehicle_type = $record->vehicle_type;
                                        $vehicle_model = $record->vehicle_model;
                                        $vehicle_reg_number = $record->vehicle_reg_number;
                                        $reg_date = $record->reg_date;
                                        echo"
                                        
                                            <tr>
                                                <td>{$vehicle_type}</td>
                                                <td>{$vehicle_model}</td>
                                                <td>{$vehicle_reg_number}</td>
                                                <td>{$reg_date}</td>
                                                <td>";
                                                    $sql = "SELECT * FROM drivers WHERE vehicle_id = '{$vehicle_id}'";
                                                    $result = Database::query($sql);
                                                    if($result->num_rows == 1){
                                                        echo"
                                                            <a href='access_granted.php?driver_details={$vehicle_id}' class='view btn btn-info btn-sm'>View</a>
                                                            <a href='access_granted.php?edit_driver={$vehicle_id}' class='edit btn btn-secondary btn-sm'>Edit</a>
                                                            <a href='access_granted.php?delete_driver={$vehicle_id}' class='del btn btn-danger btn-sm'>Delete</a>
                                                        ";
                                                    }else{
                                                        echo"
                                                            <a href='access_granted.php?attach_driver={$vehicle_id}' class='attach btn btn-success btn-sm'>Attach Driver</a>
                                                        ";
                                                    }
                                                    
                                                echo"
                                                </td>
                                            </tr>
                                        ";
                                    }
                                    ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>