<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Transport Portal</title>
        <link rel="stylesheet" href="css/bootstrap.css" />
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/font-awesome.css" />
        <link href="style.css" rel="stylesheet" />
        <link rel='shortcut icon' href='img/logo.jpeg' />
    </head>
    <body>
        <!--Navigation-->
        <nav class="navbar navbar-expand-md navbar-light bg-white sticky-top" style="padding-top: 0; padding-bottom: 0;">
            <div class="container">
                <a style="color: #222;" class="navbar-brand" href="#"><img src="img/logo.jpeg" width="70" /> <b>Transport Portal</b></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto"><!--ml-auto pushes your nav items to the right at full width-->
                        <li class="nav-item"><a class="nav-link" href="signin.php">View Records</a></li>
                        <li class="nav-item"><a class="nav-link" href="signin.php">Sign in</a></li>
                        <li class="nav-item"><a style="color: #fff; font-weight: 100; border-radius: 0;" class="nav-link btn btn-secondary" href="signup.php">Register</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="banner">
            <div id="overlay">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="content">
                                <h1>Anambra State Transportation Portal</h1>
                                <p>
                                    Anambra state transportation portal for vehicle registration and records management.
                                </p>
                                <br>
                                <a style="border-radius: 0; margin-bottom: 6%;" class="btn btn-warning btn-lg" href="signup.php">Register Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--Jumbotron-->
        <div class="container">
            <br>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 style="color: #222; margin-bottom: 4%;">About</h3>
                    <p style="color: #666;">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis nihil, veniam velit at deleniti excepturi officia tempora accusamus exercitationem reprehenderit doloremque iste omnis incidunt totam dolore magnam accusantium saepe quibusdam?
                    </p>
                </div>
            </div>
            <br>
        </div>
        
        <!--Footer-->
        <footer>
            <div class="container-fluid padding">
                <p class="text-center">&copy; <?php echo date('Y'); ?> Transport Portal </p>
            </div>
        </footer>
    </body>
</html>
