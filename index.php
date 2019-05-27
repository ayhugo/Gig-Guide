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

    <!-- Javascript -->
    <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/SetTitle.js"></script>
    <script src="js/Search.js"></script>

    <!-- CSS -->
    <link href="bootstrap.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">


</head>
<body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">Gig Guide</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" id="searchInput"
           aria-label="Search">

    <?php
    if (!isset($_SESSION['login_id'])) {
        echo '<ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
            <a class="nav-link" href="login.php">Login</a>
            </ul>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
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
                    <div class="col">
                        <h1 class="text-center mb-5 mt-3">Upcoming Gigs</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-info mb-4 float-right">Calendar View</button>
                    </div>
                </div>
                <?php
                $xmlfile = simplexml_load_file('htaccess/gigs.xml');

                $arr = array();
                foreach ($xmlfile->gigs->gig as $aTask) {
                    $arr[] = $aTask;
                }

                usort($arr, function ($a, $b) {
                    return strtotime($a->date) - strtotime($b->date);
                });

                foreach ($arr as $gig) {
                    $title = $gig->title;
                    $details = $gig->details;
                    $artistsperforming = $gig->artistsperforming;
                    $artistslink = $gig->artistslink;
                    $date = $gig->date;
                    $date = str_replace("-", "/", $date);
                    $doortime = $gig->doortime;
                    $genre = $gig->genre;
                    $venue = $gig->venue;

                    $todayDate = date("d/m/Y");
                    if ($date >= $todayDate) {
                        $dateValues = explode('/', $date);
                        $day = $dateValues[0];
                        $month = $dateValues[1];
                        $year = $dateValues[2];
                        $dateObj = DateTime::createFromFormat('!m', $month);
                        $monthName = $dateObj->format('F');
                        echo "<div class='row gig-row items-search'>
                                                        <div class='col-lg-12 gig-col'>
                                                            <div class='float-left gig-image'>
                                                                <img class='img-fluid' id='img-main' src='https://placeimg.com/225/315/any/sepia' alt='Generic placeholder image'>
                                                            </div>
                                                            <div class='float-right hidden-small'>
                                                                <a href='#' class='info-button info-click'>INFO</a>
                                                            </div>
                                                            <div class='inner-col'>
                                                                <div class='inner-date'>
                                                                    <p class='items-searching'>$day $monthName $year</p>
                                                                </div>
                                                                <div class='inner-title'>
                                                                    <a class='gig-title title-click items-searching' href='#'>$title</a>
                                                                </div>
                                                                <div class='inner-venue'>
                                                                    <p class='items-searching'>$venue</p>
                                                                </div>
                                                            </div>
                                                            <div class='clearfix'></div>
                                                         </div>
                                                   </div>";
                    }
                }
                ?>

            </div>
        </main>
    </div>
</div>
</body>
</html>
