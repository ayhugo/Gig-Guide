<?php
include('session.php');
$_SESSION['pageStore'] = "index.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Gig Guide</title>

    <!-- Javascript -->
    <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/GigInfo.js"></script>
    <script src="js/ImageModal.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

</head>

<body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">Gig Guide</a>
    <?php
    if (!isset($_SESSION['login_id'])) {
        echo '<ul style="position:absolute; right:83px;" class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
            <a class="nav-link" href="login.php">Login</a>
            </li>
            </ul>
    <ul style="float: left;" class="navbar-nav px-3">
        <li style="float: left;" class="nav-item text-nowrap">
            <a class="nav-link" href="register.php">Register</a>
        </li>
    </ul>';
    } else {
        echo '<ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
            <a class="nav-link" href="logout.php">Logout</a>
        </li>
            </ul>';

    }
    ?>
</nav>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <?php include("htaccess/header.php"); ?>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-center mb-5">
                        <h3 class="mt-0" id="gig-title"></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="media col-lg-4">
                        <div class="container-fluid" id="image-container">
                            <div class="row">
                                <div class="col">
                                    <img class="d-flex align-self-start" id="myImg"
                                         src="https://placeimg.com/225/315/any/sepia" alt="Generic placeholder image">
                                </div>
                            </div>
                            <div class="row info-rows">
                                <div class="col ml-1" id="gig-info-col">
                                    <h6 class="font-weight-bold min-text-center">Doors Open</h6>
                                    <p class="min-text-center" id="door-time"></p>
                                </div>
                            </div>
                            <div class="row info-rows">
                                <div class="col ml-1">
                                    <h6 class="font-weight-bold min-text-center">Price</h6>
                                    <p class="min-text-center" id="door-price"></p>
                                </div>
                            </div>
                            <div class="row info-rows" id="last-row-gig-info">
                                <div class="col ml-1">
                                    <h6 class="font-weight-bold min-text-center">Entry</h6>
                                    <p class="min-text-center" id="door-restriction"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="media-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="font-weight-bold min-text-center">When</h6>
                                        <p class="min-text-center" id="date-text"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col"> <!-- id="col-location"-->
                                        <h6 class="font-weight-bold min-text-center scroll-to-map">Where</h6>
                                        <p class="min-text-center" id="location-text"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h6 class="font-weight-bold min-text-center">Information</h6>
                                        <p class="min-text-center" id="information-text"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col" id="col-links">
                                        <h6 class="font-weight-bold min-text-center">Links</h6>
                                    </div>
                                </div>
                            </div>
                        </div><!--media body-->
                    </div><!--second col-->
                </div><!--inner row-->
                <div class="row text-center" id="col-location">

                </div>
                <div class="row">
                    <div class="col">
                        <h5 class="mb-4 text-center font-weight-bold" id="g-cal"></h5>
                    </div>
                </div>
            </div><!--inner container-->
        </main><!--main-->
    </div><!--top row-->
</div><!--top container-->

<!-- The Modal, taken from: https://www.w3schools.com/howto/howto_css_modal_images.asp -->
<div id="myModal" class="modal">
    <!-- The Close Button -->
    <span class="close">&times;</span>

    <!-- Modal Content (The Image) -->
    <img class="modal-content" id="img01" src="#">

    <!-- Modal Caption (Image Text) -->
    <div id="caption"></div>
</div>

</body>
</html>