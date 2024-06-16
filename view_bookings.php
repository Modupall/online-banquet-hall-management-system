<?php
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

?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
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

        footer {
            background-color: rgb(218, 69, 131);
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        header {
            background-color: rgb(218, 69, 131);
            color: #fff;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

    <header>

        <h1>WELCOME</h1>
        <nav>
            <ul>
                <li><a href="manageservices.php">Manage Services</a></li>
                <li><a href="view_inquiries.php">View Enquiries</a></li>
                <li><a href="view_bookings.php">View Bookings</a></li>
            </ul>
        </nav>
        <div class="logout">
            <a href="logout.php" style="color: white; text-decoration: none; background-color:rgb(218, 69, 131); padding: 5px 10px; border-radius: 5px;">Logout</a>
        </div>

    </header>

    <h1 class="text-center text-white bg-dark col-md-12">PENDING LIST</h1>

    <table class="table table-bordered col-md-12">
        <thead>
            <tr>
                <th scope="col">Booking ID</th>
                <th scope="col">Service Name</th>
                <th scope="col">User id</th>
                <th scope="col">Event date</th>
                <th scope="col">No of Guests</th>
                <th scope="col">STATUS</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $query = "SELECT * FROM acceptbooking_view WHERE status = 'pending' ORDER BY bookingid ASC";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <th scope="row"><?php echo $row['bookingid']; ?></th>
                    <td><?php echo $row['servicename']; ?></td>
                    <td><?php echo $row['userid']; ?></td>
                    <td><?php echo $row['eventdate']; ?></td>
                    <td><?php echo $row['noofguests']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <form action="view_bookings.php" method="POST">
                            <input type="hidden" name="bookingid" value="<?php echo $row['bookingid']; ?>" />
                            <input type="submit" name="approve" value="Approve"> <!-- Fixed button name -->
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php
    if (isset($_POST['approve'])) { // Corrected button name

        $id = $_POST['bookingid'];
        $select = "UPDATE booking SET status = 'approved' WHERE bookingid = '$id' ";
        $result = mysqli_query($conn, $select);
        if ($result) {
            
            exit(); // Add exit after header redirection
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
    ?>

    <!-- ================================================================== -->

    <h1 class="text-center  text-white bg-success col-md-12">APPROVED LIST</h1>

    <table class="table table-bordered col-md-12">
        <thead>
            <tr>
                <th scope="col">Booking ID</th>
                <th scope="col">Service Name</th>
                <th scope="col">User id</th>
                <th scope="col">Event date</th>
                <th scope="col">No of Guests</th>
                <th scope="col">STATUS</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $query = "SELECT * FROM acceptbooking_view where status='approved'";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <th scope="row"><?php echo $row['bookingid']; ?></th>
                    <td><?php echo $row['servicename']; ?></td>
                    <td><?php echo $row['userid']; ?></td>
                    <td><?php echo $row['eventdate']; ?></td>
                    <td><?php echo $row['noofguests']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>
