<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "banquet";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the booking ID from the AJAX request
$bookingId = $_POST['bookingid'];

// Update the status of the booking to 'Approved'
$sql = "UPDATE booking SET status = 'Approved' WHERE bookingid = $bookingId";

if ($conn->query($sql) === TRUE) {
    // Send a success response back to the client
    echo "Booking status updated successfully";
} else {
    // Send an error response back to the client
    echo "Error updating booking status: " . $conn->error;
}

$conn->close();
?>
