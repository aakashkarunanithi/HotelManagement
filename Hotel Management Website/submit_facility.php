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
    $facility = $_POST["facility"];
    $fullName = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $bookingDate = $_POST["date"];
    $timeFrom = $_POST["timeFrom"];
    $timeTo = $_POST["timeTo"];

    $sql = "INSERT INTO facility_bookings (facility, fullName, email, phone, bookingDate, timeFrom, timeTo)
    VALUES ('$facility', '$fullName', '$email', '$phone', '$bookingDate', '$timeFrom', '$timeTo')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
