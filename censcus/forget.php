<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1024">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel = "stylesheet" type = "text/css" href = "./css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "./css/style.css" />
		<link rel = "stylesheet" type = "text/css" href = "./css/jquery-ui.css" />
		<link rel = "stylesheet" type = "text/css" href = "./css/jquery.dataTables.css" />
        <link href="assets/css/style2.css" rel="stylesheet" type="text/css"  media="all" />
        <link rel="icon" type="image/x-icon" href="assets/img/logo.png">
    	<meta charset = "UTF-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<script src = "./js/script.js"></script>
	
    <title>Resset Password</title>
</head>

<div style="background:#2E55C7" class="header">
				<div class="wrap">
				<!--start-logo-->
				<div class="logo">
					<a href="index.html" ><img style="height: 50px;" src="assets/img/logo.png"></img></a>
				</div>
				<!--end-logo-->
				<!--start-top-nav-->
				<div class="top-nav">
					<ul>
						<li ><a href="index.html">Home</a></li>
						
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
                        <?php if ( isset( $_REQUEST['error'] ) ) {
                                    echo "<h5 class='text-center' style='color:red;'>Invalid information.Password reset failed!!</h5>";
                            }?>
                            <div class="main__form--title text-center">Please insert your info to reset password</div>
                            <form onSubmit="return validateform()"   enctype="multipart/form-data" action="add.php" method="POST">
                                <div class="form-row">
                                    
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="email" placeholder="Email" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-user-circle"></i>
                                            <input type="text" name="hobby" placeholder="Your hobby" required>
                                        </label>
                                    </div>
                                    
                                    <div class="col col-12">
                                        <label class="input">
                                            <i id="left" class="fas fa-key"></i>
                                            <input id="pwdinput" type="password" name="newPassword" placeholder="New Password" required>
</label>
<label class="input">
                                            <i id="left" class="fas fa-key"></i>
                                            <input id="pwdinput" type="password" name="confirmPassword" placeholder="Confirm Password" required>
                                            
                                        </label>
                                    </div>
                                    <input type="hidden" name="action" value="forget">
                                    <div class="col col-12">
                                        <input type="submit" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="footer">
		   	 <div class="wrap">
		   	<div class="footer-left">
		   			<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="contact_us.php">contact</a></li>
					</ul>
		   	</div>