<!DOCTYPE HTML>
<html>

<head>
    <title>DB-CMS</title>
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png">
    <link href="assets/css/style2.css" rel="stylesheet" type="text/css" media="all" />
    <link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/responsiveslides.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="assets/js/responsiveslides.min.js"></script>

    <script src="assets/js/anychart-base.min.js"></script>
    <script src="assets/js/anychart-core.min.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/login.css">
    <link href="assets/css/style2.css" rel="stylesheet" type="text/css" media="all" />

    <style>

    </style>
</head>

<body>
    <!--start-wrap-->

    <!--start-header-->
    <div style="background:#1b4de2" class="header">
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

                    <li class="active"><a href="contact_us.php">contact</a></li>
                    <li><a href="about_us.html">About</a></li>
                    <li><a href="./cms.php">Login</a></li>
                    <li><a href="./signup.php">Signup</a></li>
                </ul>
            </div>
            <div class="clear"> </div>
            <!--end-top-nav-->
        </div>
        <!--end-header-->
    </div>

    <section class="main">
        <div class="container">

            <div class="main__form">
                <div class="main__form--title text-center">Contact Us</div>
                <form onSubmit="" action="" method="POST">
                    <div class="form-row">
                        <div class="col col-12">
                            <label class="input">
                                <i id="left" class="fas fa-envelope left"></i>
                                <input type="text" name="email" placeholder="Email" required>
                            </label>
                        </div>
                        <div class="col col-12">
                            <label class="input">

                                <textarea name="message" cols="61" rows="10" placeholder="Your comment..."></textarea>

                                <input type="submit" name="submit" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Custom Js -->
    <script src="./assets/js/app.js"></script>
    <script src="./js/script.js"></script>

    <?php
    if (isset($_POST["submit"])) {

        include_once "config.php";
        $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if (!$connection) {
            echo mysqli_error($connect);
            throw new Exception("Database cannot Connect");
        }
        $message = $_REQUEST['message'] ?? '';

        $sessionEmail = $_REQUEST['email'] ?? '';

        $now = date('d-m-y h:i:s');
        $query = "INSERT INTO notification(sender,message,date) VALUES ('{$sessionEmail}','{$message}','{$now}')";

        mysqli_query($connection, $query) or die(mysqli_error($connection));
        echo "<script type=\"text/javascript\">
                   alert(\"Thank you for your feedback\"); 
                   window.location = \"index.html\";
         </script>";
    }

    ?>