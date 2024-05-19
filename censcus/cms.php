<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    /* .container2{
  
}
.container2 .title{
  font-size: 25px;
  font-weight: 500;
  position: relative;
}
.container2 .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;
  background: linear-gradient(135deg, #71b7e6, #9b59b6);
} */
    .message-list {
        display: block;
        margin: 20px;
        background: #eee;
        border: 1px solid #ddd;

        margin: 0 0 10px;
        padding-left: 30px;
        background-position: left center;
    }

    .message-list .from {
        font-weight: bold;
        font-size: 25px;
        display: block;
        margin: 5px;
    }

    .message-list .date {
        font-style: italic;
        font-size: 11px;
        display: block;


    }

    .message-list .message {
        font-weight: bold;
        font-size: larger;
        display: block;
        margin: 5px;
        word-wrap: break-word;
    }

    .content form .user-details {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin: 20px 0 12px 0;
    }

    form .user-details .input-box {
        margin-bottom: 15px;
        width: calc(100% / 2 - 20px);
    }

    form .input-box span.details {
        display: block;
        font-weight: 500;
        margin-bottom: 5px;
    }

    .user-details .input-box input,
    .user-details .input-box textarea {
        height: 45px;
        width: 100%;
        outline: none;
        font-size: 16px;
        border-radius: 5px;
        padding-left: 15px;
        border: 1px solid #ccc;
        border-bottom-width: 2px;
        transition: all 0.3s ease;
    }

    .user-details .input-box input:focus,
    .user-details .input-box input:valid {
        border-color: #9b59b6;
    }

    form .gender-details .gender-title {
        font-size: 20px;
        font-weight: 500;
    }

    form .category {
        display: flex;
        width: 80%;
        margin: 14px 0;
        justify-content: space-between;
    }

    form .category label {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    form .category label .dot {
        height: 18px;
        width: 18px;
        border-radius: 50%;
        margin-right: 10px;
        background: #d9d9d9;
        border: 5px solid transparent;
        transition: all 0.3s ease;
    }

    #dot-1:checked~.category label .one,
    #dot-2:checked~.category label .two,

    form input[type="radio"] {
        display: none;
    }

    form .button {
        height: 45px;
        margin: 35px 0
    }

    form .button input {
        height: 100%;
        width: 100%;
        border-radius: 5px;
        border: none;
        color: #fff;
        font-size: 18px;
        font-weight: 500;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s ease;
        background: linear-gradient(135deg, #71b7e6, #9b59b6);
    }

    form .button input:hover {
        /* transform: scale(0.99); */
        background: linear-gradient(-135deg, #71b7e6, #9b59b6);
    }

    @media(max-width: 584px) {
        .container {
            width: 70%;
        }

        form .user-details .input-box {
            margin-bottom: 15px;
            width: 100%;
        }

        form .category {
            width: 100%;
        }

        .content form .user-details {
            max-height: 300px;
            overflow-y: scroll;
        }

        .user-details::-webkit-scrollbar {
            width: 5px;
        }
    }

    @media(max-width: 459px) {
        .container .content .category {
            flex-direction: column;
        }
    }
</style>
<?php
session_start();
$sessionId = $_SESSION['id'] ?? '';
$sessionRole = $_SESSION['role'] ?? '';

if (!$sessionId && !$sessionRole) {
    header("location:login.php");
    die();
}

ob_start();

include_once "config.php";
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$connection) {
    echo mysqli_error($connect);
    throw new Exception("Database cannot Connect");
}

if ($sessionRole == 'guest')
    $id = $_REQUEST['id'] ?? 'view_report';
else {
    $id = $_REQUEST['id'] ?? 'dashboard';
}
$action = $_REQUEST['action'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1024">

    <link rel="icon" type="image/x-icon" href="assets/img/adaamaa siiidaa night.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
    <link rel="stylesheet" type="text/css" href="./css/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="./css/jquery.dataTables.css" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />


    <title><?php echo $_REQUEST['id'] ?? 'CMS'; ?></title>
</head>

<body>
    <!--------------------------------- Secondary Navber -------------------------------->
    <section class="topber">
        <div class="topber__title">
            <span class="topber__title--text">
                <?php
                if ('dashboard' == $id) {
                } elseif ('addSupervisor' == $id) {
                    echo "Add Supervisor";
                } elseif ('allSupervisor' == $id) {
                    echo "Supervisors";
                } elseif ('addEnumerator' == $id) {
                    echo "Add Enumerator";
                } elseif ('allEnumerator' == $id) {
                    echo "Enumerators";
                } elseif ('addPerson' == $id) {
                    echo "Add Person";
                } elseif ('allPerson' == $id) {
                    echo "Person";
                } elseif ('userProfile' == $id) {
                    echo "Your Profile";
                } elseif ('editSupervisor' == $action) {
                    echo "Edit Supervisor";
                } elseif ('editEnumerator' == $action) {
                    echo "Edit Enumerator";
                } elseif ('editPerson' == $action) {
                    echo "Edit Person";
                } elseif ('view_report' == $id) {
                    echo "Reports";
                }

                ?>

            </span>
        </div>

        <div class="topber__profile">
            <?php
            $query = "SELECT fname,lname,role,avatar FROM {$sessionRole}s WHERE {$sessionRole}_id='$sessionId'";

            $result = mysqli_query($connection, $query);

            if ($data = mysqli_fetch_assoc($result)) {
                $fname = $data['fname'];
                $lname = $data['lname'];
                $role = $data['role'];
                $avatar = $data['avatar'];
            ?>
                <img src="assets/img/<?php echo "$avatar"; ?>" height="25" width="25" class="rounded-circle" alt="profile">
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php
                    echo "$fname $lname (" . ucwords($role) . " )";
                }
                    ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="cms.php">Dashboard</a>
                        <a class="dropdown-item" href="cms.php?id=userProfile">Profile</a>
                        <a class="dropdown-item" href="logout.php">Log Out</a>
                    </div>
                </div>
        </div>
    </section>
    <!--------------------------------- Secondary Navber -------------------------------->


    <!--------------------------------- Sideber -------------------------------->
    <section id="sideber" class="sideber">
        <ul class="sideber__ber">

            <h3 class="sideber__panel"><i id="left"></i><img style="height:40px;" src="./assets/img/logo.png"></img>
            </h3>

            <?php if ($sessionRole != 'guest') { ?>
                <li id="left" class="sideber__item<?php if ('dashboard' == $id) {
                                                        echo " active";
                                                    } ?>">
                    <a href="cms.php?id=dashboard"><i id="left" class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
            <?php } ?>
            <?php if ('admin' == $sessionRole) { ?>



                <li id="left" class="sideber__item sideber__item--modify<?php if ('view_census_report' == $id) {
                                                                            echo " active";
                                                                        } ?>">
                    <a href="cms.php?id=view_census_report"><i id="left" class="fas fa-user-plus"></i></i>View census</a>
                </li>

                <li id="left" class="sideber__item sideber__item--modify<?php if ('manage_supervisor' == $id) {
                                                                            echo " active";
                                                                        } ?>">
                    <a href="cms.php?id=manage_supervisor"><i id="left" class="fas fa-user-plus"></i></i>Manage Analyst
                        account</a>
                </li>
                <li id="left" class="sideber__item sideber__item--modify<?php if ('manage_enumerator' == $id) {
                                                                            echo " active";
                                                                        } ?>">
                    <a href="cms.php?id=manage_enumerator"><i id="left" class="fas fa-user-plus"></i></i>Manage
                        officier</a>
                </li>
                <li id="left" class="sideber__item sideber__item--modify<?php if ('manage_guest' == $id) {
                                                                            echo " active";
                                                                        } ?>">
                    <a href="cms.php?id=manage_guest"><i id="left" class="fas fa-user-plus"></i></i>Manage user</a>
                </li>
                <li id="left" class="sideber__item sideber__item--modify<?php if ('view_report' == $id) {
                                                                            echo " active";
                                                                        } ?>">
                    <a href="cms.php?id=view_report"><i id="left" class="fas fa-user-plus"></i></i>View report</a>
                </li>
                <li id="left" class="sideber__item sideber__item--modify<?php if ('view_feedback' == $id) {
                                                                            echo " active";
                                                                        } ?>">
                    <a href="cms.php?id=view_feedback"><i id="left" class="fas fa-user-plus"></i></i>View Feedback</a>
                </li>


            <?php } ?>
            <?php if ('supervisor' == $sessionRole) { ?>



                <li id="left" class="sideber__item sideber__item--modify<?php if ('view_census_report' == $id) {
                                                                            echo " active";
                                                                        } ?>">
                    <a href="cms.php?id=view_census_report"><i id="left" class="fas fa-user-plus"></i></i>View census</a>
                </li>

                <li id="left" class="sideber__item sideber__item--modify<?php if ('manage_enumerator' == $id) {
                                                                            echo " active";
                                                                        } ?>">
                    <a href="cms.php?id=manage_enumerator"><i id="left" class="fas fa-user-plus"></i></i>Manage officiers
                        account</a>
                </li>

                <li id="left" class="sideber__item sideber__item--modify<?php if ('view_report' == $id) {
                                                                            echo " active";
                                                                        } ?>">
                    <a href="cms.php?id=view_report"><i id="left" class="fas fa-user-plus"></i></i>Generate report</a>
                </li>
                <li id="left" class="sideber__item sideber__item--modify<?php if ('messages' == $id) {
                                                                            echo " active";
                                                                        } ?>">
                    <a href="cms.php?id=message"><i id="left" class="fas fa-user-plus"></i></i>Messages</a>
                </li>
                <li id="left" class="sideber__item sideber__item--modify<?php if ('feedback' == $id) {
                                                                            echo " active";
                                                                        } ?>">
                    <a href="cms.php?id=feedback"><i id="left" class="fas fa-user-plus"></i></i>Send Feedback</a>
                </li>

            <?php } ?>
            <?php if ('enumerator' == $sessionRole) { ?>



                <li id="left" class="sideber__item sideber__item--modify<?php if ('view_registered' == $id) {
                                                                            echo " active";
                                                                        } ?>">
                    <a href="cms.php?id=view_registered"><i id="left" class="fas fa-user-plus"></i></i>View registered</a>
                </li>
                <li id="left" class="sideber__item sideber__item--modify<?php if ('fill_form' == $id) {
                                                                            echo " active";
                                                                        } ?>">
                    <a href="cms.php?id=fill_form"><i id="left" class="fas fa-user-plus"></i></i>Fill census form</a>
                </li>
                <li id="left" class="sideber__item sideber__item--modify<?php if ('fill_form' == $id) {
                                                                            echo " active";
                                                                        } ?>">
                    <a href="cms.php?id=fill_house_form"><i id="left" class="fas fa-user-plus"></i></i>Fill house form</a>
                </li>
                <li id="left" class="sideber__item sideber__item--modify<?php if ('messages' == $id) {
                                                                            echo " active";
                                                                        } ?>">
                    <a href="cms.php?id=message"><i id="left" class="fas fa-user-plus"></i></i>Messages</a>
                </li>
                <li id="left" class="sideber__item sideber__item--modify<?php if ('feedback' == $id) {
                                                                            echo " active";
                                                                        } ?>">
                    <a href="cms.php?id=feedback"><i id="left" class="fab fa-snapchat"></i></i>Send Feedback</a>
                </li>


            <?php } ?>
            <?php if ('guest' == $sessionRole) { ?>



                <li id="left" class="sideber__item sideber__item--modify<?php if ('view_reports' == $id) {
                                                                            echo " active";
                                                                        } ?>">
                    <a href="cms.php?id=view_report"><i id="left" class="fas fa-user-plus"></i></i>Reports</a>
                </li>
                <li id="left" class="sideber__item sideber__item--modify<?php if ('feedback' == $id) {
                                                                            echo " active";
                                                                        } ?>">
                    <a href="cms.php?id=feedback"><i id="left" class="fas fa-user-plus"></i></i>Send Feedback</a>
                </li>



            <?php } ?>

    </section>
    <!--------------------------------- #Sideber -------------------------------->


    <!--------------------------------- Main section -------------------------------->
    <section class="main">
        <div class="container" style="width:100%">

            <!-- ---------------------- DashBoard ------------------------ -->
            <?php if ('dashboard' == $id && $action == '') {


                include 'dashboard.php';
            }


            include 'manage_accounts.php';

            ?>

            <?php if ('fill_form' == $id) { ?>
                <div class="addEnumerator">

                    <div class="container2">
                        <div class="title">Registration</div>
                        <div class="content">
                            <form onSubmit="return validate()" enctype="multipart/form-data" action="add.php?action=addPerson" method="POST">
                                <div class="user-details">

                                    <div id="picture">
                                        <img height="200px" width="200px" id="pic" src="./assets/img/avatar.png" />
                                        <div class="form-group">
                                            <input id="image" type='file' name="image" onchange="document.getElementById('pic').src = window.URL.createObjectURL(this.files[0])" required />
                                        </div>
                                    </div>


                                    <div class="input-box">
                                        <span class="details">ID</span>
                                        <input type="text" name="" placeholder="" required>

                                        <span class="details">Name</span>
                                        <input type="text" name="name" placeholder="" required>

                                        <span class="details">Father Name</span>
                                        <input type="text" name="fname" placeholder="" required>

                                        <span class="details">Grand father Name</span>
                                        <input type="text" name="gname" placeholder="" required>
                                        <div class="gender-details">
                                            <span class="gender-title">Gender</span>
                                            <select name="gender" placeholder="" required>
                                                <option value="m">Male</option>
                                                <option value="f">Female</option>

                                            </select>


                                            <br />

                                        </div>
                                    </div>
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <div class="input-box">
                                        <span class="details">Marriage Status</span>
                                        <select name="married" placeholder="" required>
                                            <option value=single>Single</option>
                                            <option value=married>Married</option>
                                            <option value=divorced>Divorced</option>
                                        </select>
                                        <span class="details">Disability</span>
                                        <select name="disability" placeholder="" required>
                                            <option value=yes>Yes</option>
                                            <option value=no>No</option>

                                        </select>


                                        <span class="details">House number</span>
                                        <div>
                                            <select style="float:left;" name="house_no" placeholder="" required>
                                                <?php
                                                $sql = "select house_id from house";
                                                $query = mysqli_query($connection, $sql);
                                                while ($row = mysqli_fetch_assoc($query)) {

                                                    $house_no = $row['house_id'];

                                                    echo "<option value=$house_no>$house_no</option>";
                                                }

                                                ?>


                                            </select>
                                            <a class="newButton" style="display:inline-block;float:right;" href="cms.php?id=fill_house_form">+ New House</a>
                                        </div>
                                        <div></br></br></br></br></div>
                                        <span class="details">Phone</span>
                                        <input type="text" name="phone" placeholder="" required>
                                        <span class="details">Email</span>
                                        <input type="text" name="email" placeholder="" required>
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Date of birth</span>
                                        <input type="date" name="age" placeholder="" required>
                                        <span class="details">Birth place</span>
                                        <input type="text" name="birth_place" placeholder="" required>
                                        <span class="details">Job status</span>
                                        <select name="job" placeholder="" required>
                                            <option value=unemployed>unemployed</option>
                                            <option value=governmental>governmental</option>
                                            <option value=non-governmental>non-governmental</option>
                                        </select>
                                        <span class="details">Education Level</span>
                                        <select name="education" placeholder="" required>
                                            <option value=illiterate>Illiterate</option>
                                            <option value=certificate>Certificate</option>
                                            <option value=degree>Degree</option>
                                            <option value=masters>Masters</option>
                                            <option value=phd>PHD</option>
                                        </select>

                                        <span class="details">Religion</span>
                                        <select name="religion" placeholder="" required>
                                        <option value=waaqeffannaa>Waaqennaa</option>
                                            <option value=orthodox>Orthodox</option>
                                            <option value=protestan>Protestant</option>
                                            <option value=muslim>Muslim</option>
                                            
                                            <option value=other>Others</option>

                                        </select>


                                    </div>

                                    <div class="input-box" style="margin-top:5px">
                                        <h2>Primary contact</h2>
                                        <span class="details">Name</span>
                                        <input type="text" name="pname" placeholder="" required>
                                        <span class="details">Phone</span>
                                        <input type="text" name="pphone" placeholder="" required>

                                    </div>
                                    <div class="input-box" style="margin-top:5px">
                                        <h2>Documents</h2>
                                        <span class="details">Birth Certificate</span>
                                        <input type="file" class="pdfs" name="birth_file" placeholder="" required>
                                        <span class="details">Education Certificate</span>
                                        <input type="file" class="pdfs" name="educ_file" placeholder="" required>

                                    </div>
                                </div>

                                <div class="button">
                                    <input type="submit" name="register" value="REGISTER">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            <?php } ?>
            <?php if ('fill_house_form' == $id) { ?>
                <div class="addEnumerator">

                    <div class="container2">
                        <div class="title">Registration</div>
                        <div class="content">
                            <form onSubmit="return validate()" enctype="multipart/form-data" action="add.php?action=addHouse" method="POST">
                                <div class="user-details">




                                    <div class="input-box">
                                        <span class="details">House Number</span>
                                        <input type="number" name="house_id" placeholder="" required>

                                        <span class="details">House document</span>
                                        <input type="file" name="house_file" placeholder="" required>
                                        <span class="details">Unit ID</span>
                                        <input type="text" name="kebele_id" placeholder="" required>
                                        <span class="details">Sub-city</span>
                                        <select name="subcity" placeholder="" required>
                                            <option value="select area" disabled>Select Area</option>
                                            <option value="Abbaa Gadaa">Abbaa Gadaa</option>
                                            <option value="Bokkuu">Bokkuu</option>
                                            <option value="Dambalaa">Dambalaa</option>
                                            <option value="Luugoo">Luugoo</option>
                                            <option value="Daabee">Daabee</option>
                                            <option value=" Boolee">Boolee</option>

                                        </select>






                                        <br />


                                    </div>

                                </div>
                                <div class="button">
                                    <input type="submit" name="register" value="REGISTER">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            <?php } ?>
            <?php if ('view_report' == $id) {
                include 'guest_dashboard.php';
            }
            ?>
            <?php if ('report_table' == $id) {
                include 'report_table.php';
            }
            if ('message' == $id) {
                include 'message.php';
            }
            if ('send_message' == $id) {
                include 'send_message.php';
            }
            ?>



        </div>
        <!-- ---------------------- Enumerator ------------------------ -->

        <?php
        if ('feedback' == $id) {
            include 'feedback.php';
        }
        if ('view_feedback' == $id) {
            echo '<div class="main__form--title text-center">Feedbacks</div>';
            $query = "SELECT * FROM notification where receiver='' order by not_id desc";
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class=\"message-list\">
                            <span class=\"from\">From: {$row['sender']}</span>
                            <span class=\"date\">date:{$row['date']}</span>
                            <span class=\"message\">{$row['message']}</span>
                        </div>";
            }
        }
        ?>
        <!-- ---------------------- User Profile ------------------------ -->
        <?php if ('userProfile' == $id) {
            $query = "SELECT * FROM {$sessionRole}s WHERE {$sessionRole}_id='$sessionId'";
            $result = mysqli_query($connection, $query);
            $data = mysqli_fetch_assoc($result)
        ?>
            <div class="userProfile">
                <div class="main__form myProfile">
                    <form action="cms.php">
                        <div class="main__form--title myProfile__title text-center">My Profile</div>
                        <div class="form-row text-center">
                            <div class="col col-12 text-center pb-3">
                                <img src="assets/img/<?php echo $data['avatar']; ?>" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div class="col col-12">
                                <h4><b>Full Name : </b><?php printf("%s %s", $data['fname'], $data['lname']); ?></h4>
                            </div>
                            <div class="col col-12">
                                <h4><b>Email : </b><?php printf("%s", $data['email']); ?></h4>
                            </div>
                            <div class="col col-12">
                                <h4><b>Phone : </b><?php printf("%s", $data['phone']); ?></h4>
                            </div>
                            <input type="hidden" name="id" value="userProfileEdit">
                            <div class="col col-12">
                                <input class="updateMyProfile" type="submit" value="Update Profile">
                            </div>
                            <div class="col col-12">
                                <input class="updateMyProfile" name="resset" type="submit" value="Resset Password">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php } ?>

        <?php if ('userProfileEdit' == $id) {
            $query = "SELECT * FROM {$sessionRole}s WHERE {$sessionRole}_id='$sessionId'";
            $result = mysqli_query($connection, $query);
            $data = mysqli_fetch_assoc($result)
        ?>


            <div class="userProfileEdit">
                <div class="main__form">
                    <div class="main__form--title text-center">Update My Profile</div>
                    <form onSubmit="return validateform()" enctype="multipart/form-data" action="add.php" method="POST">
                        <div class="form-row">
                            <div class="col col-12 text-center pb-3">
                                <img id="pimg" src="assets/img/<?php echo $data['avatar']; ?>" class="img-fluid rounded-circle" alt="">
                                <i class="fas fa-pen pimgedit"></i>
                                <input onchange="document.getElementById('pimg').src = window.URL.createObjectURL(this.files[0])" id="pimgi" style="display: none;" type="file" name="avatar">
                            </div>
                            <div class="col col-12">
                                <?php if (isset($_REQUEST['avatarError'])) {
                                    echo "<p style='color:red;' class='text-center'>Please make sure this file is jpg, png or jpeg</p>";
                                } ?>
                            </div>
                            <div class="col col-12">
                                <label class="input">
                                    <i id="left" class="fas fa-user-circle"></i>
                                    <input type="text" name="fname" placeholder="First name" value="<?php echo $data['fname']; ?>" required>
                                </label>
                            </div>
                            <div class="col col-12">
                                <label class="input">
                                    <i id="left" class="fas fa-user-circle"></i>
                                    <input type="text" name="lname" placeholder="Last Name" value="<?php echo $data['lname']; ?>" required>
                                </label>
                            </div>
                            <div class="col col-12">
                                <label class="input">
                                    <i id="left" class="fas fa-envelope"></i>
                                    <input type="email" name="email" placeholder="Email" value="<?php echo $data['email']; ?>" required>
                                </label>
                            </div>
                            <div class="col col-12">
                                <label class="input">
                                    <i id="left" class="fas fa-phone-alt"></i>
                                    <input type="number" name="phone" placeholder="Phone" value="<?php echo $data['phone']; ?>" required>
                                </label>
                            </div>
                            <div class="col col-12">
                                <label class="input">
                                    <i id="left" class="fas fa-key"></i>
                                    <input id="pwdinput" type="password" name="oldPassword" placeholder="Old Password" required>
                                    <i id="pwd" class="fas fa-eye right"></i>
                                </label>
                            </div>
                            <div class="col col-12">
                                <label class="input">
                                    <i id="left" class="fas fa-key"></i>
                                    <input id="pwdinput" type="password" name="newPassword" placeholder="New Password" required>
                                    <?php $error = $_GET['error'] ?? " ";
                                    if ($error == 'password') { ?>

                                        <p>Wrong Old Password!!!</p>
                                    <?php } else { ?>
                                        <p>Type Old Password if you don't want to change</p>
                                    <?php } ?>
                                    <i id="pwd" class="fas fa-eye right"></i>
                                </label>
                            </div>
                            <input type="hidden" name="action" value="updateProfile">
                            <div class="col col-12">
                                <input type="submit" value="Update">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php } ?>
        <!-- ---------------------- User Profile ------------------------ -->

        </div>

    </section>

    <!--------------------------------- #Main section -------------------------------->



    <!-- Optional JavaScript -->
    <script src="./js/jquery-3.1.1.js"></script>
    <script src="./js/sidebar.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/script.js"></script>
    <script src="./js/form_validate.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
</body>

</html>
<?php



?>