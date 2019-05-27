<?php
include('session.php');
$_SESSION['pageStore'] = "index.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Test Calendar</title>

    <!-- CSS -->
    <link href="bootstrap.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">


    <!-- JavaScript -->
    <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/moment.js"></script>
    <script src="js/SetTitle.js"></script>

    <!-- Calendar -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.css">
    <script src="js/fullcalendar_3.10.js"></script>
    <script src="js/jquery_qtip.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/qtip2/3.0.3/jquery.qtip.min.css">
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
                    <div class="col">
                        <h1 class="text-center mb-5 mt-3">Upcoming Gigs</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-info mb-4 float-right" id="list-btn">List View</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-5">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
<script>
    $('#calendar').fullCalendar({
        events: function(start, end, timezone, callback) {
            $.ajax({
                url: 'htaccess/gigs.xml',
                dataType: 'xml',
                success: function(doc) {
                    var events = [];
                    $(doc).find('gig').each(function() {
                        var date = $(this).find("date")[0].textContent;
                        var date1 = moment().format("DD-MM-YYYY");
                        var date2 = moment(date, 'DD-MM-YYYY').format("DD-MM-YYYY");
                        if(date1 <=  date2){
                            events.push({
                                title: $(this).find("title")[0].textContent,
                                start: $(this).find("date")[0].textContent.split('-').reverse().join('/'),
                                allDay: true,
                                description: $(this).find("details")[0].textContent,
                            });
                        }
                    });
                    callback(events);
                }
            });
        },
        eventRender: function(event, element) {
            element.qtip({
                content: {
                    text: event.description,
                    title: "<a onclick='myFunction($(this).text());event.preventDefault();' class='tip-title-click' href='#'>" + event.title + "</a>",
                    button: true
                },
                style: {
                    classes: 'myCustomClass',
                    height: 100
                },
                hide: {
                    fixed: true,
                    delay: 350
                }
            });
        }
    });
</script>
<script>
    function myFunction(title) {
        window.location = 'gig.php?title='  + title;
    }
</script>
</html>

