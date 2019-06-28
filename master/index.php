<?php
    require_once("../app/session.php");
    require_once("../app/controller.php");
    if(!$admin_session->is_logged_in()){
        Method::redirect_to("../admin.php");
        die("Unauthorized Brute force");
    }else{
        define('dashboard', TRUE);
        define('all_users', TRUE);
        define('add_admin', TRUE);
        define('view_records', TRUE);
        $admin = Admin::find_by_id($admin_session->admin_id);
        $id = Database::escaped_string($admin->id);
        $fullname = Database::escaped_string($admin->fullname);
        $email = Database::escaped_string($admin->email);
        $phone = Database::escaped_string($admin->phone);
        $user_id_prefix = "ATP0";

        //
        if(isset($_POST['add_admin_btn'])){
            $fullname = Database::escaped_string(ucfirst($_POST['fullname']));
            $email = Database::escaped_string($_POST['email']);
            $phone = Database::escaped_string($_POST['phone']);
            $password = Database::escaped_string($_POST['password']);
            $hash = sha1(md5($password));
            $cpassword = $_POST['cpassword'];
            $date = date("d/M/Y");
        
            if(empty($fullname) || empty($email) || empty($phone) || empty($password) || empty($cpassword)){
              $error_msg = "All fields required";
            }
            elseif($password !== $cpassword){
              $error_msg = "Password mismatch";
            }else{
              $sql = " SELECT email FROM admin WHERE email = '{$email}' ";
              $result = Database::query($sql);
        
              if($result->num_rows > 0){
                $error_msg = "Email already exist";
              }else{
                $sql = " INSERT INTO admin(fullname,email,phone,password,reg_date) VALUES('$fullname','$email','$phone','$hash','$date') ";
                $result = $database->query($sql);
        
                if($result){
                  $success_msg = "New admin added";
                }else{
                  $error_msg = "Admin failed to add";
                }
              }
            }
        }
        //
        $sql = "SELECT * FROM users";
        $result = Database::query($sql);
        $number_of_users = $result->num_rows;
        //
        $sql = "SELECT * FROM vehicles";
        $result = Database::query($sql);
        $number_of_reg_vehicles = $result->num_rows;
        //
        $sql = "SELECT * FROM users";
        $all_users = User::find_by_sql($sql);
        //
        $sql = "SELECT * FROM users LIMIT 5";
        $recent_users = User::find_by_sql($sql);
        //
        $sql = "SELECT * FROM vehicles";
        $records = Vehicle::find_by_sql($sql);

        if(isset($_GET['del'])){
            $del_id = $_GET['del'];
            $sql = "DELETE FROM users WHERE id = '{$del_id}'";
            $result = Database::query($sql);
            $result ? Method::redirect_to("index.php?all_users") : $error_msg = "Something went wrong";
        }

        if(isset($_GET['details'])){
            $details_id = $_GET['details'];
            $sql = "SELECT * FROM users WHERE id = '{$details_id}'";
            $all_details = User::find_by_sql($sql);
            foreach($all_details as $detail){
                $user_id = $detail->id;
                $user_fname = $detail->firstname;
                $user_lname = $detail->lastname;
                $user_email = $detail->email;
                $user_phone = $detail->phone;
                $user_gender = $detail->gender;
                $user_soo = $detail->state_of_origin;
                $user_address = $detail->address;
                $user_nok = $detail->next_of_kin;
                $user_mode_of_id = $detail->mode_of_id;
                $user_id_no = $detail->id_number;
            }
            //
            $sql = "SELECT * FROM drivers WHERE user_id = '{$user_id}'";
            $all_drivers = Driver::find_by_sql($sql);
            //
            $sql = "SELECT * FROM vehicles WHERE user_id = '{$user_id}'";
            $all_vehicles = Vehicle::find_by_sql($sql);
        }
    ?>
    
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Transportal | Admin</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../img/logo.jpeg">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../dist/css/adminlte.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="../plugins/morris/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../datatables/dataTables.bootstrap4.css">
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">

            <?php
                //Navbar
                require_once("includes/navbar.php");
                //Sidebar
                require_once("includes/sidenav.php");
            ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <?php
                    if(isset($_GET['all_users'])){
                        require_once("all_users.php");
                    }
                    elseif(isset($_GET['view_records'])){
                        require_once("view_records.php");
                    }
                    elseif(isset($_GET['add_admin'])){
                        require_once("add_admin.php");
                    }
                    elseif(isset($_GET['details'])){
                        require_once("details.php");
                    }
                    elseif(isset($_GET['logout'])){
                        $admin_session->logout();
                        Method::redirect_to("../admin.php");
                    }else{
                        require_once('dashboard.php');
                    }
                ?>
            </div>

            <?php
                //Footer
                require_once("includes/footer.php");
            ?>

        </div>






        <!-- jQuery -->
        <script src="../plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Morris.js charts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="../plugins/morris/morris.min.js"></script>
        <!-- Sparkline -->
        <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="../plugins/knob/jquery.knob.js"></script>
        <!-- daterangepicker -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
        <script src="../plugins/daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="../plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="../dist/js/adminlte.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="../dist/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../dist/js/demo.js"></script>
        <script type="text/javascript" src="../datatables/jquery.dataTables.js"></script>
		<script type="text/javascript" src="../datatables/dataTables.bootstrap4.js"></script>
        <script>
			$(document).ready( function () {
				$('#myTable').DataTable();
			} );
		</script>
    </body>
</html>
<?php
    }
?>