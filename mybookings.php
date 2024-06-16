<?php

// Check if user is logged in
$servername = "localhost";
$username = "root";
$password = "root";
$database = "banquet";
$conn = new mysqli($servername, $username, $password, $database);
session_start();
echo "<pre>";
#print_r($_SESSION);
echo "</pre>";

if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();

}
// Retrieve currently logged-in user's ID
$userid = $_SESSION['userid'];

// Fetch bookings for the current user
$sql_bookings = "SELECT b.bookingid, b.eventdate, s.servicename, b.status FROM booking b 
                INNER JOIN services s ON b.serviceid = s.serviceid 
                WHERE b.userid = '$userid'";
$result_bookings = $conn->query($sql_bookings);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings</title>
  

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
    background-color:rgb(218, 69, 131);
    color: #fff;
    padding: 20px;
    text-align: center;
  }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        nav ul {
    list-style-type: none;
    padding: 0;
  }
  
  nav ul li {
    display: inline;
    margin-right: 20px;
  }
  
  nav ul li a {
    color: #fff;
    text-decoration: none;
  }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .booking-table-container {
            margin-top: 20px;
        }
        footer {
    background-color:rgb(218, 69, 131);
    color: #fff;
    padding: 10px;
    text-align: center;
  }
    </style>
</head>
<body>  
<header>
    
    <h1>WELCOME</h1><h2><?php echo $_SESSION["username"] ?></h2>
    <nav>
      <ul>
        <li><a href="about.php">About Us</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <li><a href="services.php">Services</a></li>
        <li><a href="mybookings.php">My Bookings</a></li>
      </ul>
    </nav>
    <div class="logout">
    <a href="logout.php" style="color: white; text-decoration: none; background-color:rgb(218, 69, 131); padding: 5px 10px; border-radius: 5px;">Logout</a>
  </div>

  </header>
<center><h1>My Bookings</h1></center>
<div class="container">


    <table>
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Event Date</th>
                <th>Service Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result_bookings->num_rows > 0) {
                while ($row = $result_bookings->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['bookingid'] . "</td>";
                    echo "<td>" . $row['eventdate'] . "</td>";
                    echo "<td>" . $row['servicename'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No bookings found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
        
</div>
<footer>
    <h3>Banquet Hall Management System</h3>
    <p>Bangalore</p>
  </footer>


</body>
</html>

<?php
$conn->close();
?>