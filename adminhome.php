<?php
session_start();
if(!isset( $_SESSION['username'] ) || !isset( $_SESSION['userid'] ))
{
  header("Location: login.php");
  exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Internal CSS -->
    <style>
        body {
            background-color:white ;
        }
        .container {
            margin-top: 50px;
        }
        h1 {
            text-align: center;
            color: #343a40;
        }
        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-title {
            font-size: 22px;
            color: #343a40;
        }
        .card-text {
            font-size: 16px;
            color: #6c757d;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            font-size: 16px;
            padding: 10px 20px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
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
  header {
    background-color:rgb(218, 69, 131);
    color: #fff;
    padding: 20px;
    text-align: center;
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
   <h2><?php echo $_SESSION["username"] ?></h2>
    <nav>
      <ul>
        <li><a href="about.php">About Us</a></li>
        <li><a href="contact.php">Contact Us</a></li>
     
      </ul>
    </nav>
    <div class="logout">
    <a href="logout.php" style="color: white; text-decoration: none; background-color:rgb(218, 69, 131); padding: 5px 10px; border-radius: 5px;">Logout</a>
  </div>

  </header>

<div class="container">
    <h1>Welcome Admin</h1>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manage Services</h5>
                    <p class="card-text">View and manage banquet services.</p>
                    <a href="manageservices.php" class="btn btn-primary">Go to Services</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Show Bookings</h5>
                    <p class="card-text">View all bookings made by customers.</p>
                    <a href="view_bookings.php" class="btn btn-primary">View Bookings</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <center><h5 class="card-title">View Inquiries</h5></center>
                    <p class="card-text">View inquiries received from customers.</p>
                    <a href="view_inquiries.php" class="btn btn-primary">View Inquiries</a>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <h3>Banquet Hall Management System</h3>
    <p>Bangalore</p>
  </footer>

</body>
</html>

