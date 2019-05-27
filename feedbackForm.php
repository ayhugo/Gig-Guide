<?php
include('session.php');
$_SESSION['pageStore'] = "index.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Gig Guide</title>

    <link rel="canonical" href="">
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css"/>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
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


            <div class="row ">
                <div class="col-md-6 col-md-offset-3 form-container">
                    <h2>Feedback</h2>
                    <p>
                        Please provide your feedback below:
                    </p>
                    <form role="form" method="post" id="reused_form"
                          onSubmit="alert('Posted your feedback successfully!');" action="index.php">
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="gig">
                                    Gig Name:</label>
                                <textarea class="form-control" type="textarea" name="comments" id="comments"
                                          placeholder="..." maxlength="1000" rows="1"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>How do you rate your overall experience?</label>
                                <p>
                                    <label class="radio-inline">
                                        <input type="radio" name="experience" id="radio_experience" value="bad">
                                        Bad
                                    </label>

                                    <label class="radio-inline">
                                        <input type="radio" name="experience" id="radio_experience" value="average">
                                        Average
                                    </label>

                                    <label class="radio-inline">
                                        <input type="radio" name="experience" id="radio_experience" value="good">
                                        Good
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="comments">
                                    Comments:</label>
                                <textarea class="form-control" type="textarea" name="comments" id="comments"
                                          placeholder="Your Comments" maxlength="6000" rows="7"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="name">
                                    Your Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="email">
                                    Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Post</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
    </div>
</div>
</body>
</html>