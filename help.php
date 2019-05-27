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
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />

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
                <?php include("htaccess/header.php");?>

            </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


            <h3>Gig Guide Help</h3>
<!--            <h5> <b>Tips and Tricks: </b> </h5>-->
<!--            <a href="http://localhost:8000/addgig.php"> Click here</a> to add a gig-->
            <h5> Gig Guide is a website which provides you with the latest gigs happening in Dunedin. </h5>


<!--            Gig Guide is a website which provides users with the latest gigs happening in Dunedin.-->
<!--            Users like managers or artists are able to make an account and submit events through the website.-->
<!--            An average daily user is able to view these gigs and a map of gig locations.-->


            <button class="accordion">Gigs</button>
            <div class="panel">
                <p>On this page you can view the latest gigs happening in Dunedin.</p>
                <p> By clicking on the <img src="img/info_btn.png" alt="INFO button"> button,
                    you will be able to view further details about the selected event.</p>
                <p> By clicking on the <img src="img/calendar_view_btn.png" alt="Calendar View Button">
                    button you are able to view all upcoming gigs in a calendar view.</p>
                <p> Gigs are archived after the date and time has passed.</p>

                <p></p>
<!--                <img src="img/calendar_view.png" alt="Calendar View">-->
            </div>

            <button class="accordion">Bar Location Map</button>
            <div class="panel">
                <p> You can view bar locations in Dunedin on the <a href="map.php"> Bar Location Map</a>. </p>
                <p> Within events you are able to see the pinned location of the gig.</p>
            </div>

            <button class="accordion">Add an Event</button>
            <div class="panel">
                <p> To add an upcoming event, log in and fill out the <a href="addgig.php"> Add an Event </a>form.</p>
                <p> Once you have submitted the event you can view it on the <a href="index.php"> home page</a>.</p>

            </div>
            <button class="accordion">Contact Us / Feedback Form</button>
            <div class="panel">
                <p>Feel free to provide us with feedback on past gigs you have attended. </p>
                <h6>Have a question about Gig Guide or a general enquiry?</h6>
                <p> Fill out our <a href="feedbackForm.php"> feedback form</a>.</p>

            </div>

    </div>
</div>

    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }
    </script>

</body>
</html>