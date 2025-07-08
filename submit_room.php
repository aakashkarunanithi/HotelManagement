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
    $roomType = $_POST["roomType"];
    $fullName = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $checkinDate = $_POST["checkin"];
    $checkoutDate = $_POST["checkout"];

    $sql = "INSERT INTO room_bookings (roomType, fullName, email, phone, checkinDate, checkoutDate)
    VALUES ('$roomType', '$fullName', '$email', '$phone', '$checkinDate', '$checkoutDate')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
