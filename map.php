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


    <style>
        #mapid {
            width: 80%;
            height: 600px;
            background-color: grey;
        }
    </style>
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


            <h3>Gig Guide Dunedin Bar Location Map</h3>
            <!--The div element for the map -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d11112.3118220524!2d170.50532723775711!3d-45.86974992393897!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sDunedin+Bars!5e0!3m2!1sen!2snz!4v1556752864509!5m2!1sen!2snz"
                    width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
            <!--<div id="mapid"></div>
            <script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
            <script>
                var mymap = L.map('mapid').setView([-45.869, 170.511], 15);

                L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    maxZoom: 18,
                    id: 'mapbox.streets',
                    accessToken: 'pk.eyJ1IjoiYm9uamFydmEiLCJhIjoiY2p2NG01NWFxMnM0ZzQ0bGFzNHU4ODB1ZCJ9.I5EwbslNbP3dWgL3kunjug',
                }).addTo(mymap);

            </script>-->
        </main>
    </div>
</div>

</body>
</html>
