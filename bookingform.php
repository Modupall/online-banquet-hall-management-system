<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

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

// Fetching User IDs and Usernames from login table
$sql_users = "SELECT userid, username FROM login";
$result_users = $conn->query($sql_users);

// Fetching Service IDs and Service Names from services table
$sql_services = "SELECT serviceid, servicename FROM services";
$result_services = $conn->query($sql_services);
?>

<div class="container">
    <h2>Booking Form</h2>
    <form action="bookservice.php" method="post">
        <label for="userid">User:</label>
        <select name="userid" id="userid">
            <?php
            if ($result_users->num_rows > 0) {
                while ($row = $result_users->fetch_assoc()) {
                    echo "<option value='" . $row['userid'] . "'>" . $row['username'] . "</option>";
                }
            } else {
                echo "<option value=''>No Users Found</option>";
            }
            ?>
        </select>

        <label for="serviceid">Service:</label>
        <select name="serviceid" id="serviceid">
            <?php
            if ($result_services->num_rows > 0) {
                while ($row = $result_services->fetch_assoc()) {
                    echo "<option value='" . $row['serviceid'] . "'>" . $row['servicename'] . "</option>";
                }
            } else {
                echo "<option value=''>No Services Found</option>";
            }
            ?>
        </select>

        <label for="noofguests">Number of Guests:</label>
        <input type="text" name="noofguests" id="noofguests">

        <label for="eventdate">Event Date:</label>
        <input type="date" name="eventdate" id="eventdate">

        <input type="submit" value="Submit">
    </form>
</div>

<?php
$conn->close();
?>

</body>
</html>
