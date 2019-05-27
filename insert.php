<?php
$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];

if (!empty($email) || !empty($password) || !empty($name)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "Kalamazoo100!";
    $dbname = "gig_guide";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connection Error(' . mysqli_connect_errno(). ')'. mysqli_connect_error());
    } else {
        $SELECT = "SELECT email FROM register WHERE email = ? Limit 1";
        $INSERT = "INSERT INTO register (email, password, name) values (?,?,?)";

        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum==0) {
            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sss", $email, $password, $name);
            $stmt->execute();
            echo "Account has been created";
        } else {
            echo "This email has already been registered";
        }
        $stmt->close();
        $conn->close();
    }
} else {
    echo "All fields are required";
    die;
}

?>