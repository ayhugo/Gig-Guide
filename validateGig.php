<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Refresh" content="5; url=home.php">

    <title>Gig Guide</title>

    <!-- CSS -->
    <link href="bootstrap.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

</head>

<body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">Gig Guide</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="login.php">Log In</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <?php include("htaccess/header.php");?>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <h2 class="text-center">Gig Submission Accepted</h2>
            <p class="text-center">You will be redirected back to the home page</p>
            <?php
            //string to contain errors?
            $errors = "";
            $errors = "<ul>";

            if ($errors ==="<ul>"){
                $gigGuide = simplexml_load_file("htaccess/gigs.xml");

                $gigs = $gigGuide->gigs;
                $newGig = $gigs->addChild("gig");

                //gig info goes here
                $newGig->addChild("title", $_POST['title']);
                $newGig->addChild("details", $_POST['details']);
                $newGig->addChild("artistsperforming", $_POST['artistsPerforming']);
                $newGig->addChild("artistslink", $_POST['artistsLink']);
                $date = date_create($_POST['date']);
                $date = date_format($date,"d-m-Y");
                $newGig->addChild("date", $date);
                //$newGig->addChild("doortime", $_POST['doortime']);
                $doortime = $_POST['hour'].$_POST['minute'];
                $newGig->addChild("doortime", $doortime);
                $newGig->addChild("genre", $_POST['genre']);
                $newGig->addChild("venue", $_POST['venue']);
                $newGig->addChild("age", $_POST['age']);
                $newGig->addChild("price", $_POST['price']);

                $gigGuide->saveXML('htaccess/gigs.xml');
            }
            ?>
        </main>
    </div>
</div>

</body>
</html>