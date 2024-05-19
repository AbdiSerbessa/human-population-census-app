<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1024">
    <link rel="icon" type="image/x-icon" href="assets/img/adaamaa siiidaa night.jpg">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
    <link rel="stylesheet" type="text/css" href="./css/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="./css/jquery.dataTables.css" />
    <script src="assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="./assets/js/app.js"></script>
    <link href="assets/css/style2.css" rel="stylesheet" type="text/css" media="all" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="./js/script.js"></script>

    <title>Sign up for guest</title>
</head>

<div style="background:#2E55C7" class="header">
    <div class="wrap">
        <!--start-logo-->
        <div class="logo">
            <a href="index.html"><img style="height: 100px;" src="assets/img/adaamaa siiidaa night.jpg"></img></a>
        </div>
        <!--end-logo-->
        <!--start-top-nav-->
        <div class="top-nav">
            <ul>
                <li><a href="index.html">Home</a></li>

                <li><a href="contact_us.php">contact</a></li>
                <li><a href="about_us.html">About</a></li>
                <li><a href="./cms.php">Login</a></li>
                <li class="active"><a href="./signup.php">Signup</a></li>
            </ul>
        </div>
        <div class="clear"> </div>
        <!--end-top-nav-->
    </div>
    <!--end-header-->
</div>
<div class="addSupervisor">
    <div class="main__form">
        <div class="main__form--title text-center">Please insert your information</div>
        <form enctype="multipart/form-data" action="add.php" method="POST" onsubmit="return validateform()">
            <div class="form-row">

                <div class="col col-12">
                    <label class="input">
                        <i id="left" class="fas fa-user-circle"></i>
                        <input type="text" name="fname" placeholder="FULL NAME" required>
                    </label>
                </div>
                <div class="col col-12">

                </div>
                <div class="col col-12">
                    <label class="input">
                        <i id="left" class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email" required>
                    </label>
                </div>
                <div class="col col-12">
                    <label class="input">
                        <i id="left" class="fas fa-key"></i>
                        <input id="pwdinput" type="password" name="password" placeholder="Password" required>
                        <i id="pwd" class="fas fa-eye right"></i>
                <div class="col col-12">
                    <label class="input">
                        <i id="left" class="fas fa-phone-alt"></i>
                        <input type="text" name="phone" placeholder="Phone" required>
                    </label>
                </div>
                
                
                <input type="hidden" name="action" value="addGuest">
                <div class="col col-12">
                    <input type="submit" value="Register">
                </div>
            </div>
        </form>
    </div>

</div>

    <div class="wrap">
        
        <script src="assets/js/jquery-3.5.1.slim.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- Custom Js -->
        <script src="./assets/js/app.js"></script>
        <script src="./js/script.js"></script>