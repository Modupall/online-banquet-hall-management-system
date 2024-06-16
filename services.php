<?php
$host = "localhost";
$username = "root";
$password = "root";
$db = "banquet";
session_start();
try {
    $dbh = new PDO("mysql:host=$host;dbname=$db", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT servicename, servicedes, serviceprice, serviceid FROM services"; // Added serviceid to select
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $services = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Services</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<header>
    <h1>Welcome to Our Banquet Hall Management System</h1>
    <nav>
        <ul>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="mybookings.php">My Bookings</a></li>
        </ul>
    </nav>
</header>
<h2>Services</h2>
<table>
    <thead>
    <tr>
        <th>Sr. No.</th>
        <th>Service Name</th>
        <th>Service Description</th>
        <th>Service Price</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $cnt = 1;
    foreach ($services as $service) {
        echo "<tr>";
        echo "<td>" . $cnt++ . "</td>";
        echo "<td>" . htmlentities($service['servicename']) . "</td>";
        echo "<td>" . htmlentities($service['servicedes']) . "</td>";
        echo "<td>Rs" . htmlentities($service['serviceprice']) . "</td>";
        // Add action links here
        #echo "<td><button class='bookBtn' data-serviceid='" . htmlentities($service['serviceid']) . "'>Book</button></td>"; // Added data attribute for serviceid
        echo "<td><a href='bookingform.php?serviceid=" . htmlentities($service['serviceid']) . "' class='bookBtn'>Book</a></td>";


        echo "</tr>";
    }
    ?>
    </tbody>
</table>
<footer>
    <h3>Banquet Hall Management System</h3>
    <p>Bangalore</p>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $(".bookBtn").click(function(){
        // Retrieve serviceId and userId (assuming you have these stored somewhere)
        var serviceid = $(this).data("serviceid"); // Retrieve serviceid from data attribute
        var userid = "login.userid"; // Replace with actual logged-in user id

        // Prepare data to be sent
        var data = {
            serviceid: serviceid, // Corrected variable name
            userid: userid
        };

        // Send AJAX request
        $.ajax({
            type: "POST",
            url: "bookservice.php",
            data: data,
            success: function(response){
                // Handle success response here
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
            }
        });
    });
});
</script>
</body>
</html>
