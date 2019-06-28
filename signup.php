<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Transport Portal - Sign up</title>
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
    </head>
    <body>
        <div id="banner" style="">
            <br><br>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        
                    </div>
                    <div class="col-md-4">                        
                        <div style="border-radius: 0;" class="card" id="signup_card">
                            <br>
                            <h4 class="text-center text-info"><a style="color: #aaa;" href="index.php"><i class='fa fa-home'></i></a> Sign up <img id="loading" src="img/loading.gif" style="width: 10%; margin-top: -3%; display: none;" alt=""> </h4>
                            <span class="response text-center"></span>
                            <div class="card-body">
                                <form method="post" action="signup_processor.php"  id="signupForm">
                                  <div class="input-group">
                                    <input type="text" placeholder="Firstname" class="form-control" name="fname" id="fname">
                                    <input type="text" placeholder="Lastname" class="form-control" name="lname" id="lname">
                                  </div>
                                  <br>
                                  <div class="form-group">
                                    <input type="email" placeholder="Enter email address" class="form-control" name="email" id="email">
                                  </div>
                                  <div class="input-group">
                                    <input type="password" placeholder="Password" class="form-control" name="pwd" id="pwd">
                                    <input type="password" placeholder="Confirm password" class="form-control" name="cpwd" id="cpwd">
                                  </div>
                                  <br>
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
                                    <select class="form-control" name="state_of-origin" id="stateOfOrigin">
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
                                    <textarea style="resize: none;" class="form-control" name="address" id="address" placeholder="Address"></textarea>
                                  </div>
                                  <div class="form-group">
                                    <input type="text" placeholder="Next of Kin" class="form-control" name="next_of_kin" id="nextOfKin">
                                  </div>
                                  <div class="form-group">
                                    <select class="form-control" name="id_mode" id="idMode">
                                        <option>Mode of Identification</option>
                                        <option>Voters Card</option>
                                        <option>National ID</option>
                                        <option>International Passport</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <input type="text" placeholder="Identification Number" class="form-control" name="id_number" id="idNumber">
                                  </div>
                                  <center><button id="regBtn" type="submit" class="btn btn-info" style="padding-right: 20%; padding-left: 20%; border-radius: 2px;">Sign up</button></center>
                                </form>
                                <br>
                                <center><a href="signin.php" class="btn btn-default text-info" style="padding-right: 20%; padding-left: 20%; border-radius: 2px;">Sign in</a></center>
                            </div>
                        </div>
                        <br><br>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script>
    $(function(){
        var form = $("#signupForm");
        form.submit(function(e){
            $(this).attr("disabled","disabled");
            e.preventDefault();

            $("#loading").show();
            $.ajax({
                type: form.attr("method"),
                url: form.attr("action"),
                data: form.serialize(),
                dataType:"json",
                success: function(data){
                    $("#loading").hide();
                    $(".response").text(data.content);
                    if(data.response=="success"){
                        $(".response").css("color","green");
                    }else{
                        $(".response").css("color","red");
                    }
                    $("input:submit").removeAttr("disabled");
                },
                error: function(data){
                    $("#loading").hide();
                    $(".response").text("An error occured");
                    $(".response").css("color","red");
                    $("input:submit").removeAttr("disabled");
                }
            });
        });
    });
</script>