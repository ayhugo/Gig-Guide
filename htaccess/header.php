
<ul class="nav flex-column">
<?php
$currentPage = basename($_SERVER['PHP_SELF']);
if ($currentPage === "index.php") {
    echo "<li class='nav-item'>
                    <a class='nav-link' href=>
                        Gigs
                    </a>
                </li>";
    }else {
    echo '<li class="nav-item">
                    <a class="nav-link" href="index.php">
                        Gigs
                    </a>
                </li>';
}

if ($currentPage === "map.php") {
    echo "<li class='nav-item'>
                    <a class='nav-link' href=>
                        Bar Location Map
                    </a>
                </li>";
}else {
    echo '<li class="nav-item">
                    <a class="nav-link" href="map.php">
                        Bar Location Map
                    </a>
                </li>';
}



if ($currentPage ==="addgig.php") {
    echo '<li class="nav-item">
                    <a class="nav-link" href="">
                        Add an Event
                    </a>
                </li>';
} else {
    echo '<li class="nav-item">
                    <a class="nav-link" href="addgig.php">
                        Add an Event
                    </a>
                </li>';
}

if ($currentPage === "help.php") {
    echo "<li class='nav-item'>
                    <a class='nav-link' href=>
                        Help
                    </a>
                </li>";
}else {
    echo '<li class="nav-item">
                    <a class="nav-link" href="help.php">
                        Help
                    </a>
                </li>';
}

if ($currentPage ==="feedbackForm.php") {
    echo '<li class="nav-item">
                    <a class="nav-link" href="">
                        Feedback Form
                    </a>
                </li>';
} else {
    echo '<li class="nav-item">
                    <a class="nav-link" href="feedbackForm.php">
                        Feedback Form
                    </a>
                </li>';
}

//if ($currentPage === "login") {
//} else {
//    echo '<li class="nav-item">
//                    <a class="nav-link" href="login.php">
//                        Login
//                    </a>
//                </li>';
//}
?>


</ul>