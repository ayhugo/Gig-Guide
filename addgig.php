<?php
include('session.php');
$_SESSION['pageStore'] = "addgig.php";

if(!isset($_SESSION['login_id'])){
    header("location: login.php"); // Redirecting To Home Page
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link href="bootstrap.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <!-- Javascript -->
    <script src="js/FormValidation.js"></script>
    <script src="js/jquery-3.4.0.min.js"></script>

    <!-- Title -->
    <title>Add Gig</title>
</head>
<body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">Gig Guide</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="logout.php">Logout</a>
        </li>
    </ul>
</nav>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <?php include("htaccess/header.php"); ?>
            </div>
        </nav>
    </div>
    <div class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <h4 class="mb-4">Add a Gig</h4>
        <form class="needs-validation" action="validateGig.php" method="POST" id="add-gig" novalidate>
            <div class="mb-4 ">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title"
                       placeholder="Add the event name or headline acts (Don't include venue name or city)" value=""
                       required maxlength="100" autofocus>
                <div class="invalid-feedback">
                    Title required, must be less than 100 characters
                </div>
            </div>
            <div class="mb-4">
                <label for="details">Details</label>
                <div class="input-group">
                    <textarea class="form-control" rows="5" name="details" id="details"
                              placeholder="Add press release/show info here including artists performing and venue accessibility" required maxlength="1000"></textarea>
                    <div class="invalid-feedback" style="width: 100%;">
                        Gig details required, must be less than 1000 characters
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <label for="artistsPerforming">Artists Performing</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="artistsPerforming" id="artistsPerforming"
                           placeholder="" required maxlength="100">
                    <div class="invalid-feedback" style="width: 100%;">
                        Artist required, must be less than 100 characters
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <label for="artistsLink">Artist's Link</label>
                <div class="input-group">
                    <input type="url" class="form-control" name="artistsLink" id="artistsLink"
                           placeholder="Enter a link to the artists social media, must start with http:// or https://" required>
                    <div class="invalid-feedback" style="width: 100%;">
                        One social media link required, must start with http:// or https://
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <div class="form-group">
                    <label for="venue">Venue</label>
                    <select class="form-control" id="venue" name="venue">
                        <?php
                        $xmlfile = simplexml_load_file('htaccess/formInfo.xml');
                        $arr = array();
                        foreach ($xmlfile->venues->venue as $aTask) {
                            $arr[] = $aTask;
                        }
                        usort($arr, function ($a, $b) {
                            return strcmp($a->venuename, $b->venuename);
                        });

                        foreach ($arr as $venue) {
                            $venuename = $venue->venuename;
                            echo "<option value='$venuename'>$venuename</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="mb-4">
                <div class="form-row">
                    <div class="col">
                        <label for="date">Date</label>
                        <div class="input-group">
                            <input type="date" class="form-control" name="indate" id="indate" required>
                            <div class="invalid-feedback" style="width: 100%;">
                                Date required, must be a current date
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <div class="form-row">
                    <div class="col">
                        <label for="hour">Door Time</label>
                        <div class="input-group">
                            <select class="form-control" id="hour" name="hour">
                                <?php
                                $xmlfile = simplexml_load_file('htaccess/formInfo.xml');
                                foreach ($xmlfile->hours->hour as $hour) {
                                    echo "<option value='$hour'>$hour</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <label for="doortime">&nbsp;</label>
                        <div class="input-group">
                            <select class="form-control" id="minute" name="minute">
                                <?php
                                $xmlfile = simplexml_load_file('htaccess/formInfo.xml');
                                foreach ($xmlfile->minutes->minute as $minute) {
                                    echo "<option value='$minute'>$minute</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <div class="form-row">
                    <div class="col">
                        <label for="price">Price</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="price" id="price" min="0" max="10000" required placeholder="0.00">
                            <div class="invalid-feedback" style="width: 100%;">
                                Price required, must be greater than 0 and less than 1000
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="age">Age Restrictions</label>
                            <select class="form-control" id="age" name="age">
                                <?php
                                $xmlfile = simplexml_load_file('htaccess/formInfo.xml');
                                foreach ($xmlfile->ages->age as $age) {
                                    echo "<option value='$age'>$age</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <select multiple required class="form-control" id="genre" name="genre">
                    <?php
                    $xmlfile = simplexml_load_file('htaccess/formInfo.xml');
                    $arr = array();

                    foreach ($xmlfile->genres->genre as $aTask) {
                        $arr[] = $aTask;
                    }
                    usort($arr, function ($a, $b) {
                        return strcmp($a->genrename, $b->genrename);
                    });
                    foreach ($arr as $genre) {
                        $genrename = $genre->genrename;
                        echo "<option value='$genrename'>$genrename</option>";
                    }
                    ?>
                </select>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
        </form>
</body>
<script src="js/CustomValidation.js"></script>
</html>