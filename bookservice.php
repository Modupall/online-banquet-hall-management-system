<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "root";
$database = "banquet";
session_start();
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$userid = $_POST['userid'];
$serviceid = $_POST['serviceid'];

$noofguests = $_POST['noofguests'];
$eventdate = $_POST['eventdate'];

// Prepare and execute SQL statement to insert values into booking table
$sql_insert_booking = "INSERT INTO booking (userid, serviceid, noofguests, eventdate) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql_insert_booking);
$stmt->bind_param("iiss", $userid, $serviceid, $noofguests, $eventdate);

if ($stmt->execute()) {
    echo "Booking successfully submitted.";
    header("Location:mybookings.php");
} else {
    echo "Error: " . $sql_insert_booking . "<br>" . $conn->error;
}


$stmt->close();
$conn->close();
?>
