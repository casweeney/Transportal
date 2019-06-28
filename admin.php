<?php
    require_once("app/session.php");
    require_once("app/functions.php");
    if($admin_session->is_logged_in()){
        Method::redirect_to("master");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Transport Portal - Auth</title>
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
        <div id="" style="height: 100%;">
            <br><br><br><br>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        
                    </div>
                    <div class="col-md-4" style="background: url('img/about.jpg'); background-repeat: no-repeat; background-size: cover;">                        
                        <div style="border-radius: 0;" class="card" id="signup_card">
                            <br>
                            <h4 class="text-center text-info"><a style="color: #aaa;" href="index.php"><i class='fa fa-home'></i></a> Admin Auth <img id="loading" src="img/loading.gif" style="width: 10%; margin-top: -3%; display: none;" alt=""></h4>
                            <span class="response text-center"></span>
                            <div class="card-body">
                                <form action="admin_processor.php" method="post" id="signinForm">
                                  <div class="form-group">
                                    <input type="email" placeholder="Enter email address" class="form-control" name="email" id="email">
                                  </div>
                                  <div class="form-group">
                                    <input type="password" placeholder="Choose password" class="form-control" name="pwd" id="pwd">
                                  </div>
                                  <center><button type="submit" name="signin_btn" class="btn btn-info" style="padding-right: 20%; padding-left: 20%; border-radius: 2px;">Sign in</button></center>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>
            <br><br>
        </div>
    </body>
</html>
<script>
    $(function(){
        var form = $("#signinForm");
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
                    if(data.response=="success"){
                        $(".response").text("");
                        window.location.assign("master");
                    }else{
                        $(".response").text(data.content);
                        $(".response").css("color","red");
                        $("#signup_card").effect("shake", "slow");
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
    })
</script>