<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Inquiries</title>
<style>
    body {
        font-family: Arial, sans-serif;
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
    header {
    background-color:rgb(218, 69, 131);
    color: #fff;
    padding: 20px;
    text-align: center;
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
    
   
    <nav>
      <ul>
        <li><a href="about.php">About Us</a></li>
       
        <li><a href="manageservices.php">Manage services</a></li>
        <li><a href="view_bookings.php">View Bookings</a></li>
      </ul>
    </nav>
    <div class="logout">
    <a href="logout.php" style="color: white; text-decoration: none; background-color:rgb(218, 69, 131); padding: 5px 10px; border-radius: 5px;">Logout</a>
  </div>

  </header>
<h2>Inquiries</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Connect to the database
        $servername = "localhost";
        $username = "root"; // Your MySQL username
        $password = "root"; // Your MySQL password
        $dbname = "banquet";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Execute the SQL query with the stored procedure
        $sql = "CALL ViewInquiries()";
        if ($conn->multi_query($sql)) {
            do {
                if ($result = $conn->store_result()) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["message"] . "</td>";
                        echo "</tr>";
                    }
                    $result->free();
                }
            } while ($conn->more_results() && $conn->next_result());
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        ?>
    </tbody>
</table>
<footer>
    <h3>Banquet Hall Management System</h3>
    <p>Bangalore</p>
  </footer>

</body>
</html>