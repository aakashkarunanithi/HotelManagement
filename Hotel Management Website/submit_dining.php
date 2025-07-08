<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $diningOption = $_POST["diningOption"];
    $fullName = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $reservationDate = $_POST["date"];
    $timeFrom = $_POST["timeFrom"];
    $timeTo = $_POST["timeTo"];

    $sql = "INSERT INTO dining_reservations (diningOption, fullName, email, phone, reservationDate, timeFrom, timeTo)
    VALUES ('$diningOption', '$fullName', '$email', '$phone', '$reservationDate', '$timeFrom', '$timeTo')";

    if ($conn->query($sql) === TRUE) {
        echo "Reservation submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
