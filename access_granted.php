<?php
    require_once("app/session.php");
    require_once("app/controller.php");
    if(!$user_session->is_logged_in()){
        Method::redirect_to("signin.php");
        die("Unauthorized Brute force");
    }else{
        define('dashboard', TRUE);
        define('edit_profile', TRUE);
        define('register_vehicles', TRUE);
        define('view_records', TRUE);
        $user = User::find_by_id($user_session->user_id);
        $id = Database::escaped_string($user->id);
        $firstname = Database::escaped_string($user->firstname);
        $lastname = Database::escaped_string($user->lastname);
        $phone = Database::escaped_string($user->phone);
        $email = Database::escaped_string($user->email);
        $id_number = Database::escaped_string($user->id_number);
        $date = date("d-m-Y");
        $user_id_prefix = "ATP0";
        //
        $sql = "SELECT * FROM vehicles WHERE user_id = {$id}";
        $result = Database::query($sql);
        $number_of_reg_vehicles = $result->num_rows;
        //Register new vehicle
        if(isset($_POST['veh_reg_btn'])){
            $vehicle_type = Database::escaped_string($_POST['vehicle_type']);
            $vehicle_make = Database::escaped_string($_POST['vehicle_make']);
            $vehicle_model = Database::escaped_string($_POST['vehicle_model']);
            $vehicle_colour = Database::escaped_string($_POST['vehicle_colour']);
            $vehicle_age = Database::escaped_string($_POST['vehicle_age']);
            $vehicle_reg_num = Database::escaped_string($_POST['vehicle_reg_num']);
            $chasis_number = Database::escaped_string($_POST['chasis_number']);
            $state_trans_number = Database::escaped_string($_POST['state_trans_number']);
            $route_plied = Database::escaped_string($_POST['route_plied']);

            if(empty($vehicle_make) || empty($vehicle_model) || empty($vehicle_colour) || empty($vehicle_age) || empty($vehicle_reg_num) || empty($chasis_number) || empty($state_trans_number) || empty($route_plied)){
                $error_msg = "No field should be empty";
            }
            elseif($vehicle_type === "Type of Vehicle"){
                $error_msg = "Select Vehicle Type";
            }else{
                $sql = "SELECT vehicle_reg_number FROM vehicles WHERE vehicle_reg_number = {$vehicle_reg_num}";
                $result = Database::query($sql);
                if($result->num_rows == 1){
                    $error_msg = "Sorry! this vehicle has already been registered";
                }else{
                    $sql = "INSERT INTO vehicles(user_id,vehicle_type,vehicle_make,vehicle_model,vehicle_colour,vehicle_age,vehicle_reg_number,chasis_number,state_trans_number,route_plied,reg_date) VALUES('$id','$vehicle_type','$vehicle_make','$vehicle_model','$vehicle_colour','$vehicle_age','$vehicle_reg_num','$chasis_number','$state_trans_number','$route_plied','$date')";
                    $result = Database::query($sql);
                    $result ? $success_msg = "Registration Successful" : $error_msg = "Registration failed";
                }
            }
        }
        //Getting the registered Driver's ID
        $sql = "SELECT * FROM vehicles WHERE user_id = '{$id}'";
        $records = Vehicle::find_by_sql($sql);
        //Get the Driver to attach
        if(isset($_GET['attach_driver'])){
            $set_vehicle_id = $_GET['attach_driver'];
        }
        //Delete Drivers Records
        if(isset($_GET['delete_driver'])){
            $del_vehicle_id = $_GET['delete_driver'];
            $sql = "DELETE FROM drivers WHERE vehicle_id = '{$del_vehicle_id}'";
            $result = Database::query($sql);
            $result ? Method::redirect_to("access_granted.php?view_records") : $error_msg = "Something went wrong";
        }
        //Attach Driver to a Vehicle
        if(isset($_POST['add_driver_btn'])){
            $fname = Database::escaped_string($_POST['fname']);
            $lname = Database::escaped_string($_POST['lname']);
            $address = Database::escaped_string($_POST['address']);
            $state_of_origin = Database::escaped_string($_POST['state_of_origin']);
            $phone = Database::escaped_string($_POST['phone']);
            $gender = Database::escaped_string($_POST['gender']);
            $next_of_kin = Database::escaped_string($_POST['next_of_kin']);
            $id_type = Database::escaped_string($_POST['id_type']);
            $id_number = Database::escaped_string($_POST['id_number']);
            $guarantor_name = Database::escaped_string($_POST['guarantor_name']);
            $guarantor_id_mode = Database::escaped_string($_POST['guarantor_id_mode']);
            $guarantor_id_number = Database::escaped_string($_POST['guarantor_id_number']);
            if(empty($fname) || empty($lname) || empty($address) || empty($phone) || empty($next_of_kin) || empty($id_number) || empty($guarantor_name) || empty($guarantor_id_number)){
                $error_msg = "No field should be empty";
            }
            elseif($state_of_origin==="State of Origin" || $gender==="Gender" || $id_type==="Valid ID Type" || $guarantor_id_mode==="Guarantor ID Type"){
                $error_msg = "Select all fields properly";
            }else{
                $name = $_FILES['file']['name'];
                $tmp_name = $_FILES['file']['tmp_name'];

                if(isset($name)){
                    if(!empty($name)){
                        $location = 'image/';
                        if(move_uploaded_file($tmp_name, $location.$name)){
                            $image_location = $location.$name;
                        }else{
                            $image_location = "image/none.jpg";
                        }

                        $sql = "INSERT INTO drivers(user_id,vehicle_id,firstname,lastname,address,state_of_origin,phone,gender,next_of_kin,valid_id_type,id_number,guarantor_name,guarantor_id_type,guarantor_id_number,guarantor_photo,reg_date) VALUES('$id','$set_vehicle_id','$fname','$lname','$address','$state_of_origin','$phone','$gender','$next_of_kin','$id_type','$id_number','$guarantor_name','$guarantor_id_mode','$guarantor_id_number','$image_location','$date')";
                        $result = Database::query($sql);
                        $result ? $success_msg = "Driver Registration Successful" : $error_msg = "Registration failed";

                    }else{
                        $error_msg = "Choose guarantor's image file";
                    }
                }
            }
        }
        //Getting Drivers records using vehicle id
        if(isset($_GET['edit_driver'])){
            $edit_driver_id = $_GET['edit_driver'];
            $sql = "SELECT * FROM drivers WHERE vehicle_id = '{$edit_driver_id}'";
            $details = Driver::find_by_sql($sql);
            foreach($details as $detail){
                $driver_id = $detail->id;
                $driver_fname = $detail->firstname;
                $driver_lname = $detail->lastname;
                $driver_address = $detail->address;
                $driver_soo = $detail->state_of_origin;
                $driver_phone = $detail->phone;
                $driver_gender = $detail->gender;
                $driver_nok = $detail->next_of_kin;
                $driver_id_type = $detail->valid_id_type;
                $driver_id_no = $detail->id_number;
                $guarantor_name = $detail->guarantor_name;
                $guarantor_id_type = $detail->guarantor_id_type;
                $guarantor_id_number = $detail->guarantor_id_number;
            }
        }

        if(isset($_GET['driver_details'])){
            $details_id = $_GET['driver_details'];
            $sql = "SELECT * FROM drivers WHERE vehicle_id = '{$details_id}'";
            $details = Driver::find_by_sql($sql);
            foreach($details as $detail){
                $driver_id = $detail->id;
                $driver_fname = $detail->firstname;
                $driver_lname = $detail->lastname;
                $driver_address = $detail->address;
                $driver_soo = $detail->state_of_origin;
                $driver_phone = $detail->phone;
                $driver_gender = $detail->gender;
                $driver_nok = $detail->next_of_kin;
                $driver_id_type = $detail->valid_id_type;
                $driver_id_no = $detail->id_number;
                $guarantor_name = $detail->guarantor_name;
                $guarantor_id_type = $detail->guarantor_id_type;
                $guarantor_id_number = $detail->guarantor_id_number;
                $guarantor_image = $detail->guarantor_photo;
            }
        }

        if(isset($_POST['edit_driver_btn'])){
            $update_fname = Database::escaped_string($_POST['update_fname']);
            $update_lname = Database::escaped_string($_POST['update_lname']);
            $update_address = Database::escaped_string($_POST['update_address']);
            $update_state_of_origin = Database::escaped_string($_POST['update_state_of_origin']);
            $update_phone = Database::escaped_string($_POST['update_phone']);
            $update_gender = Database::escaped_string($_POST['update_gender']);
            $update_next_of_kin = Database::escaped_string($_POST['update_next_of_kin']);
            $update_id_type = Database::escaped_string($_POST['update_id_type']);
            $update_id_number = Database::escaped_string($_POST['update_id_number']);
            $update_guarantor_name = Database::escaped_string($_POST['update_guarantor_name']);
            $update_guarantor_id_mode = Database::escaped_string($_POST['update_guarantor_id_mode']);
            $update_guarantor_id_number = Database::escaped_string($_POST['update_guarantor_id_number']);

            if(empty($update_fname) || empty($update_lname) || empty($update_address) || empty($update_phone) || empty($update_next_of_kin) || empty($update_id_number) || empty($update_guarantor_name) || empty($update_guarantor_id_number)){
                $error_msg = "No field should be empty";
            }
            elseif($update_state_of_origin==="State of Origin" || $update_gender==="Gender" || $update_id_type==="Valid ID Type" || $update_guarantor_id_mode==="Guarantor ID Type"){
                $error_msg = "Select all fields properly";
            }else{
                $sql = "UPDATE drivers SET
                        firstname = '$update_fname',
                        lastname = '$update_lname',
                        address = '$update_address',
                        state_of_origin = '$update_state_of_origin',
                        phone = '$update_phone',
                        gender = '$update_gender',
                        next_of_kin = '$update_next_of_kin',
                        valid_id_type = '$update_id_type',
                        id_number = '$update_id_number',
                        guarantor_name = '$update_guarantor_name',
                        guarantor_id_type = '$update_guarantor_id_mode',
                        guarantor_id_number = '$update_guarantor_id_number' WHERE id = '{$driver_id}'";
                $result = Database::query($sql);
                $result ? $success_msg = "Update Successful" : $error_msg = "Update failed";
            }
        }
        ?>
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1" />
                <title>Transport Portal - Users</title>
                <link rel="stylesheet" href="css/bootstrap.css" />
                <link type='text/css' href="css/jquery-ui.min.css" rel="stylesheet">
                <link rel="stylesheet" type="text/css" href="./datatables/dataTables.bootstrap4.css">
                <script src="js/jquery-1.11.3.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
                <script type="text/javascript" src="js/jquery-ui.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <link rel="stylesheet" href="css/font-awesome.css" />
                <link href="style.css" rel="stylesheet" />
                <link rel='shortcut icon' href='img/logo.jpeg' />
                <link rel="stylesheet" type="text/css" href="datatables/dataTables.bootstrap4.css">
                <style type="text/css">
                    .card {
                        border-radius: 5px;
                    }
                </style>
            </head>
            <body>
                <!--Navigation-->
                <nav class="navbar navbar-expand-md navbar-light bg-white sticky-top" style="padding-top: 0; padding-bottom: 0;">
                    <div class="container">
                        <a style="color: #121668;" class="navbar-brand" href="#"><img src="img/logo.jpeg" width="70" /> <b>Welcome <?php echo $firstname; ?></b></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav ml-auto"><!--ml-auto pushes your nav items to the right at full width-->
                                <li class="nav-item"><a class="nav-link" href="access_granted.php?dashboard">Dashboard</a></li>
                                <li class="nav-item"><a class="nav-link" href="access_granted.php?register_vehicles">Register Vehicles</a></li>
                                <li class="nav-item"><a class="nav-link" href="access_granted.php?view_records">View Records</a></li>
                                <!-- <li class="nav-item"><a class="nav-link" href="access_granted.php?edit_profile">Edit Profile</a></li> -->
                                <li class="nav-item"><a style="color: #fff; font-weight: 100;" class="nav-link btn btn-danger" href="access_granted.php?logout">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div id="banner" style="">
                    <br><br>
                        <?php
                            if(isset($_GET['register_vehicles'])){
                                require_once("register_vehicles.php");
                            }
                            elseif(isset($_GET['view_records'])){
                                require_once("view_records.php");
                            }
                            elseif(isset($_GET['edit_profile'])){
                                require_once("edit_profile.php");
                            }
                            elseif(isset($_GET['attach_driver'])){
                                require_once("attach_driver.php");
                            }
                            elseif(isset($_GET['driver_details'])){
                                require_once("driver_details.php");
                            }
                            elseif(isset($_GET['edit_driver'])){
                                require_once("edit_driver.php");
                            }
                            elseif(isset($_GET['logout'])){
                                $user_session->logout();
                                Method::redirect_to("signin.php");
                            }
                            else{
                                require_once("dashboard.php");
                            }
                        ?>
                    <br><br><br><br><br><br><br><br><br><br><br>
                </div>
                
                <!-- DataTable -->
                <script type="text/javascript" src="datatables/jquery.dataTables.js"></script>
                <script type="text/javascript" src="datatables/dataTables.bootstrap4.js"></script>
                <script>
                    $(document).ready( function () {
                        $('#myTable').DataTable();
                        $('#myTable2').DataTable();
                        $('#myTable3').DataTable();
                        $('#myTable4').DataTable();
                    } );
                </script>
            </body>
        </html>
        
                
        <?php
    }
?>